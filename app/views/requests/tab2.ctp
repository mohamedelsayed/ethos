<?php
$has_new_fields = isset($dataIn['prev_school_name_1']);
$has_old_fields = isset($dataIn['previous_schools_nursery_1_1']);
?>
<?php if ($has_new_fields) { ?>
    <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
        <div class="additional_pupils_informations-table">
            <table border="1">
                <tr>
                    <td class="td_center"><?php echo __('Year from'); ?></td>
                    <td class="td_center"><?php echo __('Year to'); ?></td>
                    <td class="td_center"><?php echo __('Name Of Previous School / Nursery'); ?></td>
                    <td class="td_center"><?php echo __('Curriculum Followed'); ?></td>
                    <td class="td_center"><?php echo __('Country'); ?></td>
                    <td class="td_center"><?php echo __('Reason for leaving'); ?></td>
                </tr>
                <?php for ($r = 1; $r <= 15; $r++) {
                    $name = isset($dataIn['prev_school_name_' . $r]) ? trim($dataIn['prev_school_name_' . $r]) : '';
                    if ($name == '') continue;
                ?>
                    <tr>
                        <td><?php echo isset($dataIn['prev_school_year_from_' . $r]) ? $dataIn['prev_school_year_from_' . $r] : ''; ?></td>
                        <td><?php echo isset($dataIn['prev_school_year_to_' . $r]) ? $dataIn['prev_school_year_to_' . $r] : ''; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo isset($dataIn['prev_school_curriculum_' . $r]) ? $dataIn['prev_school_curriculum_' . $r] : ''; ?></td>
                        <td><?php echo isset($dataIn['prev_school_country_' . $r]) ? $dataIn['prev_school_country_' . $r] : ''; ?></td>
                        <td><?php echo isset($dataIn['prev_school_reason_' . $r]) ? $dataIn['prev_school_reason_' . $r] : ''; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
<?php } elseif ($has_old_fields) { ?>
    <?php
    $search = "previous_schools_nursery_";
    $counter = 0;
    foreach ($dataIn as $key => $value) {
        if (strstr($key, $search)) {
            if (trim($value) != '') {
                $counter = $counter + 1;
            }
        }
    }
    $column_count = 4;
    if ($counter > 0) { ?>
        <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
            <div class="additional_pupils_informations-table">
                <table border="1">
                    <tr>
                        <td class="td_center"><?php echo __('Name Of Previous School / Nursery'); ?></td>
                        <td class="td_center"><?php echo __('Years Attended'); ?></td>
                        <td class="td_center"><?php echo __('Year Group/ Form / Grade'); ?></td>
                        <td class="td_center"><?php echo __('Curriculum Followed'); ?></td>
                    </tr>
                    <?php
                    $rows_count = ceil($counter / $column_count);
                    for ($ri = 1; $ri <= $rows_count; $ri++) { ?>
                        <tr>
                            <?php for ($j = 1; $j <= $column_count; $j++) {
                                $key = $search . $ri . '_' . $j;
                            ?>
                                <?php if (isset($dataIn[$key])) { ?>
                                    <td><?php echo $dataIn[$key]; ?></td>
                                <?php } ?>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    <?php } ?>
<?php } ?>
<?php if (isset($base_url)) { ?>
    <?php if (isset($dataIn['filesData']['previous_school_report']) && $dataIn['filesData']['previous_school_report'] != '') { ?>
        <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
            <div class="leftDiv "><?php echo __('Previous school report'); ?></div>
            <div class="rightDiv ">
                <?php $img_url = $base_url . '/' . $dataIn['filesData']['previous_school_report']; ?>
                <a class="download_image" href="<?php echo $img_url; ?>" download><?php echo __('Download'); ?></a>
                <img src="<?php echo $img_url; ?>"/>
                &nbsp;
            </div>
        </div>
    <?php } ?>
<?php } ?>
<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo __('Has the pupil ever been asked to repeat a year?'); ?></div>
    <div class="rightDiv ">
        <?php
        if (isset($dataIn['has_the_pupil_ever_been_asked_to_repeat_year'])) {
            echo $dataIn['has_the_pupil_ever_been_asked_to_repeat_year'];
        }
        ?>
        &nbsp;
    </div>
</div>
<?php if (isset($dataIn['has_the_pupil_ever_been_asked_to_repeat_year_details']) && $dataIn['has_the_pupil_ever_been_asked_to_repeat_year_details'] != '') { ?>
    <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
        <div class="leftDiv "><?php echo __('If yes, which year group, Please give details'); ?></div>
        <div class="rightDiv ">
            <?php echo $dataIn['has_the_pupil_ever_been_asked_to_repeat_year_details']; ?>
            &nbsp;
        </div>
    </div>
<?php } ?>
<?php if (isset($base_url) && isset($dataIn['filesData']['school_reference_letter']) && $dataIn['filesData']['school_reference_letter'] != '') { ?>
    <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
        <div class="leftDiv "><?php echo __('School Reference Letter'); ?></div>
        <div class="rightDiv ">
            <?php $img_url = $base_url . '/' . $dataIn['filesData']['school_reference_letter']; ?>
            <a class="download_image" href="<?php echo $img_url; ?>" download><?php echo __('Download'); ?></a>
            &nbsp;
        </div>
    </div>
<?php } ?>
<?php if (isset($dataIn['school_reference_name']) && $dataIn['school_reference_name'] != '') { ?>
    <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
        <div class="leftDiv "><?php echo __('School Reference Name'); ?></div>
        <div class="rightDiv ">
            <?php echo $dataIn['school_reference_name']; ?>
            &nbsp;
        </div>
    </div>
<?php } ?>
<?php if (isset($dataIn['school_reference_email']) && $dataIn['school_reference_email'] != '') { ?>
    <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
        <div class="leftDiv "><?php echo __('School Reference Email'); ?></div>
        <div class="rightDiv ">
            <?php echo $dataIn['school_reference_email']; ?>
            &nbsp;
        </div>
    </div>
<?php } ?>
<?php if (isset($dataIn['school_reference_phone']) && $dataIn['school_reference_phone'] != '') { ?>
    <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
        <div class="leftDiv "><?php echo __('School Reference Phone Number'); ?></div>
        <div class="rightDiv ">
            <?php echo $dataIn['school_reference_phone']; ?>
            &nbsp;
        </div>
    </div>
<?php } ?>
