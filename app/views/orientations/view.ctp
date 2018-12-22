<div class="orientations view">
    <h2><?php __('Orientation'); ?></h2>
    <dl><?php
        $i = 0;
        $class = ' class="altrow"';
        ?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $orientation['Orientation']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Title'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $orientation['Orientation']['title']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Weight'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $orientation['Orientation']['weight']; ?>
            &nbsp;
        </dd>
        <?php /*        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Image'); ?></dt>
          <dd<?php if ($i++ % 2 == 0) echo $class;?>>
          <?php echo $this->element('backend/image_view', array('image'=>array('id'=>$orientation['Orientation']['id'], 'image'=>$orientation['Orientation']['image']), 'size'=>'master'));?>
          &nbsp;
          </dd> */ ?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Approved'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php
            if ($orientation['Orientation']['approved'] == 1)
                echo 'Yes';
            elseif ($orientation['Orientation']['approved'] == 0)
                echo 'No';
            ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Created'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $orientation['Orientation']['created']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Updated'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $orientation['Orientation']['updated']; ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Orientation', true), array('action' => 'edit', $orientation['Orientation']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Delete Orientation', true), array('action' => 'delete', $orientation['Orientation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $orientation['Orientation']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Orientations', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Orientation', true), array('action' => 'add')); ?> </li>
    </ul>
</div>