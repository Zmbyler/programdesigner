@extends('admin.layouts.layout')
@section('title','Tempo Add')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="row">
			<div class="col-lg-12">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Add Tempo
							</h3>
						</div>
					</div>
					{{Form::open(['route'=>'blockfocus.tempostore','method'=>'POST','class'=>'kt-form','id'=>'tempoAdd'])}}
						<div class="kt-portlet__body">
							<div class="form-group">
								<label>Exercise Name</label>
								{!! Form::select('exercise_id',$exercise, null, ['class' => 'form-control','placeholder'=>'Select Exercise']) !!}
								@if($errors->has('exercise_id'))
									<div class="error">{{ $errors->first('exercise_id') }}</div>
								@endif
							</div>
							<div class="form-group">
								<label>Block Focus Name</label>
								{!! Form::select('block_foci_id',$blockfocus, null, ['class' => 'form-control','placeholder'=>'Select Block Focus']) !!}
								@if($errors->has('block_foci_id'))
									<div class="error">{{ $errors->first('block_foci_id') }}</div>
								@endif
							</div>
							<div class="form-group">
								<label>Tempo</label>
								{{ Form::text('tempo',null,['class' => 'form-control','placeholder'=>'Enter tempo']) }}
								@if($errors->has('tempo'))
							    	<div class="error">{{ $errors->first('tempo') }}</div>
							    @endif
							</div>
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
@endsection