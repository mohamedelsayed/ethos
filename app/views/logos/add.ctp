<div class="logos form">
    <?php echo $this->Form->create('Logo', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Add Logo'); ?></legend>
        <?php
        echo $this->Form->input('title', ['required' => 'required']);
        echo $form->input('image', array('type' => 'file', 'label' => 'Image', 'required' => 'required'));
        echo $this->Form->input('url');
        echo $this->Form->input('weight', ['default' => 0, 'type' => 'number']);
        echo $this->Form->input('approved');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
