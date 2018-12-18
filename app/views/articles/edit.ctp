<?php echo $this->Html->css('autocomplete/jquery-ui', null, array('inline' => false)); ?>
<div class="articles form">
    <?php echo $this->Form->create('Article', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Edit Article'); ?></legend>
        <div id="form">
            <?php
            echo $this->Form->input('id');
            echo $this->Form->input('title', ['required' => 'required']);
            //echo $this->Form->input('title_ar');
            //echo $this->Form->input('tags', array('label' => $tags_label));
            //echo $this->Form->input('title_ar');
            echo $this->Form->input('meta_keywords');
            echo $this->Form->input('meta_description');
            echo $this->Form->input('date');
            echo $this->Form->input('approved');
            //echo $this->Form->input('featured');
            //echo $this->Form->input('creator');
            //echo $this->Form->input('home');
            //echo $this->Form->input('subject_id');
            ?>
        </div>
        <div id="tapss">
            <ul class="tabs">
                <li data-tab='tab1' class="current"><a>Contents</a></li>
                <li data-tab='tab2' class=""><a >Images</a></li>
                <?php /* <li><a class="" href="#">Videos</a></li> */ ?>
            </ul>
            <div class="panes">
                <!--Content-->
                <div class="tabdiv" id="tab1" style="display: block;">
                    <?php
                    //echo $this->Form->input('header');
                    //echo $this->Form->input('header_ar');
                    echo $this->Form->input('Article.body', array('class' => 'ckeditor'));
                    //echo $this->Form->input('Article.body_ar', array('class'=>'ckeditor'));
                    //echo '<lable>Body</lable>';
                    //echo $this->Fck->fckeditor(array('Article', 'body'), $this->Html->base, $this->data['Article']['body']);
                    //echo '<lable>Body Arabic</lable>';
                    //echo $this->Fck->fckeditor(array('Article', 'body_ar'), $this->Html->base, $this->data['Article']['body_ar']);
                    ?>
                </div>
                <!--Images Gallery-->
                <div class="tabdiv" id="tab2">
                    <?php
                    echo $this->Form->input('Gal.0.caption', array('value' => ''));
                    echo $this->Form->input('Gal.0.image', array('type' => 'file', 'label' => $image_label));
                    echo '<h3>' . __('Related Images', true) . '</h3>';
                    echo $this->element('backend/images_gallery_view', array('gallery' => $this->data['Gal']));
                    ?>
                </div>
                <!--Videos-->
                <?php /* <div>
                  <?php
                  echo $this->Form->input('Video.0.title', array('value'=>''));
                  echo $this->Form->input('Video.0.image', array('type'=>'file', 'label'=>'Video Image'));
                  echo $this->Form->input('Video.0.file', array('type'=>'file', 'label'=>'FLV Video File'));
                  echo $this->Form->input('Video.0.url', array('value'=>'', 'label'=>'URL (ex. http://www.anytube.com/?id=any)'));
                  echo '<h3>'.__('Related Videos', true).'</h3>';
                  echo $this->element('backend/videos_gallery_view', array('gallery' => $this->data['Video']));
                  ?>
                  </div> */ ?>
            </div>
        </div>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Article.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Article.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Articles', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Comments', true), array('controller' => 'comments', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Comment', true), array('controller' => 'comments', 'action' => 'add')); ?> </li>
    </ul>
</div>
<?php include_once('auto_complete_code.ctp'); ?>