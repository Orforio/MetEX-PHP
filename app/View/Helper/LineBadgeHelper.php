<?php
App::uses('AppHelper', 'View/Helper');

class LineBadgeHelper extends AppHelper {
	public $helpers = array('Html');
	
	public function addLineBadge($lineName) {
		if (isset($lineName)) {
			if (preg_match('/^(\d+)bis$/', $lineName, $lineNumber)) {
				$lineName = $lineNumber[1] . '<small>bis</small>';
			}
			return $this->Html->div('line-badge', $lineName);
		}
	}
}