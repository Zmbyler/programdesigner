@extends('admin.layouts.layout')
@section('title','Category Create')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="row">
			<div class="col-lg-12">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Create Category
							</h3>
						</div>
					</div>
					{{Form::open(['route'=>'category.store','class'=>'kt-form','id'=>'categoryCreate','method'=>'POST'])}}
					<div class="kt-portlet__body">
						<div class="form-group">
							<label>Category Name:</label>
							{{ Form::text('name',null,['class' => 'form-control','placeholder'=>'Enter Category Name']) }}
						</div>
						@if($errors->has('name'))
						    <div class="error">{{ $errors->first('name') }}</div>
						@endif

						<div class="form-group">
							<label>Parent Category</label>
							<select class="form-control" name="parent_id" id="kt_select2_1">
							<option value="">Select Parent Category</option>
			                   {{categoryTree()}}
			                </select>
						</div>
						@if($errors->has('parent_id'))
						    <div class="error">{{ $errors->first('parent_id') }}</div>
						@endif
					</div>
					
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="{{route('category.index')}}" class="btn btn-secondary">Cancel</a>
						</div>
					</div>
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection