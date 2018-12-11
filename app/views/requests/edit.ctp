<div class="requests form">
    <?php echo $this->Form->create('Request', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Edit Request'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('title', array("label" => $titleLabel));
//        echo $this->Form->input('Request.body', array('class'=>'ckeditor'));
//		echo $this->element('backend/image_view', array('image'=>array('id'=>$this->data['Request']['id'], 'image'=>$this->data['Request']['image']), 'size'=>'master'));
//		echo $form->input('image', array('type'=>'file', 'label'=>'Image'));
        echo $this->Form->input('weight');
        echo $this->Form->input('approved');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Request.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Request.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Requests', true), array('action' => 'index')); ?></li>
    </ul>
</div>