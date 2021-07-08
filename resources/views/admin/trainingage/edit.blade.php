@extends('admin.layouts.layout')
@section('title','Traning Age Edit')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="row">
			<div class="col-lg-12">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Edit Traning Age
							</h3>
						</div>
					</div>
					{{Form::model($trainingAge,['route'=>['trainingage.update',$trainingAge->id],'method'=>'PUT','id'=>'assessmentEdit','class'=>'kt-form'])}}
						<div class="kt-portlet__body">
							<div class="form-group">
								<label>Name:</label>
									{{ Form::number('name',null,['class' => 'form-control required']) }}
								@if($errors->has('name'))
							    	<div class="error">{{ $errors->first('name') }}</div>
							    @endif
							</div>
						</div>
						<div class="kt-portlet__foot">
							<div class="kt-form__actions">
								<button type="submit" class="btn btn-primary">Submit</button>
								<a href="{{route('trainingage.index')}}" class="btn btn-secondary">Cancel</a>
							</div>
						</div>
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection