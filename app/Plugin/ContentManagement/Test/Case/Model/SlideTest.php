<?php
/* Slide Test cases generated on: 2014-10-21 06:27:11 : 1413890831*/
App::uses('Slide', 'ContentManagement.Model');

/**
 * Slide Test Case
 *
 */
class SlideTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.content_management.slide');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Slide = ClassRegistry::init('ContentManagement.Slide');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Slide);

		parent::tearDown();
	}

}
