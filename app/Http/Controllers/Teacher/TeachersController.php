<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class TeachersController extends Controller
{
   function index()
   {
      return view('dashboard.teachers.index');
   }
   function add(Request $request)
   {
      //  dd($request->all());

      $request->validate([
         'name' => 'required|string|max:255',
         'email' => 'required|email|unique:users,email',
         'phone' => 'required|regex:/^[0-9]{10,15}$/|unique:users,phone',
         'qul' => 'required',
         'gender' => 'required',
         'spec' => 'required',
         'hier_date' => 'required',
         'date_of_birth' => 'required',
      ], [
         'name.required' => 'حقل الاسم مطلوب.',
         'email.required' => 'حقل البريد الإلكتروني مطلوب.',
         'phone.required' => 'حقل رقم الهاتف مطلوب.',
         'qul.required' => 'يرجى اختيار المؤهل العلمي.',
         'gender.required' => 'يرجى تحديد الجنس.',
         'spec.required' => 'حقل التخصص الجامعي مطلوب.',
         'hier_date.required' => 'يرجى إدخال تاريخ التعيين.',
         'hier_date.after' => 'تاريخ التعيين يجب أن يكون بعد تاريخ الميلاد',
         'date_of_birth.required' => 'يرجى إدخال تاريخ الميلاد.',
      ]);
      $user = User::create([
         'email' => $request->email,
         'password' => Hash::make($request->phone),
      ]);
      teacher::create([
         'name' => $request->name,
         'phone' => $request->phone,
         'hier_date' => $request->hier_date,
         'qul' => $request->qul,
         'spec' => $request->spec,
         'gender' => $request->gender,
         'user_id' => $user->id,
      ]);
      return response()->json([
         'success' => 'تمت العملية بنجاح'
      ]);
   }

   function getdata(Request $request)
   {
      $grades = teacher::query();
      return DataTables::of($grades)
         ->addIndexColumn()
         ->addColumn('email', function ($qur) {
            return $qur->user->email;
         })
         ->addColumn('gender', function ($qur) {
            if ($qur->gender == 'M') {
               return 'ذكر';
            }
            return 'أنثى';
         })->addColumn('qul', function ($qur) {
            return $qur->getQualBuCode($qur->qul);
         })
         ->addColumn('status', function ($qur) { // stage id  او اي اسم بس بدي احطها في الدالة    column data:stage id لازم اعمل في صفحة 
            if ($qur->status == 'active') {
               return 'مفعل';
            } else {
               return 'غير مفعل';
            }
         })
         ->addColumn('action', function ($qur) {
            $data_attr = '';
            $data_attr .= 'data-id="' . $qur->id . '" ';
            $data_attr .= 'data-name="' . $qur->name . '" ';
            $data_attr .= 'data-email="' . $qur->user->email . '" ';
            $data_attr .= 'data-phone="' . $qur->phone . '" ';
            $data_attr .= 'data-spec="' . $qur->spec . '" ';
            $data_attr .= 'data-qul="' . $qur->qul . '" ';
            $data_attr .= 'data-gender="' . $qur->gender . '" ';
            $data_attr .= 'data-date-of-birth="' . $qur->date_of_birth . '" ';
            $data_attr .= 'data-hier-date="' . $qur->hier_date . '" ';
            $data_attr .= 'data-status="' . $qur->status . '" ';


            $active =  '  <div class="d-flex align-items-center gap-3 fs-6">
                                <a  ' . $data_attr . ' data-bs-toggle="modal" data-bs-target="#updateModal" href="javascript:;" class="text-warning btn_update" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                <a data-id="'.$qur->id.'"  data-url="'. route('dash.teacher.delete').'"  href="javascript:;" class="text-danger delete-btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                              </div>';
            return $active;
         })
         // ->addColumn('status', function ($qur) {
         //     if ($qur->status == 'active') {
         //         return 'مفعل';
         //     }
         //     return 'غير مفعل';
         // })
         ->make(true);
   }
   function update(Request $request)
   {
      //  dd($request->all());

      $request->validate([
         'name' => 'required',
         'email' => 'required',
         'phone' => 'required',
         'qul' => 'required',
         'gender' => 'required',
         'spec' => 'required',
         'hier_date' => 'required',
         'date_of_birth' => 'required',
      ]);
      $teacher = teacher::query()->findOrFail($request->id);
      $user = User::query()->findOrFail($teacher->user_id);

      $user->update([
         'email' => $request->email,
      ]);
      $teacher->update([
         'name' => $request->name,
         'phone' => $request->phone,
         'hier_date' => $request->hier_date,
         'date_of_birth' => $request->date_of_birth,
         'qul' => $request->qul,
         'spec' => $request->spec,
         'gender' => $request->gender,
         'user_id' => $user->id,
      ]);
      return response()->json([
         'success' => 'تمت العملية بنجاح'
      ]);
   }
}
