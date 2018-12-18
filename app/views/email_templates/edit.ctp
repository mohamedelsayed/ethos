<div class="emailTemplates form">
    <?php echo $this->Form->create('EmailTemplate', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Edit EmailTemplate'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('title', array("label" => $titleLabel, 'required' => 'required'));
        echo $this->Form->input('EmailTemplate.body', array('class' => 'ckeditor', 'required' => 'required'));
//        echo $this->Form->input('body');
        echo $this->Form->input('identifier', ['type' => 'hidden', 'required' => 'required']);
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <?php /* <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('EmailTemplate.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('EmailTemplate.id'))); ?></li> */ ?>
        <li><?php echo $this->Html->link(__('List Email Templates', true), array('action' => 'index')); ?></li>
    </ul>
</div>