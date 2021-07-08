@extends('admin.layouts.layout')
@section('title','Program Edit')
@section('content')
<style type="text/css">
    .tree, .tree ul {

    margin:0;

    padding:0;

    list-style:none

}

.panel-primary > .panel-heading {
    color: #fff;
    background-color: #606ec3;
    border-color: #606ec3;
}

.panel-primary {

    border-color: #606ec3;
    margin: 3%;

}
.tree ul {

    margin-left:1em;

    position:relative

}

.tree ul ul {

    margin-left:.5em

}

.tree ul:before {

    content:"";

    display:block;

    width:0;

    position:absolute;

    top:0;

    bottom:0;

    left:0;

    border-left:1px solid

}

.tree li {

    margin:0;

    padding:0 1em;

    line-height:2em;

    color:#369;

    font-weight:700;

    position:relative

}

.tree ul li:before {

    content:"";

    display:block;

    width:10px;

    height:0;

    border-top:1px solid;

    margin-top:-1px;

    position:absolute;

    top:1em;

    left:0

}

.tree ul li:last-child:before {

    background:#fff;

    height:auto;

    top:1em;

    bottom:0

}

.indicator {

    margin-right:5px;

}

.tree li a {

    text-decoration: none;

    color:#369;

}

.tree li button, .tree li button:active, .tree li button:focus {

    text-decoration: none;

    color:#369;

    border:none;

    background:transparent;

    margin:0px 0px 0px 0px;

    padding:0px 0px 0px 0px;

    outline: 0;

}
</style>
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="row">
			<div class="col-lg-12">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">Edit Program</h3>
						</div>
					</div>
					{{Form::model($program,['route'=>['program.update',$program->id],'method'=>'PUT','id'=>'ProgramEdit','class'=>'kt-form'])}}
					<div class="kt-portlet__body">
						{{-- <div class="form-group">
							<label>Template:</label>
							{!! Form::select('template_id',$programtemplate, null, ['class' => 'form-control','id'=>'template_id','placeholder'=>'Select a Template']) !!}
						</div> --}}
						{{-- <h4>Category List</h4>

                        <ul id="tree1">

                            @foreach($categories as $category)
                            	<li>

                                    {{ $category->name }}&nbsp;&nbsp;<input type="checkbox" name="category_id[]" value="{{$category->id}}" {{in_array($category->id,$program->category->pluck('id')->toArray()) ? 'checked' : ''}}>

                                    @if(count($category->subcategory))

                                        @include('admin.program.category',['childs' => $category->subcategory])

                                    @endif

                                </li>

                            @endforeach

                        </ul> --}}
						{{-- <div class="form-group">
						<label>Category:</label>
							{!! Form::select('category_id',$categories, null, ['class' => 'form-control','id'=>'category','placeholder'=>'Select a Category']) !!}
						</div>
						@if($errors->has('category_id'))
							<div class="error">{{ $errors->first('category_id') }}</div>
						@endif
						<div class="form-group">
							<label>Subcategory:</label>
							<select class="form-control" id="subcategory" name="subcategory_id">
							</select>
						</div>
						@if($program->sport_id != 0 && $program->season_id != 0)
						<div class="row">
							<div class="form-group col-md-6">
							<label>Sport:</label>
							{!! Form::select('sport_id',$sports, null, ['class' => 'form-control','id'=>'sport_id','placeholder'=>'Select a Sport']) !!}
							</div>
							@if($errors->has('sport_id'))
								<div class="error">{{ $errors->first('sport_id') }}</div>
							@endif
							<div class="form-group col-md-6">
							<label>Season:</label>
							{!! Form::select('season_id',$seasons, null, ['class' => 'form-control','id'=>'season_id','placeholder'=>'Select a Season']) !!}
							</div>
							@if($errors->has('season_id'))
								<div class="error">{{ $errors->first('season_id') }}</div>
							@endif
						</div>
						@endif --}}
						<div class="row">
						<div class="form-group col-md-6">
							<label>Day:</label>
							{{ Form::text('day',null,['class' => 'form-control','placeholder'=>'Enter Day']) }}
							@if($errors->has('day'))
						    	<div class="error">{{ $errors->first('day') }}</div>
					    	@endif
						</div>
						<div class="form-group col-md-6">
							<label>Sequence:</label>
							{{ Form::text('sequence',null,['class' => 'form-control','placeholder'=>'Enter Sequence']) }}
							@if($errors->has('sequence'))
						    	<div class="error">{{ $errors->first('sequence') }}</div>
					    	@endif
						</div>
						</div>
						
						<div class="row">
						<div class="form-group col-md-6">
							<label>Tempo:</label>
							{{ Form::text('tempo',null,['class' => 'form-control','placeholder'=>'Enter Tempo']) }}
							@if($errors->has('tempo'))
						    	<div class="error">{{ $errors->first('tempo') }}</div>
					    	@endif
						</div>
						<div class="form-group col-md-6">
							<label>Rest:</label>
							{{ Form::text('rest',null,['class' => 'form-control','placeholder'=>'Enter Rest']) }}
							@if($errors->has('rest'))
						    	<div class="error">{{ $errors->first('rest') }}</div>
					    	@endif
						</div>
						</div>
						<div class="row">
						<div class="form-group col-md-3">
							<label>Week1:</label>
							{{ Form::text('week1',null,['class' => 'form-control','placeholder'=>'Enter Week1']) }}
							@if($errors->has('week1'))
						    	<div class="error">{{ $errors->first('week1') }}</div>
					    	@endif
						</div>
						<div class="form-group col-md-3">
							<label>Week2:</label>
							{{ Form::text('week2',null,['class' => 'form-control','placeholder'=>'Enter Week2']) }}
							@if($errors->has('week2'))
						    	<div class="error">{{ $errors->first('week2') }}</div>
					    	@endif
						</div>
						<div class="form-group col-md-3">
							<label>Week3:</label>
							{{ Form::text('week3',null,['class' => 'form-control','placeholder'=>'Enter Week3']) }}
							@if($errors->has('week3'))
						    	<div class="error">{{ $errors->first('week3') }}</div>
					    	@endif
						</div>
						<div class="form-group col-md-3">
							<label>Week4:</label>
							{{ Form::text('week4',null,['class' => 'form-control','placeholder'=>'Enter Week4']) }}
							@if($errors->has('week4'))
						    	<div class="error">{{ $errors->first('week4') }}</div>
					    	@endif
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label>Series:</label>
							{{ Form::text('series',null,['class' => 'form-control','placeholder'=>'Enter Series']) }}
							@if($errors->has('series'))
						    	<div class="error">{{ $errors->first('series') }}</div>
					    	@endif
						</div>
						<div class="form-group col-md-6">
							<label>Frequency:</label>
							{{ Form::text('frequency',null,['class' => 'form-control','placeholder'=>'Enter Frequency']) }}
							@if($errors->has('frequency'))
						    	<div class="error">{{ $errors->first('frequency') }}</div>
					    	@endif
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label>Time:</label>
							{{ Form::text('time',null,['class' => 'form-control','placeholder'=>'Enter Time']) }}
							@if($errors->has('time'))
						    	<div class="error">{{ $errors->first('time') }}</div>
					    	@endif
						</div>
						<div class="form-group col-md-6">
							<label>Sets Reps:</label>
							{{ Form::text('sets_reps',null,['class' => 'form-control','placeholder'=>'Enter Sets Reps']) }}
							@if($errors->has('sets_reps'))
						    	<div class="error">{{ $errors->first('sets_reps') }}</div>
					    	@endif
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label>Comment:</label>
							{!! Form::textarea('comment',null,['class' => 'form-control','placeholder'=>'Enter Comment']) !!}
							@if($errors->has('comment'))
						    	<div class="error">{{ $errors->first('comment') }}</div>
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
<script type="text/javascript">

$(document).ready(function () {
 
	let catId = '{{$program->category_id}}'
	let selectdCat = '{{$program->subcategory_id}}'
	generateChildrenHtml(catId,selectdCat)


	$('#category').on('change',function(){
		let cat_id = $(this).val();
		generateChildrenHtml(cat_id)
	})

	function generateChildrenHtml(cat_id,selectdCat = null){
		if(cat_id) {
			$.ajax({
				type: "GET",
				url: ADMIN_BASE_URL + "/program/ajaxSubcat/" + cat_id,
				success: function (res) {
					$("#subcategory").empty();
					$.each(res, function (key, value) {
						let isSelcted = selectdCat == key ? 'selected':'';
	                    $("#subcategory").append('<option '+isSelcted+' value="' + key + '">' + value + '</option>');
	                });
				}
			});	
		} else {
        	$("#subcategory").find('option').remove().end().append('<option value=""> - Select - </option>');
    	}
	}
		
});
</script>
@endsection