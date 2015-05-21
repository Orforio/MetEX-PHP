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
		'line', 'station', 'interchange', 'movement', 'image', 'station_movement', 'stock', 'place', 'place_station'
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
		$this->assertXmlStringEqualsXmlString('<h2 class="text-left" id="nav-station-up-1">&lt; <a href="/stations/view/16">Buttes Chaumont</a></h2>', $this->Navigation->addSequentialNavLink($stationBotzarisDataStrippedUp, 'up'));
		$this->assertEquals('<h2 class="text-right" id="nav-station-down-1"><a href="/stations/view/18">Place des Fêtes</a> &gt;</h2><h2 class="text-right" id="nav-station-down-2"><a href="/stations/view/20" class="bg-danger">Danube</a> &gt;</h2>', $this->Navigation->addSequentialNavLink($stationBotzarisDataStrippedDown, 'down'));	// Can't use XmlEtc because this isn't contained in a single element yet
		
		// Bad data
		$this->assertEquals('', $this->Navigation->addSequentialNavLink(null, 'up'));
		
		$this->setExpectedException('InternalErrorException', 'Missing or wrong direction specified');
		$this->Navigation->addSequentialNavLink($stationBotzarisDataStrippedUp, 'diagonally');
	}
	
/**
 * testAddConnectionsList method
 *
 * @return void
 */
	public function testAddConnectionsList() {
		$stationCourSEData = $this->Station->find('first', array(
			'conditions' => array('Station.id' => 7),
			'recursive' => 3));
		$stationBercyData = $this->Station->find('first', array(
			'conditions' => array('Station.id' => 6),
			'recursive' => 3));
		$stationSaintLazareData = $this->Station->find('first', array(
			'conditions' => array('Station.id' => 1),
			'recursive' => 3));
			
		$stationCourSEDataStripped = $stationCourSEData['Interchange'];
		$stationBercyDataStripped = $stationBercyData['Interchange'];
		$stationSaintLazareDataStripped = $stationSaintLazareData['Interchange'];
		
		// Good data
		$this->assertXmlStringEqualsXmlString('<p>No connections</p>', $this->Navigation->addConnectionsList($stationCourSEDataStripped, 7));
		$this->assertXmlStringEqualsXmlString('<ul><li class="line-7"><div class="line-badge">6</div> <a href="/stations/view/68">Bercy</a></li></ul>', $this->Navigation->addConnectionsList($stationBercyDataStripped, 6));
		$this->assertXmlStringEqualsXmlString('<ul><li class="line-3"><div class="line-badge">3</div> <a href="/stations/view/30">Saint-Lazare</a></li><li class="line-14"><div class="line-badge">12</div> <a href="/stations/view/107">Saint-Lazare</a></li></ul>', $this->Navigation->addConnectionsList($stationSaintLazareDataStripped, 1));
		
		// Bad data
		$this->assertXmlStringEqualsXmlString('<p>No connections</p>', $this->Navigation->addConnectionsList(null, 4));
		$this->assertXmlStringEqualsXmlString('<p>No connections</p>', $this->Navigation->addConnectionsList($stationBercyDataStripped));
		$this->assertXmlStringEqualsXmlString('<p>No connections</p>', $this->Navigation->addConnectionsList($stationBercyData, 6));
		$this->assertXmlStringEqualsXmlString('<p>No connections</p>', $this->Navigation->addConnectionsList($stationBercyDataStripped, 'six'));
	}
	
/**
 * testAddConnectionsList method
 *
 * @return void
 */

	public function testAddPlacesList() {
		$stationCourSEData = $this->Station->find('first', array(
			'conditions' => array('Station.id' => 7),
			'recursive' => 3));
		$stationSaintLazareData = $this->Station->find('first', array(
			'conditions' => array('Station.id' => 1),
			'recursive' => 3));
		$stationGambettaData = $this->Station->find('first', array(
			'conditions' => array('Station.id' => 43),
			'recursive' => 3));
			
		$stationCourSEDataStripped = $stationCourSEData['Place'];
		$stationSaintLazareDataStripped = $stationSaintLazareData['Place'];
		$stationGambettaDataStripped = $stationGambettaData['Place'];
		
		// Good data
		$this->assertXmlStringEqualsXmlString('<p>No places nearby</p>', $this->Navigation->addPlacesList($stationCourSEDataStripped));
		$this->assertXmlStringEqualsXmlString('<ul><li><a href="/places/view/1">Saint-Lazare station</a></li></ul>', $this->Navigation->addPlacesList($stationSaintLazareDataStripped));
		$this->assertXmlStringEqualsXmlString('<ul><li><a href="/places/view/3">Gambetta station</a></li><li><a href="/places/view/2">Old running tunnels, Gambetta</a></li>', $this->Navigation->addPlacesList($stationGambettaDataStripped));
		
		// Bad data
		$this->assertXmlStringEqualsXmlString('<p>No places nearby</p>', $this->Navigation->addPlacesList(null));
		$this->assertXmlStringEqualsXmlString('<p>No places nearby</p>', $this->Navigation->addPlacesList($stationBercyData));
		$this->assertXmlStringEqualsXmlString('<p>No places nearby</p>', $this->Navigation->addPlacesList("Nonsense"));
	}

}
