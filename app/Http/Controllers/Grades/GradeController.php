<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\GradeSection;
use App\Models\Section;
use App\Models\Stage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GradeController extends Controller
{
    //
    function index()
    {
        return view('dashboard.grades.index');
    }
    // ---------------------------------------------------------   هي دالة خاصة ب داتا تابل ---------------------------------------------------------------------
    function getdata()
    {
        $grade = Grade::query()->orderByRaw("status = 'active' DESC");
        // هيك ثببت البيانات وخزنتها داخل المتغير
        /*
        ----- query بناء استعلام مع شروط وتنفيذه.
        ----- all   هات كل السجلات من الجدول
        */
        /* return DataTables::of($grade)->make(true) ;
        //----make(true) نضع  json البيانات داخل تتعامل بصيغة  DataTable هلقيت برجع البيانات في  
        //---- اذا في بيانات طلع تمام url : learnschool/dashboard/grades/getdata  للتاكد من الشغل صح ولا غلط 
        */
        /* return DataTables::of($grade)
         ->addIndexColumn() // وهي لاضافة العمود الذي يحتوي على الترقيم
         ->make(true) ; */
        return DataTables::of($grade)
            ->addIndexColumn()
            ->addColumn('action', function ($qur) {
                if ($qur->status == 'active') {
                    //data-bs-toggle="modal" data-bs-target="#sectionModal"  -- هم لعرض المودل عند الضغط على الزر
                    return '<div data-grade-id="' . $qur->id . '"  data-grade ="' . $qur->tag . '" class="d-flex align-items-center gap-3 fs-6 btn-add-section"  data-bs-toggle="modal" data-bs-target="#sectionModal" >
                                <a href="javascript:;" class="text-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="fadeIn animated bx bx-message-square-add "></i></a>
                        </div>';
                } else {
                    return '__';
                }
            })
            ->addColumn('stage_id', function ($qur) { // stage id  او اي اسم بس بدي احطها في الدالة    column data:stage id لازم اعمل في صفحة 
                return $qur->stage->name;   // هنا نرجع العلاق من مودل ليظهر الاسم
                // $qur als $qur ->foreach find()
            })
            ->addColumn('status', function ($qur) { // stage id  او اي اسم بس بدي احطها في الدالة    column data:stage id لازم اعمل في صفحة 
                if ($qur->status == 'active') {
                    return 'مفعل';
                } else {
                    return 'غير مفعل';
                }
            })
            ->make(true);
    }
    function create()
    {
        $stages = Stage::all();
        return view('dashboard.grades.create', compact('stages'));
    }
    // ----------------------------------------------------- هي دالة لاضافة البيانات وا تحديثها او التحق منها في قاعدة البانات-----------------------------
    function add(Request $request)
    {
        // dd($request->all());
        // ايش انا مسميهم في صحفة الانشاء الاسم داخل العنصر
        $request->validate([
            'name' => 'required',
            'stage' => 'required',
            'tag' => 'required',
            'status' => 'required',

        ], [
            'name.required' => 'حقل الإسم مطلوب',
            'stage.required' => 'حقل الإسم المرحلة مطلوب',
            'tag.required' => 'حقل الوسم مطلوب',
            'status.required' => 'حقل الحالة مطلوب',
        ]);
        $stage_id = Stage::getTagById($request->stage);
        /*
    --إذا كان الـ request  يحتوي على:
    { "stage": "middle" }
    --id: 2, tag: middle
    */
        $status = Grade::getStatusByCode($request->status);
        $grade = Grade::query()->where('tag', $request->tag)->first();
        $grade->update([
            'name' => $request->name, //$request->name ->input in  inner name =""<- html القادم من صفحة   ------ name -> name column in database when we store in his
            'tag' => $request->tag, //$request->name ->input in  inner name =""<- html القادم من صفحة   ------ name -> name column in database when we store in his
            'stage_id' => $stage_id, //
            'status' => $status, //
            /*
        | Thing              | Example Value  | When to Use It? |
        | ------------------ | -----------    | ---------------------------------- |
        | `$request->status` | "active"       | The value you receive from the form or AJAX |
        | `$status`          | 1 or 0         | The converted value suitable for storage |
        | `$request->stage`  | "p , m , h"    | The value you receive from the form or AJAX |
        | `$status`          | 1 , 2, 3       | The converted value suitable for storage |

        */
        ]);

        return response()->json([
            'success' => 'تمت العملية بنجاح'
        ]);
    }
    //-------------------------------------------- لجلب كل الصفوف الحالة الخاصة بها مفعلة او غير مفعلة --------------------------------------------
    function getactive()
    {
        $actives = Grade::query()->where('status', 'active')->pluck('tag');
        // dd($actives);
        return response()->json([
            'tags' => $actives,
        ]);
    }
    function addsection(Request $request)
    {
        /*
        فإن $request:
        ajax او AJAX  يحتوي على كل البيانات المرسلة من الـ.
        */
        // dd($request->all());
        $sectionId = Section::query()->where('name', $request->section)->first();
        $gradeId = Grade::query()->where('tag', $request->gradetag)->first();
        if ($request->status == '1') {
            $status = 'active';
        } else {
            $status = 'inactive';
        }
        GradeSection::query()->updateOrCreate([
            'grade_id' => $gradeId->id,
            'section_id' => $sectionId->id,
        ], [
            'status' => $status,
        ]);
        return response()->json([
            'success' => 'تمت العملية بنجاح',
        ]);
    }
    function getactivesection(Request $request)
    {
        // dd($request->all());
        $actives = GradeSection::query()->where('status', 'active')->where('grade_id', $request->gradeId)->get()->pluck('section.name');
        return response()->json([
            'names' => $actives,
        ]);
    }
    function getactivestage(Request $request)
    {
        // dd($request->all());
        $actives = Stage::query()->where('status', 'active')->pluck('tag');
        // dd($actives);
        return response()->json([
            'tags' => $actives,
        ]);
    }
    function changemaster(Request $request)
    {

        $stage = Stage::query()->where('tag', $request->tag)->first();
        $gradesActive = Grade::query()->where('stage_id', $stage->id)->where('status', 'active')->get();
        //dd($gradesActive);

        if ($request->status == 1) {
            $stage->update([
                'status' => 'active'
            ]);
        } else {

            $stage->update([
                'status' => 'inactive'
            ]);

            foreach ($gradesActive as $g) {
                $g->update([
                    'status' => 'inactive',
                ]);
            }
        }

        return response()->json([
            'success' => 'تمت العملية بنجاح'
        ]);
    }
}