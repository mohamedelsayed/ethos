<div class="requests index">
    <?php echo $this->element('backend/search_view', array('currentModel' => 'Request', 'currentField' => 'title')); ?>
    <h2><?php __('Applications'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort($titleLabel, 'title'); ?></th>
            <th><?php echo $this->Paginator->sort('status'); ?></th>
            <th><?php echo $this->Paginator->sort('application_number'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th><?php echo $this->Paginator->sort('updated'); ?></th>
            <th class="actions"><?php __('Actions'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($requests as $request):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $request['Request']['id']; ?>&nbsp;</td>
                <td><?php echo $request['Request']['title']; ?>&nbsp;</td>
                <td><?php
                    if (isset($statusOptions[$request['Request']['status']])) {
                        echo $statusOptions[$request['Request']['status']];
                    } else {
                        echo '---';
                    }
                    ?>&nbsp;</td>
                <td><?php echo $request['Request']['application_number']; ?>&nbsp;</td>
                <td><?php echo $request['Request']['created']; ?>&nbsp;</td>
                <td><?php echo $request['Request']['updated']; ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View', true), array('action' => 'view', $request['Request']['id'])); ?>
                    <?php /* echo $this->Html->link(__('Edit', true), array('action' => 'edit', $request['Request']['id'])); */ ?>
                    <?php /* echo $this->Html->link(__('Delete', true), array('action' => 'delete', $request['Request']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $request['Request']['id'])); */ ?>
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
        <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class' => 'disabled')); ?>
        | 	<?php echo $this->Paginator->numbers(); ?>
        |
        <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
    </div>
</div>
<div class="actions">
    <?php /* <h3><?php __('Actions'); ?></h3>
      <ul>
      <li><?php echo $this->Html->link(__('New Request', true), array('action' => 'add')); ?></li>
      </ul> */ ?>
</div>