<?php
App::uses('AppModel', 'Model');
/**
 * Station Model
 *
 * @property Line $Line
 * @property Interchange $Interchange
 * @property Movement $Movement
 */
class Station extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	
	public $recursive = 3;	// TODO: Temporary fix for Interchange - investigate ContainbleBehavior to limit queries
	
	public $cacheQueries = true;

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'line_id' => array(
			'naturalNumber' => array(
				'rule' => array('naturalNumber'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'interchange_id' => array(
			'naturalNumber' => array(
				'rule' => array('naturalNumber'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'active' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Line' => array(
			'className' => 'Line',
			'foreignKey' => 'line_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Interchange' => array(
			'className' => 'Interchange',
			'foreignKey' => 'interchange_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'UpMovement' => array(
			'className' => 'Movement',
			'foreignKey' => 'down_station_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'up_allowed DESC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'DownMovement' => array(
			'className' => 'Movement',
			'foreignKey' => 'up_station_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'down_allowed DESC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Image' => array(
			'className' => 'Image',
			'foreignKey' => 'station_id',
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
		'Movement' => array(
			'className' => 'Movement',
			'joinTable' => 'stations_movements',
			'foreignKey' => 'station_id',
			'associationForeignKey' => 'movement_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Place' => array(
			'className' => 'Place',
			'joinTable' => 'places_stations',
			'foreignKey' => 'station_id',
			'associationForeignKey' => 'place_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => 'name ASC',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}