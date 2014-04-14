<?php
/**
 * MovementFixture
 *
 */
class MovementFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'up_station_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'down_station_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'up_allowed' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'down_allowed' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'length' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'up_station_id' => 1,
			'down_station_id' => 1,
			'up_allowed' => 1,
			'down_allowed' => 1,
			'length' => 1
		),
	);

}
