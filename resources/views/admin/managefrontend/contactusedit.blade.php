@extends('admin.layouts.layout')
@section('title','Contact Page Edit')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">Contact Page Edit </h3>
			<span class="kt-subheader__separator kt-hidden"></span>
		</div>              
	</div>
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="row">
			<div class="col-lg-12">
			<div class="kt-portlet">
				{{Form::open(['route'=>'contactpage.update','method'=>'POST','id'=>'cmsEdit','class'=>'kt-form'])}}
				<input type="hidden" name="id" value="{{$contactpage->id}}">
				<div class="kt-portlet__body">
					<div class="form-group">
						<label>Address</label>
						{{ Form::text('address',$contactpage->address, array('class' => 'form-control required')) }}
					</div>
					<div class="form-group">
						<label>Email</label>
						{{ Form::text('email',$contactpage->email, array('class' => 'form-control required')) }}
					</div><div class="form-group">
						<label>Phone no</label>
						{{ Form::text('phone',$contactpage->phone, array('class' => 'form-control required')) }}
					</div>
					<div class="form-group">
						<label>Short Description</label>
						{!! Form::textarea('short_description',$contactpage->short_description,['class'=>'form-control ckeditor']) !!}
					</div>
					<div class="form-group">
						<label>Long Description</label>
						{!! Form::textarea('long_description',$contactpage->long_description,['class'=>'form-control required ckeditor']) !!}
					</div>
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<button type="submit" class="btn btn-primary">Submit</button>
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