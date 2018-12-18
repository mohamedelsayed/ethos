<div class="emailTemplates form">
    <?php echo $this->Form->create('EmailTemplate', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Add EmailTemplate'); ?></legend>
        <?php
        echo $this->Form->input('title', array("label" => $titleLabel, 'required' => 'required'));
        echo $this->Form->input('EmailTemplate.body', array('class' => 'ckeditor', 'required' => 'required'));
//        echo $this->Form->input('body');
        echo $this->Form->input('identifier', ['required' => 'required']);
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Email Templates', true), array('action' => 'index')); ?></li>
    </ul>
</div>