<div class="yearGroups index">
	<?php echo $this->element('backend/search_view',array('currentModel' => 'YearGroup', 'currentField' => 'title'));?>
    <h2><?php __('Year Groups');?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id');?></th>
			<?php /*<th><?php echo $this->Paginator->sort('title_ar');?></th>*/?>
            <th><?php echo $this->Paginator->sort('title');?></th>
            <th><?php echo $this->Paginator->sort('weight');?></th>
            <th><?php echo $this->Paginator->sort('applying_to');?></th>
            <th><?php echo $this->Paginator->sort('current');?></th>
            <th><?php echo $this->Paginator->sort('approved');?></th>
            <?php /*<th><?php echo $this->Paginator->sort('created');?></th>*/?>
            <th><?php echo $this->Paginator->sort('updated');?></th>
            <th class="actions"><?php __('Actions');?></th>
        </tr>
	<?php
	$i = 0;
	foreach ($yearGroups as $yearGroup):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
        <tr<?php echo $class;?>>
            <td><?php echo $yearGroup['YearGroup']['id']; ?>&nbsp;</td>
            <td><?php echo $yearGroup['YearGroup']['title']; ?>&nbsp;</td>
            <td><?php echo $yearGroup['YearGroup']['weight']; ?>&nbsp;</td>
            <td><?php $v = ($yearGroup['YearGroup']['applying_to'] == 1) ?  'Yes' : 'No';echo $v?>&nbsp;</td>
            <td><?php $v = ($yearGroup['YearGroup']['current'] == 1) ?  'Yes' : 'No';echo $v?>&nbsp;</td>
            <td><?php $v = ($yearGroup['YearGroup']['approved'] == 1) ?  'Yes' : 'No';echo $v?>&nbsp;</td>
            <?php /*<td><?php echo $yearGroup['YearGroup']['created']; ?>&nbsp;</td>*/?>
            <td><?php echo $yearGroup['YearGroup']['updated']; ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link(__('View', true), array('action' => 'view', $yearGroup['YearGroup']['id'])); ?>
                <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $yearGroup['YearGroup']['id'])); ?>
                <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $yearGroup['YearGroup']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $yearGroup['YearGroup']['id'])); ?>
            </td>
        </tr>
<?php endforeach; ?>
    </table>
    <p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>
    </p>
    <div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
        | 	<?php echo $this->Paginator->numbers();?>
        |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
    </div>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Year Group', true), array('action' => 'add')); ?></li>
    </ul>
</div>