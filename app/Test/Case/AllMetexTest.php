<?php
class AllMetexTest extends CakeTestSuite {
	public static function suite() {
		$suite = new CakeTestSuite('All MetEX tests');
		$suite->addTestDirectoryRecursive(TESTS . 'Case/Model');
		$suite->addTestDirectoryRecursive(TESTS . 'Case/View');
		return $suite;
	}
}
