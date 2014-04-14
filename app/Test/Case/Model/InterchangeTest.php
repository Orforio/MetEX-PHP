<?php
App::uses('Interchange', 'Model');

/**
 * Interchange Test Case
 *
 */
class InterchangeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.interchange',
		'app.station',
		'app.line',
		'app.stock',
		'app.movement',
		'app.stations_movement'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Interchange = ClassRegistry::init('Interchange');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Interchange);

		parent::tearDown();
	}

}
