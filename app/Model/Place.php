<?php
App::uses('AppModel', 'Model');
/**
 * Place Model
 *
 * @property Image $Image
 * @property Station $Station
 */
class Place extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	
	public $recursive = 2;	// TODO: Temporary fix to enable Line data in Stations.

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'naturalNumber' => array(
				'rule' => array('naturalNumber'),
				'message' => 'ID must be a number greater than 0',
				'allowEmpty' => false,
				'required' => true,
				'on' => 'update'
			),
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Name must not be empty',
				'allowEmpty' => false,
				'required' => true
			),
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'Name must not be longer than 255 characters',
			),
		),
		'description' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Description must not be empty',
				'allowEmpty' => false,
				'required' => true
			),
		),
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Image' => array(
			'className' => 'Image',
			'foreignKey' => 'place_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Station' => array(
			'className' => 'Station',
			'joinTable' => 'places_stations',
			'foreignKey' => 'place_id',
			'associationForeignKey' => 'station_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => 'line_id ASC',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
