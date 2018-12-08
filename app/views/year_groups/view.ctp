<div class="yearGroups view">
    <h2><?php  __('YearGroup');?></h2>
    <dl><?php $i = 0; $class = ' class="altrow"';?>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $yearGroup['YearGroup']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $yearGroup['YearGroup']['title']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Weight'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $yearGroup['YearGroup']['weight']; ?>
            &nbsp;
        </dd>
        <?php /*<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Body'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $yearGroup['YearGroup']['body']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Image'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $this->element('backend/image_view', array('image'=>array('id'=>$yearGroup['YearGroup']['id'], 'image'=>$yearGroup['YearGroup']['image']), 'size'=>'master'));?>
            &nbsp;
        </dd>*/?>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Applying To'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php $v = ($yearGroup['YearGroup']['applying_to'] == 1) ?  'Yes' : 'No';echo $v?>&nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Current'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php $v = ($yearGroup['YearGroup']['current'] == 1) ?  'Yes' : 'No';echo $v?>&nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Approved'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php $v = ($yearGroup['YearGroup']['approved'] == 1) ?  'Yes' : 'No';echo $v?>&nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $yearGroup['YearGroup']['created']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $yearGroup['YearGroup']['updated']; ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Year Group', true), array('action' => 'edit', $yearGroup['YearGroup']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Delete Year Group', true), array('action' => 'delete', $yearGroup['YearGroup']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $yearGroup['YearGroup']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Year Groups', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Year Group', true), array('action' => 'add')); ?> </li>
    </ul>
</div>