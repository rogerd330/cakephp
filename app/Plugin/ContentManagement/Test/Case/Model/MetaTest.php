<?php
/* Metum Test cases generated on: 2014-04-10 19:16:34 : 1397175394*/
App::uses('Metum', 'ContentManagement.Model');

/**
 * Metum Test Case
 *
 */
class MetumTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.content_management.metum');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Metum = ClassRegistry::init('ContentManagement.Metum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Metum);

		parent::tearDown();
	}

}
