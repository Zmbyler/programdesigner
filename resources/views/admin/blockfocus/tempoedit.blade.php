@extends('admin.layouts.layout')
@section('title','Tempo Edit')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="row">
			<div class="col-lg-12">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Edit Tempo
							</h3>
						</div>
					</div>
					{{Form::open(['route'=>'blockfocus.tempoupdate','method'=>'POST','class'=>'kt-form','id'=>'tempoEdit'])}}
						<div class="kt-portlet__body">
							<input type="hidden" name="id" value="{{$tempoedit->id}}">
							<input type="hidden" name="block_focus_id" value="{{$tempoedit->block_foci_id}}">
							<div class="form-group">
								<label>Tempo</label>
								<input type="text" name="tempo" value="{{$tempoedit->tempo}}" class="form-control" required>
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