@extends('admin.layouts.layout')
@section('title','Assessment Category Create')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="row">
			<div class="col-lg-12">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Create Assessment Category
							</h3>
						</div>
					</div>
					{{Form::open(['route'=>'assessmentCategory.store','class'=>'kt-form','id'=>'assessmentCategoryCreate','method'=>'POST'])}}
					<div class="kt-portlet__body">
						<div class="form-group">
							<label>Category Name:</label>
							{{ Form::text('name',null,['class' => 'form-control','placeholder'=>'Enter Category Name']) }}
						</div>
						@if($errors->has('name'))
						    <div class="error">{{ $errors->first('name') }}</div>
						@endif
						<h5>Assessment Result:</h5></br>
						<div class="row">
						@foreach($assessmentresults as $key=> $assessment)
						<div class="col-md-6">
							<div class="kt-widget4__item">
								<div class="kt-widget4__info">
									<input type="hidden" name="h_asssessment[{{$key}}][id]" value="{{$assessment->id}}">
									<a class="kt-widget4__username">
										{{$assessment->name}}
									</a>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="kt-radio-inline">
								<input type="radio" name="h_asssessment[{{$key}}][val]" value="{{$assessment->assessment_option_one}}" class="kt-radio kt-radio--success">
								<label>{{$assessment->assessment_option_one}}</label>&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="h_asssessment[{{$key}}][val]" value="{{$assessment->assessment_option_two}}" class="kt-radio kt-radio--success">
								<label for="{{$assessment->assessment_option_two}}">{{$assessment->assessment_option_two}}</label>
								{{-- <label class="kt-radio kt-radio--success" name="radio4">
									<input type="radio" required name="h_asssessment[{{$key}}][val]" value="{{$assessment->assessment_option_one}}"> {{$assessment->assessment_option_one}}
									<span></span>
								</label>
								<label class="kt-radio kt-radio--success" name="radio5">
									<input type="radio" name="h_asssessment[{{$key}}][val]" value="{{$assessment->assessment_option_two}}"> {{$assessment->assessment_option_two}}
									<span></span>
								</label> --}}
								{{-- <label class="kt-radio kt-radio--success">
									<input type="radio" name="assessment_option_one_{{$key}}" value="{{$assessment->assessment_option_one}}"> {{$assessment->assessment_option_one}}
									<span></span>
								</label>
								<label class="kt-radio kt-radio--success">
									<input type="radio" name="assessment_option_two_{{$key}}" value="{{$assessment->assessment_option_two}}"> {{$assessment->assessment_option_two}}
									<span></span>
								</label> --}}
								
							</div>
						</div>
						</br>
						@endforeach
						</div>
					</div>
					
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="{{route('assessmentCategory.index')}}" class="btn btn-secondary">Cancel</a>
						</div>
					</div>
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection