<div class="disclaimers form">
    <?php echo $this->Form->create('Disclaimer', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Add Disclaimer'); ?></legend>
        <?php
        echo $this->Form->input('title', array("label" => 'Title', 'required' => 'required'));
        echo $this->Form->input('Disclaimer.body', array('class' => 'ckeditor'));
//        echo $this->Form->input('start_date');
//        echo $this->Form->input('end_date');
//        echo $this->Form->input('url');
//        echo $this->Form->input('approved');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<?php
/* <div class="actions">
  <h3><?php __('Actions'); ?></h3>
  <ul>
  <li><?php echo $this->Html->link(__('List Disclaimers', true), array('action' => 'index')); ?></li>
  </ul>
  </div> */?>