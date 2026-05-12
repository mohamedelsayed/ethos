<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo __('Child\'s Name (EN)'); ?>:</div>
    <div class="rightDiv ">
        <?php
        if (isset($dataIn['first_name_en'])) {
            echo $dataIn['first_name_en'] . ' ' . $dataIn['middle_name_en'] . ' ' . $dataIn['last_name_en'];
        } else {
            echo $request['Request']['title'];
        }
        ?>
        &nbsp;
    </div>
</div>
<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo __('Child\'s Name (AR)'); ?>:</div>
    <div class="rightDiv " dir="rtl">
        <?php
        if (isset($dataIn['first_name_ar'])) {
            echo $dataIn['first_name_ar'] . ' ' . $dataIn['middle_name_ar'] . ' ' . $dataIn['last_name_ar'];
        }
        ?>
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
            if ($dataIn['religion'] == 'Other' && isset($dataIn['religion_other']) && $dataIn['religion_other'] != '') {
                echo ' (' . $dataIn['religion_other'] . ')';
            }
        }
        ?>
        &nbsp;
    </div>
</div>
<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo __('Language/s Spoken At Home'); ?>:</div>
    <div class="rightDiv">
        <?php
        if (isset($dataIn['language'])) {
            if (is_array($dataIn['language'])) {
                echo implode(', ', $dataIn['language']);
            } else {
                echo $dataIn['language'];
            }
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
    <div class="leftDiv "><?php echo __('Will the pupil be eligible for exemption from the Egyptian Ministry exams?'); ?></div>
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
    <div class="leftDiv "><?php echo __('How did you hear about us?'); ?></div>
    <div class="rightDiv ">
        <?php
        $how_did_you_hear_about_us = $GLOBALS['how_did_you_hear_about_us'];
        if (isset($dataIn['how_did_you_hear_about_us'])) {
            echo $how_did_you_hear_about_us[$dataIn['how_did_you_hear_about_us']];
        }
        ?>
        &nbsp;
    </div>
</div>
<?php if (isset($dataIn['how_did_you_hear_about_us_other']) && $dataIn['how_did_you_hear_about_us_other'] != '') { ?>
    <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
        <div class="leftDiv "><?php echo __('If other, please specify'); ?></div>
        <div class="rightDiv ">
            <?php echo $dataIn['how_did_you_hear_about_us_other']; ?>
            &nbsp;
        </div>
    </div>
<?php } ?>
<?php if (isset($dataIn['reason_for_applying']) && $dataIn['reason_for_applying'] != '') { ?>
<div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
    <div class="leftDiv "><?php echo __('Reason for applying'); ?>:</div>
    <div class="rightDiv ">
        <textarea readonly rows="3" style="width:100%; border:none; background:transparent; resize:none; font-size:inherit; font-family:inherit;"><?php echo htmlspecialchars($dataIn['reason_for_applying']); ?></textarea>
    </div>
</div>
<?php } ?>