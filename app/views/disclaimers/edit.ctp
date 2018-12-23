<div class="disclaimers form">
    <?php echo $this->Form->create('Disclaimer', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Edit Disclaimer'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('title', ['required' => 'required']);
        echo $this->Form->input('Disclaimer.body', array('class' => 'ckeditor'));
//        echo $this->Form->input('start_date', ['required' => 'required']);
//        echo $this->Form->input('end_date', ['required' => 'required']);
//        echo $this->Form->input('url', ['required' => 'required']);
//        echo $this->Form->input('approved');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<?php
/* <div class="actions">
  <h3><?php __('Actions'); ?></h3>
  <ul>
  <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Disclaimer.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Disclaimer.id'))); ?></li>
  <li><?php echo $this->Html->link(__('List Disclaimers', true), array('action' => 'index')); ?></li>
  </ul>
  </div> */?>