<div class="tab tabIn0">
    <div class="pupil_details-title head_div orange_head"><?php echo __('1. Pupil\'s Information') ?></div>
    <div class="input_description"><?php echo __('Note: Please give the exact spelling as it appears on the birth certificate or passport.'); ?></div>
    <div class="input_row_3col">
        <div class="input_new">
            <label for="first_name_en"><?php echo __('First Name (EN)'); ?> (*)</label>
            <input placeholder="<?php echo __(''); ?>..." id="first_name_en" class="input3new admissions_input take_placeholder required_input" type="text" name="first_name_en" />
        </div>
        <div class="input_new">
            <label for="middle_name_en"><?php echo __('Middle Name (EN)'); ?> (*)</label>
            <input placeholder="<?php echo __(''); ?>..." id="middle_name_en" class="input3new admissions_input take_placeholder required_input" type="text" name="middle_name_en" />
        </div>
        <div class="input_new">
            <label for="last_name_en"><?php echo __('Last Name (EN)'); ?> (*)</label>
            <input placeholder="<?php echo __(''); ?>..." id="last_name_en" class="input3new admissions_input take_placeholder required_input" type="text" name="last_name_en" />
        </div>
    </div>
    <div class="input_row_3col">
        <div class="input_new">
            <label for="first_name_ar"><?php echo __('First Name (AR)'); ?> (*)</label>
            <input placeholder="<?php echo __(''); ?>..." id="first_name_ar" class="input3new admissions_input take_placeholder required_input" type="text" name="first_name_ar" dir="rtl" />
        </div>
        <div class="input_new">
            <label for="middle_name_ar"><?php echo __('Middle Name (AR)'); ?> (*)</label>
            <input placeholder="<?php echo __(''); ?>..." id="middle_name_ar" class="input3new admissions_input take_placeholder required_input" type="text" name="middle_name_ar" dir="rtl" />
        </div>
        <div class="input_new">
            <label for="last_name_ar"><?php echo __('Last Name (AR)'); ?> (*)</label>
            <input placeholder="<?php echo __(''); ?>..." id="last_name_ar" class="input3new admissions_input take_placeholder required_input" type="text" name="last_name_ar" dir="rtl" />
        </div>
    </div>
    <div class="input_new">
        <label for="child_name"><?php echo __('Child\'s ID number'); ?>:</label>
        <input minlength="8" maxlength="14" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="<?php echo __(''); ?>..." id="child_id_number" class="input3new admissions_input take_placeholder required_input " type="number" name="child_id_number" />
        <div class="input_description"><?php echo __(strtoupper('(Written in the birth certificate)')); ?></div>
    </div>
    <div class="input_new">
        <label for="child_photo"><?php echo __('Child\'s Photo') ?>:</label>
        <div class="file-upload-wrapper" data-text="No file chosen">
            <input id="child_photo" class="input3new admissions_input required_input" type="file" name="child_photo" accept="<?php echo $image_extensions; ?>" />
        </div>
        <div class="input_description"><?php echo __('PASSPORT SIZE PHOTO OF PUPIL'); ?></div>
    </div>
    <div class="input_new">
        <label for="child_birth_certificate"><?php echo __('Child\'s birth certificate (electronic)') ?>:</label>
        <div class="file-upload-wrapper" data-text="No file chosen">
            <input id="child_birth_certificate" class="input3new admissions_input required_input" type="file" name="child_birth_certificate" accept="<?php echo $image_extensions; ?>" />
        </div>
    </div>
    <div class="input_new">
        <label for="birth_date_input"><?php echo __('Date of Birth') ?>:</label>
        <input placeholder="<?php echo __(''); ?>..." id="birth_date_input" type="text" class="input3new admissions_input take_placeholder required_input" name="birth_date" readonly="readonly">
    </div>
    <div class="input_new">
        <label for="academic_year_entry_input"><?php echo __('Academic Year Entry'); ?>:</label>
            <div class="calendar_select">
                <select class="select form-control form-select required_input" id="academic_year_entry_input" name="academic_year_entry_input">
                    <option value=""></option>
                    <?php foreach ($terms as $key => $term) { ?>
                        <option value="<?php echo $term['Term']['id']; ?>"><?php echo $term['Term']['title']; ?></option>
                    <?php } ?>
                </select>
            </div>
    </div>
    <div class="input_new">
        <label for="year_group_applying_to_input"><?php echo __('Year Group Applying to'); ?>:</label>
            <div class="calendar_select">
                <select class="select form-control form-select required_input" id="year_group_applying_to_input" name="year_group_applying_to_input">
                    <option value=""></option>
                    <?php
                    foreach ($yearGroups as $key => $yearGroup) {
                        if ($yearGroup['YearGroup']['applying_to'] == 1) {
                    ?>
                            <option value="<?php echo $yearGroup['YearGroup']['id']; ?>"><?php echo $yearGroup['YearGroup']['title']; ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
    </div>
    <div class="input_new">
        <label for="current_year_group_input"><?php echo __('Current Year Group / Grade'); ?>:</label>
            <div class="calendar_select">
                <select class="select form-control form-select" id="current_year_group_input" name="current_year_group_input">
                    <option value=""></option>
                    <?php
                    foreach ($yearGroups as $key => $yearGroup) {
                        if ($yearGroup['YearGroup']['current'] == 1) {
                    ?>
                            <option value="<?php echo $yearGroup['YearGroup']['id']; ?>"><?php echo $yearGroup['YearGroup']['title']; ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
    </div>
    <div class="input_new">
        <label for="gender_input"><?php echo __('Gender'); ?>:</label>
            <div class="calendar_select">
                <select class="select form-control form-select required_input" id="gender_input" name="gender_input">
                    <option value=""></option>
                    <?php foreach ($gender_options as $key => $gender_option) { ?>
                        <option value="<?php echo $gender_option; ?>"><?php echo $gender_option; ?></option>
                    <?php } ?>
                </select>
            </div>
    </div>
    <div class="input_new">
        <label for="nationality"><?php echo __('Nationality'); ?>:</label>
            <div class="calendar_select">
                <select class="select form-control form-select required_input" id="nationality" name="nationality">
                    <?php
                    $nationalities = $GLOBALS['nationalities'];
                    foreach ($nationalities as $nat) {
                        $nat_selected = ($nat == 'Egyptian') ? $selected : '';
                    ?>
                        <option <?php echo $nat_selected; ?> value="<?php echo $nat; ?>"><?php echo $nat; ?></option>
                    <?php } ?>
                </select>
            </div>
    </div>
    <div class="input_new">
        <label for="religion"><?php echo __('Religion'); ?>:</label>
            <div class="calendar_select">
                <select class="select form-control form-select required_input" id="religion" name="religion">
                    <option value=""></option>
                    <?php
                    $religions = $GLOBALS['religions'];
                    foreach ($religions as $rel) {
                    ?>
                        <option value="<?php echo $rel; ?>"><?php echo $rel; ?></option>
                    <?php } ?>
                </select>
            </div>
    </div>
    <div class="input_new hiddendiv">
        <label for="religion_other"><?php echo __('If other, please specify'); ?>:</label>
        <input placeholder="<?php echo __(''); ?>..." id="religion_other" class="input3new admissions_input take_placeholder" type="text" name="religion_other" />
    </div>
    <div class="input_new">
        <label for="language"><?php echo __('Language/s Spoken At Home'); ?>:</label>
            <select class="form-control required_input" id="language" name="language[]" multiple="multiple">
                <?php
                $languages = $GLOBALS['languages'];
                foreach ($languages as $lang) {
                    $lang_selected = ($lang == 'Arabic') ? $selected : '';
                ?>
                    <option <?php echo $lang_selected; ?> value="<?php echo $lang; ?>"><?php echo $lang; ?></option>
                <?php } ?>
            </select>
    </div>
    <div class="input_new">
        <label for="require_bus"><?php echo __('Will the pupil require bus transportation?'); ?></label>
            <div class="calendar_select">
                <select class="select form-control form-select required_input" id="require_bus" name="require_bus">
                    <option value=""></option>
                    <?php foreach ($yes_no_options as $key => $yes_no_option) { ?>
                        <option value="<?php echo $yes_no_option; ?>"><?php echo $yes_no_option; ?></option>
                    <?php } ?>
                </select>
            </div>
    </div>
    <div class="input_new">
        <label for="egyptian_ministry_exams"><?php echo __('Will the pupil be eligible for exemption from the Egyptian Ministry exams?'); ?></label>
            <div class="calendar_select">
                <select class="select form-control form-select" id="egyptian_ministry_exams" name="egyptian_ministry_exams">
                    <option value=""></option>
                    <?php foreach ($yes_no_options as $key => $yes_no_option) { ?>
                        <option value="<?php echo $yes_no_option; ?>"><?php echo $yes_no_option; ?></option>
                    <?php } ?>
                </select>
            </div>
        <div class="input_description"><?php echo __('Applicants with Foreign Nationality'); ?></div>
    </div>
    <div class="input_new">
        <label for="have_any_sibling_at_EIS"><?php echo __('Does the Applicant have any sibling/s at EIS?'); ?></label>
            <div class="calendar_select">
                <select class="select form-control form-select" id="have_any_sibling_at_EIS" name="have_any_sibling_at_EIS">
                    <?php
                    foreach ($yes_no_options as $key => $yes_no_option) {
                        $item_selected = '';
                        if (strtolower($yes_no_option) == 'no') {
                            $item_selected = " " . $selected . " ";
                        }
                    ?>
                        <option <?php echo $item_selected; ?> value="<?php echo $yes_no_option; ?>"><?php echo $yes_no_option; ?></option>;
                    <?php } ?>
                    <option value="applying_this_year"><?php echo __('Applying this Year'); ?></option>;
                </select>
            </div>
    </div>
    <div class="input_new hiddendiv">
        <label for="have_any_sibling_at_EIS_pupil"><?php echo __('If yes please write his/her name and year group'); ?>:</label>
            <input placeholder="<?php echo __(''); ?>..." id="have_any_sibling_at_EIS_pupil" class="input3new admissions_input take_placeholder " type="text" name="have_any_sibling_at_EIS_pupil" />
    </div>
    <div class="input_new">
        <label for="have_any_sibling_at_rukan"><?php echo __('Does the Applicant have any sibling/s at Rukan Nursery and Preschool?'); ?></label>
            <div class="calendar_select">
                <select class="select form-control form-select" id="have_any_sibling_at_rukan" name="have_any_sibling_at_rukan">
                    <?php
                    foreach ($yes_no_options as $key => $yes_no_option) {
                        $item_selected = '';
                        if (strtolower($yes_no_option) == 'no') {
                            $item_selected = " " . $selected . " ";
                        }
                    ?>
                        <option <?php echo $item_selected; ?> value="<?php echo $yes_no_option; ?>"><?php echo $yes_no_option; ?></option>;
                    <?php } ?>
                    <option value="applying_this_year"><?php echo __('Applying this Year'); ?></option>;
                </select>
            </div>
    </div>
    <div class="input_new hiddendiv">
        <label for="have_any_sibling_at_rukan_pupil"><?php echo __('If yes please write his/her name and year group'); ?>:</label>
            <input placeholder="<?php echo __(''); ?>..." id="have_any_sibling_at_rukan_pupil" class="input3new admissions_input take_placeholder " type="text" name="have_any_sibling_at_rukan_pupil" />
    </div>
    <div class="input_new">
        <label for="how_did_you_hear_about_us"><?php echo __('How did you hear about us?'); ?></label>
            <div class="calendar_select">
                <select class="select form-control form-select required_input" id="how_did_you_hear_about_us" name="how_did_you_hear_about_us">
                    <?php
                    $how_did_you_hear_about_us = $GLOBALS['how_did_you_hear_about_us'];
                    foreach ($how_did_you_hear_about_us as $key => $item) {
                        $item_selected = '';
                        // if (strtolower($item) == 'no') {
                        //     $item_selected = " " . $selected . " ";
                        // }
                    ?>
                        <option <?php echo $item_selected; ?> value="<?php echo $key; ?>"><?php echo $item; ?></option>;
                    <?php } ?>
                </select>
            </div>
    </div>
    <div class="input_new hiddendiv">
        <label for="how_did_you_hear_about_us_other"><?php echo __('If other, please specify'); ?>:</label>
            <input placeholder="<?php echo __(''); ?>..." id="how_did_you_hear_about_us_other" class="input3new admissions_input take_placeholder " type="text" name="how_did_you_hear_about_us_other" />
    </div>
    <div class="input_new">
        <label for="reason_for_applying"><?php echo __('Reason for applying'); ?>:</label>
        <textarea id="reason_for_applying" class="input3new admissions_input required_input" name="reason_for_applying" maxlength="500" rows="3"></textarea>
        <div class="input_description"><?php echo __('Maximum 500 characters'); ?></div>
    </div>
</div>