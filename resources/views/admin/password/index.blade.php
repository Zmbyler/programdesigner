@extends('admin.layouts.layout')
@section('title','Change Password')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="row">
			<div class="col-lg-12">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Change Password
							</h3>
						</div>
					</div>
					{{Form::open(['route'=>'admin.password.store','id'=>'adminChangePassword','method'=>'POST','class'=>'kt-form'])}}
					<div class="kt-portlet__body">
						<div class="kt-section kt-section--first">
							<div class="form-group">
								<label>Old Password:</label>
								<input type="text" name="old_password" class="form-control" placeholder="Enter Old Password" required="">

								@if($errors->has('old_password'))
							    <div class="error">{{ $errors->first('old_password') }}</div>
							@endif
							</div>
							<div class="form-group">
								<label>New Password:</label>
								<input type="text" name="new_password" class="form-control"  id="new_password" placeholder="Enter New Password">
								@if($errors->has('new_password'))
							    <div class="error">{{ $errors->first('new_password') }}</div>
							    @endif
							</div>

							<div class="form-group">
								<label>Confirm New Password:</label>
								<input type="text" name="confirm_new_password"  id="confirm_new_password" class="form-control" placeholder="Enter Confirm New Password">
								@if($errors->has('confirm_new_password'))
							    <div class="error">{{ $errors->first('confirm_new_password') }}</div>
							    @endif
							</div>
						</div>
					</div>
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="{{route('admin.dashboard.index')}}" class="btn btn-secondary">Cancel</a>
						</div>
					</div>
				{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection