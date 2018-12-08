<?php
$tabsCount = 5;
echo $this->Html->css(array('front/jquery-ui', 'front/admissions'));
echo $this->Javascript->link(array('front/jquery-ui'));
$yes_no_options = array('Yes', 'No');
$image_extensions = '.jpeg,.png,.gif,.jpg';
$selected = 'selected="selected"';
$gender_options = array('Male', 'Female');
$parental_marital_status_options = array('Married', 'Divorced', 'Separated', 'Widowed');
echo $this->Form->create('admissions', array('type' => 'file', 'id' => 'admissionsform', 'class' => 'admissions', 'url' => $base_url . '/page/admissionsform/notajax'));
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
    'selected' => $selected,
]);
?>
<div style="width:100%;float:left;">
    <div style="text-align:center;margin-top:20px;">
        <?php for ($i = 1; $i <= 5; $i++) { ?>
            <span class="step"></span>
        <?php } ?>
    </div>
</div>
<div style="width:100%;float:left;">
    <button style="float:left;" class='btn_form_admissions' type="button" id="prevBtn" onclick="nextPrev(-1)"><?php echo __('Previous'); ?></button>
    <button class='btn_form_admissions' type="button" id="nextBtn" onclick="nextPrev(1)"><?php echo __('Next'); ?></button>
</div>
<?php
echo $this->Form->end();
echo $this->Javascript->link(array('front/admissions'));
