@extends('admin.layouts.layout')
@section('title','Tempo Add')
@section('content')
@php($category = \App\Category::where('id',$blockfocuscategory->category_id)->value('name'))
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="row">
			<div class="col-lg-12">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Edit {{$category}} Settings
							</h3>
						</div>
					</div>
					{{Form::model($blockfocuscategory,['route'=>['blockfocuscategory.update',$blockfocuscategory->id],'method'=>'PUT','id'=>'assessmentEdit','class'=>'kt-form'])}}
						<div class="kt-portlet__body">
							<div class="form-group">
								<label>Tempo</label>
								{{ Form::text('tempo',null,['class' => 'form-control required']) }}
								@if($errors->has('tempo'))
							    	<div class="error">{{ $errors->first('tempo') }}</div>
							    @endif
							</div>
							<div class="form-group">
								<label>RPE</label>
								{{ Form::text('rep',null,['class' => 'form-control required']) }}
								@if($errors->has('rep'))
							    	<div class="error">{{ $errors->first('rep') }}</div>
							    @endif
							</div>
							<div class="form-group">
								<label>Kangaroo VBT</label>
								{{ Form::text('kangaroo_vbt',null,['class' => 'form-control required']) }}
								@if($errors->has('kangaroo_vbt'))
							    	<div class="error">{{ $errors->first('kangaroo_vbt') }}</div>
							    @endif
							</div>
							<div class="form-group">
								<label>Gorilla VBT</label>
								{{ Form::text('gorilla_vbt',null,['class' => 'form-control required']) }}
								@if($errors->has('gorilla_vbt'))
							    	<div class="error">{{ $errors->first('gorilla_vbt') }}</div>
							    @endif
							</div>
						</div>
						<div class="kt-portlet__foot">
							<div class="kt-form__actions">
								<button type="submit" class="btn btn-primary">Submit</button>
								<a href="{{route('blockfocuscategory.index',$blockfocuscategory->block_focus_id)}}" class="btn btn-secondary">Cancel</a>
							</div>
						</div>
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection