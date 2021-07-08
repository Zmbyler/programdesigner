@extends('admin.layouts.layout')
@section('title','Program Create')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="row">
			<div class="col-lg-12">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">Create Program</h3>
						</div>
					</div>
					{{-- {{Form::open(['route'=>'program.store','id'=>'programtemplateCreate','class'=>'kt-form','method'=>'POST'])}} --}}
					<div class="kt-portlet__body">
						<div class="form-group">
						<label>Main Template:</label>
							{!! Form::select('template_type_id',$templates, null, ['class' => 'form-control','id'=>'mainTemplate','placeholder'=>'Select a Template']) !!}
						</div>
						@if($errors->has('template_type_id'))
							<div class="error">{{ $errors->first('template_type_id') }}</div>
						@endif
						<div class="form-group" id="subTemplate" style="display:none;">
							<label>Program Goal:</label>
							<select class="form-control" id="subtemplate_id" name="program_goal_id">
							</select>
						</div>
						<div class="form-group" id="subTemplate">
							<label>Template:</label>
							<select class="form-control" id="template_id" name="template_id">
								<option value="">Template</option>
							</select>
						</div>
						<div class="kt-widget1" style="display: none;" id="category">
						<label>Category</label>
						@foreach($categories as $category)
						<div class="kt-widget1__item">
							<div class="kt-widget1__info">
								<h3 class="kt-widget1__title">{{$category->name}}</h3>
							</div>
						</div>

						<div class="form-group" id="exercise">
						<table class="table table-bordered">
						    <thead>
						      <tr>
						        <th>Exercise</th>
						        {{-- <th>Tempo</th>
						        <th>Rest</th> --}}
						        <th>Week 1</th>
						        <th>Week 2</th>
						        <th>Week 3</th>
						        <th>Week 4</th>
						        
						      </tr>
						    </thead>
						    <tbody>
						    	@foreach($category->exercise as $key=>$exercise)
						    	<tr>
						      	<td>{{$exercise->name}}</td>
						      	{{-- <td><input size="10" type="text" name="category_{{$category->id}}[exercise_{{$exercise->id}}][tempo_1]" placeholder="Tempo"/></td>
						      	<td><input size="10" type="text" name="category_{{$category->id}}[exercise_{{$exercise->id}}][rest_1]" placeholder="Rest"/></td> --}}
						      	<td><input size="10" type="text" name="category_{{$category->id}}[exercise_{{$exercise->id}}][week_1]" placeholder="Ist week"/></td>
						      	<td><input size="10" type="text" name="category_{{$category->id}}[exercise_{{$exercise->id}}][week_2]" placeholder="2nd week"/></td>
						      	<td><input size="10" type="text" name="category_{{$category->id}}[exercise_{{$exercise->id}}][week_3]" placeholder="3rd week"/></td>
						      	<td><input size="10" type="text" name="category_{{$category->id}}[exercise_{{$exercise->id}}][week_4]" placeholder="4th week"/></td>
						      </tr>
						      @endforeach
						    </tbody>
						  </table>
						</div>
						@endforeach
						</div>
					</div>
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
					{{-- {{Form::close()}} --}}
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

$(document).ready(function () { 
	$('#mainTemplate').on('change',function(){
		var main_template_id = $(this).val();
		console.log(main_template_id);
		if (main_template_id == 1) {
		$.ajax({
			type: "GET",
			url: ADMIN_BASE_URL + "/program/ajaxChildgoal/" + main_template_id,
			success: function (res) {
				if(res){
					$('#subTemplate').css("display", "block");
					$('#subtemplate_id').attr('required',true);
					$("#subtemplate_id").empty();
	                $("#subtemplate_id").append('<option value=""> - Select - </option>');
					$.each(res, function (key, value) {
	                    $("#subtemplate_id").append('<option value="' + key + '">' + value + '</option>');
	                });
				}else{
					$('#subTemplate').css("display", "none");
					$('#subtemplate_id').removeAttr('required');
				}
			}
		});	
	} else {
		$('#subTemplate').css("display", "none");
        $('#subtemplate_id').removeAttr('required');
		$.ajax({
			type: "GET",
			url: ADMIN_BASE_URL + "/program/ajaxChildtemplate/" + main_template_id,
			success: function (res) {
				if(res){
					$("#template_id").empty();
	                $("#template_id").append('<option value=""> - Select - </option>');
					$.each(res, function (key, value) {
	                    $("#template_id").append('<option value="' + key + '">' + value + '</option>');
	                });
				}
			}
		});	
        
    }
	});	
});


$(document).ready(function () { 
	$('#subtemplate_id').on('change',function(){
		var program_goal_id = $(this).val();
		console.log(program_goal_id);
		if (program_goal_id != '') {
		$.ajax({
			type: "GET",
			url: ADMIN_BASE_URL + "/program/ajaxChildgoaltemplate/" + program_goal_id,
			success: function (res) {
				$("#template_id").empty();
                $("#template_id").append('<option value=""> - Select - </option>');
				$.each(res, function (key, value) {
                    $("#template_id").append('<option value="' + key + '">' + value + '</option>');
                });
            }
		});	
	} else {
        $("#template_id").find('option').remove().end().append('<option value=""> - Select - </option>');
    }
	});	
});

$(document).ready(function () { 
	$('#template_id').on('change',function(){
		$('#category').css("display", "block");
	});	
});

</script>
@endsection