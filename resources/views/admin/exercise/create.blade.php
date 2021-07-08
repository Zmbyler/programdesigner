@extends('admin.layouts.layout')
@section('title','Exercise Create')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="row">
			<div class="col-lg-12">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">Create Exercise</h3>
						</div>
					</div>
					{{Form::open(['route'=>'exercise.store','id'=>'exerciseCreate','class'=>'kt-form','method'=>'POST'])}}
					<div class="kt-portlet__body">

						<div class="form-group">
							<label>Name:</label>
							{{ Form::text('name',null,['class' => 'form-control','placeholder'=>'Enter Name']) }}
						</div>
						@if($errors->has('name'))
							<div class="error">{{ $errors->first('name') }}</div>
						@endif

						<div class="form-group">
							<label>Category:</label>
							<select class="form-control" name="category_id" required="" id="kt_select2_1">
							<option value="">Select Category</option>
			                   {{categoryTree()}}
			                </select>
							
						</div>
						@if($errors->has('category_id'))
							<div class="error">{{ $errors->first('category_id') }}</div>
						@endif


						<div class="form-group">
							<label>Training Age:</label>
							{!! Form::select('training_age_id', $trainingAge, null, ['placeholder' => 'Select Training Age', 'class' => 'form-control']) !!}
							{{-- <select class="form-control" name="training_age_id">
								<option value="">Select Training Age</option>
								@for($i=0; $i<5; $i++)
								<option value="{{$i}}">{{$i}}</option>
								@endfor
							</select> --}}
						</div>
						@if($errors->has('training_age_id'))
							<div class="error">{{ $errors->first('training_age_id') }}</div>
						@endif

						<div class="form-group">
							<label>Athlete Option:</label>
							{!! Form::select('athlete_profile_id', $athleteProfile, null, ['placeholder' => 'Select Athlete', 'class' => 'form-control']) !!}
							{{-- <select class="form-control" name="athlete_profile_id">
								<option value="">Select Athlete</option>
								<option value="Kangaroo">Kangaroo</option>
								<option value="Gorilla">Gorilla</option>
							</select> --}}
						</div>
						<div class="form-group">
							<label>Block Focus:</label>
							{!! Form::select('block_focus_id', $blockFocus, null, ['placeholder' => 'Select Block Focus', 'class' => 'form-control']) !!}
							{{-- <select class="form-control" name="block_focus_id">
								<option value="">Select Block Focus</option>
								<option value="Accumulation">Accumulation</option>
								<option value="Intensification">Intensification</option>
								<option value="Realization">Realization</option>
							</select> --}}
						</div>
						<div class="form-group">
							<label>Assessment Category</label>
							{!! Form::select('assessment_category_id', $assessmentCategory, null, ['placeholder' => 'Enter Assessment Result', 'class' => 'form-control']) !!}
						</div>
						@if($errors->has('assessment_category_id'))
						    <div class="error">{{ $errors->first('assessment_category_id') }}</div>
						@endif
					</div>
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="{{route('exercise.index')}}" class="btn btn-secondary">Cancel</a>
						</div>
					</div>
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
// $(document).ready(function () { 
// 	$('#category').on('change',function(){
// 		var cat_id = $(this).val();
// 		if (cat_id != '') {
// 			$.ajax({
// 				type: "GET",
// 				url: ADMIN_BASE_URL + "/exercise/ajaxSubcat/" + cat_id,
// 				success: function (res) {
// 					console.log(res);
// 					$(".subcategory").empty();
// 	                $(".subcategory").append('<option value=""> - Select - </option>');
// 					$.each(res, function (key, value) {
// 						$(".subcategory").append('<option value="' + value.id + '">' + value.name + '</option>');
// 						$.each(value.children_categories, function(key,children){
// 							$(".subcategory").append('<option value="' + children.id + '">' + children.name + '</option>');
// 							$.each(children.categories, function(key,sub_child){
// 								$(".subcategory").append('<option value="' + sub_child.id + '">' + sub_child.name + '</option>');
// 							});
// 						});
// 	                });
// 				}
// 			});	
// 		} else {
//         	$(".subcategory").find('option').remove().end().append('<option value=""> - Select - </option>');
//     	}
// 	});	
// });
</script>
  
@endsection