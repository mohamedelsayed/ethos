<div id="menu" style="height: 24px;">
	<?php if(($this->action != 'login') && ($this->action != 'forgot')){?>
    <div id="dropdown-holder">
        <ul id="nav" class="dropdown">
            <li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/users';?>"><?php echo __('Users');?></a></li>
            <li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/widgets';?>"><?php echo __('Widgets');?></a></li>
		        <?php /*<li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/academics';?>">Academics</a></li>*/?>
            <li class="heading"><a><?php echo __('Media');?></a>
                <ul>
                    <li class=""><a href="<?php echo $this->Session->read('Setting.url').'/articles';?>"><?php echo __('News');?></a></li>
                    <li class=""><a href="<?php echo $this->Session->read('Setting.url').'/albums';?>"><?php echo __('Gallery');?></a></li>
                </ul>
            </li>
		        <?php /*<li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/articles';?>">Articles</a></li>
		        <li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/albums';?>">Gallery</a></li>*/?>
            <li class="heading"><a><?php echo __('Events');?></a>
                <ul>
                    <li class=""><a href="<?php echo $this->Session->read('Setting.url').'/categories';?>"><?php echo __('Event Categories');?></a></li>
                    <li class=""><a href="<?php echo $this->Session->read('Setting.url').'/events';?>"><?php echo __('Events');?></a></li>
                </ul>
            </li>
		        <?php /*<li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/categories';?>">Event Categories</a></li>
		        <li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/events';?>">Events</a></li>*/?>
            <li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/cats';?>"><?php echo __('Categories');?></a></li>
		        <?php $contents = $this->requestAction('main/getContents');
                foreach ($contents as $content){?>
            <li class="heading">
                <a href="<?php echo $this->Session->read('Setting.url').'/contents/edit/'.$content['Content']['id'];?>"><?php echo $content['Content']['title'];?></a>
            </li>
                <?php }?>
            <li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/testimonials';?>"><?php echo __('Testimonials');?></a></li>
            <li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/team_members';?>"><?php echo __('Members');?></a></li>
            <li class="heading"><a><?php echo __('Careers');?></a>
                <ul>
                    <li class=""><a href="<?php echo $this->Session->read('Setting.url').'/careers';?>"><?php echo __('Careers Vacancies');?></a></li>
                    <li class=""><a href="<?php echo $this->Session->read('Setting.url').'/developments';?>"><?php echo __('Continuous professional development');?></a></li>
                </ul>
            </li>
            <li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/values';?>"><?php echo __('Values');?></a></li>
                <?php /*<li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/nodes';?>">Nodes</a></li>*/?>
		        <?php /*<li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/faqs';?>">FAQs</a></li>*/?>
        		<?php /*<li class=""><a href="<?php echo $this->Session->read('Setting.url').'/comments';?>">Comments</a></li>*/?>
		        <?php /*<li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/quotes';?>">Quotes</a></li>*/?>
		        <?php /*<li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/slideshows';?>">Slideshows</a></li>*/?>
		        <?php /*<li class="heading"><a href="<?php echo $this->Session->read('Setting.url').'/logos';?>">Logos</a></li>*/?>
		        <?php /**/?>
            <li class="heading"><a><?php echo __('Newsletter System');?></a>
                <ul>
                    <li class=""><a href="<?php echo $this->Session->read('Setting.url').'/subscribers/subscribers_export';?>"><?php echo __('Export Subscribers');?></a></li>
                    <li class=""><a href="<?php echo $this->Session->read('Setting.url').'/subscribers';?>"><?php echo __('Subscribers');?></a></li>
                    <li class=""><a href="<?php echo $this->Session->read('Setting.url').'/newsletters';?>"><?php echo __('Newsletters');?></a></li>
                    <li class=""><a href="<?php echo $this->Session->read('Setting.url').'/queues';?>"><?php echo __('Sending Queue');?></a></li>
                </ul>
            </li>
            <li class="heading"><a><?php echo __('Admission System');?></a>
                <ul>
                    <li class=""><a href="<?php echo $this->Session->read('Setting.url').'/terms';?>"><?php echo __('Terms');?></a></li>
                    <li class=""><a href="<?php echo $this->Session->read('Setting.url').'/year_groups';?>"><?php echo __('Year Groups');?></a></li>
                </ul>
            </li>
        </ul>
    </div>
<?php } ?>
</div>
<style type="text/css">
    .dropdown li{
        border-bottom:1px solid #C3C3C3;
    }
</style>