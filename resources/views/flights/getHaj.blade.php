@extends('layouts.master')
@section('css')
   
@endsection
@section('title')
     أضافة  رحلة
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرحلات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    اضافة </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif 

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card"> 
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('flights.index') }}">رجوع</a>
                        </div>
                    </div><br>
                    
                        {!! Form::open(['route'=>'flights.store', 'method'=>'POST','autocomplete'=>'off','files'=>'true','class'=>'form']) !!}  
                        {{csrf_field()}}
    
                        <div class="">
                            <div class="row mg-b-20">
                                <div class="parsley-input col-md-3" id="fnWrapper">
                                    <label>نوع الخدمة: <span class="tx-danger">*</span></label>
                                    <select class="form-control" name="service_id" required>
                                        <option value="" selected disabled> -- اختيار الخدمة--</option>
                                           @foreach($services as $service)
                                          <option value='{{ $service->id}}'> {{ $service->name}}</option>
                                           @endforeach
                                       </select>
                                </div>

                            </div>
                       
                            <div class="row mg-b-20">
                                <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label>اسم الشركة: <span class="tx-danger">*</span></label>
                                    <select class="form-control" name="company_id" required>
                                        <option value="" selected disabled> -- اختيار الشركة--</option>
                                           @foreach($companies as $company)
                                          <option value='{{ $company->id}}'> {{ $company->name}}</option>
                                           @endforeach
                                       </select>
                                </div>

                                <div class="col">
                                    <label>تاريخ الرحلة</label>
                                    <input class="form-control fc-datepicker" name="date" placeholder="YYYY-MM-DD"
                                        type="text" value="{{ date('Y-m-d') }}" required>
                                </div>
    
                            </div>
                            
                            <div class="row mg-b-20">
                                <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label> من: <span class="tx-danger">*</span></label>
                                    <select class="form-select" name="from">
                                        @foreach ($countries as $country)
                                            <option value="{{$country->name}}">{{$country->name}} - {{$country->code}}</option>
                                        @endforeach
            
                                    </select>
                                </div>
    
                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label>  الى: <span class="tx-danger">*</span></label>
                                    <select class="form-select" name="to">
                                        @foreach ($countries as $country)
                                            <option value="{{$country->name}}">{{$country->name}} - {{$country->code}}</option>
                                        @endforeach
            
                                    </select>
                                </div>
                             </div>

                             <div class="row mg-b-20">
                                
                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label>  زمن الحضور: <span class="tx-danger">*</span></label>
                                    <select name="Attendance" id="select-beast" class="form-control  nice-select  custom-select">
                                        <option value="8:00 ص">8:00 ص</option>
                                        <option value="8:30 ص">8:30 ص</option>
                                        <option value="9:00 ص">9:00 ص</option>
                                        <option value="9:30 ص">9:30 ص</option>
                                        <option value="10:00 ص">10:00 ص</option>
                                        <option value="10:30 ص">10:30 ص</option>
                                        <option value="11:00 ص">11:00 ص</option>
                                        <option value="11:30 ص">11:30 ص</option>
                                        <option value="12:00 ظ">12:00 ظ</option>
                                        <option value="12:30 ظ">12:30 ظ</option>
                                        <option value="1:00 ظ">1:00 ظ</option>
                                        <option value="1:30 ظ">1:30 ظ</option>
                                        <option value="2:00 ظ">2:00 ظ</option>
                                        <option value="2:30 ظ">2:30 ظ</option>
                                        <option value="3:00 ظ">3:00 ظ</option>
                                        <option value="3:30 ظ">3:30 ظ</option>
                                        <option value="4:00 م">4:00 م</option>
                                        <option value="4:30 م">4:30 م</option>
                                        <option value="5:00 م">5:00 م</option>
                                        <option value="5:30 م">5:30 م</option>
                                        <option value="6:00 م">6:00 م</option>
                                        <option value="6:30 م">6:30 م</option>
                                        <option value="7:00 م">7:00 م</option>
                                        <option value="7:30 م">7:30 م</option>
                                        <option value="8:00 م">8:00 م</option>
                                        <option value="8:30 م">8:30 م</option>
                                        <option value="9:00 م">9:00 م</option>
                                        <option value="9:30 م">9:30 م</option>
                                        <option value="10:00 م">10:00 م</option>
                                        <option value="10:30 م">10:30 م</option>
                                        <option value="11:00 م">11:00 م</option>
                                        <option value="11:30 م">11:30 م</option>
                                        <option value="12:00 ص">12:00 ص</option>
                                        <option value="12:30 ص">12:30 ص</option>
                                        <option value="1:30 ص">1:30 ص</option>
                                        <option value="1:30 ص">1:30 ص</option>
                                        <option value="2:00 ص">2:00 ص</option>
                                        <option value="2:30 ص">2:30 ص</option>
                                        <option value="3:00 ص">3:00 ص</option>
                                        <option value="3:30 ص">3:30 ص</option>
                                        <option value="4:00 ص">4:00 ص</option>
                                        <option value="4:30 ص">4:30 ص</option>
                                        <option value="5:00 ص">5:00 ص</option>
                                        <option value="5:30 ص">5:30 ص</option>
                                        <option value="6:00 ص">6:00 ص</option>
                                        <option value="6:30 ص">6:30 ص</option>
                                        <option value="7:00 ص">7:00 ص</option>
                                        <option value="7:30 ص">7:30 ص</option>
                                    </select>
                                </div>
    
                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label>  زمن الاقلاع: <span class="tx-danger">*</span></label>
                                    <select name="take_off" id="select-beast" class="form-control  nice-select  custom-select">
                                        <option value="8:00 ص">8:00 ص</option>
                                        <option value="8:30 ص">8:30 ص</option>
                                        <option value="9:00 ص">9:00 ص</option>
                                        <option value="9:30 ص">9:30 ص</option>
                                        <option value="10:00 ص">10:00 ص</option>
                                        <option value="10:30 ص">10:30 ص</option>
                                        <option value="11:00 ص">11:00 ص</option>
                                        <option value="11:30 ص">11:30 ص</option>
                                        <option value="12:00 ظ">12:00 ظ</option>
                                        <option value="12:30 ظ">12:30 ظ</option>
                                        <option value="1:00 ظ">1:00 ظ</option>
                                        <option value="1:30 ظ">1:30 ظ</option>
                                        <option value="2:00 ظ">2:00 ظ</option>
                                        <option value="2:30 ظ">2:30 ظ</option>
                                        <option value="3:00 ظ">3:00 ظ</option>
                                        <option value="3:30 ظ">3:30 ظ</option>
                                        <option value="4:00 م">4:00 م</option>
                                        <option value="4:30 م">4:30 م</option>
                                        <option value="5:00 م">5:00 م</option>
                                        <option value="5:30 م">5:30 م</option>
                                        <option value="6:00 م">6:00 م</option>
                                        <option value="6:30 م">6:30 م</option>
                                        <option value="7:00 م">7:00 م</option>
                                        <option value="7:30 م">7:30 م</option>
                                        <option value="8:00 م">8:00 م</option>
                                        <option value="8:30 م">8:30 م</option>
                                        <option value="9:00 م">9:00 م</option>
                                        <option value="9:30 م">9:30 م</option>
                                        <option value="10:00 م">10:00 م</option>
                                        <option value="10:30 م">10:30 م</option>
                                        <option value="11:00 م">11:00 م</option>
                                        <option value="11:30 م">11:30 م</option>
                                        <option value="12:00 ص">12:00 ص</option>
                                        <option value="12:30 ص">12:30 ص</option>
                                        <option value="1:30 ص">1:30 ص</option>
                                        <option value="1:30 ص">1:30 ص</option>
                                        <option value="2:00 ص">2:00 ص</option>
                                        <option value="2:30 ص">2:30 ص</option>
                                        <option value="3:00 ص">3:00 ص</option>
                                        <option value="3:30 ص">3:30 ص</option>
                                        <option value="4:00 ص">4:00 ص</option>
                                        <option value="4:30 ص">4:30 ص</option>
                                        <option value="5:00 ص">5:00 ص</option>
                                        <option value="5:30 ص">5:30 ص</option>
                                        <option value="6:00 ص">6:00 ص</option>
                                        <option value="6:30 ص">6:30 ص</option>
                                        <option value="7:00 ص">7:00 ص</option>
                                        <option value="7:30 ص">7:30 ص</option>
                                    </select>
                            </div>
                            
                             <div class="row mg-b-20">
                                
                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label>  عدد المقاعد: <span class="tx-danger">*</span></label>
                                    <input type='number' class="form-control" name ="number" />
                                 
                                </div>
    
                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label>  التكلفة: <span class="tx-danger">*</span></label>
                                    <input  type='number' class="form-control" name ="cost" />
                                </div>
                             </div>
                       
                                 
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-main-primary pd-x-20" type="submit">حفظ</button>
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: "yy-mm-dd",
            timeFormat:  "hh:mm:ss"
        }).val();
    </script>
    
        
@endsection
