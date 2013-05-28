<?php
/* Option Test cases generated on: 2013-05-29 00:13:08 : 1369779188*/
App::uses('Option', 'ContentManagement.Model');

/**
 * Option Test Case
 *
 */
class OptionTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.content_management.option');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Option = ClassRegistry::init('ContentManagement.Option');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Option);

		parent::tearDown();
	}

}
