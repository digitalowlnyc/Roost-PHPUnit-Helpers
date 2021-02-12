<?php
/**
 * Creator: Bryan Mayor
 * Company: Blue Nest Digital, LLC
 * License: (Blue Nest Digital LLC, All rights reserved)
 * Copyright: Copyright 2021 Blue Nest Digital LLC
 */

namespace Tests;

use PHPUnit\Framework\TestCase;

abstract class RoostTestCase extends TestCase
{
	protected function assertable($val) {
		file_put_contents("assertable-last.out", var_export($val, true));
		return $val;
	}

	protected function expectExceptionWrapper($exception, $callable) {
		try {
			$callable();
		} catch(\Exception $ex) {
			if($ex instanceof $exception) {
				$this->addToAssertionCount(1);
				return;
			}
		}

		$this->fail(sprintf("Did not encounter exception %s", $exception));
	}
}