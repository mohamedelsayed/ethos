<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="parent_informations-table">
        <table border="1">
            <tr>
                <td class="td_center"></td>
                <td class="td_center"><?php echo __('Emergency 1'); ?></td>
                <td class="td_center"><?php echo __('Emergency 2'); ?></td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Name'); ?></td>
                <td>
                    <?php if (isset($dataIn['emergency1'])) { ?>
                        <?php echo $dataIn['emergency1']; ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if (isset($dataIn['emergency2'])) { ?>
                        <?php echo $dataIn['emergency2']; ?>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Relationship to Pupil'); ?></td>
                <td>
                    <?php if (isset($dataIn['emergency3'])) { ?>
                        <?php echo $dataIn['emergency3']; ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if (isset($dataIn['emergency4'])) { ?>
                        <?php echo $dataIn['emergency4']; ?>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td class="td_left is_head"><?php echo __('Mobile Number'); ?></td>
                <td>
                    <?php if (isset($dataIn['emergency5'])) { ?>
                        <?php echo $dataIn['emergency5']; ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if (isset($dataIn['emergency6'])) { ?>
                        <?php echo $dataIn['emergency6']; ?>
                    <?php } ?>
                </td>
            </tr>
        </table>
    </div>
</div>