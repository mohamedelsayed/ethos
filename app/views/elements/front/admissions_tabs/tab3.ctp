<div class="tab tabIn0">
    <div class="pupil_details-title head_div orange_head">
        <?php echo __('1. Parents Information') ?>
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
    <?php
    $nationalities = $GLOBALS['nationalities'];
    $religions = $GLOBALS['religions'];
    ?>
    <div class="parent_informations-table">
        <table border="1">
            <tr>
                <td class="td_center"></td>
                <td class="td_center"><?php echo __('Father'); ?></td>
                <td class="td_center"><?php echo __('Mother'); ?></td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Name'); ?></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations1" type="text" name="parent_informations1" value="" placeholder="..."></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations2" type="text" name="parent_informations2" value="" placeholder="..."></td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Religion'); ?></td>
                <td>
                    <div class="calendar_select">
                        <select class="select form-control form-select required_input" id="parent_religion_father" name="parent_religion_father">
                            <option value=""><?php echo __('Select'); ?></option>
                            <?php foreach ($religions as $rel) { ?>
                                <option value="<?php echo $rel; ?>"><?php echo $rel; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <input class="parent_informations input_in_table hiddendiv" id="parent_religion_father_other" type="text" name="parent_religion_father_other" value="" placeholder="<?php echo __('Please specify'); ?>...">
                </td>
                <td>
                    <div class="calendar_select">
                        <select class="select form-control form-select required_input" id="parent_religion_mother" name="parent_religion_mother">
                            <option value=""><?php echo __('Select'); ?></option>
                            <?php foreach ($religions as $rel) { ?>
                                <option value="<?php echo $rel; ?>"><?php echo $rel; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <input class="parent_informations input_in_table hiddendiv" id="parent_religion_mother_other" type="text" name="parent_religion_mother_other" value="" placeholder="<?php echo __('Please specify'); ?>...">
                </td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Occupation'); ?></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations3" type="text" name="parent_informations3" value="" placeholder="..."></td>
                <td><input class="parent_informations input_in_table" id="parent_informations4" type="text" name="parent_informations4" value="" placeholder="..."></td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Employer'); ?></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations5" type="text" name="parent_informations5" value="" placeholder="..."></td>
                <td><input class="parent_informations input_in_table" id="parent_informations6" type="text" name="parent_informations6" value="" placeholder="..."></td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Work Address'); ?></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations25" type="text" name="parent_informations25" value="" placeholder="..."></td>
                <td><input class="parent_informations input_in_table" id="parent_informations26" type="text" name="parent_informations26" value="" placeholder="..."></td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Type of Business'); ?></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_type_of_business_father" type="text" name="parent_type_of_business_father" value="" placeholder="..."></td>
                <td><input class="parent_informations input_in_table" id="parent_type_of_business_mother" type="text" name="parent_type_of_business_mother" value="" placeholder="..."></td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Business Website'); ?></td>
                <td><input class="parent_informations input_in_table" id="parent_business_website_father" type="text" name="parent_business_website_father" value="" placeholder="..."></td>
                <td><input class="parent_informations input_in_table" id="parent_business_website_mother" type="text" name="parent_business_website_mother" value="" placeholder="..."></td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Education: University'); ?></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations9" type="text" name="parent_informations9" value="" placeholder="..."></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations10" type="text" name="parent_informations10" value="" placeholder="..."></td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Education: School'); ?></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations11" type="text" name="parent_informations11" value="" placeholder="..."></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations12" type="text" name="parent_informations12" value="" placeholder="..."></td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Nationality'); ?></td>
                <td>
                    <div class="calendar_select">
                        <select class="select form-control form-select required_input" id="parent_informations13" name="parent_informations13">
                            <?php foreach ($nationalities as $nat) {
                                $nat_selected = ($nat == 'Egyptian') ? $selected : '';
                            ?>
                                <option <?php echo $nat_selected; ?> value="<?php echo $nat; ?>"><?php echo $nat; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="calendar_select">
                        <select class="select form-control form-select required_input" id="parent_informations14" name="parent_informations14">
                            <?php foreach ($nationalities as $nat) {
                                $nat_selected = ($nat == 'Egyptian') ? $selected : '';
                            ?>
                                <option <?php echo $nat_selected; ?> value="<?php echo $nat; ?>"><?php echo $nat; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('ID/ Passport Number'); ?></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations15" type="text" name="parent_informations15" value="" placeholder="..."></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations16" type="text" name="parent_informations16" value="" placeholder="..."></td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Date of Birth'); ?></td>
                <td><input class="parent_informations input_in_table datepicker required_input" id="parent_informations17" type="text" name="parent_informations17" value="" placeholder="..." readonly="readonly"></td>
                <td><input class="parent_informations input_in_table datepicker required_input" id="parent_informations18" type="text" name="parent_informations18" value="" placeholder="..." readonly="readonly"></td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Address'); ?></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations19" type="text" name="parent_informations19" value="" placeholder="..."></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations20" type="text" name="parent_informations20" value="" placeholder="..."></td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Mobile Number'); ?></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations21" type="tel" name="parent_informations21" value="" placeholder="..."></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations22" type="tel" name="parent_informations22" value="" placeholder="..."></td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Email'); ?></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations23" type="email" name="parent_informations23" value="" placeholder="..."></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations24" type="email" name="parent_informations24" value="" placeholder="..."></td>
            </tr>
        </table>
    </div>
    <div class="input_description"><?php echo __('(PLEASE UPLOAD A COPY OF FATHER\'S & MOTHER\'S NATIONAL ID/ PASSPORT FOR NON-EGYPTIANS)'); ?></div>
    <div class="input_row_2col">
        <div class="input_new">
            <label for="father_id_front"><?php echo __('Father National ID/ Passport (Front)') ?>:</label>
            <div class="file-upload-wrapper" data-text="No file chosen">
                <input id="father_id_front" class="input3new admissions_input required_input" type="file" name="father_id_front" accept="<?php echo $image_extensions; ?>" />
            </div>
        </div>
        <div class="input_new">
            <label for="father_id_back"><?php echo __('Father National ID/ Passport (Back)') ?>:</label>
            <div class="file-upload-wrapper" data-text="No file chosen">
                <input id="father_id_back" class="input3new admissions_input required_input" type="file" name="father_id_back" accept="<?php echo $image_extensions; ?>" />
            </div>
        </div>
    </div>
    <div class="input_row_2col">
        <div class="input_new">
            <label for="mother_id_front"><?php echo __('Mother National ID/ Passport (Front)') ?>:</label>
            <div class="file-upload-wrapper" data-text="No file chosen">
                <input id="mother_id_front" class="input3new admissions_input required_input" type="file" name="mother_id_front" accept="<?php echo $image_extensions; ?>" />
            </div>
        </div>
        <div class="input_new">
            <label for="mother_id_back"><?php echo __('Mother National ID/ Passport (Back)') ?>:</label>
            <div class="file-upload-wrapper" data-text="No file chosen">
                <input id="mother_id_back" class="input3new admissions_input required_input" type="file" name="mother_id_back" accept="<?php echo $image_extensions; ?>" />
            </div>
        </div>
    </div>
    <div class="input_new">
        <label for="parental_marital_status"><?php echo __('Parental Marital Status'); ?>:</label>
        <div class="calendar_select">
            <select class="select form-control form-select required_input" id="parental_marital_status" name="parental_marital_status">
                <option value=""></option>
                <?php foreach ($parental_marital_status_options as $key => $parental_marital_status_option) {
                    $item_selected = '';
                ?>
                    <option <?php echo $item_selected; ?> value="<?php echo $parental_marital_status_option; ?>"><?php echo $parental_marital_status_option; ?></option>;
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="input_new hiddendiv" id="custody_section">
        <label for="parental_marital_status_details"><?php echo __('If divorced, custody with'); ?>:</label>
        <div class="calendar_select">
            <select class="select form-control form-select" id="parental_marital_status_details" name="parental_marital_status_details">
                <option value=""><?php echo __('Select'); ?></option>
                <option value="Mother"><?php echo __('Mother'); ?></option>
                <option value="Father"><?php echo __('Father'); ?></option>
                <option value="Other relatives"><?php echo __('Other relatives'); ?></option>
            </select>
        </div>
        <input placeholder="<?php echo __('Please specify'); ?>..." id="custody_other_details" class="input3new admissions_input take_placeholder hiddendiv" type="text" name="custody_other_details" />
        <div class="input_description"><?php echo __('(Official Documents Might Be Required)'); ?></div>
    </div>
    <div class="input_new">
        <label for="is_step_parent"><?php echo __('Is there a step parent?'); ?></label>
        <div class="calendar_select">
            <select class="select form-control form-select" id="is_step_parent" name="is_step_parent">
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
    <div class="input_new hiddendiv" id="step_parent_section">
        <div class="parent_informations-table">
            <table border="1">
                <tr>
                    <td class="td_center"><?php echo __('Name'); ?></td>
                    <td class="td_center"><?php echo __('Address'); ?></td>
                </tr>
                <tr>
                    <td><input class="parent_informations input_in_table" id="step_parent_name" type="text" name="step_parent_name" value="" placeholder="..."></td>
                    <td><input class="parent_informations input_in_table" id="step_parent_address" type="text" name="step_parent_address" value="" placeholder="..."></td>
                </tr>
            </table>
        </div>
        <div class="input_new" style="margin-top: 10px;">
            <label for="custodial_parent_name"><?php echo __('Custodial parent Name'); ?>:</label>
            <input placeholder="<?php echo __(''); ?>..." id="custodial_parent_name" class="input3new admissions_input take_placeholder" type="text" name="custodial_parent_name" />
        </div>
    </div>
</div>