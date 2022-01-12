var required_class = 'invalid';
var required_input_class = 'required_input';
var hiddendiv_class = 'hiddendiv';
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab
var ajax_work = 0;
open_admission_disclaimer_popup();
jQuery(function () {
    jQuery(".datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy',
        yearRange: "-100:+0",
    });
//    jQuery("#birth_date_input").change(function () {
//        var birth_date = jQuery(this).val();
//        jQuery('#pupil_details5').val(birth_date);
//    });
//    jQuery("#pupil_details5").change(function () {
//        var birth_date = jQuery(this).val();
//        jQuery('#birth_date_input').val(birth_date);
//    });
//    jQuery("form :input.take_placeholder").each(function (index, elem) {
//        var eId = jQuery(elem).attr("id");
//        var label = null;
//        if (eId && (label = jQuery(elem).parents("form").find("label[for=" + eId + "]")).length == 1) {
//            var label_data = jQuery(label).html().replace(":", "");
//            jQuery(elem).attr("placeholder", label_data);
//        }
//    });
//    jQuery("form#admissionsform").submit(function (event) {
//        event.preventDefault();
//        validate_admissions_form();
//    });
    jQuery(document).on("change paste keyup", "input." + required_input_class + ", select." + required_input_class + "", function () {
        validate_required_input(jQuery(this));
    });
//    jQuery(':file').change(function () {
//        validate_required_input_image(jQuery(this), this);
//    });
    jQuery(document).on("change", "#year_group_applying_to_input", function () {
        var val = jQuery(this).val();
        var item1 = jQuery("#current_year_group_input");
        var previous_schools_nursery = 'previous_schools_nursery_1_';
        var item2 = jQuery('#previous_school_report');
        var i = 1;
        if (val >= 3) {
            item1.addClass(required_input_class);
            item2.addClass(required_input_class);
            for (i = 1; i <= 4; i++) {
                jQuery('#' + previous_schools_nursery + i).addClass(required_input_class);
            }
        } else {
            item1.removeClass(required_input_class);
            item1.removeClass(required_class);
            item2.removeClass(required_input_class);
            item2.removeClass(required_class);
            for (i = 1; i <= 4; i++) {
                jQuery('#' + previous_schools_nursery + i).removeClass(required_input_class);
                jQuery('#' + previous_schools_nursery + i).removeClass(required_class);
            }
        }
    });
    jQuery(document).on("change", "#have_any_sibling_at_EIS", function () {
        var id_val = jQuery(this).attr('id');
        show_textbox_if_value_selected("#" + id_val, '#have_any_sibling_at_EIS_pupil', 'yes');
    });
    jQuery(document).on("change", "#have_any_sibling_at_rukan", function () {
        var id_val = jQuery(this).attr('id');
        show_textbox_if_value_selected("#" + id_val, '#have_any_sibling_at_rukan_pupil', 'yes');
    });
    jQuery(document).on("change", "#are_you_applying_for_any_siblings", function () {
        var id_val = jQuery(this).attr('id');
        show_textbox_if_value_selected("#" + id_val, '#are_you_applying_for_any_siblings_details', 'yes');
    });
    jQuery(document).on("change", "#how_did_you_hear_about_us", function () {
        var id_val = jQuery(this).attr('id');
        show_textbox_if_value_selected("#" + id_val, '#how_did_you_hear_about_us_other', 'other');
    });
    jQuery(document).on("change", "#has_the_pupil_ever_skipped_year", function () {
        var id_val = jQuery(this).attr('id');
        show_textbox_if_value_selected("#" + id_val, '#has_the_pupil_ever_skipped_year_details', 'yes');
    });
    jQuery(document).on("change", "#has_the_pupil_ever_been_asked_to_repeat_year", function () {
        var id_val = jQuery(this).attr('id');
        show_textbox_if_value_selected("#" + id_val, '#has_the_pupil_ever_been_asked_to_repeat_year_details', 'yes');
    });
    jQuery(document).on("change", "#has_the_pupil_ever_applied_to_EIS", function () {
        var id_val = jQuery(this).attr('id');
        show_textbox_if_value_selected("#" + id_val, '#has_the_pupil_ever_applied_to_EIS_details', 'yes');
    });
    jQuery(document).on("change", "#parental_marital_status", function () {
        var id_val = jQuery(this).attr('id');
        var divorced_value = 'divorced';
        show_textbox_if_value_selected("#" + id_val, '#parental_marital_status_details', divorced_value);
        var val = jQuery("#" + id_val).val();
        var item = jQuery('#father_national_id');
        if (val.toLowerCase() == divorced_value) {
            item.removeClass(required_input_class);
            item.removeClass(required_class);
        } else {
            item.addClass(required_input_class);
        }
    });
    jQuery("#mesagepopboxadmissiondisclaimerpopoup").on("click", ".closealert", function () {
        close_admission_disclaimer_popup();
    });
    jQuery('.mesage-pop-bg').click(function () {
        close_admission_disclaimer_popup();
    });
});
//function validate_admissions_form() {
//    var error_flag = 0;
//    var focused = 0;
//    jQuery("input."+required_input_class+", select."+required_input_class+"").each(function () {
//        validate_required_input(jQuery(this));
//    });
////    jQuery("input."+required_input_class+"[type='checkbox']").each(function () {
////        validate_required_input_checkbox(jQuery(this).attr('id'));
////    });
////    jQuery("input."+required_input_class+"[type='file']").each(function () {
////        validate_required_input_image(jQuery(this), this);
////    });
//    jQuery('input, select').each(function () {
//        if (jQuery(this).hasClass(required_class)) {
//            error_flag = 1;
//            if (focused == 0) {
//                focused = 1;
//                jQuery(this).focus();
//            }
//        }
//    });
//    if (error_flag === 0) {
//        send_addmission_form();
//    }
//}
function send_addmission_form() {
    var formData = new FormData($('form#admissionsform')[0]);
    if (ajax_work == 0) {
        jQuery.ajax({
            url: base_url + '/page/admissionsform/ajax',
            type: 'POST',
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                ajax_work = 1;
                jQuery('#admissions_result').hide();
                jQuery('#admissions_ajaxLoading').show();
            },
            success: function (result) {
                ajax_work = 0;
                jQuery('#admissions_ajaxLoading').hide();
                if (result.status == 'success') {
                    jQuery('#admissions_result').html(result.msg).show().removeClass('admissions_result_fail').addClass('admissions_result_success');
                    document.getElementById("admissionsform").reset();
                    currentTab = 0;
                    jQuery('.tabIn4').hide();
                    showTab(currentTab);
                } else {
                    jQuery('#admissions_result').html(result.msg).show().removeClass('admissions_result_success').addClass('admissions_result_fail');
                }
            }
        });
    }
}
function validate_required_input(obj) {
    var val = obj.val();
    var input_type = obj.attr('type');
    var input_id = obj.attr('id');
    var error = 0;
    if (jQuery.trim(val).length !== 0) {
        error = 0;
    } else {
        error = 1;
    }
    if (input_type == 'email') {
        if (!isValidEmailAddress(val)) {
            error = 1;
        } else {
            error = 0;
        }
    }
    if (input_type == 'tel') {
        error = 0;
        if (!isNumeric(val)) {
            error = 1;
        }
        if (jQuery.trim(val).length < 11) {
            error = 1;
        }
    }
    if (input_type == 'checkbox') {
        if (validate_required_input_checkbox(input_id)) {
            error = 0;
        } else {
            error = 1;
        }
    }
    if (error == 0) {
        if (obj.hasClass(required_class)) {
            obj.removeClass(required_class);
        }
    } else {
        if (!(obj.hasClass(required_class))) {
            obj.addClass(required_class);
        }
    }
    return error;
}
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
}
function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}
function validate_required_input_checkbox(obj) {
    var obj_in = jQuery('#' + obj);
    var obj_out = jQuery('.agree_out');
    if (jQuery('#' + obj + ':checked').length > 0) {
        if (obj_out.hasClass(required_class)) {
            obj_out.removeClass(required_class);
        }
        return 1;
    } else {
        if (!(obj_out.hasClass(required_class))) {
            obj_out.addClass(required_class);
        }
        return 0;
    }
}
//function validate_required_input_image(obj, objthis) {
//    var file = objthis.files[0];
//    if (typeof file !== typeof undefined && file !== false) {
//        var name = file.name;
////        var size = file.size;
////        var type = file.type;
//        var ext = name.substr(name.lastIndexOf('.') + 1);
//        var ext = ext.toLowerCase();
//        if (ext == 'jpeg' || ext == 'png' || ext == 'gif' || ext == 'jpg') {
//            obj.removeClass(required_class);
//        } else {
//            obj.addClass(required_class);
//        }
//    } else {
//        obj.addClass(required_class);
//    }
//}
function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Send";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n);
}
function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) {
        return false;
    }
    var lastTab = currentTab;
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form... :
    if (currentTab >= x.length) {
        send_addmission_form();
        currentTab = currentTab - n;
        return false;
    } else {
        if (x[lastTab]) {
            x[lastTab].style.display = "none";
        }
        showTab(currentTab);
    }
}
function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
//    y = x[currentTab].getElementsByTagName("input");
    y = x[currentTab].getElementsByClassName(required_input_class);
    // A loop that checks every input field in the current tab:
    i = 0;
    var obj;
    var error = 0;
    var focused = 0;
//    console.log(".tabIn"+currentTab+" ."+required_input_class);
    jQuery(".tabIn" + currentTab + " ." + required_input_class).each(function (index) {
        obj = jQuery(this);
        error = validate_required_input(obj);
        if (error) {
            valid = false;
            if (focused == 0) {
                obj.focus();
                focused = 1
            }
        }
    });
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}
function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class to the current step:
    x[n].className += " active";
}
function show_textbox_if_value_selected(selector1, selector2, value) {
    var val = jQuery(selector1).val();
    var item = jQuery(selector2);
    if (val.toLowerCase() == value) {
        item.addClass(required_input_class);
        item.closest('.input_new').removeClass(hiddendiv_class);
    } else {
        item.removeClass(required_input_class);
        item.removeClass(required_class);
        item.closest('.input_new').addClass(hiddendiv_class);
    }
}
function open_admission_disclaimer_popup() {
    jQuery("#mesagepopboxadmissiondisclaimerpopoup").show();
}
function close_admission_disclaimer_popup() {
    jQuery("#mesagepopboxadmissiondisclaimerpopoup").hide();
}