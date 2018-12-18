<div class="yearGroups form">
    <?php echo $this->Form->create('YearGroup', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Add Year Group'); ?></legend>
        <?php
        echo $this->Form->input('title', array("label" => $titleLabel, 'required' => 'required'));
//		echo $this->Form->input('YearGroup.body', array('class'=>'ckeditor'));
//  		echo $form->input('image', array('type'=>'file', 'label'=>'Image'));
        echo $this->Form->input('weight', array('default' => 0, 'type' => 'number'));
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
        <li><?php echo $this->Html->link(__('List Year Groups', true), array('action' => 'index')); ?></li>
    </ul>
</div>