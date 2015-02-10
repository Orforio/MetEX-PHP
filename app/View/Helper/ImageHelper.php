<?php
App::uses('AppHelper', 'View/Helper');

class ImageHelper extends AppHelper {
	public $helpers = array('Html');
	
	public function addStationSlideshow($images) {
		if (isset($images) && !empty($images[0]['filename'])) {
			$slideshowOutput =
				'<div id="carousel-station" class="carousel slide" data-ride="carousel">' .
					'<ol class="carousel-indicators">';
			foreach ($images as $key => $image) {
				if ($key == 0) {
					$slideActive = 'active';
				} else {
					$slideActive = '';
				}
				$slideshowOutput .= '<li data-target="#carousel-station" data-slide-to="' . $key .'" class="' . $slideActive . '"></li>';
			}
			$slideshowOutput .=
					'</ol>' .
					'<div class="carousel-inner">';
			foreach ($images as $key => $image) {
				if ($key == 0) {
					$slideActive = ' active';
				} else {
					$slideActive = '';
				}
				$slideshowOutput .= 
						'<div class="item' . $slideActive . '">' .
							'<img src="' . Configure::read('MetEX.imagepath') . Configure::read('MetEX.stationphotopath') . $image['filename'] .'" alt="' . $image['alt'] .'" class="content-station-photos-slide" />' .
						'</div>';
			}
			$slideshowOutput .=
					'</div>' .
					'<a class="left carousel-control" href="#carousel-station" role="button" data-slide="prev">' .
						'<span class="glyphicon glyphicon-chevron-left"></span>' .
					'</a>' .
					'<a class="right carousel-control" href="#carousel-station" role="button" data-slide="next">' .
						'<span class="glyphicon glyphicon-chevron-right"></span>' .
					'</a>' .
				'</div>';
			
			return $slideshowOutput;
		} else {
			return $this->Html->image(Configure::read('MetEX.imagepath') . 'photo-not-available.jpg', array('alt' => 'Photo not available', 'class' => 'img-responsive'));
		}
	}
}