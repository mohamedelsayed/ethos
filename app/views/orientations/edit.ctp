<div class="orientations form">
    <?php echo $this->Form->create('Orientation', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Edit Orientation'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('title', ['required' => 'required']);
        echo $this->Form->input('Orientation.body', array('class' => 'ckeditor'));
        echo $this->Form->input('start_date', ['required' => 'required']);
        echo $this->Form->input('end_date', ['required' => 'required']);
        echo $this->Form->input('url'
                //,['required' => 'required']
        );
        echo $this->Form->input('approved');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<?php
/* <div class="actions">
  <h3><?php __('Actions'); ?></h3>
  <ul>
  <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Orientation.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Orientation.id'))); ?></li>
  <li><?php echo $this->Html->link(__('List Orientations', true), array('action' => 'index')); ?></li>
  </ul>
  </div> */?>