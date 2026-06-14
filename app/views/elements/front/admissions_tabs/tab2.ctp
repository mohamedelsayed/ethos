<div class="tab tabIn2">
    <div class="pupil_details-title head_div orange_head"><?php echo __('3. Previous School(s) / Nursery') ?></div>
    <div class="input_description"><?php echo __('Please note that all the data mentioned below will be requested later to provide the required documents.'); ?></div>
    <div class="additional_pupils_informations-table">
        <?php
        $curriculums = $GLOBALS['curriculums'];
        $countries = $GLOBALS['countries'];
        $reasons_for_leaving = $GLOBALS['reasons_for_leaving'];
        ?>
        <script type="text/javascript">
            var prev_school_curriculums = <?php echo json_encode($curriculums); ?>;
            var prev_school_countries = <?php echo json_encode(array_values($countries)); ?>;
            var prev_school_reasons = <?php echo json_encode($reasons_for_leaving); ?>;
        </script>
        <table border="1" id="prev_schools_table">
            <thead>
                <tr>
                    <td class="td_center"><?php echo __('Year from'); ?></td>
                    <td class="td_center"><?php echo __('Year to'); ?></td>
                    <td class="td_center"><?php echo __('Name Of Previous School / Nursery'); ?></td>
                    <td class="td_center"><?php echo __('Curriculum Followed'); ?></td>
                    <td class="td_center"><?php echo __('Country'); ?></td>
                    <td class="td_center"><?php echo __('Reason for leaving'); ?></td>
                </tr>
            </thead>
            <tbody id="prev_schools_tbody">
                <?php for ($i = 1; $i <= 5; $i++) { ?>
                    <tr class="prev_school_row" data-row="<?php echo $i; ?>">
                        <td>
                            <input class="additional_pupils_informations input_in_table" id="prev_school_year_from_<?php echo $i; ?>" type="text" name="prev_school_year_from_<?php echo $i; ?>" value="" placeholder="...">
                        </td>
                        <td>
                            <input class="additional_pupils_informations input_in_table" id="prev_school_year_to_<?php echo $i; ?>" type="text" name="prev_school_year_to_<?php echo $i; ?>" value="" placeholder="...">
                        </td>
                        <td>
                            <input class="additional_pupils_informations input_in_table" id="prev_school_name_<?php echo $i; ?>" type="text" name="prev_school_name_<?php echo $i; ?>" value="" placeholder="...">
                        </td>
                        <td>
                            <div class="calendar_select">
                                <select class="select form-control form-select" id="prev_school_curriculum_<?php echo $i; ?>" name="prev_school_curriculum_<?php echo $i; ?>">
                                    <?php foreach ($curriculums as $key => $val) { ?>
                                        <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="calendar_select">
                                <select class="select form-control form-select" id="prev_school_country_<?php echo $i; ?>" name="prev_school_country_<?php echo $i; ?>">
                                    <?php foreach ($countries as $country) {
                                        $country_selected = ($country == 'Egypt') ? $selected : '';
                                    ?>
                                        <option <?php echo $country_selected; ?> value="<?php echo $country; ?>"><?php echo $country; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="calendar_select">
                                <select class="select form-control form-select" id="prev_school_reason_<?php echo $i; ?>" name="prev_school_reason_<?php echo $i; ?>">
                                    <?php foreach ($reasons_for_leaving as $key => $val) { ?>
                                        <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="input_new">
        <label for="previous_school_report"><?php echo __('Previous school report') ?>:</label>
        <div class="file-upload-wrapper" data-text="No file chosen">
            <input id="previous_school_report" class="input3new admissions_input" type="file" name="previous_school_report" accept="<?php echo $image_extensions; ?>" />
        </div>
        <div class="input_description"><?php echo __('(Please upload a copy of pupil\'s most recent previous school report)'); ?></div>
    </div>
    <div class="input_new">
        <label for="has_the_pupil_ever_been_asked_to_repeat_year"><?php echo __('Has the pupil ever been asked to repeat a year?'); ?></label>
        <div class="calendar_select">
            <select class="select form-control form-select" id="has_the_pupil_ever_been_asked_to_repeat_year" name="has_the_pupil_ever_been_asked_to_repeat_year">
                <?php foreach ($yes_no_options as $key => $yes_no_option) {
                    $item_selected = '';
                    if (strtolower($yes_no_option) == 'no') {
                        $item_selected = " " . $selected . " ";
                    } ?>
                    <option <?php echo $item_selected; ?> value="<?php echo $yes_no_option; ?>"><?php echo $yes_no_option; ?></option>;
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="input_new hiddendiv">
        <label for="has_the_pupil_ever_been_asked_to_repeat_year_details"><?php echo __('If yes, which year group, Please give details'); ?>:</label>
        <input placeholder="<?php echo __(''); ?>..." id="has_the_pupil_ever_been_asked_to_repeat_year_details" class="input3new admissions_input take_placeholder " type="text" name="has_the_pupil_ever_been_asked_to_repeat_year_details" />
    </div>
    <div class="input_new">
        <label><?php echo __('Please upload a reference letter from the current school'); ?>:</label>
        <div class="input_description"><?php echo __('Please also provide the reference name, email address and phone number below (required).'); ?></div>
        <div class="file-upload-wrapper" data-text="No file chosen" style="margin-top: 8px;">
            <input id="school_reference_letter" class="input3new admissions_input" type="file" name="school_reference_letter" accept="<?php echo $image_extensions; ?>,.pdf,.doc,.docx" />
        </div>
    </div>
    <div class="input_row_3col">
        <div class="input_new">
            <label for="school_reference_name"><?php echo __('Name'); ?>:</label>
            <input placeholder="<?php echo __(''); ?>..." id="school_reference_name" class="input3new admissions_input take_placeholder required_input" type="text" name="school_reference_name" />
        </div>
        <div class="input_new">
            <label for="school_reference_email"><?php echo __('Email Address'); ?>:</label>
            <input placeholder="<?php echo __(''); ?>..." id="school_reference_email" class="input3new admissions_input take_placeholder required_input" type="email" name="school_reference_email" />
        </div>
        <div class="input_new">
            <label for="school_reference_phone"><?php echo __('Phone Number'); ?>:</label>
            <input placeholder="<?php echo __(''); ?>..." id="school_reference_phone" class="input3new admissions_input take_placeholder required_input" type="text" name="school_reference_phone" />
        </div>
    </div>
</div>
