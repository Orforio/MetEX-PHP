<?php
App::uses('AppHelper', 'View/Helper');

class ImageHelper extends AppHelper {
	public $helpers = array('Html');
	
	public function addStationSlideshow($images) {
		if (isset($images) && !empty($images)) {
			echo "Got images!";
		} else {
			return $this->Html->image(Configure::read('MetEX.imagepath') . 'photo-not-available.jpg', array('alt' => 'Photo not available', 'class' => 'img-responsive'));
		}
	}
}