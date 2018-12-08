<div class="terms view">
    <h2><?php  __('Term');?></h2>
    <dl><?php $i = 0; $class = ' class="altrow"';?>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $term['Term']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $term['Term']['title']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Weight'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $term['Term']['weight']; ?>
            &nbsp;
        </dd>
        <?php /*        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Image'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $this->element('backend/image_view', array('image'=>array('id'=>$term['Term']['id'], 'image'=>$term['Term']['image']), 'size'=>'master'));?>
            &nbsp;
        </dd>*/?>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Approved'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php if($term['Term']['approved'] == 1) echo 'Yes';
            elseif($term['Term']['approved'] == 0) echo 'No';?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $term['Term']['created']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $term['Term']['updated']; ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Term', true), array('action' => 'edit', $term['Term']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Delete Term', true), array('action' => 'delete', $term['Term']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $term['Term']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Terms', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Term', true), array('action' => 'add')); ?> </li>
    </ul>
</div>