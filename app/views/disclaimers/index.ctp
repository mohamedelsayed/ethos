<div class="disclaimers index">
    <?php echo $this->element('backend/search_view', array('currentModel' => 'Disclaimer', 'currentField' => 'title')); ?>
    <h2><?php __('Disclaimers'); ?></h2>
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
        foreach ($disclaimers as $disclaimer):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $disclaimer['Disclaimer']['id']; ?>&nbsp;</td>
                <td><?php echo $disclaimer['Disclaimer']['title']; ?>&nbsp;</td>
                <td><?php echo $disclaimer['Disclaimer']['weight']; ?>&nbsp;</td>
                <td><?php
                    $v = ($disclaimer['Disclaimer']['approved'] == 1) ? 'Yes' : 'No';
                    echo $v
                    ?>&nbsp;</td>
                <td><?php echo $disclaimer['Disclaimer']['created']; ?>&nbsp;</td>
                <td><?php echo $disclaimer['Disclaimer']['updated']; ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View', true), array('action' => 'view', $disclaimer['Disclaimer']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $disclaimer['Disclaimer']['id'])); ?>
                    <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $disclaimer['Disclaimer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $disclaimer['Disclaimer']['id'])); ?>
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
        <li><?php echo $this->Html->link(__('New Disclaimer', true), array('action' => 'add')); ?></li>
    </ul>
</div>