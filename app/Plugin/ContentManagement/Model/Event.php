<?php
App::uses('ContentManagementAppModel', 'ContentManagement.Model');
/**
 * Event Model
 *
 */
class Event extends ContentManagementAppModel {

    public $order = array('Event.starts' => 'DESC');
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'starts' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ends' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'location' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'enabled' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'body' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

    public function afterFind($results, $primary = false) {
        foreach ($results as $k => $v) {
            if (isset($v['Event']['starts']) && isset($v['Event']['ends'])) {
                $results[$k]['Event']['timestamp'] = $this->createFriendlyTimestamp($v['Event']['starts'], $v['Event']['ends']);
            }
        }

        return $results;
    }

    private function createFriendlyTimestamp($starts, $ends) {
        $date_start = new DateTime($starts);
        $date_end = new DateTime($ends);

        $dates_match = $date_start->format('Y-m-d') === $date_end->format('Y-m-d');
        $times_match = $date_start->format('h:i:s') === $date_end->format('h:i:s');

        if ($dates_match && $times_match) {
            return $date_start->format('M d, Y g:ia');
        }
        else if ($dates_match && !$times_match) {
            return sprintf("%s - %s", $date_start->format('M d, Y g:ia'), $date_end->format('g:ia'));
        }
        else {
            return sprintf("%s - %s", $date_start->format('M d, Y g:ia'), $date_end->format('M d, Y g:ia'));
        }

        return "foo";
    }
}
