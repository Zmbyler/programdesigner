// Class definition

var KTFormControls = function () {
    // Private functions

    var login= function () {
        $( "#login" ).validate({
            // define validation rules
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true
                },

            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                form[0].submit();
            }
        });
    }

    var tempoEdit= function () {
        $( "#tempoEdit" ).validate({
            // define validation rules
            rules: {
                tempo: {
                    required: true
                }


            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                form[0].submit();
            }
        });
    }

    var programtemplateEdit= function () {
        $( "#programtemplateEdit" ).validate({
            // define validation rules
            rules: {
                name: {
                    required: true,
                    minlength: 3
                }


            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                form[0].submit();
            }
        });
    }

    var programtemplateCreate= function () {
        $( "#programtemplateCreate" ).validate({
            // define validation rules
            rules: {
                name: {
                    required: true,
                    minlength: 3
                }

            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                form[0].submit();
            }
        });
    }

    var categoryEdit= function () {
        $( "#categoryEdit" ).validate({
            // define validation rules
            rules: {
                name: {
                    required: true
                }


            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                form[0].submit();
            }
        });
    }

    var categoryCreate= function () {
        $( "#categoryCreate" ).validate({
            // define validation rules
            rules: {
                name: {
                    required: true
                }

            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                form[0].submit();
            }
        });
    }
    var cmsEdit= function () {
        $( "#cmsEdit" ).validate({
            // define validation rules
            rules: {
                title: {
                    required: true,
                },
                long_description: {
                    required: true
                },

            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                form[0].submit();
            }
        });
    }

    var trainingEdit= function () {
        $( "#trainingEdit" ).validate({
            // define validation rules
            rules: {
                title: {
                    required: true,
                },
                long_description: {
                    required: true
                },

            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                form[0].submit();
            }
        });
    }

    var profileEdit= function () {
        $( "#profileEdit" ).validate({
            // define validation rules
            rules: {
                first_name: {
                    required: true,
                },
                email: {
                    required: true
                },

            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });
    }

    var userEdit= function () {
        $( "#userEdit" ).validate({
            // define validation rules
            rules: {
                first_name: {
                    required: true,
                },
                email: {
                    required: true
                },
                country_id: {
                    required: true
                },
                city: {
                    required: true
                },

            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });
    }
    var adminChangePassword= function () {
        $( "#adminChangePassword" ).validate({
            // define validation rules
            rules: {
                old_password: {
                    required: true,
                    minlength: 3
                },
                new_password: {
                    required: true,
                    minlength: 3,
                },
                confirm_new_password: {
                    required: true,
                    equalTo: "#new_password",
                    minlength: 3,
                }
            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                //form[0].submit(); // submit the form
            }
        });
    }

    var assessmentCreate= function () {
        $( "#assessmentCreate" ).validate({
            // define validation rules
            rules: {
                name: {
                    required: true,
                },
                assessment_option_one: {
                    required: true,
                },
                assessment_option_two: {
                    required: true,
                }
            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                form[0].submit();
            }
        });
    }

    var assessmentEdit= function () {
        $( "#assessmentEdit" ).validate({
            // define validation rules
            rules: {
                name: {
                    required: true,
                },
                assessment_option_one: {
                    required: true,
                },
                assessment_option_two: {
                    required: true,
                }
            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                form[0].submit();
            }
        });
    }


    var assessmentCategoryCreate= function () {
        $( "#assessmentCategoryCreate" ).validate({
            // define validation rules
            rules: {
                name: {
                    required: true,
                },
                assessment_result_id: {
                    required: true,
                },
                assessment_option: {
                    required: true,
                }
            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                form[0].submit();
            }
        });
    }

    var assessmentCategoryEdit= function () {
        $( "#assessmentCategoryEdit" ).validate({
            // define validation rules
            rules: {
                name: {
                    required: true,
                },
                assessment_result_id: {
                    required: true,
                },
                assessment_option: {
                    required: true,
                }
            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                form[0].submit();
            }
        });
    }


    var ProgramEdit= function () {
        $( "#ProgramEdit" ).validate({
            // define validation rules
            rules: {
                template_id: {
                    required: true,
                },
                category_id: {
                    required: true,
                },
                subcategory_id: {
                    required: true,
                }
            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                form[0].submit();
            }
        });
    }



    var exerciseCreate= function () {
        $( "#exerciseCreate" ).validate({
            // define validation rules
            rules: {
                name: {
                    required: true,
                },
                category_id: {
                    required: true,
                }
            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                form[0].submit();
            }
        });
    }

    var exerciseEdit= function () {
        $( "#exerciseEdit" ).validate({
            // define validation rules
            rules: {
                name: {
                    required: true,
                },
                category_id: {
                    required: true,
                }
                

            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                form[0].submit();
            }
        });
    }

    var planCreate= function () {
        $( "#planCreate" ).validate({
            // define validation rules
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                no_of_user: {
                    required: true,
                    digits: true
                },
                price: {
                    required: true,
                    digits: true
                },
                interval: {
                    required: true,
                }


            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                form[0].submit();
            }
        });
    }

    var planEdit= function () {
        $( "#planEdit" ).validate({
            // define validation rules
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                no_of_user: {
                    required: true,
                    digits: true
                }

            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                form[0].submit();
            }
        });
    }

    var exportImportCreate= function () {
        $( "#exportImportCreate" ).validate({
            // define validation rules
            rules: {
                template_type_id: {
                    required: true,
                },
                document: {
                    required: true,
                    extension: 'xls,xlsx',
                    filesize : 50000,
                }

            },
            messages: {
                document:{
                    extension: 'The file must be xls or xlsx type',
                }
            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                form[0].submit();
            }
        });
    }


    return {
        // public functions
        init: function() {
            programtemplateEdit();
            programtemplateCreate();
            categoryCreate();
            categoryEdit();
            cmsEdit();
            profileEdit();
            adminChangePassword();
            userEdit();
            assessmentCreate();
            assessmentEdit();
            assessmentCategoryCreate();
            assessmentCategoryEdit();
            exerciseCreate();
            exerciseEdit();
            planCreate();
            planEdit();
            trainingEdit();
            tempoEdit();
            exportImportCreate();
            ProgramEdit();
        }
    };
}();

jQuery(document).ready(function() {
    KTFormControls.init();
});
