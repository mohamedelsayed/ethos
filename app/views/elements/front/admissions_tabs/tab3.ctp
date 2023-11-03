<div class="tab tabIn2">
    <div class="pupil_details-title head_div orange_head">
        <?php echo __('3. Parents Information') ?>
    </div>
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
                <td class="td_left is_head"><?php echo __('Occupation'); ?></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations3" type="text" name="parent_informations3" value="" placeholder="..."></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations4" type="text" name="parent_informations4" value="" placeholder="..."></td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Employer'); ?></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations5" type="text" name="parent_informations5" value="" placeholder="..."></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations6" type="text" name="parent_informations6" value="" placeholder="..."></td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Work Address'); ?></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations25" type="text" name="parent_informations25" value="" placeholder="..."></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations26" type="text" name="parent_informations26" value="" placeholder="..."></td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Qualifications'); ?></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations7" type="text" name="parent_informations7" value="" placeholder="..."></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations8" type="text" name="parent_informations8" value="" placeholder="..."></td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('University'); ?></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations9" type="text" name="parent_informations9" value="" placeholder="..."></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations10" type="text" name="parent_informations10" value="" placeholder="..."></td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('School'); ?></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations11" type="text" name="parent_informations11" value="" placeholder="..."></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations12" type="text" name="parent_informations12" value="" placeholder="..."></td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Nationality'); ?></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations13" type="text" name="parent_informations13" value="" placeholder="..."></td>
                <td><input class="parent_informations input_in_table required_input" id="parent_informations14" type="text" name="parent_informations14" value="" placeholder="..."></td>
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
    <div class="input_description"><?php echo __('(PLEASE UPLOAD A COPY OF FATHER’S & MOTHER’S NATIONAL ID/ PASSPORT FOR NON-EGYPTIANS)'); ?></div>
    <div class="input_new">
        <label for="father_national_id"><?php echo __('Father National ID/ Passport') ?>:</label>
        <div class="file-upload-wrapper" data-text="Select your file!">
            <input id="father_national_id" class="input3new admissions_input required_input" type="file" name="father_national_id" accept="<?php echo $image_extensions; ?>" />
        </div>
    </div>
    <div class="input_new">
        <label for="mother_national_id"><?php echo __('Mother National ID/ Passport') ?>:</label>
        <div class="file-upload-wrapper" data-text="Select your file!">
            <input id="mother_national_id" class="input3new admissions_input required_input" type="file" name="mother_national_id" accept="<?php echo $image_extensions; ?>" />
        </div>
    </div>
    <div class="input_new">
        <label for="parental_marital_status"><?php echo __('Parental Marital Status'); ?>:</label>
        <div class="calendar_select">
            <select class="select form-control form-select required_input" id="parental_marital_status" name="parental_marital_status">
                <option value=""></option>
                <?php foreach ($parental_marital_status_options as $key => $parental_marital_status_option) {
                    $item_selected = '';
                    //                        if(strtolower($yes_no_option) == 'no'){
                    //                            $item_selected = " ". $selected." ";
                    //                        }
                ?>
                    <option <?php echo $item_selected; ?> value="<?php echo $parental_marital_status_option; ?>"><?php echo $parental_marital_status_option; ?></option>;
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="input_new hiddendiv">
        <label for="parental_marital_status_details"><?php echo __('If divorced, custody with'); ?>:</label>
        <input placeholder="<?php echo __(''); ?>..." id="parental_marital_status_details" class="input3new admissions_input take_placeholder " type="text" name="parental_marital_status_details" />
        <div class="input_description"><?php echo __('(Official Documents Might Be Required)'); ?></div>
    </div>
</div>