<?php

$checked = ' checked="checked" ';?>
<div class="tab tabIn4">
    <div class="pupil_details-title head_div orange_head"><?php echo __('5. Developmental History') ?></div>
    <div class="additional_pupils_informations-table">
        <table border="1">
            <tr>
                <td class="td_center td_left"><?php echo ('Does your child have any of the following issues');?></td>
                <td class="td_center td_years_attended"><?php echo ('Yes');?></td>
                <td class="td_center td_year_group_form_grade"><?php echo ('No');?></td>
            </tr>
            <?php $i = 0; ?>
            <tr>
                <td class="td_center td_left"><?php echo ('Attention Deficit Disorder / Hyperactive');?></td>
                <td class="td_center ">
                    <input type="radio" name="developmental_history<?php echo $i; ?>" value="1" />
                </td>
                <td class="td_center">
                    <input type="radio" name="developmental_history<?php echo $i; ?>" value="0" <?php echo $checked ;?> />
                </td>
                <?php $i++; ?>
            </tr>
            <tr>
                <td class="td_center td_left"><?php echo ('Speech & Language Disorder');?></td>
                <td class="td_center ">
                    <input type="radio" name="developmental_history<?php echo $i; ?>" value="1" />
                </td>
                <td class="td_center">
                    <input type="radio" name="developmental_history<?php echo $i; ?>" value="0" <?php echo $checked ;?> />
                </td>
                <?php $i++; ?>
            </tr>
            <tr>
                <td class="td_center td_left"><?php echo ('Developmental Delay');?></td>
                <td class="td_center ">
                    <input type="radio" name="developmental_history<?php echo $i; ?>" value="1" />
                </td>
                <td class="td_center">
                    <input type="radio" name="developmental_history<?php echo $i; ?>" value="0" <?php echo $checked ;?> />
                </td>
                <?php $i++; ?>
            </tr>
            <tr>
                <td class="td_center td_left"><?php echo ('Behavioural Issues');?></td>
                <td class="td_center ">
                    <input type="radio" name="developmental_history<?php echo $i; ?>" value="1" />
                </td>
                <td class="td_center">
                    <input type="radio" name="developmental_history<?php echo $i; ?>" value="0" <?php echo $checked ;?> />
                </td>
                <?php $i++; ?>
            </tr>
            <tr>
                <td class="td_center td_left"><?php echo ('Has your child been diagnosed/ assessed for any learning disabilities / challenges');?></td>
                <td class="td_center ">
                    <input type="radio" name="developmental_history<?php echo $i; ?>" value="1" />
                </td>
                <td class="td_center">
                    <input type="radio" name="developmental_history<?php echo $i; ?>" value="0" <?php echo $checked ;?> />
                </td>
                <?php $i++; ?>
            </tr>
            <tr>
                <td colspan="3" class="td_left"><?php echo ('Other/s (please specify)');?>
                    <input style="width: 70%;" class="input_in_table" type="text" name="developmental_history<?php echo $i; ?>" value="" placeholder="________________________________________________________________________________________________">)
                </td>
            </tr>
        </table>
    </div>
    <div class="agree_out">
    <?php /* <input type="hidden" name="date" value="<?php echo date('d-m-Y');?>" /> */ ?>
        <input id="i_agree" type="checkbox" name="i_agree" class="required_input" /><?php echo ('I confirm that the information provided is correct to the best of my knowledge. Failure to disclose relevant information my affect my child’s application.');?>
    </div>
    <div class="ajax_result_admissions">
        <div id="admissions_ajaxLoading"></div>
        <div id="admissions_result"></div>
    </div>
</div>