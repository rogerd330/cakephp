<?php
/* Event Test cases generated on: 2013-05-22 19:10:52 : 1369242652*/
App::uses('Event', 'ContentManagement.Model');

/**
 * Event Test Case
 *
 */
class EventTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.content_management.event');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Event = ClassRegistry::init('ContentManagement.Event');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Event);

		parent::tearDown();
	}

}
