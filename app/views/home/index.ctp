<?php

echo $this->element('front' . DS . 'orientation', array('has_orientation' => $has_orientation, 'orientation' => $orientation));
echo $this->element('front' . DS . 'home' . DS . 'widgets', array('widgets' => $widgets));
echo $this->element('front' . DS . 'home' . DS . 'education');
echo $this->element('front' . DS . 'home' . DS . 'latest_news');
echo $this->element('front' . DS . 'home' . DS . 'gallery');
echo $this->element('front' . DS . 'home' . DS . 'events');
