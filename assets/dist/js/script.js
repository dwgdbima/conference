//############################//
//          ALERT            //
//############################//
$('.toastrDefaultSuccess').click(function () {
    toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
});
$('.toastrDefaultInfo').click(function () {
    toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
});
$('.toastrDefaultError').click(function () {
    toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
});
$('.toastrDefaultWarning').click(function () {
    toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
});
// REMOVE BUTTON
$(document).ready(function () {
    $('#toast-container-relative').click(function () {
        $('#toast-container-relative').slideUp(300);
    });
});

//############################//
//  FORM REGISTRATION SCRIPT  //
//############################//

// Date of Birth (datetimepicker)
$(function () {
    $('#date-birth').datetimepicker({
        format: 'YYYY-MM-DD'
    });
});
// Select Salutation (select2)
$(function () {
    $('.salutation').val(null).select2({
        placeholder: "Select Salutation",
        allowClear: true
    });
});
// Select Country
function format(item, state) {
    if (!item.id) {
        return item.text;
    }
    var countryUrl = "https://lipis.github.io/flag-icon-css/flags/4x3/";
    var stateUrl = "https://oxguy3.github.io/flags/svg/us/";
    var url = state ? stateUrl : countryUrl;
    var img = $("<img>", {
        class: "img-flag",
        width: 26,
        src: url + item.element.value.toLowerCase() + ".svg"
    });
    var span = $("<span>", {
        text: " " + item.text
    });
    span.prepend(img);
    return span;
}
$(document).ready(function () {
    $(".countries").val(null);
    $(".countries").select2({
        placeholder: "Select a country",
        allowClear: true,
        templateResult: function (item) {
            return format(item, false);
        }
    });
});

// Validation Registration
$(document).ready(function () {
    $.validator.setDefaults();
    $('#userRegistration').validate({
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            birth: {
                required: true
            },
            salutation: {
                required: true,
            },
            institution: {
                required: true,
            },
            research: {
                required: true,
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "emailExist",
                    type: "post"
                }
            },
            email2: {
                required: true,
                email: true,
                equalTo: "#email"
            },
            password: {
                required: true,
                minlength: 6
            },
            password2: {
                required: true,
                minlength: 6,
                equalTo: "#password"
            },
            phone: {
                required: true,
                number: true,
                remote: {
                    url: "phone",
                    type: "post",
                    data: {
                        phone: function () {
                            return $("#phone").val();
                        }
                    }
                }
            },
            street: {
                required: true,
            },
            city: {
                required: true,
            },
            zip_code: {
                required: true,
            },
            country: {
                required: true,
            },
            terms: {
                required: true,
            },
        },
        messages: {
            email: {
                email: "Please enter a vaild email address",
                remote: "this email has been registered"
            },
            email2: {
                email: "Please enter a vaild email address",
                equalTo: "Email doesn't match",
                remote: "Email already exist"
            },
            phone: {
                remote: "This phone has been registered"
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});

// Validation Login
$(document).ready(function () {
    $.validator.setDefaults();
    $('#login').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.input-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});

// Validation Forgot Password
$(document).ready(function () {
    $.validator.setDefaults();
    $('#ForgotPassword').validate({
        rules: {
            email: {
                required: true,
                email: true,
            }
        },
        messages: {
            email: {
                required: "Please enter a email address",
                email: "Please enter a vaild email address"
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.input-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});

// Validation Change Password
$(document).ready(function () {
    $.validator.setDefaults();
    $('#ChangePassword').validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
        },
        messages: {
            email: {
                required: "Please enter a email address",
                email: "Please enter a vaild email address"
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.input-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});
