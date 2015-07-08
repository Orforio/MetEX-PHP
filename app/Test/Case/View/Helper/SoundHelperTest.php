<?php
App::uses('View', 'View');
App::uses('Helper', 'View');
App::uses('SoundHelper', 'View/Helper');
App::uses('Station', 'Model');

/**
 * SoundHelper Test Case
 *
 */
class SoundHelperTest extends CakeTestCase {
	
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'line', 'station', 'interchange', 'movement', 'image', 'station_movement', 'stock', 'place', 'place_station', 'sound'
	);
	
/**
 * setUp method
 *
 * @return void
 */

	public function setUp() {
		parent::setUp();
		$View = new View();
		$this->Sound = new SoundHelper($View);
		
		$this->Station = ClassRegistry::init('Station');	
	}
	
/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Sound);
		unset($this->Station);
		
		parent::tearDown();
	}
	
/**
 * testAddStationsAmbience method
 *
 * @return void
 */
	public function testAddStationsAmbience() {
		$stationMadeleineData = $this->Station->find('first', array(
			'conditions' => array('Station.id' => 2),
			'recursive' => 2
		));
		
		$stationMadeleineDataStripped = $stationMadeleineData['Sound'];
		
		$stationMadeleineExpectedHtml =
			'<div>' .
				'<audio autoplay="false">' .
					'<source src="/media/audio/ambient_2.mp3" type="audio/mpeg" />' .
				'</audio>' .
			'</div>';

		// Good data
		$this->assertXmlStringEqualsXmlString($stationMadeleineExpectedHtml, $this->Sound->addStationsAmbience($stationMadeleineDataStripped));
		
		// Bad data
		$this->assertEquals('', $this->Sound->addStationsAmbience(null));
	}
}