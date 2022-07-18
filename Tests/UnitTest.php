<?php

namespace Tests;

use Carly\Carly as Carly;
use Bob\Bob as Bob;
use PHPUnit\Framework\TestCase as TestCase;

final class UnitTest extends TestCase{

	/*Properties
	**
	**
	**
	*/

	/*Methods
	**
	**
	**
	*/

	public function test_bob_returns_true() {
		
		$bob = new Bob();

		$this->assertTrue($bob->bob());

	}

	public function test_carly_returns_false() {

		$carly = new Carly();

		$this->assertTrue(FALSE == $carly->carly());

	}

}
