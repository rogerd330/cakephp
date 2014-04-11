<?php
/* User Fixture generated on: 2014-04-11 11:23:07 : 1397233387 */

/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'enabled' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'group_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'login' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 25, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'password' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'created' => '2014-04-11 11:23:07',
			'modified' => '2014-04-11 11:23:07',
			'enabled' => 1,
			'group_id' => 1,
			'login' => 'Lorem ipsum dolor sit a',
			'password' => 'Lorem ipsum dolor sit amet'
		),
	);
}
