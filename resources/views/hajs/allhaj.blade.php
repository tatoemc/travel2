@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css-rtl/bootstrap-datepicker.css') }}" rel="stylesheet">
@endsection

@section('title')
    المناسك
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المناسك </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    كل المناسك </span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">


        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('delete_flight'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم الحذف  بنجاح",
                    type: "success"
                })
            }
        </script>
    @endif

    @if (session()->has('add_Ticket'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم اضافة الحجز بنجاح",
                    type: "success"
                })
            }
        </script>
    @endif

    @if (session()->has('update_flight'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم التعديل بنجاح",
                    type: "success"
                })
            }
        </script>
    @endif


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'>
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0"> نوع المناسك</th>
                                    <th class="border-bottom-0">اسم الشركة</th>
                                    <th class="border-bottom-0">التكلفة</th>
                                    <th class="border-bottom-0">عدد المقاعد</th>
                                    <th class="border-bottom-0">التاريخ</th>
                                    <th class="border-bottom-0">القيام</th>
                                    <th class="border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($hajs->count() > 0)
                                    @foreach ($hajs as $index => $haj)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $haj->name }} </td>
                                            <td>{{ $haj->company->name }} </td>
                                            <td>{{ number_format($haj->cost) }}</td>
                                            <td>
                                                @if ($haj->number > 0)
                                                    <span class="label text-success d-flex">
                                                        {{ $haj->number }}
                                                    </span>
                                                @else
                                                    <span class="label text-danger d-flex">
                                                        اكتمل عدد الركاب
                                                    </span>
                                                @endif
                                            </td>
                                            <td>{{ $haj->date }}</td>
                                            <td>{{ $haj->take_off }} </td>
                                            <td>
                                                <a class="modal-effect btn btn-sm btn-primary" data-effect="effect-scale"
                                                    data-id="{{ $haj->id }}"
                                                    data-company_id="{{ $haj->company->id }}"
                                                    data-cost="{{ $haj->cost }}" data-name="{{ $haj->name }}"
                                                    data-number="{{ $haj->number }}"
                                                    data-Attendance="{{ $haj->Attendance }}"
                                                    data-take_off="{{ $haj->take_off }}" data-date="{{ $haj->date }}"
                                                    data-toggle="modal" href="#add_ticket" title="حجز"><i
                                                        class="las la-eye"></i></a>

                                            </td>
                                        </tr> 
                                    @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- End Basic modal -->
    </div>
    <!-- تفاصيل التذكرة -->
    <div class="modal fade" id="add_ticket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">الحجز</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('hajs.store') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="type" id="type" value="1">
                        <input type="hidden" name="service_id" id="service_id" value="4">
                </div>
                <div class="modal-body">
                    <p>تفاصيل الرحلة</p><br>
                    <div>
                        <label> نوع المناسك: <span class="tx-danger">*</span></label>
                        <input class="form-control" name="name" id="name" type="text" readonly>
                    </div>
                    <div>
                        <input type="hidden" name="id" id="id" value="">
                        <label>اسم الشركة: <span class="tx-danger">*</span></label>
                        <input class="form-control" name="company_id" id="company_id" type="text" readonly>
                    </div>
                    <div>
                        <label> التاريخ: <span class="tx-danger">*</span></label>
                        <input class="form-control" name="date" id="date" type="text" readonly>
                    </div>
                   
                    <div>
                        <label> مواعيد القيام: <span class="tx-danger">*</span></label>
                        <input class="form-control" name="take_off" id="take_off" type="text" readonly>
                    </div>
                    <div>
                        <label> التكلفة: <span class="tx-danger">*</span></label>
                        <input class="form-control" name="cost" id="cost" type="text" readonly>
                    </div>
                    <div>
                        <label> عدد المقاعد المتاح: <span class="tx-danger">*</span></label>
                        <input class="form-control" name="number" id="number" type="text" readonly>
                    </div>

                    <div>
                        <label> طريقة الدفع: <span class="tx-danger">*</span></label>
                        <select name="paymentype" id="select-beast" class="form-control  nice-select  custom-select">
                            <option value="1">كاش</option>
                            <option value="0">تحويل بنكي</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-info">حجز</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-datepicker.js') }}"></script>

    <script>
        $('#add_ticket').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var company_id = button.data('company_id')
            var name = button.data('name')
            var cost = button.data('cost')
            var number = button.data('number')
            var Attendance = button.data('Attendance')
            var take_off = button.data('take_off')
            var date = button.data('date')
            var service_id = button.data('service_id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #company_id').val(company_id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #cost').val(cost);
            modal.find('.modal-body #number').val(number);
            modal.find('.modal-body #Attendance').val(Attendance);
            modal.find('.modal-body #take_off').val(take_off);
            modal.find('.modal-body #date').val(date);
            modal.find('.modal-body #service_id').val(service_id);
        })
    </script>
@endsection
