<?php
//$base_url = $this->Session->read('Setting.url');
//$dataIn = [];
//if (isset($request['Request']['data'])) {
//    $dataIn = unserialize($request['Request']['data']);
//}
?>
<div class="terms form">
    <?php echo $this->Form->create('Request', array('type' => 'file', 'action' => 'changeStatus/' . $request['Request']['id'] . '/ 2')); ?>
    <fieldset>
        <legend><?php __('Resubmit'); ?></legend>
        <?php
        echo $this->Form->input('Request.child_photo', array('type' => 'checkbox', 'label' => 'Child’s recent photo (passport size)'));
        echo $this->Form->input('Request.child_birth_certificate', array('type' => 'checkbox', 'label' => 'Child’s birth certificate (electronic)'));
        echo $this->Form->input('Request.parents_ids', array('type' => 'checkbox', 'label' => 'Parents IDs'));
        echo $this->Form->input('Request.previous_school_report', array('type' => 'checkbox', 'label' => 'Most recent school report'));
        echo $this->Form->input('Request.additional_information', array('type' => 'textarea'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Return to application', true), array('action' => 'view', $request['Request']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Requests', true), array('action' => 'index')); ?> </li>
    </ul>
</div>