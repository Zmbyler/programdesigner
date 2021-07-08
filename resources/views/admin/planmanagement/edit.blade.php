@extends('admin.layouts.layout')
@section('title','Plan Edit')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="row">
			<div class="col-lg-12">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">Create Plan Managment</h3>
						</div>
					</div>
					{{Form::model($plan,['route'=>['plan.update',$plan->id],'method'=>'PUT','class'=>'kt-form','id'=>'planEdit'])}}
					<div class="kt-portlet__body">
						<div class="form-group">
							<label>Name:</label>
							{{ Form::text('name',null,['class' => 'form-control','placeholder'=>'Enter Plan Name']) }}
						</div>
						@if($errors->has('name'))
						    <div class="error">{{ $errors->first('name') }}</div>
						@endif
						<div class="form-group">
							<label>No of user</label>
							{{ Form::text('no_of_user',null,['class' => 'form-control','placeholder'=>'Enter no of user']) }}
						</div>
						@if($errors->has('no_of_user'))
						    <div class="error">{{ $errors->first('no_of_user') }}</div>
						@endif
						{{-- <div class="form-group">
							<label>Price</label>
							{{ Form::text('price',null,['class' => 'form-control','placeholder'=>'Enter Plan Price']) }}
						</div>
						@if($errors->has('price'))
						    <div class="error">{{ $errors->first('price') }}</div>
						@endif --}}
					</div>
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="{{route('plan.index')}}" class="btn btn-secondary">Cancel</a>
						</div>
					</div>
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection