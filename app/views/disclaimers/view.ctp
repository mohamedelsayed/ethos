<div class="disclaimers view">
    <h2><?php __('Disclaimer'); ?></h2>
    <dl><?php
        $i = 0;
        $class = ' class="altrow"';
        ?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $disclaimer['Disclaimer']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Title'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $disclaimer['Disclaimer']['title']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Weight'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $disclaimer['Disclaimer']['weight']; ?>
            &nbsp;
        </dd>
        <?php /*        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Image'); ?></dt>
          <dd<?php if ($i++ % 2 == 0) echo $class;?>>
          <?php echo $this->element('backend/image_view', array('image'=>array('id'=>$disclaimer['Disclaimer']['id'], 'image'=>$disclaimer['Disclaimer']['image']), 'size'=>'master'));?>
          &nbsp;
          </dd> */ ?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Approved'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php
            if ($disclaimer['Disclaimer']['approved'] == 1)
                echo 'Yes';
            elseif ($disclaimer['Disclaimer']['approved'] == 0)
                echo 'No';
            ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Created'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $disclaimer['Disclaimer']['created']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Updated'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $disclaimer['Disclaimer']['updated']; ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Disclaimer', true), array('action' => 'edit', $disclaimer['Disclaimer']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Delete Disclaimer', true), array('action' => 'delete', $disclaimer['Disclaimer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $disclaimer['Disclaimer']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Disclaimers', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Disclaimer', true), array('action' => 'add')); ?> </li>
    </ul>
</div>