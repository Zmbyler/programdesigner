@extends('admin.layouts.layout')
@section('title','Assessment Result Create')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="row">
			<div class="col-lg-12">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Create Assessment Result
							</h3>
						</div>
					</div>
					{{Form::open(['route'=>'assessmentResult.store','id'=>'assessmentCreate','class'=>'kt-form','method'=>'POST'])}}
					<form class="kt-form">
						<div class="kt-portlet__body">
							<div class="form-group">
								<label>Name:</label>
								  {{ Form::text('name',null,['class' => 'form-control','placeholder'=>'Enter Name']) }}
							</div>
							@if($errors->has('name'))
							    <div class="error">{{ $errors->first('name') }}</div>
							@endif
							<div class="form-group">
								<label>Assessment Option One:</label>
								  {{ Form::text('assessment_option_one',null,['class' => 'form-control','placeholder'=>'Assessment Option One']) }}
							</div>
							@if($errors->has('assessment_option_one'))
							    <div class="error">{{ $errors->first('assessment_option_one') }}</div>
							@endif
							<div class="form-group">
								<label>Assessment Option Two:</label>
								  {{ Form::text('assessment_option_two',null,['class' => 'form-control','placeholder'=>'Assessment Option Two']) }}
							</div>
							@if($errors->has('assessment_option_two'))
							    <div class="error">{{ $errors->first('assessment_option_two') }}</div>
							@endif
						</div>
						<div class="kt-portlet__foot">
							<div class="kt-form__actions">
								<button type="submit" class="btn btn-primary">Submit</button>
								<a href="{{route('assessmentResult.index')}}" class="btn btn-secondary">Cancel</a>
							</div>
						</div>
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection