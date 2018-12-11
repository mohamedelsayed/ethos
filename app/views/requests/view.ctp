<div class="requests view">
    <h2><?php __('Request'); ?></h2>
    <dl><?php
        $i = 0;
        $class = ' class="altrow"';
        ?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $request['Request']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php echo $titleLabel; ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $request['Request']['title']; ?>
            &nbsp;
        </dd>
        <?php /*        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Image'); ?></dt>
          <dd<?php if ($i++ % 2 == 0) echo $class;?>>
          <?php echo $this->element('backend/image_view', array('image'=>array('id'=>$request['Request']['id'], 'image'=>$request['Request']['image']), 'size'=>'master'));?>
          &nbsp;
          </dd> */ ?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Status'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php
            if (isset($statusOptions[$request['Request']['status']])) {
                echo $statusOptions[$request['Request']['status']];
            } else {
                echo '---';
            }
            ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Application Number'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $request['Request']['application_number']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Created'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $request['Request']['created']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Updated'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $request['Request']['updated']; ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <?php /* <li><?php echo $this->Html->link(__('Edit Request', true), array('action' => 'edit', $request['Request']['id'])); ?> </li> */ ?>
        <?php /* <li><?php echo $this->Html->link(__('Delete Request', true), array('action' => 'delete', $request['Request']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $request['Request']['id'])); ?> </li> */ ?>
        <li><?php echo $this->Html->link(__('List Requests', true), array('action' => 'index')); ?> </li>
        <?php /* <li><?php echo $this->Html->link(__('New Request', true), array('action' => 'add')); ?> </li> */ ?>
    </ul>
</div>