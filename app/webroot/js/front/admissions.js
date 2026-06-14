var required_class = 'invalid';
var required_input_class = 'required_input';
var hiddendiv_class = 'hiddendiv';
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab
var ajax_work = 0;
var prevSchoolRowCount = 5;
open_admission_disclaimer_popup();
jQuery(function () {
    jQuery(".datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy',
        yearRange: "-100:+0",
        maxDate: "0"
    });
    jQuery('#birth_date_input').datepicker({
        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true,
        maxDate: "0",
        yearRange: '2000:c',
        minDate: new Date(1999, 10 - 1, 25),
    });
    jQuery(document).on("change paste keyup", "input." + required_input_class + ", select." + required_input_class + ", textarea." + required_input_class + "", function () {
        validate_required_input(jQuery(this));
    });
    jQuery(document).on("change", "#year_group_applying_to_input", function () {
        var val = jQuery(this).val();
        var item1 = jQuery("#current_year_group_input");
        var item2 = jQuery('#previous_school_report');
        if (val >= 3) {
            item1.addClass(required_input_class);
            item2.addClass(required_input_class);
        } else {
            item1.removeClass(required_input_class).removeClass(required_class);
            item2.removeClass(required_input_class).removeClass(required_class);
        }
        updatePrevSchoolRows(val);
    });
    jQuery(document).on("change", "#have_any_sibling_at_EIS", function () {
        var id_val = jQuery(this).attr('id');
        show_textbox_if_value_selected("#" + id_val, '#have_any_sibling_at_EIS_pupil', 'yes');
    });
    jQuery(document).on("change", "#have_any_sibling_at_rukan", function () {
        var id_val = jQuery(this).attr('id');
        show_textbox_if_value_selected("#" + id_val, '#have_any_sibling_at_rukan_pupil', 'yes');
    });
    jQuery(document).on("change", "#religion", function () {
        var id_val = jQuery(this).attr('id');
        show_textbox_if_value_selected("#" + id_val, '#religion_other', 'other');
    });
    if (jQuery('#language').length) {
        jQuery('#language').select2({
            placeholder: 'Select languages',
            allowClear: true,
        });
    }
    jQuery(document).on("change", "#how_did_you_hear_about_us", function () {
        var id_val = jQuery(this).attr('id');
        show_textbox_if_value_selected("#" + id_val, '#how_did_you_hear_about_us_other', 'other');
    });
    jQuery(document).on("change", "#has_the_pupil_ever_been_asked_to_repeat_year", function () {
        var id_val = jQuery(this).attr('id');
        show_textbox_if_value_selected("#" + id_val, '#has_the_pupil_ever_been_asked_to_repeat_year_details', 'yes');
    });
    jQuery(document).on("change", "#has_the_pupil_ever_applied_to_EIS", function () {
        var id_val = jQuery(this).attr('id');
        show_textbox_if_value_selected("#" + id_val, '#has_the_pupil_ever_applied_to_EIS_details', 'yes');
    });
    jQuery(document).on("change", "#parent_religion_father", function () {
        var val = jQuery(this).val();
        var otherInput = jQuery('#parent_religion_father_other');
        if (val.toLowerCase() == 'other') {
            otherInput.removeClass(hiddendiv_class);
        } else {
            otherInput.addClass(hiddendiv_class);
            otherInput.val('');
        }
    });
    jQuery(document).on("change", "#parent_religion_mother", function () {
        var val = jQuery(this).val();
        var otherInput = jQuery('#parent_religion_mother_other');
        if (val.toLowerCase() == 'other') {
            otherInput.removeClass(hiddendiv_class);
        } else {
            otherInput.addClass(hiddendiv_class);
            otherInput.val('');
        }
    });
    jQuery(document).on("change", "#parental_marital_status", function () {
        var val = jQuery(this).val().toLowerCase();
        var divorced_value = 'divorced';
        var custodySection = jQuery('#custody_section');
        if (val == divorced_value) {
            custodySection.removeClass(hiddendiv_class);
        } else {
            custodySection.addClass(hiddendiv_class);
            jQuery('#parental_marital_status_details').val('');
            jQuery('#custody_other_details').val('').addClass(hiddendiv_class);
        }
        var fatherIdFront = jQuery('#father_id_front');
        var fatherIdBack = jQuery('#father_id_back');
        if (val == divorced_value) {
            fatherIdFront.removeClass(required_input_class).removeClass(required_class);
            fatherIdBack.removeClass(required_input_class).removeClass(required_class);
        } else {
            fatherIdFront.addClass(required_input_class);
            fatherIdBack.addClass(required_input_class);
        }
    });
    jQuery(document).on("change", "#parental_marital_status_details", function () {
        var val = jQuery(this).val();
        var otherInput = jQuery('#custody_other_details');
        if (val == 'Other relatives') {
            otherInput.removeClass(hiddendiv_class);
        } else {
            otherInput.addClass(hiddendiv_class);
            otherInput.val('');
        }
    });
    jQuery(document).on("change", "#is_step_parent", function () {
        var val = jQuery(this).val().toLowerCase();
        var section = jQuery('#step_parent_section');
        if (val == 'yes') {
            section.removeClass(hiddendiv_class);
        } else {
            section.addClass(hiddendiv_class);
        }
    });
    jQuery(document).on("change", "#learning_support_services", function () {
        var val = jQuery(this).val().toLowerCase();
        var section = jQuery('#learning_support_section');
        if (val == 'yes') {
            section.removeClass(hiddendiv_class);
        } else {
            section.addClass(hiddendiv_class);
        }
    });
    jQuery("#mesagepopboxadmissiondisclaimerpopoup").on("click", ".closealert", function () {
        close_admission_disclaimer_popup();
    });
    jQuery('.mesage-pop-bg').click(function () {
        close_admission_disclaimer_popup();
    });
    jQuery(document).on("change", "input[type=radio][name=developmental_history0]", function () {
        set_required_for_recent_report_if_needed();
    });
    jQuery(document).on("change", "input[type=radio][name=developmental_history1]", function () {
        set_required_for_recent_report_if_needed();
    });
    jQuery(document).on("change", "input[type=radio][name=developmental_history2]", function () {
        set_required_for_recent_report_if_needed();
    });
    jQuery(document).on("change", "input[type=radio][name=developmental_history3]", function () {
        set_required_for_recent_report_if_needed();
    });
    jQuery(document).on("change", "input[type=radio][name=developmental_history4]", function () {
        set_required_for_recent_report_if_needed();
    });
    jQuery(document).on("change", "#developmental_history5", function () {
        set_required_for_recent_report_if_needed();
    });
});

function getRequiredPrevSchoolRows(yearGroupId) {
    if (!yearGroupId || typeof yearGroupsOrdered === 'undefined') return 0;
    var index = -1;
    for (var i = 0; i < yearGroupsOrdered.length; i++) {
        if (yearGroupsOrdered[i].id == yearGroupId) {
            index = i;
            break;
        }
    }
    if (index <= 0) return 0;
    return Math.max(0, index - 1);
}

function updatePrevSchoolRows(yearGroupId) {
    var requiredRows = getRequiredPrevSchoolRows(yearGroupId);
    var minRows = Math.max(requiredRows, 1);

    while (prevSchoolRowCount < minRows) {
        addPrevSchoolRow(prevSchoolRowCount + 1);
        prevSchoolRowCount++;
    }

    jQuery('.prev_school_row').each(function () {
        var rowNum = parseInt(jQuery(this).attr('data-row'));
        var nameField = jQuery('#prev_school_name_' + rowNum);
        var reasonField = jQuery('#prev_school_reason_' + rowNum);
        if (rowNum <= requiredRows) {
            jQuery(this).show();
            nameField.addClass(required_input_class);
            reasonField.addClass(required_input_class);
        } else if (rowNum <= prevSchoolRowCount) {
            jQuery(this).show();
            nameField.removeClass(required_input_class).removeClass(required_class);
            reasonField.removeClass(required_input_class).removeClass(required_class);
        }
    });
}

function addPrevSchoolRow(rowNum) {
    var curriculumOptions = '';
    if (typeof prev_school_curriculums !== 'undefined') {
        for (var key in prev_school_curriculums) {
            curriculumOptions += '<option value="' + key + '">' + prev_school_curriculums[key] + '</option>';
        }
    }
    var countryOptions = '';
    if (typeof prev_school_countries !== 'undefined') {
        for (var i = 0; i < prev_school_countries.length; i++) {
            var sel = (prev_school_countries[i] === 'Egypt') ? ' selected="selected"' : '';
            countryOptions += '<option' + sel + ' value="' + prev_school_countries[i] + '">' + prev_school_countries[i] + '</option>';
        }
    }
    var reasonOptions = '';
    if (typeof prev_school_reasons !== 'undefined') {
        for (var key in prev_school_reasons) {
            reasonOptions += '<option value="' + key + '">' + prev_school_reasons[key] + '</option>';
        }
    }
    var html = '<tr class="prev_school_row" data-row="' + rowNum + '">'
        + '<td><input class="additional_pupils_informations input_in_table" id="prev_school_year_from_' + rowNum + '" type="text" name="prev_school_year_from_' + rowNum + '" value="" placeholder="..."></td>'
        + '<td><input class="additional_pupils_informations input_in_table" id="prev_school_year_to_' + rowNum + '" type="text" name="prev_school_year_to_' + rowNum + '" value="" placeholder="..."></td>'
        + '<td><input class="additional_pupils_informations input_in_table" id="prev_school_name_' + rowNum + '" type="text" name="prev_school_name_' + rowNum + '" value="" placeholder="..."></td>'
        + '<td><div class="calendar_select"><select class="select form-control form-select" id="prev_school_curriculum_' + rowNum + '" name="prev_school_curriculum_' + rowNum + '">' + curriculumOptions + '</select></div></td>'
        + '<td><div class="calendar_select"><select class="select form-control form-select" id="prev_school_country_' + rowNum + '" name="prev_school_country_' + rowNum + '">' + countryOptions + '</select></div></td>'
        + '<td><div class="calendar_select"><select class="select form-control form-select" id="prev_school_reason_' + rowNum + '" name="prev_school_reason_' + rowNum + '">' + reasonOptions + '</select></div></td>'
        + '</tr>';
    jQuery('#prev_schools_tbody').append(html);
}

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
                    jQuery('html, body').animate({ scrollTop: jQuery('#admissions_result').offset().top - 20 }, 500);
                    document.getElementById("admissionsform").reset();
                    currentTab = 0;
                    jQuery('.tabIn4').hide();
                    showTab(currentTab);

					setTimeout(function(){
                        window.location.href = 'https://www.ethosedu.com';
                     }, 5000);

                } else {
                    jQuery('#admissions_result').html(result.msg).show().removeClass('admissions_result_success').addClass('admissions_result_fail');
                    jQuery('html, body').animate({ scrollTop: jQuery('#admissions_result').offset().top - 20 }, 500);
                }
            }
        });
    }
}

function validate_required_input(obj) {
    var val = obj.val();
    var input_type = obj.attr('type');
    var input_id = obj.attr('id');
    var input_maxlength = obj.attr('maxlength');
    var input_minlength = obj.attr('minlength');
    var error = 0;

    if (Array.isArray(val)) {
        if (val.length === 0) {
            error = 1;
        }
    } else {
        var trimmedLength = jQuery.trim(val).length;
        if (trimmedLength === 0) {
            error = 1;
        } else if (input_maxlength && trimmedLength > input_maxlength) {
            error = 1;
        } else if (input_minlength && trimmedLength < input_minlength) {
            error = 1;
        } else {
            error = 0;
        }
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
    var pattern = /^[a-zA-Z0-9.!#$%&'"*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
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

function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.opacity = 0;
    } else {
        document.getElementById("prevBtn").style.opacity = 1;
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Send";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n);
}

$('input[type="file"]').on('change', function () {
    if($(this).val()){
        $(this).parent(".file-upload-wrapper").removeClass('invalid');
    }
    $(this).parent(".file-upload-wrapper").attr("data-text",$(this).val().replace(/.*(\/|\\)/, '') );
});
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

function validatePrevSchoolReasons() {
    var valid = true;
    jQuery('.prev_school_row:visible').each(function () {
        var rowNum = parseInt(jQuery(this).attr('data-row'));
        var nameVal = jQuery.trim(jQuery('#prev_school_name_' + rowNum).val());
        var reasonField = jQuery('#prev_school_reason_' + rowNum);
        if (nameVal.length > 0 && jQuery.trim(reasonField.val()).length === 0) {
            reasonField.addClass(required_class);
            valid = false;
        }
    });
    return valid;
}

function validateForm() {
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByClassName(required_input_class);
    i = 0;
    var obj;
    var error = 0;
    var focused = 0;
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

    // Tab 2 custom validation: reason for leaving
    // (School reference name/email/phone are enforced via the required_input class.)
    if (currentTab == 2) {
        if (!validatePrevSchoolReasons()) {
            valid = false;
        }
    }

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

function set_required_for_recent_report_if_needed() {
    let dh0 = $('input[type=radio][name=developmental_history0]:checked').val();
    let dh1 = $('input[type=radio][name=developmental_history1]:checked').val();
    let dh2 = $('input[type=radio][name=developmental_history2]:checked').val();
    let dh3 = $('input[type=radio][name=developmental_history3]:checked').val();
    let dh4 = $('input[type=radio][name=developmental_history4]:checked').val();
    let dh5 = $('input[name=developmental_history5]').val();
    item=$('#recent_report');
    if (dh0 == 1 || dh1 == 1 || dh2 == 1 || dh3 == 1 || dh4 == 1 || dh5 != '') {
        item.addClass(required_input_class);
    } else {
        item.removeClass(required_input_class);
        item.removeClass(required_class);
    }
}
