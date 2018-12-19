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
if ($counter > 0) {
    ?>
    <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
        <div class="additional_pupils_informations-table">
            <table border="1">
                <tr>
                    <td class="td_center"><?php __('Name Of Previous School / Nursery'); ?></td>
                    <td class="td_center td_years_attended"><?php __('Years Attended'); ?></td>
                    <td class="td_center td_year_group_form_grade"><?php __('Year Group/ Form / Grade'); ?></td>
                    <td class="td_center"><?php __('Curriculum Followed (British, IB, American, National)'); ?></td>
                </tr>
                <?php
                $rows_count = 2;
                if ($counter > 0) {
                    $rows_count = ceil($counter / $column_count);
                }
                for ($i = 1; $i <= $rows_count; $i++) {
                    $required_input_class = '';
                    ?>
                    <tr>
                        <?php
                        for ($j = 1; $j <= $column_count; $j++) {
                            $key = $search . '' . $i . '_' . $j;
                            ?>
                            <?php if (isset($dataIn[$key])) { ?>
                                <td>
                                    <?php echo $dataIn[$key]; ?>
                                </td>
                            <?php } ?>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
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
    <div class="leftDiv "><?php echo __('Has the pupil ever skipped a year?'); ?></div>
    <div class="rightDiv ">
        <?php
        if (isset($dataIn['has_the_pupil_ever_skipped_year'])) {
            echo $dataIn['has_the_pupil_ever_skipped_year'];
        }
        ?>
        &nbsp;
    </div>
</div>
<?php if (isset($dataIn['has_the_pupil_ever_skipped_year_details']) && $dataIn['has_the_pupil_ever_skipped_year_details'] != '') { ?>
    <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
        <div class="leftDiv "><?php echo __('If yes, which year group, Please give details'); ?></div>
        <div class="rightDiv ">
            <?php echo $dataIn['has_the_pupil_ever_skipped_year_details']; ?>
            &nbsp;
        </div>
    </div>
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