<?php
App::uses('Sound', 'Model');

/**
 * Sound Test Case
 *
 */
class SoundTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'sound',
		'station',
		'line',
		'stock',
		'interchange',
		'movement',
		'station_movement',
		'image',
		'place',
		'place_station'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Sound = ClassRegistry::init('Sound');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Sound);

		parent::tearDown();
	}
	
/**
 * testBSFormatLength method
 *
 * @return void
 */
	public function testBSFormatLength() {
		$this->assertEquals('00:00:05', $this->Sound->bSFormatLength('5'));
		$this->assertEquals('00:00:42', $this->Sound->bSFormatLength('42'));
		$this->assertEquals('00:01:02', $this->Sound->bSFormatLength('1:02'));
		$this->assertEquals('00:59:59', $this->Sound->bSFormatLength('59:59'));
	}

}
