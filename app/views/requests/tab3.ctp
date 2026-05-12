<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo __('Has the pupil ever applied to Ethos International School?'); ?></div>
    <div class="rightDiv ">
        <?php
        if (isset($dataIn['has_the_pupil_ever_applied_to_EIS'])) {
            echo $dataIn['has_the_pupil_ever_applied_to_EIS'];
        }
        ?>
        &nbsp;
    </div>
</div>
<?php if (isset($dataIn['has_the_pupil_ever_applied_to_EIS_details']) && $dataIn['has_the_pupil_ever_applied_to_EIS_details'] != '') { ?>
    <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
        <div class="leftDiv "><?php echo __('If yes, which year group, Please give details'); ?></div>
        <div class="rightDiv ">
            <?php echo $dataIn['has_the_pupil_ever_applied_to_EIS_details']; ?>
            &nbsp;
        </div>
    </div>
<?php } ?>
<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="parent_informations-table">
        <table border="1">
            <tr>
                <td class="td_center"></td>
                <td class="td_center"><?php echo __('Father'); ?></td>
                <td class="td_center"><?php echo __('Mother'); ?></td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Name'); ?></td>
                <td>
                    <?php if (isset($dataIn['parent_informations1'])) { ?>
                        <?php echo $dataIn['parent_informations1']; ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if (isset($dataIn['parent_informations2'])) { ?>
                        <?php echo $dataIn['parent_informations2']; ?>
                    <?php } ?>
                </td>
            </tr>
            <?php if (isset($dataIn['parent_religion_father']) || isset($dataIn['parent_religion_mother'])) { ?>
            <tr>
                <td class="td_left is_head"><?php echo __('Religion'); ?></td>
                <td>
                    <?php if (isset($dataIn['parent_religion_father'])) {
                        echo $dataIn['parent_religion_father'];
                        if (strtolower($dataIn['parent_religion_father']) == 'other' && isset($dataIn['parent_religion_father_other']) && $dataIn['parent_religion_father_other'] != '') {
                            echo ' (' . $dataIn['parent_religion_father_other'] . ')';
                        }
                    } ?>
                </td>
                <td>
                    <?php if (isset($dataIn['parent_religion_mother'])) {
                        echo $dataIn['parent_religion_mother'];
                        if (strtolower($dataIn['parent_religion_mother']) == 'other' && isset($dataIn['parent_religion_mother_other']) && $dataIn['parent_religion_mother_other'] != '') {
                            echo ' (' . $dataIn['parent_religion_mother_other'] . ')';
                        }
                    } ?>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td class="td_left is_head"><?php echo __('Occupation'); ?></td>
                <td>
                    <?php if (isset($dataIn['parent_informations3'])) { ?>
                        <?php echo $dataIn['parent_informations3']; ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if (isset($dataIn['parent_informations4'])) { ?>
                        <?php echo $dataIn['parent_informations4']; ?>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Employer'); ?></td>
                <td>
                    <?php if (isset($dataIn['parent_informations5'])) { ?>
                        <?php echo $dataIn['parent_informations5']; ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if (isset($dataIn['parent_informations6'])) { ?>
                        <?php echo $dataIn['parent_informations6']; ?>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Work Address'); ?></td>
                <td>
                    <?php if (isset($dataIn['parent_informations25'])) { ?>
                        <?php echo $dataIn['parent_informations25']; ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if (isset($dataIn['parent_informations26'])) { ?>
                        <?php echo $dataIn['parent_informations26']; ?>
                    <?php } ?>
                </td>
            </tr>
            <?php if (isset($dataIn['parent_type_of_business_father']) || isset($dataIn['parent_type_of_business_mother'])) { ?>
            <tr>
                <td class="td_left is_head"><?php echo __('Type of Business'); ?></td>
                <td>
                    <?php if (isset($dataIn['parent_type_of_business_father'])) { ?>
                        <?php echo $dataIn['parent_type_of_business_father']; ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if (isset($dataIn['parent_type_of_business_mother'])) { ?>
                        <?php echo $dataIn['parent_type_of_business_mother']; ?>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
            <?php if (isset($dataIn['parent_business_website_father']) || isset($dataIn['parent_business_website_mother'])) { ?>
            <tr>
                <td class="td_left is_head"><?php echo __('Business Website'); ?></td>
                <td>
                    <?php if (isset($dataIn['parent_business_website_father'])) { ?>
                        <?php echo $dataIn['parent_business_website_father']; ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if (isset($dataIn['parent_business_website_mother'])) { ?>
                        <?php echo $dataIn['parent_business_website_mother']; ?>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
            <?php if (isset($dataIn['parent_informations7'])) { ?>
            <tr>
                <td class="td_left is_head"><?php echo __('Qualifications'); ?></td>
                <td>
                    <?php echo $dataIn['parent_informations7']; ?>
                </td>
                <td>
                    <?php if (isset($dataIn['parent_informations8'])) { ?>
                        <?php echo $dataIn['parent_informations8']; ?>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td class="td_left is_head"><?php echo __('Education: University'); ?></td>
                <td>
                    <?php if (isset($dataIn['parent_informations9'])) { ?>
                        <?php echo $dataIn['parent_informations9']; ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if (isset($dataIn['parent_informations10'])) { ?>
                        <?php echo $dataIn['parent_informations10']; ?>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Education: School'); ?></td>
                <td>
                    <?php if (isset($dataIn['parent_informations11'])) { ?>
                        <?php echo $dataIn['parent_informations11']; ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if (isset($dataIn['parent_informations12'])) { ?>
                        <?php echo $dataIn['parent_informations12']; ?>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Nationality'); ?></td>
                <td>
                    <?php if (isset($dataIn['parent_informations13'])) { ?>
                        <?php echo $dataIn['parent_informations13']; ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if (isset($dataIn['parent_informations14'])) { ?>
                        <?php echo $dataIn['parent_informations14']; ?>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('ID/ Passport Number'); ?></td>
                <td>
                    <?php if (isset($dataIn['parent_informations15'])) { ?>
                        <?php echo $dataIn['parent_informations15']; ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if (isset($dataIn['parent_informations16'])) { ?>
                        <?php echo $dataIn['parent_informations16']; ?>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Date of Birth'); ?></td>
                <td>
                    <?php if (isset($dataIn['parent_informations17'])) { ?>
                        <?php echo $dataIn['parent_informations17']; ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if (isset($dataIn['parent_informations18'])) { ?>
                        <?php echo $dataIn['parent_informations18']; ?>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Address'); ?></td>
                <td>
                    <?php if (isset($dataIn['parent_informations19'])) { ?>
                        <?php echo $dataIn['parent_informations19']; ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if (isset($dataIn['parent_informations20'])) { ?>
                        <?php echo $dataIn['parent_informations20']; ?>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Mobile Number'); ?></td>
                <td>
                    <?php if (isset($dataIn['parent_informations21'])) { ?>
                        <?php echo $dataIn['parent_informations21']; ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if (isset($dataIn['parent_informations22'])) { ?>
                        <?php echo $dataIn['parent_informations22']; ?>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Email'); ?></td>
                <td>
                    <?php if (isset($dataIn['parent_informations23'])) { ?>
                        <?php echo $dataIn['parent_informations23']; ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if (isset($dataIn['parent_informations24'])) { ?>
                        <?php echo $dataIn['parent_informations24']; ?>
                    <?php } ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php if (isset($base_url)) { ?>
    <?php
    $id_uploads = [
        'father_id_front' => __('Father National ID/ Passport (Front)'),
        'father_id_back' => __('Father National ID/ Passport (Back)'),
        'mother_id_front' => __('Mother National ID/ Passport (Front)'),
        'mother_id_back' => __('Mother National ID/ Passport (Back)'),
        'father_national_id' => __('Father National ID/ Passport'),
        'mother_national_id' => __('Mother National ID/ Passport'),
    ];
    foreach ($id_uploads as $file_key => $file_label) {
        if (isset($dataIn['filesData'][$file_key]) && $dataIn['filesData'][$file_key] != '') { ?>
            <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
                <div class="leftDiv "><?php echo $file_label; ?></div>
                <div class="rightDiv ">
                    <?php $img_url = $base_url . '/' . $dataIn['filesData'][$file_key]; ?>
                    <a class="download_image" href="<?php echo $img_url; ?>" download><?php echo __('Download'); ?></a>
                    <img src="<?php echo $img_url; ?>"/>
                    &nbsp;
                </div>
            </div>
        <?php }
    }
} ?>
<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo __('Parental Marital Status'); ?></div>
    <div class="rightDiv ">
        <?php
        if (isset($dataIn['parental_marital_status'])) {
            echo $dataIn['parental_marital_status'];
        }
        ?>
        &nbsp;
    </div>
</div>
<?php if (isset($dataIn['parental_marital_status_details']) && $dataIn['parental_marital_status_details'] != '') { ?>
    <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
        <div class="leftDiv "><?php echo __('If divorced, custody with'); ?></div>
        <div class="rightDiv ">
            <?php echo $dataIn['parental_marital_status_details']; ?>
            <?php if (isset($dataIn['custody_other_details']) && $dataIn['custody_other_details'] != '') { ?>
                (<?php echo $dataIn['custody_other_details']; ?>)
            <?php } ?>
            &nbsp;
        </div>
    </div>
<?php } ?>
<?php if (isset($dataIn['is_step_parent']) && strtolower($dataIn['is_step_parent']) == 'yes') { ?>
    <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
        <div class="leftDiv "><?php echo __('Is there a step parent?'); ?></div>
        <div class="rightDiv ">
            <?php echo $dataIn['is_step_parent']; ?>
            &nbsp;
        </div>
    </div>
    <?php if (isset($dataIn['step_parent_name']) && $dataIn['step_parent_name'] != '') { ?>
        <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
            <div class="leftDiv "><?php echo __('Step Parent Name'); ?></div>
            <div class="rightDiv ">
                <?php echo $dataIn['step_parent_name']; ?>
                &nbsp;
            </div>
        </div>
    <?php } ?>
    <?php if (isset($dataIn['step_parent_address']) && $dataIn['step_parent_address'] != '') { ?>
        <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
            <div class="leftDiv "><?php echo __('Step Parent Address'); ?></div>
            <div class="rightDiv ">
                <?php echo $dataIn['step_parent_address']; ?>
                &nbsp;
            </div>
        </div>
    <?php } ?>
    <?php if (isset($dataIn['custodial_parent_name']) && $dataIn['custodial_parent_name'] != '') { ?>
        <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
            <div class="leftDiv "><?php echo __('Custodial Parent Name'); ?></div>
            <div class="rightDiv ">
                <?php echo $dataIn['custodial_parent_name']; ?>
                &nbsp;
            </div>
        </div>
    <?php } ?>
<?php } ?>
