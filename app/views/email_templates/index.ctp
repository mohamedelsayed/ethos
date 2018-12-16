<div class="emailTemplates index">
    <?php echo $this->element('backend/search_view', array('currentModel' => 'EmailTemplate', 'currentField' => 'title')); ?>
    <h2><?php __('Email Templates'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <?php /* <th><?php echo $this->Paginator->sort('title_ar');?></th> */ ?>
            <th><?php echo $this->Paginator->sort('title'); ?></th>
            <?php /* <th><?php echo $this->Paginator->sort('weight'); ?></th>
              <th><?php echo $this->Paginator->sort('approved'); ?></th>
              <th><?php echo $this->Paginator->sort('created'); ?></th>
              <th><?php echo $this->Paginator->sort('updated'); ?></th> */ ?>
            <th class="actions"><?php __('Actions'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($emailTemplates as $emailTemplate):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $emailTemplate['EmailTemplate']['id']; ?>&nbsp;</td>
                <td><?php echo $emailTemplate['EmailTemplate']['title']; ?>&nbsp;</td>
                <?php /* <td><?php echo $emailTemplate['EmailTemplate']['weight']; ?>&nbsp;</td>
                  <td><?php
                  $v = ($emailTemplate['EmailTemplate']['approved'] == 1) ? 'Yes' : 'No';
                  echo $v
                  ?>&nbsp;</td>
                  <td><?php echo $emailTemplate['EmailTemplate']['created']; ?>&nbsp;</td>
                  <td><?php echo $emailTemplate['EmailTemplate']['updated']; ?>&nbsp;</td> */ ?>
                <td class="actions">
                    <?php echo $this->Html->link(__('View', true), array('action' => 'view', $emailTemplate['EmailTemplate']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $emailTemplate['EmailTemplate']['id'])); ?>
                    <?php /* <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $emailTemplate['EmailTemplate']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $emailTemplate['EmailTemplate']['id'])); ?> */ ?>
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
        <?php /* <li><?php echo $this->Html->link(__('New Email Template', true), array('action' => 'add')); ?></li> */ ?>
    </ul>
</div>