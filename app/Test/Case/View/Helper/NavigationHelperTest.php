<?php
App::uses('View', 'View');
App::uses('Helper', 'View');
App::uses('NavigationHelper', 'View/Helper');
App::uses('Station', 'Model');

/**
 * NavigationHelper Test Case
 *
 */
class NavigationHelperTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'line', 'station', 'interchange', 'movement', 'image', 'station_movement', 'stock'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$View = new View();
		$this->Navigation = new NavigationHelper($View);
		
		$this->Station = ClassRegistry::init('Station');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Navigation);
		unset($this->Station);

		parent::tearDown();
	}

/**
 * testAddSequentialNavLink method
 *
 * @return void
 */
	public function testAddSequentialNavLink() {
		$stationBotzarisData = $this->Station->find('first', array(
			'conditions' => array('Station.id' => 17),
			'recursive' => 2));
		
		$stationBotzarisDataStrippedUp = $stationBotzarisData['UpMovement'];
		$stationBotzarisDataStrippedDown = $stationBotzarisData['DownMovement'];
		
		
		// Good data
		$this->assertEquals('<h2 class="text-left" id="nav-station-up-1">&lt; <a href="/stations/view/16">Buttes Chaumont</a></h2>', $this->Navigation->addSequentialNavLink($stationBotzarisDataStrippedUp, 'up'));
		$this->assertEquals('<h2 class="text-right" id="nav-station-down-1"><a href="/stations/view/18">Place des Fêtes</a> &gt;</h2><h2 class="text-right" id="nav-station-down-2"><a href="/stations/view/20" class="bg-danger">Danube</a> &gt;</h2>', $this->Navigation->addSequentialNavLink($stationBotzarisDataStrippedDown, 'down'));
		
		// Bad data
		$this->assertEquals('', $this->Navigation->addSequentialNavLink(null, 'up'));
		
		$this->setExpectedException('InternalErrorException', 'Missing or wrong direction specified');
		$this->Navigation->addSequentialNavLink($stationBotzarisDataStrippedUp, 'diagonally');
	}

}
