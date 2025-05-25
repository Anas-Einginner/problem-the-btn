    @extends('dashboard.master')
    @section('content')

        <main class="page-content">

            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="stagesModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="stagesModalLabel"> الشعب الدراسية</h5>
                            <button type="button" class="btn-close ms-0" data-bs-dismiss="modal"
                                aria-label="إغلاق"></button>
                        </div>

                        <div class="modal-body">
                            <div class="container">

                                <form method="post" id="add-form" action="{{ route('dash.sections.add') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="mb-4">
                                        <label for="from-control">عدد الشعب المرغوب بها :</label>
                                        <input class="form-control mt-3" type="number" name="count_section">
                                    </div>
                                    <button class="btn btn-outline-success col-12">اضافة</button>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary col-12" data-bs-dismiss="modal">إغلاق</button>
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
                            <button class="btn btn-primary col-12" data-bs-toggle="modal" data-bs-target="#addModal">
                                إضافة الشعب دراسية
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
                    url: '{{ route('dash.sections.getdata') }}',
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
                        data: 'status', // اسم الحقل القادم من السيرفر
                        name: 'status', // DB  اسم الحقل المخزن في  
                        title: 'الحالة',
                        orderable: true,
                        searchable: true,
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
                    url: "cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json",
                },
            });
            
                $(document).ready(function() { // -->controller  اضفناها لانه الزر موجود في 
                    $(document).on('change', '.active-section-sw', function(e) {
                        let id = $(this).data('id');
                        let status = $(this).data('status');
                        e.preventDefault();
                        // alert('anas wlecome');
                        $.ajax({
                            type: "post",
                            url: "{{ route('dash.sections.changestatus') }}",
                            data: {
                                'id': id,
                                'status':status,
                                '_token': '{{ csrf_token() }}',
                            },
                            success: function(res) {
                                // console.log(res.message);
                                toastr.success(res.success);
                                table.draw(); // add <--route اللي خزنتها عند حدوث نجاح في  datatable معناها حمل 
                            },
                        });
                    });
                });



            // $('.master-checkbox').on('change', function() {
            //     var target = $(this).data('target');
            //     var checked = $(this).prop('checked');

            //     if (!checked) {
            //         $(target).find('input[type=checkbox]').prop('disabled', true); // تعطيل التشيك بوكسات
            //     } else {
            //         $(target).find('input[type=checkbox]').prop('disabled', false); // تمكين التشيك بوكسات
            //     }
            // });

            // $('.grade-checkbox').on('change', function() {
            //     let checkbox = $(this);
            //     let status = checkbox.is(':checked') ? 1 : 0;
            //     let stage = checkbox.data('stage');
            //     let tag = checkbox.data('grade');
            //     let name = checkbox.data('name');
            //     $.ajax({
            //         type: "post",
            //         url: "{{ route('dash.grade.add') }}",
            //         data: {
            //             'stage': stage,
            //             'tag': tag,
            //             'name': name,
            //             'status': status,
            //             '_token': "{{ csrf_token() }}",
            //         },
            //         success: function(res) {
            //             console.log(res.message);
            //             toastr.success(res.success);
            //             table.draw(); // add <--route اللي خزنتها عند حدوث نجاح في  datatable معناها حمل 
            //         },

            //     });
            // });
            // $.ajax({
            //     type: "get",
            //     url: "{{ route('dash.grade.getactive') }}",
            //     data: "data",
            //     success: function(response) {
            //         let activeTag = response.tags.map(Number);
            //         //char لاني انا في صفحة الفرونت معرف الصف كرقم ولاكن في قاعدة البيانات من نوع 
            //         // alert(activeTag)
            //         $('.grade-checkbox').not('.master-checkbox').each(function() {
            //             let checkbox = $(this);
            //             let datagrade = checkbox.data('grade');
            //             if (activeTag.includes(datagrade)) {
            //                 checkbox.prop('checked', true);
            //                 checkbox.prop('disabled', false);
            //             }
            //         });
            //     }
            // });
            // // -------------------------
            // $(document).ready(function() {
            //     //   $(document).ready(function() { -->controller  اضفناها لانه الزر موجود في 
            //     $(document).on('click', '.btn-add-section', function(e) {
            //         e.preventDefault();
            //         let button = $(this);
            //         let gradetag = button.data('grade') //data-grade ="'.$qur->tag.'" 
            //         $('#gradetag').val(gradetag);
            //         // alert(gradetag)
            //     });
            // });
            // $('.section-checkbox').on('change', function() {
            //     let checkbox = $(this);
            //     let status = checkbox.is(':checked') ? 1 : 0;
            //     let section = checkbox.data('section');
            //     let gradetag = $('#gradetag').val();

            //     $.ajax({
            //         type: "post",
            //         url: "{{ route('dash.grade.addsection') }}",
            //         data: {
            //             'section': section,
            //             'gradetag': gradetag,
            //             'status': status,
            //             '_token': "{{ csrf_token() }}",
            //         },
            //         success: function(res) {
            //             // console.log(res.message);
            //             toastr.success(res.success);
            //             table.draw(); // add <--route اللي خزنتها عند حدوث نجاح في  datatable معناها حمل 
            //         },

            //     });
            // });

            // $(document).ready(function() {
            //     //   $(document).ready(function() { -->controller  اضفناها لانه الزر موجود في 
            //     $(document).on('click', '.btn-add-section', function(e) {
            //         e.preventDefault();
            //         let button = $(this);
            //         let gradeid = button.data(
            //             'grade-id') //data-grade-id ="'.$qur->tag.'"  after data we take it
            //         $.ajax({
            //             url: "{{ route('dash.grade.getactive.section') }}",
            //             type: "get",
            //             data: {
            //                 'gradeId': gradeid,
            //             },
            //             success: function(res) {
            //                 let activeSection = res.names.map(Number);
            //                 //char لاني انا في صفحة الفرونت معرف الصف كرقم ولاكن في قاعدة البيانات من نوع 
            //                 // alert(activeTag)
            //                 $('.section-checkbox').each(function() {
            //                     let checkbox = $(this);
            //                     let datasection = checkbox.data('section');
            //                     if (activeSection.includes(datasection)) {
            //                         checkbox.prop('checked', true);
            //                         checkbox.prop('disabled', false);
            //                     } else {
            //                         checkbox.prop('checked', false);
            //                     }
            //                 });
            //             },
            //         });
            //     });
            // });
            // $.ajax({
            //     url: "{{ route('dash.grade.getactive.stage') }}",
            //     type: "GET",
            //     success: function(res) {
            //         const activeTags = res.tags;
            //         // alert(activeTags);

            //         $('.master-checkbox').each(function() {
            //             let checkbox = $(this);
            //             let datatag = checkbox.data('tag');

            //             if (activeTags.includes(datatag)) {
            //                 checkbox.prop('checked', true);
            //                 checkbox.prop('disabled', false);
            //             } else {
            //                 checkbox.prop('checked', false);
            //                 var target = $(this).data('target');
            //                 $(target).find('input[type=checkbox]').prop('disabled',
            //                     true); // تعطيل التشيك بوكسات
            //             }
            //         });
            //     },
            // });


            // $('.master-checkbox').on('change', function() {
            //     let checkbox = $(this);
            //     // 1 , 0
            //     let status = checkbox.is(':checked') ? 1 : 0;
            //     let tag = checkbox.data('tag');

            //     $.ajax({
            //         url: "{{ route('dash.grade.changemaster') }}",
            //         type: "post",
            //         data: {
            //             'tag': tag,
            //             'status': status,
            //             '_token': "{{ csrf_token() }}",
            //         },

            //         success: function(res) {
            //             //  console.log(res.message);
            //             toastr.success(res.success)
            //             table.draw();
            //         },
            //     });

            // });
        </script>
    @endsection
