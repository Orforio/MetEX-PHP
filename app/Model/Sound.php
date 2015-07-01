<?php
App::uses('AppModel', 'Model');
/**
 * Sound Model
 *
 * @property Station $Station
 */
class Sound extends AppModel {

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
		'id' => array(
			'naturalNumber' => array(
				'rule' => array('naturalNumber'),
				'message' => 'Invalid ID',
				'allowEmpty' => false,
				'required' => true,
				'on' => 'update', // Limit validation to 'create' or 'update' operations
			),
		),
		'station_id' => array(
			'naturalNumber' => array(
				'rule' => array('naturalNumber'),
				'message' => 'Invalid Station ID',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'filename' => array(
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'Invalid Filename',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'title' => array(
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'Invalid Title',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'length' => array(
			'time' => array(
				'rule' => array('custom', '/^([0-5]?[0-9]:[0-5][0-9]|[0-5]?[0-9])$/'),	// Captures mm:ss or just ss
				'message' => 'Invalid Time',
				'allowEmpty' => false,
				'required' => true,
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
		)
	);
	
/**
 * beforeSave callback
 *
 * @return boolean
 */
	public function beforeSave($options = array()) {	// Turns 00:00 or 00 user input into 00:00:00 for database
		if ($this->data['Sound']['length']) {
			$this->data['Sound']['length'] = $this->bSFormatLength($this->data['Sound']['length']);
		} else {
			return false;
		}
		
		return true;
	}
		
	public function bSFormatLength($length = null) {
		if ($length && (strlen($length) <= 8)) {
			if (strlen($length) <= 2) {
				$length = '00:00:' . $length;
			} else {
				$length = '00:' . $length;
			}
			$length = date('H:i:s', strtotime($length));
		}
		
		return $length;
	}
}
