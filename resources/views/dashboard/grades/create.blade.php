@extends('dashboard.master')
@section('content')

    <main class="page-content">
        <div class="row">


            <div class="card radius-10 w-100">
                <div class="card-header bg-transparent">
                    <div class="row g-3 align-items-center">
                        <div class="col">
                            <h5 class="mb-0">إضافة الصف الجديد </h5>
                        </div>
                        <div class="col">
                            <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert border-0 bg-light-danger alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                      <div class="fs-3 text-danger"><i class="bi bi-x-circle-fill"></i>
                      </div>
                      <div class="ms-3">
                        <div class="text-danger"><ul>
                            @foreach ($errors->all() as $e )
                                <li>{{$e}}</li>
                            @endforeach
                        </ul>
                        </div>
                      </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                    @endif
                    <form id="formcreate" >
                        {{-- @csrf method="POST" action="{{route('dash.grade.add')}}" ajax  اذا كنت تتعامل مع blade يجب الغاء هذه من --}}
                        <label for="text" class="mb-2 ms-2">اسم الصف</label>
                        <input id="name" name="name" class="form-control form-control mb-3" type="text" placeholder="اضافة صف">
                        <label for="text" class="mb-2 ms-2">المرحلة</label>
                        <select id="stage" name="stage" class="form-control form-control mb-3">
                            <option selected disabled>إختر المرحلة</option>
                            @foreach ($stages as $stage )
                            <option value="{{$stage->id}}">{{$stage->name}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-outline-success mt-3 col-12 ">إضافة</button>
                    </form>
                </div>
            </div>

        </div>
    </main>


@stop
@section('js')
 <script>
    $('#formcreate').submit(function (e) {
        // هاتلي النوذج باستخدام المعرف وعند الضغط عليه نفذ الدالة 
        e.preventDefault();
        // توقف الارسال في النوذج 
        var name = $('#name').val();
        // هاتلي القيمة التي ستدخل في الاسم وخزنها داخل المتغير 
        var stage = $('#stage').val();
        // alert(stage);
        $.ajax({
            url: "{{route('dash.grade.add')}}",
            type: "post",
            _token:"{{csrf_token()}}",
            data: {
                "name":name,
                "stage":stage,
            },
            success: function (res) {
                // console.log(response);
                alert('تمت الاصافة');
            $('#formcreate').trigger('reset');
            },
            error: function (e) {
                console.log(e);
              }
        });

    });
 </script>
@stop
