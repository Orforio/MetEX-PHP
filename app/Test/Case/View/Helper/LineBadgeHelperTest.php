<?php
App::uses('View', 'View');
App::uses('Helper', 'View');
App::uses('LineBadgeHelper', 'View/Helper');
App::uses('Station', 'Model');

/**
 * LineBadgeHelper Test Case
 *
 */
class LineBadgeHelperTest extends CakeTestCase {
	
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'line', 'station', 'interchange', 'movement', 'image', 'station_movement', 'stock', 'place'
	);
	
/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$View = new View();
		$this->LineBadge = new LineBadgeHelper($View);
		
		$this->Station = ClassRegistry::init('Station');
	}
	
/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LineBadge);
		unset($this->Station);

		parent::tearDown();
	}
	
/**
 * testAddLineBadge method
 *
 * @return void
 */
	public function testAddLineBadge() {
		$stationGambettaData = $this->Station->find('first', array(
			'conditions' => array('Station.id' => 12),
			'recursive' => 2));
			
		$stationBercyData = $this->Station->find('first', array(
			'conditions' => array('Station.id' => 6),
			'recursive' => 2));
			
		$stationGambettaDataStripped = $stationGambettaData['Line']['name'];
		$stationBercyDataStripped = $stationBercyData['Line']['name'];
		
		$stationGambettaExpectedHtml = '<div class="line-badge">3<small>bis</small></div>';
		$stationBercyExpectedHtml = '<div class="line-badge">14</div>';
		
		// Good data
		$this->assertXmlStringEqualsXmlString($stationGambettaExpectedHtml, $this->LineBadge->addLineBadge($stationGambettaDataStripped));
		$this->assertXmlStringEqualsXmlString($stationBercyExpectedHtml, $this->LineBadge->addLineBadge($stationBercyDataStripped));
	 	
		// Bad data
		$this->assertEquals('', $this->LineBadge->addLineBadge(null));
	}
	
}