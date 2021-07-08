@extends('admin.layouts.layout')
@section('title','CMS Edit')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">Cms Edit </h3>
			<span class="kt-subheader__separator kt-hidden"></span>
		</div>              
	</div>
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="row">
			<div class="col-lg-12">
			<div class="kt-portlet">
				{{Form::model($cms,['route'=>['cms.update',$cms->id],'method'=>'PUT','id'=>'cmsEdit','class'=>'kt-form'])}}
				<div class="kt-portlet__body">
					<div class="form-group">
						<label>Title</label>
						{{ Form::text('title',null, array('class' => 'form-control required','readonly'=>'')) }}
						</div>
					<div class="form-group">
						<label>Short Description</label>
						{!! Form::textarea('short_description',null,['class'=>'form-control ckeditor']) !!}
					</div>
					<div class="form-group">
						<label>Long Description</label>
						{!! Form::textarea('long_description',null,['class'=>'form-control required ckeditor']) !!}
					</div>
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="{{route('cms.index')}}" class="btn btn-secondary">Cancel</a>
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
</script>
<style>
	.ck-editor__editable_inline {
	    min-height: 200px;
	}
</style>
@endpush
@endsection