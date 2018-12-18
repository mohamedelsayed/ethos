<div class="requests index">
    <?php
    echo $this->element('backend/search_view_requests', array(
        'currentModel' => 'Request',
        'currentField' => 'title',
        'statusOptions' => $statusOptions,
    ));
    ?>
    <h2><?php __('Applications'); ?></h2>
    <form id="RequestChangeLimitForm" method="post" action="<?php echo $this->Session->read('Setting.url') . '/requests/ChangeLimit'; ?>" accept-charset="utf-8">
        <div style="width:50%; float: left; ">
            <div style="width:20%; float: left;clear: initial;">
                <input name="limit" type="number" id="RequestLimit" value="<?php echo $limit; ?>">
            </div>
            <div style="width:35%; float: left;clear: initial;">
                <input style="float: right;" type="submit" value="Change limit">
            </div>
        </div>
    </form>
    <form id="RequestExportForm" method="post" action="<?php echo $this->Session->read('Setting.url') . '/requests/exportAction'; ?>" accept-charset="utf-8">
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><input id="selctcAll" type="checkbox" name="selctcAll" class="selctcAll" /></th>
                <th><?php echo $this->Paginator->sort('application_number'); ?></th>
                <th><?php echo $this->Paginator->sort($titleLabel, 'title'); ?></th>
                <th><?php echo $this->Paginator->sort('status'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th class="actions"><?php __('Actions'); ?></th>
            </tr>
            <?php
            echo $this->Form->create('Request', array('url' => 'export', 'type' => 'file', 'id' => 'export_form'));
            $i = 0;
            foreach ($requests as $request):
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
                <tr<?php echo $class; ?>>
                    <td><input id="selectItem<?php echo $request['Request']['id']; ?>" type="checkbox" name="selectItem[]" class="selectItem" value="<?php echo $request['Request']['id']; ?>" /></td>
                    <td><?php echo $request['Request']['application_number']; ?>&nbsp;</td>
                    <td><?php echo $request['Request']['title']; ?>&nbsp;</td>
                    <td><?php
                        if (isset($statusOptions[$request['Request']['status']])) {
                            echo $statusOptions[$request['Request']['status']];
                        } else {
                            echo '---';
                        }
                        ?>&nbsp;</td>
                    <td><?php echo $request['Request']['created']; ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View', true), array('action' => 'view', $request['Request']['id'])); ?>
                        <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $request['Request']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $request['Request']['id'])); ?>
                    </td>
                </tr>
                <?php
            endforeach;
            ?>
        </table>
        <div style="width:100%; float: left; ">
            <input style="float: right; margin-right: 15px; width: 100px;" type="submit" value="Export">
        </div>
    </form>
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
<script type="text/javascript">
    jQuery(function () {
        jQuery(document).on("change", "#selctcAll", function () {
            if (jQuery('#selctcAll:checked').length > 0) {
                jQuery('.selectItem').prop('checked', true);
            } else {
                jQuery('.selectItem').prop('checked', false);
            }
        });
    });
</script>