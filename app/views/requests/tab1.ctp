<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo $titleLabel; ?>:</div>
    <div class="rightDiv ">
        <?php echo $request['Request']['title']; ?>
        &nbsp;
    </div>
</div>
<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo __('Child’s ID number'); ?>:</div>
    <div class="rightDiv ">
        <?php if (isset($dataIn['child_id_number'])) {
            echo $dataIn['child_id_number'];
        } ?>
        &nbsp;
    </div>
</div>
<?php if (isset($base_url)) { ?>
    <?php if (isset($dataIn['filesData']['child_photo']) && $dataIn['filesData']['child_photo'] != '') { ?>
        <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
            <div class="leftDiv "><?php echo __('Child’s Photo'); ?>:</div>
            <div class="rightDiv ">
                <?php
                $img_url = $base_url . '/' . $dataIn['filesData']['child_photo'];
                ?>
                <a class="download_image" href="<?php echo $img_url; ?>" download><?php echo __('Download'); ?></a>
                <img src="<?php echo $img_url; ?>" />
                &nbsp;
            </div>
        </div>
    <?php } ?>
<?php } ?>
<?php if (isset($base_url)) { ?>
    <?php if (isset($dataIn['filesData']['child_birth_certificate']) && $dataIn['filesData']['child_birth_certificate'] != '') { ?>
        <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
            <div class="leftDiv "><?php echo __('Child’s birth certificate (electronic)'); ?>:</div>
            <div class="rightDiv ">
                <?php
                $img_url = $base_url . '/' . $dataIn['filesData']['child_birth_certificate'];
                ?>
                <a class="download_image" href="<?php echo $img_url; ?>" download><?php echo __('Download'); ?></a>
                <img src="<?php echo $img_url; ?>" />
                &nbsp;
            </div>
        </div>
    <?php } ?>
<?php } ?>
<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo __('Date of Birth'); ?>:</div>
    <div class="rightDiv ">
        <?php
        if (isset($dataIn['birth_date'])) {
            echo $dataIn['birth_date'];
        }
        ?>
        &nbsp;
    </div>
</div>
<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo __('Academic Year Entry'); ?>:</div>
    <div class="rightDiv ">
        <?php
        if (isset($dataIn['academic_year_entry_input'])) {
            if (isset($terms[$dataIn['academic_year_entry_input']])) {
                echo $terms[$dataIn['academic_year_entry_input']];
            }
        }
        ?>
        &nbsp;
    </div>
</div>
<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo __('Year Group Applying to'); ?>:</div>
    <div class="rightDiv ">
        <?php
        if (isset($dataIn['year_group_applying_to_input'])) {
            if (isset($yearGroups[$dataIn['year_group_applying_to_input']])) {
                echo $yearGroups[$dataIn['year_group_applying_to_input']];
            }
        }
        ?>
        &nbsp;
    </div>
</div>
<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo __('Current Year Group / Grade'); ?>:</div>
    <div class="rightDiv ">
        <?php
        if (isset($dataIn['current_year_group_input'])) {
            if (isset($yearGroups[$dataIn['current_year_group_input']])) {
                echo $yearGroups[$dataIn['current_year_group_input']];
            }
        }
        ?>
        &nbsp;
    </div>
</div>
<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo __('Gender'); ?>:</div>
    <div class="rightDiv ">
        <?php
        if (isset($dataIn['gender_input'])) {
            echo $dataIn['gender_input'];
        }
        ?>
        &nbsp;
    </div>
</div>
<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo __('Nationality'); ?>:</div>
    <div class="rightDiv ">
        <?php
        if (isset($dataIn['nationality'])) {
            echo $dataIn['nationality'];
        }
        ?>
        &nbsp;
    </div>
</div>
<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo __('Religion'); ?>:</div>
    <div class="rightDiv ">
        <?php
        if (isset($dataIn['religion'])) {
            echo $dataIn['religion'];
        }
        ?>
        &nbsp;
    </div>
</div>
<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo __('Language Spoken At Home'); ?>:</div>
    <div class="rightDiv">
        <?php
        if (isset($dataIn['language'])) {
            echo $dataIn['language'];
        }
        ?>
        &nbsp;
    </div>
</div>
<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo __('Will the pupil require bus transportation?'); ?>:</div>
    <div class="rightDiv ">
        <?php
        if (isset($dataIn['require_bus'])) {
            echo $dataIn['require_bus'];
        }
        ?>
        &nbsp;
    </div>
</div>
<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo __('Will the pupil be exempted from the Egyptian Ministry exams?'); ?></div>
    <div class="rightDiv ">
        <?php
        if (isset($dataIn['egyptian_ministry_exams'])) {
            echo $dataIn['egyptian_ministry_exams'];
        }
        ?>
        &nbsp;
    </div>
</div>
<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo __('Does the Applicant have any sibling/s at EIS?'); ?></div>
    <div class="rightDiv ">
        <?php
        if (isset($dataIn['have_any_sibling_at_EIS'])) {
            echo $haveAnySibling[$dataIn['have_any_sibling_at_EIS']];
        }
        ?>
        &nbsp;
    </div>
</div>
<?php if (isset($dataIn['have_any_sibling_at_EIS_pupil']) && $dataIn['have_any_sibling_at_EIS_pupil'] != '') { ?>
    <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
        <div class="leftDiv "><?php echo __('If yes please write his/her name and year group'); ?></div>
        <div class="rightDiv ">
            <?php echo $dataIn['have_any_sibling_at_EIS_pupil']; ?>
            &nbsp;
        </div>
    </div>
<?php } ?>
<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo __('Does the Applicant have any sibling/s at Rukan Nursery and Preschool?'); ?></div>
    <div class="rightDiv ">
        <?php
        if (isset($dataIn['have_any_sibling_at_rukan'])) {
            echo $haveAnySibling[$dataIn['have_any_sibling_at_rukan']];
        }
        ?>
        &nbsp;
    </div>
</div>
<?php if (isset($dataIn['have_any_sibling_at_rukan_pupil']) && $dataIn['have_any_sibling_at_rukan_pupil'] != '') { ?>
    <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
        <div class="leftDiv "><?php echo __('If yes please write his/her name and year group'); ?></div>
        <div class="rightDiv ">
            <?php echo $dataIn['have_any_sibling_at_rukan_pupil']; ?>
            &nbsp;
        </div>
    </div>
<?php } ?>
<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo __('Are you applying for any siblings?'); ?></div>
    <div class="rightDiv ">
        <?php
        if (isset($dataIn['are_you_applying_for_any_siblings'])) {
            echo $dataIn['are_you_applying_for_any_siblings'];
        }
        ?>
        &nbsp;
    </div>
</div>
<?php if (isset($dataIn['are_you_applying_for_any_siblings_details']) && $dataIn['are_you_applying_for_any_siblings_details'] != '') { ?>
    <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
        <div class="leftDiv "><?php echo __('If yes, please give details'); ?></div>
        <div class="rightDiv ">
            <?php echo $dataIn['are_you_applying_for_any_siblings_details']; ?>
            &nbsp;
        </div>
    </div>
<?php } ?>