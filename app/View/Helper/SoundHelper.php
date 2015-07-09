<?php
App::uses('AppHelper', 'View/Helper');

class SoundHelper extends AppHelper {
	public $helpers = array('Html');
	
	public function addStationsAmbience($sounds = null) {
		if (isset($sounds) && !empty($sounds[0]['filename'])) {
			$soundfiles = array();
			foreach ($sounds as $sound) {
				$soundfiles[] = Configure::read('MetEX.audiopath') . $sound['filename'];
			}
			return $this->Html->div('well well-sm h4', $this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-headphones', 'aria-hidden' => 'true')) . ' Station ambience ' . $this->Html->media($soundfiles, array('type' => 'audio', 'controls' => true)));
		} else {
			return null;
		}
	}
}
