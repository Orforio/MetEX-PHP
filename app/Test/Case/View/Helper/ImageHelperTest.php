<?php
App::uses('View', 'View');
App::uses('Helper', 'View');
App::uses('ImageHelper', 'View/Helper');
App::uses('Station', 'Model');

/**
 * ImageHelper Test Case
 *
 */
class ImageHelperTest extends CakeTestCase {
	
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
		$this->Image = new ImageHelper($View);
		
		$this->Station = ClassRegistry::init('Station');
	}
	
/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Image);
		unset($this->Station);

		parent::tearDown();
	}
	
/**
 * testAddSequentialNavLink method
 *
 * @return void
 */
	public function testAddStationSlideshow() {
		$stationGambettaData = $this->Station->find('first', array(
			'conditions' => array('Station.id' => 12),
			'recursive' => 2));
			
		$stationGambettaDataStripped = $stationGambettaData['Image'];
		
		$stationGambettaExpectedHtml =
			'<div id="carousel-station" class="carousel slide" data-ride="carousel">' .
				'<ol class="carousel-indicators">' .
					'<li data-target="#carousel-station" data-slide-to="0" class="active"></li>' .
					'<li data-target="#carousel-station" data-slide-to="1" class=""></li>' .
					'<li data-target="#carousel-station" data-slide-to="2" class=""></li>' .
				'</ol>' .
				'<div class="carousel-inner">' .
					'<div class="item active">' .
						'<img src="/media/images/stations/4/12-1.jpg" alt="Gambetta - 1" class="content-station-photos-slide" />' .
					'</div>' .
					'<div class="item">' .
						'<img src="/media/images/stations/4/12-2.jpg" alt="Gambetta - 2" class="content-station-photos-slide" />' .
					'</div>' .
					'<div class="item">' .
						'<img src="/media/images/stations/4/12-3.jpg" alt="Gambetta - 3" class="content-station-photos-slide" />' .
					'</div>' .
				'</div>' .
				'<a class="left carousel-control" href="#carousel-station" role="button" data-slide="prev">' .
					'<span class="glyphicon glyphicon-chevron-left"></span>' .
				'</a>' .
				'<a class="right carousel-control" href="#carousel-station" role="button" data-slide="next">' .
					'<span class="glyphicon glyphicon-chevron-right"></span>' .
				'</a>' .
			'</div>';
		
		// Good data
		$this->assertXmlStringEqualsXmlString($stationGambettaExpectedHtml, $this->Image->addStationSlideshow($stationGambettaDataStripped));
	 	
		// Bad data
		$this->assertXmlStringEqualsXmlString('<img src="/media/images/photo-not-available.jpg" alt="Photo not available" class="img-responsive" />', $this->Image->addStationSlideshow(null));
	}
	
}