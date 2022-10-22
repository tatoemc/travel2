@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
      التقارير
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">التقارير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تفاصيل  </span>
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

    <!-- row opened -->
    <div class="row row-sm">

        <div class="col-xl-12">
            <!-- div -->
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                    <div class="col-md-4">
                        @if ($payments->count() > 0)
                        <div class="box box-primary">
    
                            <div class="box-header">
    
                                <h3 class="box-title" style="margin-bottom: 10px">تقرير الدفعيات</h3>
    
                            </div><!-- end of box header -->
    
    
                                <div class="box-body table-responsive">
     
                                    <table class="table table-hover">
                                        <tr>
                                            <th>الشهر</th>
                                            <th>الاجمالي</th>
                                        </tr>
                                        <tr>
                                            @foreach($payments as $payment )
                                                    
                                                    <td>{{$payment->month}}</td>
                                                    <td>{{$payment->sum}}</td>
                                                    </tr>
                                             @endforeach
                                        <td colspan="2"> <a class="btn btn-md btn-success"  href="{{ route('payments.index')}}" title="تفاصيل">تفاصيل</a></td>
                                    </table><!-- end of table -->
                                </div>
                        </div><!-- end of box -->
                       @endif
                       @if ($flights->count() > 0)
                       <div class="box box-primary">
   
                           <div class="box-header">
   
                               <h3 class="box-title" style="margin-bottom: 10px">تقرير الرحلات</h3>
   
                           </div><!-- end of box header -->
   
   
                               <div class="box-body table-responsive">
    
                                   <table class="table table-hover">
                                       <tr>
                                           <th>الشهر</th>
                                           <th>عدد الرحلات</th>
                                       </tr>
                                       <tr>
                                           @foreach($flights as $flight )
                                                   
                                                   <td>{{$flight->month}}</td>
                                                   <td>{{$flight->sum}}</td>
                                                   </tr>
                                            @endforeach
                                        <tr>
                                            <td colspan="2"> <a class="btn btn-md btn-success"  href="{{ route('flights.index')}}" title="تفاصيل">تفاصيل</a></td>
                                        </tr>
                                   </table><!-- end of table -->
                               </div>
   
                       </div><!-- end of box -->
                      @endif

                    </div><!-- end of col -->
                </div>
            </div>
            
            <!-- /div -->
        </div>

    </div>
    <!-- /row -->


@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
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
