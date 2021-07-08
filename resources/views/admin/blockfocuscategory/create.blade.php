@extends('admin.layouts.layout')
@section('title','Tempo Add')
@section('content')
@php($blockfocus = \App\BlockFocus::where('id',request()->route('id'))->value('name'))
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="row">
			<div class="col-lg-12">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Add {{$blockfocus}} Category
							</h3>
						</div>
					</div>
					{{Form::open(['route'=>'blockfocuscategory.store','class'=>'kt-form','id'=>'categoryCreate','method'=>'POST'])}}
						<div class="kt-portlet__body">
							<div class="form-group">
								<label>Exercise Category:</label>
								<select class="form-control" name="category_id" required="" id="kt_select2_1">
									<option value="">Select Category</option>
				                   	{{categoryTree()}}
				                </select>
				                @if($errors->has('category_id'))
									<div class="error">{{ $errors->first('category_id') }}</div>
								@endif
							</div>
							<input type="hidden" name="blockfocus_id" value="{{request()->route('id')}}">
						</div>
						<div class="kt-portlet__foot">
							<div class="kt-form__actions">
								<button type="submit" class="btn btn-primary">Submit</button>
								<a href="{{route('blockfocuscategory.index',request()->route('id'))}}" class="btn btn-secondary">Cancel</a>
							</div>
						</div>
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection