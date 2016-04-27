<?php

namespace Art4\JsonBigInt\Tests\Unit;

use Art4\JsonBigInt\JsonBigInt;

class JsonBigIntTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testPrepare($json_string, $expected)
	{
		$class = new JsonBigInt();

		$this->assertSame($class->prepare($json_string), $expected);
	}

	/**
	 * data provider
	 */
	public function dataProvider()
	{
		return [
			[
				'{}',
				'{}',
			],
			[
				'{"val1":123}',
				'{"val1":123}',
			],
			[
				'{"val1":123456789012345678901234567890}',
				'{"val1":"123456789012345678901234567890"}',
			],
			[
				'{"val1": 123456789012345678901234567890}',
				'{"val1":"123456789012345678901234567890"}',
			],
			[
				'{"val1":123456789012345678901234567890.123456789012345678901234567890}',
				'{"val1":"123456789012345678901234567890.123456789012345678901234567890"}',
			],
		];
	}

	/**
	 * @test
	 */
	public function testPrepareThrowsException()
	{
		$class = new JsonBigInt();

		$this->setExpectedException(
			'InvalidArgumentException',
			' expects a string as first argument.'
		);

		$class->prepare([]);
	}
}
