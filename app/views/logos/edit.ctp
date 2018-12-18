<div class="logos form">
    <?php echo $this->Form->create('Logo', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Edit Logo'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('title', ['required' => 'required']);
        echo $this->element('backend/image_view', array('image' => array('id' => $this->data['Logo']['id'], 'image' => $this->data['Logo']['image']), 'size' => 'master'));
        echo $form->input('image', array('type' => 'file', 'label' => 'Image', 'required' => 'required'));
        echo $this->Form->input('url');
        echo $this->Form->input('weight', ['type' => 'number']);
        echo $this->Form->input('approved');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
