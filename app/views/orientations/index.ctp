<div class="orientations index">
    <?php echo $this->element('backend/search_view', array('currentModel' => 'Orientation', 'currentField' => 'title')); ?>
    <h2><?php __('Orientations'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <?php /* <th><?php echo $this->Paginator->sort('title_ar');?></th> */ ?>
            <th><?php echo $this->Paginator->sort('title'); ?></th>
            <th><?php echo $this->Paginator->sort('weight'); ?></th>
            <th><?php echo $this->Paginator->sort('approved'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th><?php echo $this->Paginator->sort('updated'); ?></th>
            <th class="actions"><?php __('Actions'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($orientations as $orientation):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $orientation['Orientation']['id']; ?>&nbsp;</td>
                <td><?php echo $orientation['Orientation']['title']; ?>&nbsp;</td>
                <td><?php echo $orientation['Orientation']['weight']; ?>&nbsp;</td>
                <td><?php
                    $v = ($orientation['Orientation']['approved'] == 1) ? 'Yes' : 'No';
                    echo $v
                    ?>&nbsp;</td>
                <td><?php echo $orientation['Orientation']['created']; ?>&nbsp;</td>
                <td><?php echo $orientation['Orientation']['updated']; ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View', true), array('action' => 'view', $orientation['Orientation']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $orientation['Orientation']['id'])); ?>
                    <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $orientation['Orientation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $orientation['Orientation']['id'])); ?>
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
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Orientation', true), array('action' => 'add')); ?></li>
    </ul>
</div>