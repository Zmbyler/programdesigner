@extends('admin.layouts.layout')
@section('title','Profile Edit')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="row">
			<div class="col-lg-12">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">Edit Admin Profile</h3>
						</div>
					</div>
					 {{Form::open(['route'=>'profile.update','method'=>'POST','id'=>'profileEdit','class'=>'kt-form'])}}
						<div class="kt-portlet__body">
							<div class="kt-section kt-section--first">
								<div class="form-group">
									<label>First Name</label>
									<input type="text" name="fname" class="form-control" value="{{$user->fname}}">
									@if($errors->has('fname'))
								    <div class="error">{{ $errors->first('fname') }}</div>
								    @endif
								</div>
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" name="lname" class="form-control" value="{{$user->lname}}">
									@if($errors->has('lname'))
								    <div class="error">{{ $errors->first('lname') }}</div>
								    @endif
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" value="{{$user->email}}">
									@if($errors->has('email'))
								    <div class="error">{{ $errors->first('email') }}</div>
								    @endif
								</div>
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