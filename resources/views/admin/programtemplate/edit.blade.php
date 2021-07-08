@extends('admin.layouts.layout')
@section('title','Program Template Edit')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="row">
			<div class="col-lg-12">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">Edit Program Template</h3>
						</div>
					</div>
					{{Form::model($programtemplate,['route'=>['programtemplate.update',$programtemplate->id],'method'=>'PUT','id'=>'programtemplateEdit','class'=>'kt-form'])}}
						<div class="kt-portlet__body">
							<div class="form-group">
							<label>Main Template:</label>
								{!! Form::select('template_type_id',$templates, null, ['class' => 'form-control','id'=>'mainTemplate','required'=>'']) !!}
							</div>
							@if($errors->has('template_type_id'))
								<div class="error">{{ $errors->first('template_type_id') }}</div>
							@endif
							<div class="form-group" id="subTemplate" style="display:none;">
								<label>Template Type:</label>
								<select class="form-control" id="subtemplate_id" name="program_goal_id">
								</select>
							</div>
							<div class="form-group">
							<label>Days:</label>
								{!! Form::select('day_id',$days, null, ['class' => 'form-control','placeholder'=>'Select a Days','required'=>'']) !!}
							</div>
							@if($errors->has('day_id'))
								<div class="error">{{ $errors->first('day_id') }}</div>
							@endif
							<div class="form-group">
								<label>Name:</label>
								{{ Form::text('name',null,['class' => 'form-control required']) }}
								@if($errors->has('name'))
							    <div class="error">{{ $errors->first('name') }}</div>
							    @endif
							</div>
						</div>
						<div class="kt-portlet__foot">
							<div class="kt-form__actions">
								<button type="submit" class="btn btn-primary">Submit</button>
								<a href="{{route('programtemplate.index')}}" class="btn btn-secondary">Cancel</a>
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

	let catId = '{{$programtemplate->template_type_id}}'
	let selectdCat = '{{$programtemplate->program_goal_id}}'
	generateChildrenHtml(catId,selectdCat)


	$('#mainTemplate').on('change',function(){
		let cat_id = $(this).val();
		generateChildrenHtml(cat_id)
	})

	function generateChildrenHtml(cat_id,selectdCat = null){
		if(cat_id == 1) {
			$.ajax({
				type: "GET",
				url: ADMIN_BASE_URL + "/programtemplate/ajaxSubprogram/" + cat_id,
				success: function (res) {
					console.log(res);
					if(res){
					$('#subTemplate').css("display", "block");
					$('#subtemplate_id').attr('required',true);
					$("#subtemplate_id").empty();
					$.each(res, function (key, value) {

						let isSelcted = selectdCat == key ? 'selected':'';
	                    $("#subtemplate_id").append('<option '+isSelcted+' value="' + key + '">' + value + '</option>');
	                });
	              }else{
	              	$('#subTemplate').css("display", "none");
	              	$('#subtemplate_id').removeAttr('required');
	              }
				}
			});	
		} else {
        	$('#subTemplate').css("display", "none");
        	$('#subtemplate_id').removeAttr('required');
    	}
	}
		
});
</script>
@endsection