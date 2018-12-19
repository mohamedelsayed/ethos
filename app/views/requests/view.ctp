<?php
$dataIn = [];
if (isset($request['Request']['data'])) {
    $dataIn = $request['Request']['data'];
}
$i = 0;
$class = ' altrow ';
echo $this->Html->css(array('backend/admissions'));
?>
<div class="requests view">
    <h2><?php __('Application'); ?></h2>
    <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
        <div class="leftDiv "><?php __('Application Number'); ?></div>
        <div class="rightDiv ">
            <?php echo $request['Request']['application_number']; ?>
            &nbsp;
        </div>
    </div>
    <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
        <div class="leftDiv "><?php __('Status'); ?></div>
        <div class="rightDiv ">
            <?php
            if (isset($statusOptions[$request['Request']['status']])) {
                echo $statusOptions[$request['Request']['status']];
            }
            ?>
            &nbsp;
        </div>
    </div>
    <div class="oneLine <?php if ($i++ % 2 == 0) echo $class; ?>">
        <div class="leftDiv" ><?php __('Created'); ?></div>
        <div class="rightDiv ">
            <?php echo $request['Request']['created']; ?>
            &nbsp;
        </div>
    </div>
    <div id="tapss">
        <ul class="tabs">
            <li data-tab='tab2' class="current"><a><?php __('Pupil’s Information') ?></a></li>
            <li data-tab='tab1'><a><?php __('Previous School(s) / Nursery') ?></a></li>
            <li data-tab='tab3'><a><?php __('Parents Information') ?></a></li>
            <li data-tab='tab4'><a><?php __('Emergency Information') ?></a></li>
            <li data-tab='tab5'><a><?php __('Developmental History') ?></a></li>
        </ul>
        <div class="panes">
            <div class="tabdiv" id="tab2" style="display: block;">
                <?php require_once 'tab1.ctp'; ?>
            </div>
            <div class="tabdiv" id="tab1">
                <?php require_once 'tab2.ctp'; ?>
            </div>
            <div class="tabdiv" id="tab3">
                <?php require_once 'tab3.ctp'; ?>
            </div>
            <div class="tabdiv" id="tab4">
                <?php require_once 'tab4.ctp'; ?>
            </div>
            <div class="tabdiv" id="tab5">
                <?php require_once 'tab5.ctp'; ?>
            </div>
        </div>
    </div>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <?php if ($request['Request']['status'] != 1) { ?>
            <li><?php echo $this->Html->link(__('Accept Application', true), array('action' => 'changeStatus', $request['Request']['id'], 1), null, sprintf(__('Are you sure you want to accept # %s?', true), $request['Request']['id'])); ?> </li>
        <?php } ?>
        <?php if ($request['Request']['status'] != 2) { ?>
            <li><?php echo $this->Html->link(__('Resubmit Application', true), array('action' => 'resubmit', $request['Request']['id'])); ?> </li>
        <?php } ?>
        <?php if ($request['Request']['status'] != 3) { ?>
            <li><?php echo $this->Html->link(__('Reject Application', true), array('action' => 'changeStatus', $request['Request']['id'], 3), null, sprintf(__('Are you sure you want to reject # %s?', true), $request['Request']['id'])); ?> </li>
        <?php } ?>
        <li><?php echo $this->Html->link(__('Export Application To Excel', true), array('action' => 'exportApplicationToExcel', $request['Request']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Export Application To PDF', true), array('action' => 'exportApplicationToPDF', $request['Request']['id']), ['target' => '_blank']); ?> </li>
        <li><?php echo $this->Html->link(__('List Applications', true), array('action' => 'index')); ?> </li>
    </ul>
</div>