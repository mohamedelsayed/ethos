<div class="yearGroups form">
    <?php echo $this->Form->create('YearGroup', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Edit Year Group'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('title', array("label" => $titleLabel, 'required' => 'required'));
//        echo $this->Form->input('YearGroup.body', array('class'=>'ckeditor'));
//		echo $this->element('backend/image_view', array('image'=>array('id'=>$this->data['YearGroup']['id'], 'image'=>$this->data['YearGroup']['image']), 'size'=>'master'));
//		echo $form->input('image', array('type'=>'file', 'label'=>'Image'));
        echo $this->Form->input('weight', ['type' => 'number']);
        echo $this->Form->input('applying_to');
        echo $this->Form->input('current');
        echo $this->Form->input('approved');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('YearGroup.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('YearGroup.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Year Groups', true), array('action' => 'index')); ?></li>
    </ul>
</div>