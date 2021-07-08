@extends('admin.layouts.layout')
@section('title','Exercise Edit')
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
		<div class="row">
			<div class="col-lg-12">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">Edit Exercise</h3>
						</div>
					</div>
					{{-- {{dd($exercise)}} --}}
					{{Form::model($exercise,['route'=>['exercise.update',$exercise->id],'method'=>'PUT','id'=>'exerciseEdit','class'=>'kt-form'])}}
						<div class="kt-portlet__body">
							<div class="form-group">
								<label>Name:</label>
								{{ Form::text('name',null,['class' => 'form-control required']) }}
								@if($errors->has('name'))
							    	<div class="error">{{ $errors->first('name') }}</div>
						    	@endif
							</div>
							<div class="form-group">
							<label>Category:</label>
								<select class="form-control" name="category_id" required="" id="kt_select2_1">
								<option value="">Select Category</option>
				                   {{categoryTree(0,'',$exercise->category->first()->id)}}
				                </select>
							</div>
							@if($errors->has('category_id'))
								<div class="error">{{ $errors->first('category_id') }}</div>
							@endif
							<div class="form-group">
							<label>Training Age:</label>
							{!! Form::select('training_age_id', $trainingAge, $exercise->trainingage ? $exercise->trainingage->id : null, ['placeholder' => 'Select Training Age', 'class' => 'form-control']) !!}
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
							{!! Form::select('athlete_profile_id', $athleteProfile, $exercise->athleteoption ? $exercise->athleteoption->id : null, ['placeholder' => 'Select Athlete', 'class' => 'form-control']) !!}
							{{-- <select class="form-control" name="athlete_profile_id">
								<option value="">Select Athlete</option>
								<option value="Kangaroo">Kangaroo</option>
								<option value="Gorilla">Gorilla</option>
							</select> --}}
						</div>
						<div class="form-group">
							<label>Block Focus:</label>
							{!! Form::select('block_focus_id', $blockFocus, $exercise->blockfocus ? $exercise->blockfocus->id : null, ['placeholder' => 'Select Block Focus', 'class' => 'form-control']) !!}
							{{-- <select class="form-control" name="block_focus_id">
								<option value="">Select Block Focus</option>
								<option value="Accumulation">Accumulation</option>
								<option value="Intensification">Intensification</option>
								<option value="Realization">Realization</option>
							</select> --}}
						</div>
							{{-- <select class="form-control" name="training_age_id">
								
								@if(is_null($exercise->training_age))
									<option value="">Select Training Age</option>
									@for($i=0; $i<5; $i++)
									<option value="{{$i}}">{{$i}}</option>
									@endfor
								@else
									<option value="">Select Training Age</option>
									@for($i=0; $i<5; $i++)
									<option {{$exercise->training_age == $i ? 'selected' : null }} value="{{$i}}">{{$i}}</option>
									@endfor
								@endif
								
							</select>
						</div>
						<div class="form-group">
							<label>Athlete Option:</label>
							<select class="form-control" name="athlete_option">
								<option value="">Select Athlete</option>
								<option {{$exercise->athlete_option == 'Kangaroo' ? 'selected' : '' }} value="Kangaroo">Kangaroo</option>
								<option {{$exercise->athlete_option == 'Gorilla' ? 'selected' : '' }} value="Gorilla">Gorilla</option>
							</select>
						</div>
						<div class="form-group">
							<label>Block Focus:</label>
							<select class="form-control" name="block_focus">
								<option value="">Select Block Focus</option>
								<option {{$exercise->block_focus == 'Accumulation' ? 'selected' : '' }} value="Accumulation">Accumulation</option>
								<option {{$exercise->block_focus == 'Intensification' ? 'selected' : '' }} value="Intensification">Intensification</option>
								<option {{$exercise->block_focus == 'Realization' ? 'selected' : '' }} value="Realization">Realization</option>
							</select>
						</div> --}}
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
 
// 	let catId = '{{$exercise->category_id}}'
// 	let selectdCat = '{{$exercise->subcategory_id}}'
// 	generateChildrenHtml(catId,selectdCat)


// 	$('#category').on('change',function(){
// 		let cat_id = $(this).val();
// 		generateChildrenHtml(cat_id)
// 	})

// 	function generateChildrenHtml(cat_id,selectdCat = null){
// 		if(cat_id) {
// 			$.ajax({
// 				type: "GET",
// 				url: ADMIN_BASE_URL + "/exercise/ajaxSubcat/" + cat_id,
// 				success: function (res) {
// 					$(".subcategory").empty();
// 					$.each(res, function (key, value) {
// 						let isSelcted = selectdCat == key ? 'selected':'';
// 	                    $(".subcategory").append('<option '+isSelcted+' value="' + key + '">' + value + '</option>');
// 	                    $.each(value.children_categories, function(key,children){
// 							$(".subcategory").append('<option '+isSelcted+' value="' + children.id + '">' + children.name + '</option>');
// 							$.each(children.categories, function(key,sub_child){
// 								$(".subcategory").append('<option '+isSelcted+' value="' + sub_child.id + '">' + sub_child.name + '</option>');
// 							});
// 						});
// 	                });
// 				}
// 			});	
// 		} else {
//         	$(".subcategory").find('option').remove().end().append('<option value=""> - Select - </option>');
//     	}
// 	}
		
// });
</script>
@endsection