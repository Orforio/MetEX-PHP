<?php
/**
 * LineFixture
 *
 */
App::uses('SQLTestFixture', 'Fixturize.TestSuite/Fixture');
 
//class LineFixture extends CakeTestFixture {
class LineFixture extends SQLTestFixture {

	public $file = 'phpunit_cucumber.sql';

/**
 * Fields
 *
 * @var array
 */
/*	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 5, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'colour' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 6, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'stock_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);
*/
/**
 * Records
 *
 * @var array
 */
/*	public $records = array(
		array(
			'id' => 1,
			'name' => 'Lor',
			'colour' => 'Lore',
			'stock_id' => 1,
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'active' => 1
		),
	);
*/
}