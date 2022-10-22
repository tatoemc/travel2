@extends('layouts.master')
@section('css')
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
    بيانات  الحجز
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الحجوزات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    بيانات الحجز </span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content') 


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('add_Payment'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم الدفع بنجاح",
                type: "success"
            })
        }
    </script>
@endif

    <!-- row opened -->
    <div class="row row-sm">

        <div class="col-xl-12">
            <!-- div -->
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tickets.index') }}">رجوع</a>
                            
                        </div>
                    </div><br>
                    <div  class="table-responsive " id="print-area">
                        <table class="table mg-b-0 text-md-nowrap" >
                            <thead>
                               <th colspan="2"> <h3>بيانات الحجز رقم : {{ $ticket->id }}</h3> </th>
                            </thead>
                            <tbody >
                                <tr>
                                    <td>اسم الزبون</td>
                                    <td>{{ $ticket->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>حالة الدفع</td>
                                    <td>
                                        @if ($ticket->status == 0 )
                                        <span class="label text-danger d-flex">
                                            لم يتم 
                                        </span>
                                    @else
                                        <span class="label text-success d-flex">
                                             تم الدفع 
                                        </span>
                                    @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>اسم الشركة الناقلة</td>
                                    <td>{{ $ticket->flight->company->name }}</td>
                                </tr>

                                <tr>
                                    <td>تاريخ الرحلة</td>
                                    <td>{{ $ticket->flight->date }}</td>
                                </tr>
                                
                                <tr>
                                    <td>الرحلة من</td>
                                    <td>{{ $ticket->flight->from }}</td>
                                </tr>
                                <tr>
                                    <td>الرحلة الي</td>
                                    <td>{{ $ticket->flight->to }}</td>
                                </tr>
                                <tr>
                                    <td>مواعيد الحضور</td>
                                    <td>{{ $ticket->flight->Attendance }}</td>
                                </tr>
                                <tr>
                                    <td>مواعيد القيام</td>
                                    <td>{{ $ticket->flight->take_off }}</td>
                                </tr>
                                
                                <tr>
                                <td> نوع الدفع</td>
                                 <td>
                                        @if ($ticket->paymentype > 1 )
                                        <span class="label text-success d-flex">
                                             كاش
                                        </span>
                                    @else
                                        <span class="label text-danger d-flex"> 
                                             بنك 
                                        </span>
                                    @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td> نوع الحجز</td>
                                    <td>{{ $ticket->type }}</td>
                                </tr>
                                <tr>
                                    <td>تكلفة الرحلة</td>
                                    <td>{{ number_format($ticket->flight->cost) }}</td>
                                </tr>
                                <tr>
                                    <td>رسوم المكتب</td>
                                    <td>{{ number_format($ticket->cost) }}</td>
                                </tr>
                                <tr>
                                    <td>مجموع المطاللبات</td>
                                    <td>{{ number_format($ticket->cost + $ticket->flight->cost) }}</td>
                                </tr>
                                @if ($ticket->status == 0 )
                                <tr>
                                    <td><a class="btn btn-lg btn-success"  href="{{ url('payment',$ticket->id)}}" title="تاكيد الدفع"><i class="las la-save">تأكيد الدفع</i></a></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div> 
                    
                </div>
                 
                <!-- /div -->
            </div>

        </div>
        <!-- /row -->


    @endsection
    @section('js')
        <!-- Internal Select2 js-->
        <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
        <!-- Internal Jquery.mCustomScrollbar js-->
        <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <!-- Internal Input tags js-->
        <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
        <!--- Tabs JS-->
        <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
        <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
        <!--Internal  Clipboard js-->
        <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
        <!-- Internal Prism js-->
        <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

@endsection