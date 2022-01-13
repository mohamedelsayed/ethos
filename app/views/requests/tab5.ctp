<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="additional_pupils_informations-table">
        <table border="1">
            <tr>
                <td class="td_center td_left"><?php echo ('Does your child have any of the following issues'); ?></td>
                <td class="td_center td_years_attended"><?php echo ('Yes / No'); ?></td>
            </tr>
            <?php $i = 0; ?>
            <tr>
                <td class="td_center td_left"><?php echo ('Attention Deficit Disorder / Hyperactive'); ?></td>
                <td class="td_center ">
                    <?php if (isset($dataIn['developmental_history' . $i]) && $dataIn['developmental_history' . $i] == 1) { ?>
                        <?php __('Yes'); ?>
                    <?php } else { ?>
                        <?php __('No'); ?>
                    <?php } ?>
                </td>
                <?php $i++; ?>
            </tr>
            <tr>
                <td class="td_center td_left"><?php echo ('Speech & Language Disorder'); ?></td>
                <td class="td_center ">
                    <?php if (isset($dataIn['developmental_history' . $i]) && $dataIn['developmental_history' . $i] == 1) { ?>
                        <?php __('Yes'); ?>
                    <?php } else { ?>
                        <?php __('No'); ?>
                    <?php } ?>
                </td>
                <?php $i++; ?>
            </tr>
            <tr>
                <td class="td_center td_left"><?php echo ('Developmental Delay'); ?></td>
                <td class="td_center ">
                    <?php if (isset($dataIn['developmental_history' . $i]) && $dataIn['developmental_history' . $i] == 1) { ?>
                        <?php __('Yes'); ?>
                    <?php } else { ?>
                        <?php __('No'); ?>
                    <?php } ?>
                </td>
                <?php $i++; ?>
            </tr>
            <tr>
                <td class="td_center td_left"><?php echo ('Behavioural Issues'); ?></td>
                <td class="td_center ">
                    <?php if (isset($dataIn['developmental_history' . $i]) && $dataIn['developmental_history' . $i] == 1) { ?>
                        <?php __('Yes'); ?>
                    <?php } else { ?>
                        <?php __('No'); ?>
                    <?php } ?>
                </td>
                <?php $i++; ?>
            </tr>
            <tr>
                <td class="td_center td_left"><?php echo ('Has your child been diagnosed/ assessed for any learning disabilities / challenges'); ?></td>
                <td class="td_center ">
                    <?php if (isset($dataIn['developmental_history' . $i]) && $dataIn['developmental_history' . $i] == 1) { ?>
                        <?php __('Yes'); ?>
                    <?php } else { ?>
                        <?php __('No'); ?>
                    <?php } ?>
                </td>
                <?php $i++; ?>
            </tr>
            <tr>
                <td colspan="3" class="td_left"><?php echo ('Other/s (please specify)'); ?>: &nbsp;&nbsp;&nbsp;&nbsp;
                    <?php if (isset($dataIn['developmental_history' . $i])) { ?>
                        <?php echo $dataIn['developmental_history' . $i]; ?>
                    <?php } ?>
                </td>
            </tr>
        </table>
    </div>
    <?php if (isset($base_url)) { ?>
        <?php if (isset($dataIn['filesData']['recent_report']) && $dataIn['filesData']['recent_report'] != '') { ?>
            <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
                <div class="leftDiv "><?php echo __('Please upload the most recent report/assessment'); ?>:</div>
                <div class="rightDiv ">
                    <?php
                    $img_url = $base_url . '/' . $dataIn['filesData']['recent_report'];
                    ?>
                    <a class="download_image" href="<?php echo $img_url; ?>" download><?php echo __('Download'); ?></a>
                    &nbsp;
                </div>
            </div>
        <?php } ?>
    <?php } ?>
    <?php if (isset($base_url)) { ?>
        <?php if (isset($dataIn['filesData']['medical_history']) && $dataIn['filesData']['medical_history'] != '') { ?>
            <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
                <div class="leftDiv "><?php echo __('Medical History'); ?>:</div>
                <div class="rightDiv ">
                    <?php
                    $img_url = $base_url . '/' . $dataIn['filesData']['medical_history'];
                    ?>
                    <a class="download_image" href="<?php echo $img_url; ?>" download><?php echo __('Download'); ?></a>
                    &nbsp;
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>