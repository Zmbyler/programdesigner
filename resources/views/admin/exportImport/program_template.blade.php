@extends('admin.layouts.layout')
@section('title','Program Template Create')
@section('content')

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="row">
            <div class="col-lg-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Import Document</h3>
                        </div>
                    </div>
                    @if(count($errors) > 0)
                    
                        <div class="alert alert-danger error-alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                   <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{Form::open(['route'=>'exportImport.upload.program_template','id'=>'exportImportCreate','class'=>'kt-form','method'=>'POST', 'enctype'=>"multipart/form-data"])}}
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label><b style="color: red;">Important :</b> The format should be same as given in the sample. <a href="{{route('exportImport.sampleExcel.program_template')}}"><b>Click here</b></a> to download a sample excel sheet. While filling the sample file, please do not change any heading and do not alter heading or do not add any extra heading.
                                <b>Main Template,Template,Category Required & Please check spelling also as per admin section.</b>.
                                <b>The requirement is to fill the excel sheet as formatted in the sample and import the same here</b>.
                            </label><br>
                        </div>
                        {{-- <div class="form-group">
                            <label>Main Template :</label>
                            {!! Form::select('template_type_id',$templates, null, ['class' => 'form-control','id'=>'mainTemplate','placeholder'=>'Select a Template','required'=>'']) !!}
                        </div>
                        @if($errors->has('template_type_id'))
                        <div class="error">{{ $errors->first('template_type_id') }}</div>
                        @endif
                        <div class="form-group" id="subTemplate" style="display:none;">
                            <label>Program Goal :</label>
                            <select class="form-control" id="subtemplate_id" name="program_goal_id">
                            </select>
                        </div>
                        @if($errors->has('program_goal_id'))
                        <div class="error">{{ $errors->first('program_goal_id') }}</div>
                        @endif
                        <div class="form-group" id="subTemplate">
                            <label>Template :</label>
                            <select class="form-control" id="template_id" name="template_id">
                                <option value="">Select template</option>
                            </select>
                        </div>
                        @if($errors->has('template_id'))
                        <div class="error">{{ $errors->first('template_id') }}</div>
                        @endif --}}
                        {{-- <div class="form-group">
                            <label>Template Name</label>
                            <input type="text" name="template_name" class="form-control" placeholder="Enter template name" required="">
                        </div> --}}
                        {{-- <div class="form-group" style="display: none" id="sport">
                            <label>Sport :</label>
                            {!! Form::select('sport_id',$sports, null, ['class' => 'form-control','placeholder'=>'Select a Sport','id'=>'sport_id']) !!}
                        </div>
                        @if($errors->has('sport_id'))
                        <div class="error">{{ $errors->first('sport_id') }}</div>
                        @endif --}}
                        {{-- <div class="form-group" style="display: none"  id="season">
                            <label>Season :</label>
                            {!! Form::select('season_id',$seasons, null, ['class' => 'form-control','placeholder'=>'Select a Season','id'=>'season_id']) !!}
                        </div>
                        @if($errors->has('season_id'))
                        <div class="error">{{ $errors->first('season_id') }}</div>
                        @endif --}}
                        {{-- <div class="form-group" id="subTemplate">
                            <label>Template :</label>
                            <select class="form-control" id="template_id" name="template_id">
                                <option value="">Select template</option>
                            </select>
                        </div>
                        @if($errors->has('template_id'))
                        <div class="error">{{ $errors->first('template_id') }}</div>
                        @endif --}}
                       {{--  <h4>Category List</h4>

                            <ul id="tree1">

                                @foreach($categories as $category)

                                    <li>

                                        {{ $category->name }}&nbsp;&nbsp;<input type="checkbox" name="category_id[]" value="{{$category->id}}">

                                        @if(count($category->subcategory))

                                            @include('admin.exportImport.category',['childs' => $category->subcategory])

                                        @endif

                                    </li>

                                @endforeach

                            </ul> --}}
                        {{-- <ul>
                            @foreach ($categories as $category)
                                <li>{{ $category->name }}</li>
                                <ul>
                                @foreach ($category->subcategory as $childCategory)
                                    @include('admin.exportImport.category', ['child_category' => $childCategory])
                                @endforeach
                                </ul>
                            @endforeach
                        </ul> --}}
                        
                        {{-- <div class="form-group">
                            <label>Category :</label>
                            {!! Form::select('category_id', $categories, null, ['id' => 'mainCategory','placeholder' => 'Select Category', 'class' => 'form-control','required'=>'']) !!}
                        </div>
                        @if($errors->has('category_id'))
                        <div class="error">{{ $errors->first('category_id') }}</div>
                        @endif
                        <div class="form-group" id="subcategory" style="display:none;">
                            <label>Sub Category :</label>
                            <select class="form-control" id="subcategory_id" name="subcategory_id">
                            </select>
                        </div>
                        @if($errors->has('subcategory_id'))
                        <div class="error">{{ $errors->first('subcategory_id') }}</div>
                        @endif --}}

                        {{-- <div class="form-group" id="subsubcategory" style="display:none;">
                            <label>Sub Category :</label>
                            <select class="form-control" id="subsubcategory_id" name="subsubcategory_id">
                            </select>
                        </div>
                        @if($errors->has('subsubcategory_id'))
                        <div class="error">{{ $errors->first('subsubcategory_id') }}</div>
                        @endif --}}
                        <div class="form-group">
                            <label>Upload file to import :</label><br>
                            {{ Form::file('document',null,['class' => 'form-control','required'=>'']) }}
                        </div>
                        @if($errors->has('document'))
                        <div class="error">{{ $errors->first('document') }}</div>
                        @endif
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
    $(document).ready(function() {
        $('#mainTemplate').on('change', function() {
            var main_template_id = $(this).val();
            //$("#template_id").empty().append('<option value=""> - Select - </option>');
            $("#subtemplate_id").empty().append('<option value=""> - Select - </option>');
            if (main_template_id) {

                if (main_template_id == 1) {
                    $.ajax({
                        type: "GET",
                        url: ADMIN_BASE_URL + "/import/ajaxChildgoal/" + main_template_id,
                        success: function(res) {
                            if (res) {
                                $('#subTemplate').css("display", "block");
                                $('#subtemplate_id').attr('required', true);
                                 //$("#subtemplate_id").append('<option value=""> - Select - </option>');
                                $.each(res, function(key, value) {
                                    $("#subtemplate_id").append('<option value="' + key + '">' + value + '</option>');
                                });
                                callAjaxForTemplate(main_template_id);
                            } else {
                                $('#subTemplate').css("display", "none");
                                $('#subtemplate_id').removeAttr('required');
                            }
                        }
                    });
                } else {
                    $('#subTemplate').css("display", "none");
                    $('#subtemplate_id').removeAttr('required');
                    callAjaxForTemplate(main_template_id);
                }

                if(main_template_id == 3){
                    $("#sport").css("display","block");
                    $("#season").css("display","block");
                    $('#sport_id').attr('required', true);
                    $('#season_id').attr('required', true);
                    
                }else{
                    $('#sport').css("display", "none");
                    $('#season').css("display", "none");
                     $('#sport_id').removeAttr('required');
                    $('#season_id').removeAttr('required');
                }
            }
        });

        function callAjaxForTemplate(main_template_id) {
            $.ajax({
                type: "GET",
                url: ADMIN_BASE_URL + "/import/ajaxChildgoaltemplate/" + main_template_id,
                success: function(res) {
                    if (res) {
                        $("#template_id").empty();
                        $("#template_id").append('<option value=""> - Select - </option>');
                        $.each(res, function(key, value) {
                            $("#template_id").append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                }
            });
        }

        // $('#subtemplate_id').on('change', function() {
        //     var subtemplate_id = $(this).val();
        //     var main_template_id = $('#mainTemplate').val();
        //     $("#template_id").empty().append('<option value=""> - Select - </option>');
        //     // console.log(subtemplate_id);
        //     if (subtemplate_id && main_template_id) {
        //         $.ajax({
        //             type: "GET",
        //             url: ADMIN_BASE_URL + "/import/ajaxChildgoaltemplate/" + main_template_id + '/' + subtemplate_id,
        //             success: function(res) {
        //                 if (res) {
        //                     $('#template_id').attr('required', true);
        //                     // $("#template_id").append('<option value=""> - Select - </option>');
        //                     $.each(res, function(key, value) {
        //                         $("#template_id").append('<option value="' + key + '">' + value + '</option>');
        //                     });
        //                     // callAjaxForTemplate(main_template_id);
        //                 } else {
        //                     $('#template_id').removeAttr('required');
        //                 }
        //             }
        //         });
        //     }

        // });
        // $('#mainCategory').on('change', function() {
        //     var main_category_id = $(this).val();
        //     $("#subcategory_id").empty().append('<option value=""> - Select - </option>');
        //     if (main_category_id) {
        //         $.ajax({
        //             type: "GET",
        //             url: ADMIN_BASE_URL + "/import/ajaxSubCategory/" + main_category_id,
        //             success: function(res) {
        //                 if (res) {
        //                     $('#subcategory').css("display", "block");
        //                     $('#subcategory_id').attr('required', true);
        //                     $.each(res, function(key, value) {
        //                         $("#subcategory_id").append('<option value="' + key + '">' + value + '</option>');
        //                     });
        //                 } else {
        //                     $('#subcategory').css("display", "none");
        //                     $('#subcategory_id').removeAttr('required');
        //                 }
        //             }
        //         });

        //     } else {
        //         $('#subcategory').css("display", "none");
        //         $('#subcategory_id').removeAttr('required');
        //     }
        // });
  

        // $('#subcategory').on('change', function() {
        //     //alert($("#subcategory_id").val());
        //     var subcategory_id = $("#subcategory_id").val();
        //     console.log(subcategory_id);
        //     $("#subsubcategory_id").empty().append('<option value=""> - Select - </option>');
        //     if (subcategory_id) {
        //         $.ajax({
        //             type: "GET",
        //             url: ADMIN_BASE_URL + "/import/ajaxSubSubCategory/" + subcategory_id,
        //             success: function(res) {
        //                 console.log(res.length);
        //                 if (res.length > 0) {
        //                     $('#subsubcategory').css("display", "block");
        //                     $('#subsubcategory_id').attr('required', true);
        //                     $.each(res, function(key, value) {
        //                         $("#subsubcategory_id").append('<option value="' + value.id + '">' + value.name + '</option>');
        //                         if(value.children_categories){
        //                             $.each(value.children_categories, function(key, children_categories) {
        //                                 $("#subsubcategory_id").append('<option value="' + children_categories.id + '">' + children_categories.name + '</option>');
        //                                 if(children_categories.categories){
        //                                     $.each(children_categories.categories, function(key, categories) {
        //                                         $("#subsubcategory_id").append('<option value="' + categories.id + '">' + categories.name + '</option>');
        //                                     });
        //                                 }
        //                             });
        //                         }
        //                     });
        //                 } else {
        //                     $('#subsubcategory').css("display", "none");
        //                     $('#subsubcategory_id').removeAttr('required');
        //                 }
        //             }
        //         });

        //     } else {
        //         $('#subsubcategory').css("display", "none");
        //         $('#subsubcategory_id').removeAttr('required');
        //     }
        // });
    });

$(".error-alert").fadeTo(10000, 500).slideUp(500, function(){
    $(".error-alert").slideUp(500);
});
</script>
@endsection
