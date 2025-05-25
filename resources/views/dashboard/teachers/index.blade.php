@extends('dashboard.master')
@section('content')

<main class="page-content">
    {{-- addmodal --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="stagesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stagesModalLabel"> الشعب الدراسية</h5>
                    <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <form method="post" id="add-form" action="{{ route('dash.teacher.add') }}">

                    <div class="modal-body">
                        <div class="container">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="mb-4 form-group">
                                <label for="from-control ">الإسم الكامل</label>
                                <input class="form-control mt-3" name="name" placeholder="الإسم الكامل">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-4 form-group">
                                <label for="from-control">البريد الإلكتروني</label>
                                <input class="form-control mt-3" name="email" type="email"
                                    placeholder="البريد الإلكتروني">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-4 form-group">
                                <label for="from-control">رقم الهاتف</label>
                                <input class="form-control mt-3" name="phone" placeholder="رقم الهاتف">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-4 form-group">
                                <label for="from-control">التخصص الجامعي</label>
                                <input class="form-control mt-3" name="spec" placeholder="التخصص الجامعي">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-4 form-group">
                                <label for="from-control">المؤهل العلمي</label>
                                <select class="form-control mt-3" name="qul" placeholder="">
                                    <option selected disabled>اختر المؤهل العلمي</option>
                                    <option value="d">دبلوم</option>
                                    <option value="b">بكالوريوس</option>
                                    <option value="m">ماستر</option>
                                    <option value="dr">دكتور</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-4 form-group">
                                <label for="from-control">الجنس</label>
                                <select class="form-control mt-3" name="gender" placeholder="">
                                    <option selected disabled>اختر الجنس</option>
                                    <option value="M">ذكر</option>
                                    <option value="F">أنثى</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-4 form-group">
                                <label for="from-control">تاريخ الميلاد</label>
                                <input class="form-control mt-3 " type="date" name="date_of_birth" placeholder="">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-4 form-group">
                                <label for="from-control">تاريخ التعيين</label>
                                <input class="form-control mt-3" type="date" name="hier_date" placeholder="">
                                <div class="invalid-feedback"></div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-success col-12 ">اضافة</button>
                        <button type="submit" class="btn btn-secondary col-12 " data-bs-dismiss="modal">إغلاق</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- updatemodal --}}
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="stagesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stagesModalLabel"> الشعب الدراسية</h5>
                    <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <form method="post" id="update-form" action="{{ route('dash.teacher.update') }}">

                    <div class="modal-body">
                        <div class="container">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" id="id">
                            <div class="mb-4 ">
                                <label for="from-control">الإسم الكامل</label>
                                <input class="form-control mt-3" id="name" name="name" placeholder="الإسم الكامل">
                            </div>
                            <div class="mb-4">
                                <label for="from-control">البريد الإلكتروني</label>
                                <input class="form-control mt-3" id="email" name="email" type="email"
                                    placeholder="البريد الإلكتروني">
                            </div>
                            <div class="mb-4">
                                <label for="from-control">رقم الهاتف</label>
                                <input class="form-control mt-3" id="phone" name="phone" placeholder="رقم الهاتف">
                            </div>
                            <div class="mb-4">
                                <label for="from-control">التخصص الجامعي</label>
                                <input class="form-control mt-3" id="spec" name="spec" placeholder="التخصص الجامعي">
                            </div>
                            <div class="mb-4">
                                <label for="from-control">المؤهل العلمي</label>
                                <select class="form-control mt-3" id="qul" name="qul" placeholder="">
                                    <option selected disabled>اختر المؤهل العلمي</option>
                                    <option value="d">دبلوم</option>
                                    <option value="b">بكالوريوس</option>
                                    <option value="m">ماستر</option>
                                    <option value="dr">دكتور</option>

                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="from-control">الجنس</label>
                                <select class="form-control mt-3" id="gender" name="gender" placeholder="">
                                    <option selected disabled>اختر الجنس</option>
                                    <option value="M">ذكر</option>
                                    <option value="F">أنثى</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="from-control">تاريخ الميلاد</label>
                                <input class="form-control mt-3" id="date_of_birth" type="date" name="date_of_birth"
                                    placeholder="">
                            </div>
                            <div class="mb-4">
                                <label for="from-control">تاريخ التعيين</label>
                                <input class="form-control mt-3" id="hier_date" type="date" name="hier_date"
                                    placeholder="">
                            </div>
                            <div class="mb-4">
                                <label for="from-control">الحالة</label>
                                <select class="form-control mt-3" id="status" name="status" placeholder="">
                                    <option selected disabled>اختر الحالة</option>
                                    <option value="active">مفعل</option>
                                    <option value="inactive">معطل</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-success col-12">تعديل</button>
                        <button type="submit" class="btn btn-outline-secondary col-12"
                            data-bs-dismiss="modal">إغلاق</button>

                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12 col-lg-12 col-xl-12 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header bg-transparent">
                    <div class="row g-3 align-items-center">
                        <div class="col">
                            <h5 class="mb-0">جميع المستويات</h5>
                        </div>
                        <div class="col">
                            <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <button class="btn btn-primary col-12 btn-add" data-bs-toggle="modal" data-bs-target="#addModal">
                        إضافة معلم
                    </button>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-12 col-lg-12 col-xl-12 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header bg-transparent">
                    <div class="row g-3 align-items-center">
                        <div class="col">
                            <h5 class="mb-0">جميع المستويات</h5>
                        </div>
                        <div class="col">
                            <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>رقم الهاتف</th>
                                    <th>تاريخ الميلاد </th>
                                    <th>الجنس</th>
                                    <th>المؤهل العلمي</th>
                                    <th>التخصص الجامعي</th>
                                    <th>تاريخ التعيين</th>
                                    <th>الحالة</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</main>
@stop
@section('js')
    <script>
        let table = $('#datatable').DataTable({
            //DataTable امسك الجدول ونفذ عليه 

            processing: true, // التحكم في الاسهم بحيث البيانات تصعد وتنزل 
            serverSide: true, // ترتيب البيانات بشكل جميل لما تجلبها 
            responsive: true, // جعل قابل لكل الشاشات  
            // ajax -> als -> attribute
            ajax: {
                // t-body  رابط التسمية متعارف عليا في لارافل وهنا لجلب البيانات داخل الجدول  
                url: '{{ route('dash.teacher.getdata') }}',
            },
            columns: [{
                data: 'DT_RowIndex', // اسم الحقل القادم من السيرفر
                name: 'DT_RowIndex', // DB  اسم الحقل المخزن في  
                orderable: false,
                searchable: false,
            },
            {
                data: 'name', // اسم الحقل القادم من السيرفر
                name: 'name', // DB  اسم الحقل المخزن في  
                title: 'الإسم',
                orderable: true,
                searchable: true,
            },
            {
                data: 'email', // اسم الحقل القادم من السيرفر
                name: 'email', // DB  اسم الحقل المخزن في  
                title: 'البربد الإلكتروني',
                orderable: true,
                searchable: true,
            }, {
                data: 'phone', // اسم الحقل القادم من السيرفر
                name: 'phone', // DB  اسم الحقل المخزن في  
                title: 'رقم الهاتف',
                orderable: true,
                searchable: true,
            },
            {
                data: 'spec', // اسم الحقل القادم من السيرفر
                name: 'spec', // DB  اسم الحقل المخزن في  
                title: 'التخصص الجامعي',
                orderable: true,
                searchable: true,
            },
            {
                data: 'qul', // اسم الحقل القادم من السيرفر
                name: 'qul', // DB  اسم الحقل المخزن في  
                title: 'المؤهل العمي',
                orderable: true,
                searchable: true,
            },
            {
                data: 'date_of_birth', // اسم الحقل القادم من السيرفر
                name: 'date_of_birth', // DB  اسم الحقل المخزن في  
                title: 'تاريخ الميلاد',
                orderable: true,
                searchable: true,
            }, {
                data: 'gender', // اسم الحقل القادم من السيرفر
                name: 'gender', // DB  اسم الحقل المخزن في  
                title: 'الجنس',
                orderable: true,
                searchable: true,
            },

            {
                data: 'hier_date', // اسم الحقل القادم من السيرفر
                name: 'hier_date', // DB  اسم الحقل المخزن في  
                title: 'تاريخ التعيين',
                orderable: true,
                searchable: true,
            },
            {
                data: 'status', // اسم الحقل القادم من السيرفر
                name: 'status', // DB  اسم الحقل المخزن في
                title: 'الحالة',
                orderable: false,
                searchable: false,
            },
            {
                data: 'action', // اسم الحقل القادم من السيرفر
                name: 'action', // DB  اسم الحقل المخزن في
                title: 'العمليات',
                orderable: false,
                searchable: false,
            },
            ],
            language: {
                   url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json'
            },
        });
        $(document).ready(function () {
            $(document).on('click', '.btn_update', function (e) {
                e.preventDefault();
                let button = $(this);
                let id = button.data('id');
                let name = button.data('name');
                let phone = button.data('phone');
                let email = button.data('email');
                let gender = button.data('gender');
                let spec = button.data('spec');
                let date_of_birth = button.data('date-of-birth');
                let hier_date = button.data('hier-date');
                let status = button.data('status');
                let qul = button.data('qul');

                $('#id').val(id);
                $('#name').val(name);
                $('#phone').val(phone);
                $('#email').val(email);
                $('#gender').val(gender);
                $('#spec').val(spec);
                $('#date_of_birth').val(date_of_birth);
                $('#hier_date').val(hier_date);
                $('#status').val(status);
                $('#qul').val(qul);
                // alert(id);
            });
        });
     
    </script>
@endsection