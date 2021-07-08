// Code for change status
function changeStatus(id, element) {
    swal.fire({
        title: 'Are you sure?',
        text: "You want to change the status!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, status change it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {
            window.location.href = ADMIN_BASE_URL + `/` + element + `/changeStaus/` + id;
        }
    });
}

// function deleteallData(element) {
//     swal.fire({
//         title: 'Are you sure?',
//         text: "You won't be able to revert this!",
//         type: 'warning',
//         showCancelButton: true,
//         confirmButtonText: 'Yes, delete this item!',
//         cancelButtonText: 'No, cancel!',
//         reverseButtons: true
//     }).then(function (result) {
//         if (result.value) {
//             window.location.href = ADMIN_BASE_URL + `/` + element + `/delete-all`;
//         }
//     });
// }

function catdeleteData(id, element) {
    swal.fire({
        title: 'Are you sure?',
        text: "If you delete a category it's subcategory,exercise and program also deleted.You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete this item!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {
            window.location.href = ADMIN_BASE_URL + `/` + element + `/catdelete/` + id;
        }
    });
}

function deleteData(id, element) {
    swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete this item!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {
            window.location.href = ADMIN_BASE_URL + `/` + element + `/delete/` + id;
        }
    });
}




$("#parent_category_id").change(function () {
    let id = $(this).val();
    if (id != '') {
        $.ajax({
            type: "GET",
            url: BASE_URL + "/admin/category/ajaxlist/" + id,
            success: function (res) {
                $("#category_id").empty();
                $("#category_id").append('<option value=""> - Select - </option>');
                $.each(res, function (key, value) {
                    $("#category_id").append('<option value="' + key + '">' + value + '</option>');
                });

            }
        });
    } else {
        $("#category_id").find('option').remove().end().append('<option value=""> - Select - </option>');
    }
});

$("#vehicle_manufacturer").change(function () {
    let id = $(this).val();
    if (id != '') {
        $.ajax({
            type: "GET",
            url: BASE_URL + "/admin/vehicleModel/ajaxlist/" + id,
            success: function (res) {
                $("#vehicle_model").empty();
                $("#vehicle_model").append('<option> - Select - </option>');
                $.each(res, function (key, value) {
                    $("#vehicle_model").append('<option value="' + key + '">' + value + '</option>');
                });

            }
        });
    } else {
        $("#vehicle_model").find('option').remove().end().append('<option> - Select - </option>');
    }
});

$("#vehicle_model").change(function () {
    let id = $(this).val();
    if (id != '') {
        $.ajax({
            type: "GET",
            url: BASE_URL + "/admin/vehicleModelVariant/ajaxlist/" + id,
            success: function (res) {
                $("#variant_id").empty();
                $("#variant_id").append('<option> - Select - </option>');
                $.each(res, function (key, value) {
                    $("#variant_id").append('<option value="' + key + '">' + value + '</option>');
                });

            }
        });
    } else {
        $("#variant_id").find('option').remove().end().append('<option> - Select - </option>');
    }
});

$("#vehicle_manufacturer").change(function () {
    let id = $(this).val();
    if (id != '') {
        $.ajax({
            type: "GET",
            url: BASE_URL + "/admin/vehicleColour/ajaxlist/" + id,
            success: function (res) {
                $("#colour_id").empty();
                $("#colour_id").append('<option> - Select - </option>');
                $.each(res, function (key, value) {
                    $("#colour_id").append('<option value="' + key + '">' + value + '</option>');
                });
            }
        });
    } else {
        $("#colour_id").find('option').remove().end().append('<option> - Select - </option>');
    }
});



$(document).ready(function () {
    var arrows;
    if (KTUtil.isRTL()) {
        arrows = {
            leftArrow: '<i class="la la-angle-right"></i>',
            rightArrow: '<i class="la la-angle-left"></i>'
        }
    } else {
        arrows = {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    }
    $('#mot_expiry, #registration_date').datepicker({
        rtl: KTUtil.isRTL(),
        todayBtn: "linked",
        clearBtn: true,
        todayHighlight: true,
        templates: arrows,
        format: 'yyyy-mm-dd'
    });
    $('#listing_start_date_gmt, #job_start_date_time, #listing_duration_date_gmt').datetimepicker({
        rtl: KTUtil.isRTL(),
        todayBtn: "linked",
        clearBtn: true,
        todayHighlight: true,
        templates: arrows,
        autoclose: true,
        format: 'yyyy-mm-dd hh:ii'
    });
    
    $('#other').click(function(){
        // if($(this).prop("checked") == true){
        //     alert("Checkbox is checked.");
        // }
        if($(this).prop("checked") == false){
            $('#other_payment_option').val('');
        }
    });
});

/* function to initiate dropdown of job skill and qualification */
var classN = "";
function initiateDropdwon(classN) {
    $(classN).on('change', function() {
        dropdownval = this.value;
        $(classN).not(this).find('option[value="' + dropdownval + '"]').remove();
    });
}

/* Job Primary Skill funcitionality starts here */
classN = ".dropdownPrimarySkill";
initiateDropdwon(classN);
/* append section for job primary skill */
var newSkillId = 0;
$('.addMorePrimarySkill').click(function () {
    var selectedItem  = '';
    $('.addMorePrimarySkill').attr('disabled', 'disabled');
    var skillCount = $('.appendPrimarySkillClass').length;
    //console.log(skillCount);
    var hiddenJobId = $('#jobId').val();
    $.ajax({
        method: 'get',
        url: BASE_URL + "/admin/job-skills/"+hiddenJobId,
        success: function (result) {
            var result2 = JSON.parse(JSON.stringify(result));
            var selectedValues = [];
            $('.dropdownPrimarySkill  option:selected').each(function() {
                selectedValues[ $(this).val()] = $(this).text();
            });

            var newArr = [];
            $.each(result2, function (index, value) {
                if ($.inArray(value.name, selectedValues) !== -1) {
                    //matched
                } else {
                    //not matched
                    newArr.push({"name" : value.name, "id" : value.id});
                }
            });

            if(newArr.length > 0) {
                $('.appendPrimarySkill').append(`<div id="kt_repeater_1">
                    <div class="form-group row appendPrimarySkillClass">
                        <div class="col-md-5">
                            <div class="kt-form__group--inline">
                                <div class="kt-form__label">
                                    <label>Primary Skill:</label>
                                </div>
                                <div class="kt-form__control">
                                    <input type="hidden" value="`+skillCount+`" name="newSkillId[`+newSkillId+`]">
                                    <select class="form-control job_skill dropdownPrimarySkill" name="job_skill_id[`+skillCount+`]"></select>
                                </div>
                            </div>
                        <div class="d-md-none kt-margin-b-10"></div>
                    </div>
                    <div class="col-md-5">
                        <div class="kt-form__group--inline">
                            <div class="kt-form__label">
                                <label class="kt-label m-label--single">Experience(in yrs):</label>
                            </div>
                            <div class="kt-form__control">
                                <input type="number" min=0.1 step="any" name="experience[`+skillCount+`]" class="form-control">
                            </div>
                        </div>
                        <div class="d-md-none kt-margin-b-10"></div>
                    </div>
                    <div class="col-md-2">
                        <div class="kt-form__label">
                            <label class="kt-label m-label--single">&nbsp;</label>
                        </div>
                        <div class="kt-form__control">
                            <button type="button" class="btn btn-danger removeMorePrimarySkill">Remove</button>
                        </div>
                    </div>
                </div>
                </div>`);
                newSkillId++;
                selectedItem += '<option value="">Select Skill</option>';
                $.each(newArr, function (element,value) {
                    selectedItem += '<option value="' + value.id + '">' +value.name+ '</option>';
                })
                //$('select:last').append(selectedItem);
                $('.dropdownPrimarySkill').last().append(selectedItem); // append data to select box
            } else {
                alert('All skills have already added');
            }
            $('.addMorePrimarySkill').removeAttr('disabled');
            initiateDropdwon(classN);
        }
    })
});
/* remove section for job primary skill */
$(document).on('click', '.removeMorePrimarySkill', function () {
    var id = $(this).data('id');
    var oThis = $(this);
    swal.fire({
        title: 'Are you sure to delete this skill?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete this skill!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {
            if(id){
                $.ajax({
                    method: 'get',
                    url: BASE_URL + "/admin/delete-primary-skill/"+id,
                    success: function(result){
                        if(result){
                            oThis.closest('.appendPrimarySkillClass').remove();
                            toastr.success("Record deleted successfully");
                        }
                        else
                        {
                            toastr.error("Id not found");
                        }
                    }
                });
            } else {
                oThis.closest('.appendPrimarySkillClass').remove();
            }
        }
    });
});
/* Job Primary Skill funcitionality ends here */


/* Job Qualification funcitionality starts here */
classN = ".dropdownQualification";
initiateDropdwon(classN);
/* append section for job qualification */
var newQualificationId = 0;
$('.addMoreQualification').click(function () {
    var selectedItem  = '';
    $('.addMoreQualification').attr('disabled', 'disabled');
    var qualificationCount = $('.appendQualificationClass').length;
    var hiddenJobId = $('#jobId').val();
    $.ajax({
        method: 'get',
        url: BASE_URL + "/admin/job-qualification/"+hiddenJobId,
        success: function (result) {
            var result2 = JSON.parse(JSON.stringify(result));
            var selectedValues = [];
            $('.dropdownQualification  option:selected').each(function() {
                selectedValues[ $(this).val()] = $(this).text();
            });

            var newArr = [];
            $.each(result2, function (index, value) {
                if ($.inArray(value.name, selectedValues) !== -1) {
                    //matched
                } else {
                    //not matched
                    newArr.push({"name" : value.name, "id" : value.id});
                }
            });

            if(newArr.length > 0) {
                $('.appendQualification').append(`<div id="kt_repeater_1">
                    <div class="form-group row appendQualificationClass">
                        <div class="col-md-5">
                            <div class="kt-form__group--inline">
                                <div class="kt-form__label">
                                    <label>Qualifications/Accreditations:</label>
                                </div>
                                <div class="kt-form__control">
                                    <input type="hidden" value="`+qualificationCount+`" name="newQualificationId[`+newQualificationId+`]">
                                    <select class="form-control job_skill dropdownQualification" name="qualification_id[`+qualificationCount+`]"></select>
                                </div>
                            </div>
                        <div class="d-md-none kt-margin-b-10"></div>
                    </div>
                    <div class="col-md-5">
                        <div class="d-md-none kt-margin-b-10"></div>
                    </div>
                    <div class="col-md-2">
                        <div class="kt-form__label">
                            <label class="kt-label m-label--single">&nbsp;</label>
                        </div>
                        <div class="kt-form__control">
                            <button type="button" class="btn btn-danger removeMoreQualification">Remove</button>
                        </div>
                    </div>
                </div>
                </div>`);
                newQualificationId++;
                selectedItem += '<option value="">Select Qualification</option>';
                $.each(newArr, function (element,value) {
                    selectedItem += '<option value="' + value.id + '">' +value.name+ '</option>';
                })
                //$('select:last').append(selectedItem);
                $('.dropdownQualification').last().append(selectedItem); // append data to select box
            } else {
                alert('All qualifications have already added');
            }
            $('.addMoreQualification').removeAttr('disabled');
            initiateDropdwon(classN);
        }
    })
});
/* remove section for job qualification */
$(document).on('click', '.removeMoreQualification', function () {
    var id = $(this).data('id');
    var oThis = $(this);
    swal.fire({
        title: 'Are you sure to delete this qualification?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete this qualification!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {
            if(id){
                $.ajax({
                    method: 'get',
                    url: BASE_URL + "/admin/delete-qualification/"+id,
                    success: function(result){
                        if(result){
                            oThis.closest('.appendQualificationClass').remove();
                            toastr.success("Record deleted successfully");
                        }
                        else
                        {
                            toastr.error("Id not found");
                        }
                    }
                });
            } else {
                oThis.closest('.appendQualificationClass').remove();
            }
        }
    });
});
/* Job Qualification funcitionality ends here */

/* Language section starts here */
classN = ".dropdownLanguage";
initiateDropdwon(classN);
/* append section for job language */
var newLanguageId = 0;
$('.addMoreLanguage').click(function () {
    var selectedItem  = '';
    $('.addMoreLanguage').attr('disabled', 'disabled');
    var languageCount = $('.appendLanguageClass').length;
    $.ajax({
        method: 'get',
        url: BASE_URL + "/admin/job-language",
        success: function (result) {
            var result2 = JSON.parse(JSON.stringify(result));
            console.log(result2.human_language_proficiency);
            var selectedValues = [];
            $('.dropdownLanguage  option:selected').each(function() {
                selectedValues[ $(this).val()] = $(this).text();
            });

            var newArr = [];
            $.each(result2.human_language, function (index, value) {
                if ($.inArray(value.name, selectedValues) !== -1) {
                    //matched
                } else {
                    //not matched
                    newArr.push({"name" : value.name, "id" : value.id});
                }
            });

            if(newArr.length > 0) {
                $('.appendLanguage').append(`<div class="form-group row appendLanguageClass">
                    <div class="col-md-4">
                        <label>Languages :</label>
                        <div class="controls">
                            <input type="hidden" value="`+languageCount+`" name="newLanguageId[`+newLanguageId+`]">
                            <select class="form-control dropdownLanguage" name="language_id[`+languageCount+`]">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Written :</label>
                        <div class="controls">
                            <select class="form-control appendProficiencyLevel" name="proficiency_level_written[`+languageCount+`]" value="['Beginner' => 'Beginner', 'Intermediate' => 'Intermediate', 'Fluent' => 'Fluent']">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Spoken :</label>
                        <div class="controls">
                            <select class="form-control appendProficiencyLevel" name="proficiency_level_spoken[`+languageCount+`]" value="['Beginner' => 'Beginner', 'Intermediate' => 'Intermediate', 'Fluent' => 'Fluent']">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="kt-form__label">
                            <label class="kt-label m-label--single">&nbsp;</label>
                        </div>
                        <div class="kt-form__control">
                            <button type="button" class="btn btn-danger removeMoreLanguage">Remove</button>
                        </div>
                    </div>
                </div>`);
                newLanguageId++;
                /* append proficiency level */
                $.each(result2.human_language_proficiency, function (key,value) {
                    $('.appendProficiencyLevel').append('<option value="' + key + '">' + value + '</option>')
                })

                selectedItem += '<option value="">Select Language</option>';
                $.each(newArr, function (element,value) {
                    selectedItem += '<option value="' + value.id + '">' +value.name+ '</option>';
                })
                //$('select:last').append(selectedItem);
                $('.dropdownLanguage').last().append(selectedItem); // append data to select box
            } else {
                alert('All qualifications have already added');
            }
            $('.addMoreLanguage').removeAttr('disabled');
            initiateDropdwon(classN);
        }
    })
    
});
/* remove section for job language */
$(document).on('click', '.removeMoreLanguage', function () {
    var id = $(this).data('id');
    var oThis = $(this);
    swal.fire({
        title: 'Are you sure to delete this language?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete this language!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {
            if(id){
                $.ajax({
                    method: 'get',
                    url: BASE_URL + "/admin/delete-language/"+id,
                    success: function(result){
                        if(result){
                            oThis.closest('.appendLanguageClass').remove();
                            toastr.success("Record deleted successfully");
                        }
                        else
                        {
                            toastr.error("Id not found");
                        }
                    }
                });
            } else {
                oThis.closest('.appendLanguageClass').remove();
            }
        }
    });
});
/* Language section ends here */
