@extends('admin.layouts.layout')
@section('title','Program Template Create')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="row">
            <div class="col-lg-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Import Document</h3>
                        </div>
                    </div>
                     {{-- @if (Session::has('new'))
                        <div class="alert alert-danger"  id="error-alert">
                            <ul>
                                @foreach (Session::get('new')[0] as $custom)
                                    <li>{{ $custom }} Not match</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                     @if (Session::has('required'))
                        <div class="alert alert-danger"  id="error-alert">
                            <ul>
                                
                                @foreach (Session::get('required')[0] as $da)
                                    <li>{{ $da }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}


                    @if(count($errors) > 0)
                        <div class="alert alert-danger error-alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                   <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{Form::open(['route'=>'exportImport.upload.exercise','id'=>'exportImportCreate','class'=>'kt-form','method'=>'POST', 'enctype'=>"multipart/form-data"])}}
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label><b style="color: red;">Important:</b> The format should be same as given in the sample. <a href="{{route('exportImport.sampleExcel.exercise')}}"><b>Click here</b></a> to download a sample excel sheet. While filling the sample file, please do not change any heading and do not alter heading or do not add any extra heading.
                                <b>The requirement is to fill the excel sheet as formatted in the sample and import the same here</b>.
                            </label><br>
                        </div>
                        
                        <div class="form-group">
                            <label>Upload file to import :</label><br>
                            {{ Form::file('document',null,['class' => 'form-control','required'=>'']) }}
                        </div>
                        @if($errors->has('document'))
                        <div class="error">{{ $errors->first('document') }}</div>
                        @endif
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function () { 
	$('#category').on('change',function(){
		var cat_id = $(this).val();
		if (cat_id != '') {
			$.ajax({
				type: "GET",
				url: ADMIN_BASE_URL + "/exercise/ajaxSubcat/" + cat_id,
				success: function (res) {
					$("#subcategory").empty();
	                $("#subcategory").append('<option value=""> - Select - </option>');
					$.each(res, function (key, value) {
	                    $("#subcategory").append('<option value="' + key + '">' + value + '</option>');
	                });
				}
			});	
		} else {
        	$("#subcategory").find('option').remove().end().append('<option value=""> - Select - </option>');
    	}
	});	
});

$(".error-alert").fadeTo(10000, 500).slideUp(500, function(){
    $(".error-alert").slideUp(500);
});
</script>
@endsection
