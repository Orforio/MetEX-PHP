<?php
App::uses('AppModel', 'Model');
/**
 * Image Model
 *
 * @property Station $Station
 * @property Place $Place
 */
class Image extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'station_id' => array(
			'naturalNumber' => array(
				'rule' => array('naturalNumber'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	//	'place_id' => array(
	//		'naturalNumber' => array(
	//			'rule' => array('naturalNumber'),
	//			'message' => 'Invalid PlaceID',
	//			'allowEmpty' => true,
	//			'required' => true
	//		),
	//	),
		'filename' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'You must specify a filename',
				'allowEmpty' => false,
				'required' => true
			),
		),
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'You must specify a title',
				'allowEmpty' => false,
				'required' => true
			),
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'Title must be under 255 characters'
			),
		),
		'alt' => array(
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'Alt text must be under 255 characters',
				'allowEmpty' => true,
				'required' => true
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
		'Station' => array(
			'className' => 'Station',
			'foreignKey' => 'station_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Place' => array(
			'className' => 'Place',
			'foreignKey' => 'place_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
