<div class="tab tabIn1">
    <div class="pupil_details-title head_div orange_head"><?php echo __('2. Previous School(s) / Nursery') ?></div>
    <div class="additional_pupils_informations-table">
        <table border="1">
            <tr>
                <td class="td_center"><?php __('Name Of Previous School / Nursery'); ?></td>
                <td class="td_center td_years_attended"><?php __('Years Attended'); ?></td>
                <td class="td_center td_year_group_form_grade"><?php __('Year Group/ Form / Grade'); ?></td>
                <td class="td_center"><?php __('Curriculum Followed (British, IB, American, National)'); ?></td>
            </tr>
            <?php
            for ($i = 1; $i <= 5; $i++) {
                $required_input_class = '';
                //                if ($i == 1) {
                //                    $required_input_class = 'required_input';
                //                }
            ?>
                <tr>
                    <?php for ($j = 1; $j <= 4; $j++) { ?>
                        <td>
                            <input class="additional_pupils_informations input_in_table <?php echo $required_input_class; ?>" id="previous_schools_nursery_<?php echo $i . '_' . $j; ?>" type="text" name="previous_schools_nursery_<?php echo $i . '_' . $j; ?>" value="" placeholder="...">
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div class="input_new">
        <label for="previous_school_report"><?php echo __('Previous school report') ?>:</label>
        <div class="file-upload-wrapper" data-text="Select your file!">
            <input id="previous_school_report" class="input3new admissions_input" type="file" name="previous_school_report" accept="<?php echo $image_extensions; ?>" />
        </div>
        <div class="input_description"><?php echo __('(PLEASE UPLOAD A COPY OF PUPIL’S MOST RECENT PREVIOUS SCHOOL REPORT)'); ?></div>
    </div>
    <div class="input_new">
        <label for="has_the_pupil_ever_skipped_year"><?php echo __('Has the pupil ever skipped a year?'); ?></label>
        <div class="calendar_select">
            <select class="select form-control form-select" id="has_the_pupil_ever_skipped_year" name="has_the_pupil_ever_skipped_year">
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
        <label for="has_the_pupil_ever_skipped_year_details"><?php echo __('If yes, which year group, Please give details'); ?>:</label>
        <span>
            <input placeholder="<?php echo __(''); ?>..." id="has_the_pupil_ever_skipped_year_details" class="input3new admissions_input take_placeholder " type="text" name="has_the_pupil_ever_skipped_year_details" />
        </span>
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
        <label for="has_the_pupil_ever_applied_to_EIS"><?php echo __('Has the pupil ever applied to Ethos International School?'); ?></label>
        <div class="calendar_select">
            <select class="select form-control form-select" id="has_the_pupil_ever_applied_to_EIS" name="has_the_pupil_ever_applied_to_EIS">
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
        <label for="has_the_pupil_ever_applied_to_EIS_details"><?php echo __('If yes, which year group, Please give details'); ?>:</label>
        <input placeholder="<?php echo __(''); ?>..." id="has_the_pupil_ever_applied_to_EIS_details" class="input3new admissions_input take_placeholder " type="text" name="has_the_pupil_ever_applied_to_EIS_details" />
    </div>
</div>