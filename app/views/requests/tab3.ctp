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
                <td class="td_left is_head"><?php echo __('Qualifications'); ?></td>
                <td>
                    <?php if (isset($dataIn['parent_informations7'])) { ?>
                        <?php echo $dataIn['parent_informations7']; ?>
                    <?php } ?>

                </td>
                <td>
                    <?php if (isset($dataIn['parent_informations8'])) { ?>
                        <?php echo $dataIn['parent_informations8']; ?>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('University'); ?></td>
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
                <td class="td_left is_head"><?php echo __('School'); ?></td>
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
    <?php if (isset($dataIn['filesData']['father_national_id']) && $dataIn['filesData']['father_national_id'] != '') { ?>
        <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
            <div class="leftDiv "><?php echo __('Father National ID/ Passport'); ?></div>
            <div class="rightDiv ">
                <?php $img_url = $base_url . '/' . $dataIn['filesData']['father_national_id']; ?>
                <a class="download_image" href="<?php echo $img_url; ?>" download><?php echo __('Download'); ?></a>
                <img src="<?php echo $img_url; ?>"/>
                &nbsp;
            </div>
        </div>
    <?php } ?>
<?php } ?>
<?php if (isset($base_url)) { ?>
    <?php if (isset($dataIn['filesData']['mother_national_id']) && $dataIn['filesData']['mother_national_id'] != '') { ?>
        <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
            <div class="leftDiv "><?php echo __('Mother National ID/ Passport'); ?></div>
            <div class="rightDiv ">
                <?php $img_url = $base_url . '/' . $dataIn['filesData']['mother_national_id']; ?>
                <a class="download_image" href="<?php echo $img_url; ?>" download><?php echo __('Download'); ?></a>
                <img src="<?php echo $img_url; ?>"/>
                &nbsp;
            </div>
        </div>
    <?php } ?>
<?php } ?>
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
            &nbsp;
        </div>
    </div>
<?php } ?>