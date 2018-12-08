<div class="terms form">
<?php echo $this->Form->create('Term', array('type'=>'file'));?>
    <fieldset>
        <legend><?php __('Edit Term'); ?></legend>
	<?php
        echo $this->Form->input('id');
        echo $this->Form->input('title', array("label" => $titleLabel));
//        echo $this->Form->input('Term.body', array('class'=>'ckeditor'));
//		echo $this->element('backend/image_view', array('image'=>array('id'=>$this->data['Term']['id'], 'image'=>$this->data['Term']['image']), 'size'=>'master'));
//		echo $form->input('image', array('type'=>'file', 'label'=>'Image'));
                        echo $this->Form->input('weight');
		echo $this->Form->input('approved');
	?>
    </fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Term.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Term.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Terms', true), array('action' => 'index'));?></li>
    </ul>
</div>