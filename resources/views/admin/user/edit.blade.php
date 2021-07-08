@extends('admin.layouts.layout')
@section('title','Users Edit')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="row">
			<div class="col-lg-12">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Edit User
							</h3>
						</div>
					</div>
					{{Form::model($user,['route'=>['users.update',$user->id],'method'=>'PUT','class'=>'kt-form','id'=>'userEdit'])}}
						<div class="kt-portlet__body">
							<div class="form-group">
								<label>First Name:</label>
								{{ Form::text('first_name',null,['class' => 'form-control required']) }}
								@if($errors->has('first_name'))
							    	<div class="error">{{ $errors->first('first_name') }}</div>
							    @endif
							</div>
							<div class="form-group">
								<label>Last Name:</label>
								{{ Form::text('last_name',null,['class' => 'form-control required']) }}
								@if($errors->has('last_name'))
							    	<div class="error">{{ $errors->first('last_name') }}</div>
							    @endif
							</div>
							<div class="form-group">
								<label>Email:</label>
								{{ Form::text('email',null,['class' => 'form-control required']) }}
								@if($errors->has('email'))
							    	<div class="error">{{ $errors->first('email') }}</div>
							    @endif
							</div>
							<div class="form-group">
								<label>Business Name:</label>
								{{ Form::text('business_name',null,['class' => 'form-control required']) }}
								@if($errors->has('business_name'))
							    	<div class="error">{{ $errors->first('business_name') }}</div>
							    @endif
							</div>
							<div class="form-group">
								<label>Country:</label>
								{{ Form::select('country_id',$countries,$user->userdetails->country_id ? $user->userdetails->country_id : '',['class' => 'form-control required']) }}
								@if($errors->has('country_id'))
							    	<div class="error">{{ $errors->first('country_id') }}</div>
							    @endif
							</div>
							<div class="form-group">
								<label>City:</label>
								{{ Form::text('city',$user->userdetails->city ? $user->userdetails->city : '',['class' => 'form-control required']) }}
								@if($errors->has('city'))
							    	<div class="error">{{ $errors->first('city') }}</div>
							    @endif
							</div>
						</div>
						<div class="kt-portlet__foot">
							<div class="kt-form__actions">
								<button type="submit" class="btn btn-primary">Submit</button>
								<a href="{{route('users.index')}}" class="btn btn-secondary">Cancel</a>

							</div>
						</div>
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection