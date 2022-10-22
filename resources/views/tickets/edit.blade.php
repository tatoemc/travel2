@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
    تعديل حجز 
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> الحجوزات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تعديل  حجز</span>
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
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tickets.index') }}">رجوع</a>
                        </div>
                    </div><br>
    
                    {!! Form::model($ticket, ['method' => 'PATCH','route' => ['tickets.update', $ticket->id]]) !!}
                   
                        {{csrf_field()}}
    
                        <div class="">
    
                            <div class="row mg-b-20">
                                <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label>اسم الشركة: <span class="tx-danger">*</span></label>
                                 
                                       <select class="form-control" name="company_id">
                                        @foreach($companies as $company)
                                        <option value='{{ $company->id}}'{{$company->id == $ticket->company_id ? 'selected' : '' }}> {{ $company->name}}</option>
                                        @endforeach
                                       </select>

                                </div>

                                <div class="col">
                                    <label>تاريخ الرحلة</label>
                                    
                                        {!! Form::text('date', null, array('class' => 'form-control fc-datepicker','placeholder' => 'YYYY-MM-DD','required')) !!}
                                </div>
    
                            </div>

                            <div class="row mg-b-20">
                                <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label> من: <span class="tx-danger">*</span></label>
                                    <select class="form-control" name="from">
                                        @foreach($countries as $country)
                                        <option value='{{ $country->name}}'{{$country->name == $flight->from ? 'selected' : '' }}> {{ $country->name}}</option>
                                        @endforeach
                                       </select>
                                </div>
    
                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label>  الى: <span class="tx-danger">*</span></label>
                                    <select class="form-control" name="to">
                                        @foreach($countries as $country)
                                        <option value='{{ $country->name}}'{{$country->name == $flight->to ? 'selected' : '' }}> {{ $country->name}}</option>
                                        @endforeach
                                       </select>
                                </div>
                             </div>

                             <div class="row mg-b-20">
                                <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label> الحضور: <span class="tx-danger">*</span></label>
                                    {!! Form::text('Attendance', null, array('class' => 'form-control','required')) !!}
                                </div>
    
                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label>  الاقلاع: <span class="tx-danger">*</span></label>
                                    {!! Form::text('take_off', null, array('class' => 'form-control','required')) !!}
                                </div>
                             </div>

                             <div class="row mg-b-20">
                                <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label> عدد المقاعد: <span class="tx-danger">*</span></label>
                                    {!! Form::number('number', null, array('class' => 'form-control','required')) !!}
                                </div>
    
                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label>  التكلفة: <span class="tx-danger">*</span></label>
                                    {!! Form::number('cost', null, array('class' => 'form-control','required')) !!}
                                </div>
                             </div>
                            

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-main-primary pd-x-20" type="submit">حفظ</button>
                        </div>
                        {!! Form::close() !!}
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


    
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    
    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>

@endsection
