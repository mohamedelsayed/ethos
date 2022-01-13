<div class="tab tabIn4">
    <div class="pupil_details-title head_div orange_head"><?php echo __('5. Developmental History') ?></div>
    <div class="additional_pupils_informations-table developmental_history_warp">
        <table border="1">
            <tr>
                <td class="td_center td_left"><?php echo ('Does your child have any of the following issues'); ?></td>
                <td class="td_center td_years_attended"><?php echo ('Yes'); ?></td>
                <td class="td_center td_year_group_form_grade"><?php echo ('No'); ?></td>
            </tr>
            <?php $i = 0; ?>
            <tr>
                <td class="td_center td_left"><?php echo ('Attention Deficit Disorder / Hyperactive'); ?></td>
                <td class="td_center ">
                    <input type="radio" name="developmental_history<?php echo $i; ?>" value="1" />
                </td>
                <td class="td_center">
                    <input type="radio" name="developmental_history<?php echo $i; ?>" value="0" <?php echo $checked; ?> />
                </td>
                <?php $i++; ?>
            </tr>
            <tr>
                <td class="td_center td_left"><?php echo ('Speech & Language Disorder'); ?></td>
                <td class="td_center ">
                    <input type="radio" name="developmental_history<?php echo $i; ?>" value="1" />
                </td>
                <td class="td_center">
                    <input type="radio" name="developmental_history<?php echo $i; ?>" value="0" <?php echo $checked; ?> />
                </td>
                <?php $i++; ?>
            </tr>
            <tr>
                <td class="td_center td_left"><?php echo ('Developmental Delay'); ?></td>
                <td class="td_center ">
                    <input type="radio" name="developmental_history<?php echo $i; ?>" value="1" />
                </td>
                <td class="td_center">
                    <input type="radio" name="developmental_history<?php echo $i; ?>" value="0" <?php echo $checked; ?> />
                </td>
                <?php $i++; ?>
            </tr>
            <tr>
                <td class="td_center td_left"><?php echo ('Behavioural Issues'); ?></td>
                <td class="td_center ">
                    <input type="radio" name="developmental_history<?php echo $i; ?>" value="1" />
                </td>
                <td class="td_center">
                    <input type="radio" name="developmental_history<?php echo $i; ?>" value="0" <?php echo $checked; ?> />
                </td>
                <?php $i++; ?>
            </tr>
            <tr>
                <td class="td_center td_left"><?php echo ('Has your child been diagnosed/ assessed for any learning disabilities / challenges'); ?></td>
                <td class="td_center ">
                    <input type="radio" name="developmental_history<?php echo $i; ?>" value="1" />
                </td>
                <td class="td_center">
                    <input type="radio" name="developmental_history<?php echo $i; ?>" value="0" <?php echo $checked; ?> />
                </td>
                <?php $i++; ?>
            </tr>
            <tr>
                <td colspan="3" class="td_left"><?php echo ('Other/s (please specify)'); ?>
                    <input style="width: 70%;" class="input_in_table" type="text" id="developmental_history<?php echo $i; ?>" name="developmental_history<?php echo $i; ?>" value="" placeholder="________________________________________________________________________________________________">)
                </td>
            </tr>
        </table>
    </div>
    <div class="input_new">
        <label for="recent_report"><?php echo __('Please upload the most recent report/assessment') ?>:</label>
        <span>
            <input id="recent_report" class="input3new admissions_input" type="file" name="recent_report" accept="<?php echo $files_extensions; ?>" />
        </span>
    </div>
    <div class="input_new">
        <label for="medical_history"><?php echo __('Medical History') ?>:</label>
        <span>
        <input type="text" class="input3new admissions_input required_input" id="medical_history" name="medical_history" />
        </span>
    </div>
    <div class="agree_out">
        <input id="i_agree" type="checkbox" name="i_agree" class="i_agree required_input" />
        <label class="i_agree_label" for="i_agree"><?php echo ('I confirm that the information provided is correct to the best of my knowledge. Failure to disclose relevant information may affect my child’s application.'); ?></label>
    </div>
</div>