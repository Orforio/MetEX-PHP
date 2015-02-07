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
		// No image data provided
		$this->assertXmlStringEqualsXmlString('<img src="/media/images/photo-not-available.jpg" alt="Photo not available" class="img-responsive" />', $this->Image->addStationSlideshow(null));
	}
	
}