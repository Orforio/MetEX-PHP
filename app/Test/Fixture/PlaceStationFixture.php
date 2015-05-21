<?php
/**
 * PlaceStationFixture
 *
 */
class PlaceStationFixture extends CakeTestFixture {
	public $table = 'places_stations';	// For some reason Cake wants to pluralise this fixture incorrectly, needing this override
	public $import = array('table' => 'places_stations', 'records' => true);
}
