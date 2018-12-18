<div class="terms form">
    <?php echo $this->Form->create('Term', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Add Term'); ?></legend>
        <?php
        echo $this->Form->input('title', array("label" => $titleLabel, 'required' => 'required'));
//		echo $this->Form->input('Term.body', array('class'=>'ckeditor'));
//  		echo $form->input('image', array('type'=>'file', 'label'=>'Image'));
        echo $this->Form->input('weight', array('default' => 0, 'type' => 'number'));
        echo $this->Form->input('approved');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Terms', true), array('action' => 'index')); ?></li>
    </ul>
</div>