<?php
App::uses('Place', 'Model');

/**
 * Place Test Case
 *
 */
class PlaceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.place',
		'app.image',
		'app.station',
		'app.line',
		'app.stock',
		'app.interchange',
		'app.movement',
		'app.stations_movement',
		'app.places_station'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Place = ClassRegistry::init('Place');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Place);

		parent::tearDown();
	}

}
