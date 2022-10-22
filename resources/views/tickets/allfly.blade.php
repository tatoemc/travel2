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
   الرحلات
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرحلات </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                     كل الرحلات </span>
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
                                    <th class="border-bottom-0">اسم الشركة</th>
                                    <th class="border-bottom-0">من</th>
                                    <th class="border-bottom-0">الى</th>
                                    <th class="border-bottom-0">التكلفة</th>
                                    <th class="border-bottom-0">عدد المقاعد</th>
                                    <th class="border-bottom-0">التاريخ</th>
                                    <th class="border-bottom-0">الحضور</th>
                                    <th class="border-bottom-0">القيام</th>
                                    <th class="border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($flights->count() > 0)
                                    @foreach ($flights as $index => $flight)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $flight->company->name }} </td>
                                            <td>{{ $flight->from }}</td>
                                            <td>{{ $flight->to }}</td>
                                            <td><span class="label text-success d-flex">{{ number_format($flight->cost) }} </span></td>

                                            <td>
                                                @if ($flight->number > 0 )
                                                    <span class="label text-success d-flex">
                                                        {{ $flight->number }}
                                                    </span>
                                                @else
                                                    <span class="label text-danger d-flex">
                                                        اكتمل عدد الركاب
                                                    </span>
                                                @endif
                                            </td>


                                            <td>{{ $flight->date }}</td>
                                            <td>{{ $flight->Attendance }}</td>
                                            <td><span class="label text-danger d-flex">{{ $flight->take_off }}</span></td>
                                            <td>
                                               
                                                <a class="modal-effect btn btn-sm btn-primary" data-effect="effect-scale"
                                                data-id="{{ $flight->id }}"
                                                data-services_id="1"
                                                data-company_name="{{ $flight->company->name }}"
                                                data-cost="{{ $flight->cost }}"
                                                data-from="{{ $flight->from }}"
                                                data-to="{{ $flight->to }}"
                                                data-number="{{ $flight->number }}"
                                                data-Attendance="{{ $flight->Attendance }}"
                                                data-take_off="{{ $flight->take_off }}"
                                                data-date="{{ $flight->date }}"
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
                    <form action="{{ route('tickets.store') }}" method="post">
                        {{ csrf_field() }}
                </div>
                <div class="modal-body">
                    <p>تفاصيل الرحلة</p><br>
                <div>
                    <input type="hidden" name="id" id="id" value="">
                    <input type="hidden" name="services_id" id="services_id" value="1">
                    <label>اسم الشركة: <span class="tx-danger">*</span></label>
                    <input class="form-control" name="company_name" id="company_name" type="text" readonly>
                </div>
                <div>
                    <label> التاريخ: <span class="tx-danger">*</span></label>
                    <input class="form-control" name="date" id="date" type="text" readonly>
                </div>
                <div>
                    <label> من: <span class="tx-danger">*</span></label>
                    <input class="form-control" name="from" id="from" type="text" readonly>
                </div>
                <div>
                    <label> الى: <span class="tx-danger">*</span></label>
                    <input class="form-control" name="to" id="to" type="text" readonly>
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
                    <label> نوع الحجز: <span class="tx-danger">*</span></label>
                    <select name="type" id="select-beast" class="form-control  nice-select  custom-select">
                    <option value="ذهاب فقط">ذهاب فقط</option>
                    <option value="ذهاب و عودة">ذهاب و عودة</option>
                </select>
                </div>

                <div>
                    <label>  طريقة الدفع: <span class="tx-danger">*</span></label>
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
            var company_name = button.data('company_name')
            var from = button.data('from')
            var to = button.data('to')
            var cost = button.data('cost')
            var number = button.data('number')
            var Attendance = button.data('Attendance')
            var take_off = button.data('take_off')
            var date = button.data('date')
            var services_id = button.data('services_id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #company_name').val(company_name);
            modal.find('.modal-body #from').val(from);
            modal.find('.modal-body #to').val(to);
            modal.find('.modal-body #cost').val(cost);
            modal.find('.modal-body #number').val(number);
            modal.find('.modal-body #Attendance').val(Attendance);
            modal.find('.modal-body #take_off').val(take_off);
            modal.find('.modal-body #date').val(date);
            modal.find('.modal-body #services_id').val(services_id);
        })
    </script>

@endsection