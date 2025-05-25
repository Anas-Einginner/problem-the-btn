    @extends('dashboard.master')
    @section('content')

        <main class="page-content">

            <div class="modal fade" id="sectionModal" tabindex="-1" aria-labelledby="stagesModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="stagesModalLabel"> الشعب الدراسية</h5>
                            <button type="button" class="btn-close ms-0" data-bs-dismiss="modal"
                                aria-label="إغلاق"></button>
                        </div>
                        <form>
                            <div class="modal-body">
                                <div class="container">
                                    <!-- المرحلة الابتدائية -->
                                    <div class="mb-4">
                                        <input value="" type="hidden" id="gradetag" name="gradetag">
                                        <div class="d-flex align-items-center mb-2">
                                            <label class="form-label fw-bold mb-0" for="primary-master">
                                                : فعل الشعب اللازمة</label>
                                        </div>
                                        <div class="d-flex flex-wrap gap-3 primary-group">
                                            <div class="form-check">
                                                <input data-section="1" class="form-check-input section-checkbox"
                                                    type="checkbox" id="primary1">
                                                <label class="form-check-label" for="primary1">الشعبة 1</label>
                                            </div>
                                            <div class="form-check">
                                                <input data-section="2" class="form-check-input section-checkbox"
                                                    type="checkbox" id="primary2">
                                                <label class="form-check-label " for="primary2">الشعبة 2</label>
                                            </div>
                                            <div class="form-check">
                                                <input data-section="3" class="form-check-input section-checkbox"
                                                    type="checkbox" id="primary3">
                                                <label class="form-check-label" for="primary3">الشعبة3</label>
                                            </div>
                                            <div class="form-check">
                                                <input data-section="4" class="form-check-input section-checkbox"
                                                    type="checkbox" id="primary4">
                                                <label class="form-check-label" for="primary4">الشعبة 4</label>
                                            </div>
                                            <div class="form-check">
                                                <input data-section="5" class="form-check-input section-checkbox"
                                                    type="checkbox" id="primary5">
                                                <label class="form-check-label" for="primary5">الشعبة 5</label>
                                            </div>
                                            <div class="form-check">
                                                <input data-section="6" class="form-check-input section-checkbox"
                                                    type="checkbox" id="primary6">
                                                <label class="form-check-label" for="primary6">الشعبة 6</label>
                                            </div>
                                            <div class="form-check">
                                                <input data-section="7" class="form-check-input section-checkbox"
                                                    type="checkbox" id="primary6">
                                                <label class="form-check-label" for="primary6">الشعبة 7</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary col-12"
                                    data-bs-dismiss="modal">إغلاق</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="stagesModal" tabindex="-1" aria-labelledby="stagesModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="stagesModalLabel">المراحل الدراسية</h5>
                            <button type="button" class="btn-close ms-0" data-bs-dismiss="modal"
                                aria-label="إغلاق"></button>
                        </div>
                        <form>
                            <div class="modal-body">
                                <div class="container">
                                    <!-- المرحلة الابتدائية -->
                                    <div class="mb-4">
                                        <div class="d-flex align-items-center mb-2">
                                            <input data-tag="p" class="form-check-input me-2 master-checkbox"
                                                type="checkbox" id="primary-master" data-target=".primary-group">
                                            <label class="form-label fw-bold mb-0" for="primary-master">المرحلة
                                                الابتدائية</label>
                                        </div>
                                        <div class="d-flex flex-wrap gap-3 primary-group">
                                            <div class="form-check">
                                                <input data-name="الصف الأول" data-stage="p" data-grade="1"
                                                    class="form-check-input grade-checkbox" type="checkbox">
                                                <label class="form-check-label" for="primary1">الأول</label>
                                            </div>
                                            <div class="form-check">
                                                <input data-name="الصف الثاني" data-stage="p" data-grade="2"
                                                    class="form-check-input grade-checkbox" type="checkbox">
                                                <label class="form-check-label" for="primary2">الثاني</label>
                                            </div>
                                            <div class="form-check">
                                                <input data-name="الصف الثالث" data-stage="p" data-grade="3"
                                                    class="form-check-input grade-checkbox" type="checkbox">
                                                <label class="form-check-label" for="primary3">الثالث</label>
                                            </div>
                                            <div class="form-check">
                                                <input data-name="الصف الرابع" data-stage="p" data-grade="4"
                                                    class="form-check-input grade-checkbox" type="checkbox">
                                                <label class="form-check-label grade-checkbox"
                                                    for="primary4">الرابع</label>
                                            </div>
                                            <div class="form-check">
                                                <input data-name="الصف الخامس" data-stage="p" data-grade="5"
                                                    class="form-check-input grade-checkbox" type="checkbox">
                                                <label class="form-check-label" for="primary5">الخامس</label>
                                            </div>
                                            <div class="form-check">
                                                <input data-name="الصف السادس" data-stage="p" data-grade="6"
                                                    class="form-check-input grade-checkbox" type="checkbox">
                                                <label class="form-check-label" for="primary6">السادس</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- المرحلة الإعدادية -->
                                    <div class="mb-4">
                                        <div class="d-flex align-items-center mb-2">
                                            <input data-tag="m" class="form-check-input me-2 master-checkbox"
                                                type="checkbox" id="prep-master" data-target=".prep-group">
                                            <label class="form-label fw-bold mb-0" for="prep-master">المرحلة
                                                الإعدادية</label>
                                        </div>
                                        <div class="d-flex flex-wrap gap-3 prep-group">
                                            <div class="form-check">
                                                <input data-name="الصف السابع" data-stage="m" data-grade="7"
                                                    class="form-check-input grade-checkbox" type="checkbox">
                                                <label class="form-check-label" for="prep1">السابع</label>
                                            </div>
                                            <div class="form-check">
                                                <input data-name="الصف الثامن" data-stage="m" data-grade="8"
                                                    class="form-check-input grade-checkbox " type="checkbox">
                                                <label class="form-check-label" for="prep2">الثامن</label>
                                            </div>
                                            <div class="form-check">
                                                <input data-name="الصف التاسع" data-stage="m" data-grade="9"
                                                    class="form-check-input grade-checkbox" type="checkbox">
                                                <label class="form-check-label" for="prep3">التاسع</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- المرحلة الثانوية -->
                                    <div class="mb-4">
                                        <div class="d-flex align-items-center mb-2">
                                            <input data-tag="h" class="form-check-input me-2 master-checkbox"
                                                type="checkbox" id="sec-master" data-target=".sec-group">
                                            <label class="form-label fw-bold mb-0" for="sec-master">المرحلة
                                                الثانوية</label>
                                        </div>
                                        <div class="d-flex flex-wrap gap-3 sec-group">
                                            <div class="form-check">
                                                <input data-name="الصف العاشر" data-stage="h" data-grade="10"
                                                    class="form-check-input grade-checkbox" type="checkbox">
                                                <label class="form-check-label" for="sec1">العاشر</label>
                                            </div>
                                            <div class="form-check">
                                                <input data-name="الصف الحادي عشر" data-stage="h" data-grade="11"
                                                    class="form-check-input grade-checkbox" type="checkbox">
                                                <label class="form-check-label" for="sec2">الحادي عشر</label>
                                            </div>
                                            <div class="form-check">
                                                <input data-name="الصف الثاني عشر" data-stage="h" data-grade="12"
                                                    class="form-check-input grade-checkbox" type="checkbox">
                                                <label class="form-check-label" for="sec3">الثاني عشر</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary col-12"
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
                            <button class="btn btn-primary col-12" data-bs-toggle="modal" data-bs-target="#stagesModal">
                                عرض المراحل الدراسية
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
                                            <th>المرحلة</th>
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
                    url: '{{ route('dash.grade.getdata') }}',
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
                        data: 'stage_id', // اسم الحقل القادم من السيرفر
                        name: 'stage_id', // DB  اسم الحقل المخزن في  
                        title: 'المرحلة',
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
                        title: 'إضافة شعبة',
                        orderable: false,
                        searchable: false,
                    },
                ],
                language: {
                    url: "cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json",
                },
            });
            $('.master-checkbox').on('change', function() {
                var target = $(this).data('target');
                var checked = $(this).prop('checked');

                if (!checked) {
                    $(target).find('input[type=checkbox]').prop('disabled', true); // تعطيل التشيك بوكسات
                } else {
                    $(target).find('input[type=checkbox]').prop('disabled', false); // تمكين التشيك بوكسات
                }
            });

            $('.grade-checkbox').on('change', function() {
                let checkbox = $(this);
                let status = checkbox.is(':checked') ? 1 : 0;
                let stage = checkbox.data('stage');
                let tag = checkbox.data('grade');
                let name = checkbox.data('name');
                $.ajax({
                    type: "post",
                    url: "{{ route('dash.grade.add') }}",
                    data: {
                        'stage': stage,
                        'tag': tag,
                        'name': name,
                        'status': status,
                        '_token': "{{ csrf_token() }}",
                    },
                    success: function(res) {
                        console.log(res.message);
                        toastr.success(res.success);
                        table.draw(); // add <--route اللي خزنتها عند حدوث نجاح في  datatable معناها حمل 
                    },

                });
            });
            $.ajax({
                type: "get",
                url: "{{ route('dash.grade.getactive') }}",
                data: "data",
                success: function(response) {
                    let activeTag = response.tags.map(Number);
                    //char لاني انا في صفحة الفرونت معرف الصف كرقم ولاكن في قاعدة البيانات من نوع 
                    // alert(activeTag)
                    $('.grade-checkbox').not('.master-checkbox').each(function() {
                        let checkbox = $(this);
                        let datagrade = checkbox.data('grade');
                        if (activeTag.includes(datagrade)) {
                            checkbox.prop('checked', true);
                            checkbox.prop('disabled', false);
                        }
                    });
                }
            });
            // -------------------------
            $(document).ready(function() {
                //   $(document).ready(function() { -->controller  اضفناها لانه الزر موجود في 
                $(document).on('click', '.btn-add-section', function(e) {
                    e.preventDefault();
                    let button = $(this);
                    let gradetag = button.data('grade') //data-grade ="'.$qur->tag.'" 
                    $('#gradetag').val(gradetag);
                    // alert(gradetag)
                });
            });
            $('.section-checkbox').on('change', function() {
                let checkbox = $(this);
                let status = checkbox.is(':checked') ? 1 : 0;
                let section = checkbox.data('section');
                let gradetag = $('#gradetag').val();

                $.ajax({
                    type: "post",
                    url: "{{ route('dash.grade.addsection') }}",
                    data: {
                        'section': section,
                        'gradetag': gradetag,
                        'status': status,
                        '_token': "{{ csrf_token() }}",
                    },
                    success: function(res) {
                        // console.log(res.message);
                        toastr.success(res.success);
                        table.draw(); // add <--route اللي خزنتها عند حدوث نجاح في  datatable معناها حمل 
                    },

                });
            });

            $(document).ready(function() {
                //   $(document).ready(function() { -->controller  اضفناها لانه الزر موجود في 
                $(document).on('click', '.btn-add-section', function(e) {
                    e.preventDefault();
                    let button = $(this);
                    let gradeid = button.data(
                        'grade-id') //data-grade-id ="'.$qur->tag.'"  after data we take it
                    $.ajax({
                        url: "{{ route('dash.grade.getactive.section') }}",
                        type: "get",
                        data: {
                            'gradeId': gradeid,
                        },
                        success: function(res) {
                            let activeSection = res.names.map(Number);
                            //char لاني انا في صفحة الفرونت معرف الصف كرقم ولاكن في قاعدة البيانات من نوع 
                            // alert(activeTag)
                            $('.section-checkbox').each(function() {
                                let checkbox = $(this);
                                let datasection = checkbox.data('section');
                                if (activeSection.includes(datasection)) {
                                    checkbox.prop('checked', true);
                                    checkbox.prop('disabled', false);
                                } else {
                                    checkbox.prop('checked', false);
                                }
                            });
                        },
                    });
                });
            });
            $.ajax({
                url: "{{ route('dash.grade.getactive.stage') }}",
                type: "GET",
                success: function(res) {
                    const activeTags = res.tags;
                    // alert(activeTags);

                    $('.master-checkbox').each(function() {
                        let checkbox = $(this);
                        let datatag = checkbox.data('tag');

                        if (activeTags.includes(datatag)) {
                            checkbox.prop('checked', true);
                            checkbox.prop('disabled', false);
                        } else {
                            checkbox.prop('checked', false);
                            var target = $(this).data('target');
                            $(target).find('input[type=checkbox]').prop('disabled',
                            true); // تعطيل التشيك بوكسات
                        }
                    });
                },
            });


            $('.master-checkbox').on('change', function() {
                let checkbox = $(this);
                // 1 , 0
                let status = checkbox.is(':checked') ? 1 : 0;
                let tag = checkbox.data('tag');

                $.ajax({
                    url: "{{ route('dash.grade.changemaster') }}",
                    type: "post",
                    data: {
                        'tag': tag,
                        'status': status,
                        '_token': "{{ csrf_token() }}",
                    },

                    success: function(res) {
                        //  console.log(res.message);
                        toastr.success(res.success)
                        table.draw();
                    },
                });

            });
        </script>
    @endsection
