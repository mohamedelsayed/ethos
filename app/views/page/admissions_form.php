<?php
if (isset($disclaimer)) {
    echo $this->element('front' . DS . 'disclaimer', array('disclaimer' => $disclaimer));
}
$tabsCount = 5;
echo $this->Html->css(array('front/jquery-ui', 'front/admissions'));
echo $this->Javascript->link(array('front/jquery-ui'));
$yes_no_options = array('Yes', 'No');
$image_extensions = '.jpeg,.png,.gif,.jpg';
$files_extensions = $image_extensions.',.pdf,.doc,.docx';
$selected = ' selected="selected" ';
$checked = ' checked="checked" ';
$gender_options = array('Male', 'Female');
$parental_marital_status_options = array('Married', 'Divorced', 'Separated', 'Widowed');
echo $this->Form->create('admissions', array('type' => 'file', 'id' => 'admissionsform', 'class' => 'admissions paddingAll', 'url' => $base_url . '/page/admissionsform/notajax'));
echo $this->element('front' . DS . 'admissions_tabs' . DS . 'tab1', [
    'terms' => $terms,
    'yearGroups' => $yearGroups,
    'gender_options' => $gender_options,
    'yes_no_options' => $yes_no_options,
    'image_extensions' => $image_extensions,
    'selected' => $selected,
]);
echo $this->element('front' . DS . 'admissions_tabs' . DS . 'tab2', [
    'yes_no_options' => $yes_no_options,
    'image_extensions' => $image_extensions,
    'selected' => $selected,
]);
echo $this->element('front' . DS . 'admissions_tabs' . DS . 'tab3', [
    'yes_no_options' => $yes_no_options,
    'image_extensions' => $image_extensions,
    'selected' => $selected,
    'parental_marital_status_options' => $parental_marital_status_options,
]);
echo $this->element('front' . DS . 'admissions_tabs' . DS . 'tab4', [
    'yes_no_options' => $yes_no_options,
    'image_extensions' => $image_extensions,
    'selected' => $selected,
]);
echo $this->element('front' . DS . 'admissions_tabs' . DS . 'tab5', [
    'yes_no_options' => $yes_no_options,
    'image_extensions' => $image_extensions,
    'files_extensions' => $files_extensions,
    'selected' => $selected,
    'checked' => $checked,
]);
?>
<div class="containerSteps">
    <button class='btn_form_admissions' type="button" id="prevBtn" onclick="nextPrev(-1)"><?php echo __('Previous'); ?></button>
    <ul>
        <?php for ($i = 1; $i <= 5; $i++) { ?>
            <span class="step"><?php echo $i ?></span>
        <?php } ?>
    </ul>
    <button class='btn_form_admissions' type="button" id="nextBtn" onclick="nextPrev(1)"><?php echo __('Next'); ?></button>
</div>
<div class="ajax_result_admissions">
    <div id="admissions_ajaxLoading"></div>
    <div id="admissions_result"></div>
</div>
<!-- <div style="width:100%;float:left;">
</div> -->
<?php
echo $this->Form->end();
echo $this->Javascript->link(array('front/admissions'));
