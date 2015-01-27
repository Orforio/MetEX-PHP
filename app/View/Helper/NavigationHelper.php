<?php
App::uses('AppHelper', 'View/Helper');

class NavigationHelper extends AppHelper {
	public $helpers = array('Html');
	
	public function addSequentialNavLink($movements, $direction) {
		$linkPrefix = '';
		$linkSuffix = '';
		
		switch($direction) {
			case 'up':
				$stationKey = 'UpStation';
				$textAlign = 'left';
				$linkPrefix = '&lt; ';
				break;
			case 'down':
				$stationKey = 'DownStation';
				$textAlign = 'right';
				$linkSuffix = ' &gt;';
				break;
			default:
				throw new InternalErrorException('Missing or wrong direction specified');
		}
		
		$stationCount = 1;
		
		foreach ($movements as $movement) {
			echo '<h2 class="text-' . $textAlign . '" id="nav-station-' . $direction .'-' . $stationCount . '">' . $linkPrefix;
			
			if ($movement[$direction . '_allowed']) {
				echo $this->Html->link($movement[$stationKey]['name'], array('controller' => 'stations', 'action' => 'view', $movement[$stationKey]['id']));
			}
			else {
				if ($movement[$direction . '_station_id'] != null) {	// Illegal movement: in reality, train does not go in this direction.
					echo $this->Html->link($movement[$stationKey]['name'], array('controller' => 'stations', 'action' => 'view', $movement[$stationKey]['id']), array('class' => 'bg-danger'));	// TODO: bg-danger class for "illegal" movements is temporary. Replace this with proper CSS styling later.
				}
				else {	// Terminus station: there is no station beyond this one.
					echo 'Terminus';	
				}
			}
			
			echo $linkSuffix . '</h2>';
			
			$stationCount++;
		}
    }
}