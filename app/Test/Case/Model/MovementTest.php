<?php
App::uses('Movement', 'Model');

/**
 * Movement Test Case
 *
 */
class MovementTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.movement',
		'app.station',
		'app.line',
		'app.stock',
		'app.interchange',
		'app.stations_movement'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Movement = ClassRegistry::init('Movement');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Movement);

		parent::tearDown();
	}

}
