<div class="emailTemplates view">
    <h2><?php __('EmailTemplate'); ?></h2>
    <dl><?php
        $i = 0;
        $class = ' class="altrow"';
        ?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $emailTemplate['EmailTemplate']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Title'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $emailTemplate['EmailTemplate']['title']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Body'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $emailTemplate['EmailTemplate']['body']; ?>
            &nbsp;
        </dd>
        <?php /* <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Created'); ?></dt>
          <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
          <?php echo $emailTemplate['EmailTemplate']['created']; ?>
          &nbsp;
          </dd>
          <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Updated'); ?></dt>
          <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
          <?php echo $emailTemplate['EmailTemplate']['updated']; ?>
          &nbsp;
          </dd> */ ?>
    </dl>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Email Template', true), array('action' => 'edit', $emailTemplate['EmailTemplate']['id'])); ?> </li>
        <?php /*        <li><?php echo $this->Html->link(__('Delete Email Template', true), array('action' => 'delete', $emailTemplate['EmailTemplate']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $emailTemplate['EmailTemplate']['id'])); ?> </li> */ ?>
        <li><?php echo $this->Html->link(__('List Email Templates', true), array('action' => 'index')); ?> </li>
        <?php /*       <li><?php echo $this->Html->link(__('New Email Template', true), array('action' => 'add')); ?> </li> */ ?>
    </ul>
</div>