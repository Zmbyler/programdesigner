@extends('admin.layouts.layout')
@section('title','Training Edit')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">Traning Edit </h3>
			<span class="kt-subheader__separator kt-hidden"></span>
		</div>              
	</div>
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="row">
			<div class="col-lg-12">
			<div class="kt-portlet">
				{{Form::model($training,['route'=>['training.update',$training->id],'method'=>'PUT','id'=>'trainingEdit','class'=>'kt-form','files'=>true])}}
				<div class="kt-portlet__body">
					<div class="form-group">
						<label>Title</label>
						{{ Form::text('title',null, array('class' => 'form-control required','readonly'=>'')) }}
					</div>
					<div class="form-group">
						<label>Short Description</label>
						{!! Form::textarea('short_description',null,['class'=>'form-control required ckeditor']) !!}
					</div>
					<div class="form-group">
						<label>Long Description</label>
						{!! Form::textarea('long_description',null,['class'=>'form-control required ckeditor']) !!}
					</div>
					<div class="form-group">
						{{ Form::file('image',null, array('class' => 'form-control required','id'=>'logoUpload')) }}
						<img id="logoPreview" height="100px" src='{{asset("uploads/training_image/$training->image")}}' alt="your image" />
					</div>
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="{{route('training.index')}}" class="btn btn-secondary">Cancel</a>
						</div>
					</div>
				</div>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>
@push('scripts')
{{Html::script(ASSETS_PATH.'/editor/ckeditor/ckeditor.js')}}
<script type="text/javascript">
	 $(document).ready(function() {
		CKEDITOR.replaceClass = 'ckeditor';
	});
	function readURL(input, previewId) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function(e) {
	            $(previewId).css('background-image', 'url('+e.target.result +')');
	            $(previewId).hide();
	            $(previewId).fadeIn(650);
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}

	$("#imageUpload").change(function() {
	    readURL(this, '#imagePreview');
	});  
</script>
<style>
	.ck-editor__editable_inline {
	    min-height: 200px;
	}
</style>
@endpush
@endsection