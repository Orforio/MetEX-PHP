<?php
/**
 * StationMovementFixture
 *
 */
class StationMovementFixture extends CakeTestFixture {
	public $table = 'stations_movements';	// For some reason Cake wants to pluralise this fixture incorrectly, needing this override
	public $import = array('table' => 'stations_movements', 'records' => true);
}
