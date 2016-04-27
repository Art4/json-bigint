<?php

namespace Art4\JsonBigInt;

use InvalidArgumentException;

/**
 * Prepare big integers as string in JSON string
 */

class JsonBigInt
{
	/**
	 * Prepares a JSON string
	 *
	 * @param string $json_string The JSON string
	 * @throws InvalidArgumentException If $json_string isn't a string
	 * @return string The prepares JSON string
	 */
	public function prepare($json_string)
	{
		if ( ! is_string($json_string) )
		{
			throw new InvalidArgumentException(__METHOD__ . ' expects a string as first argument.');
		}

		$max_int_length = strlen((string) PHP_INT_MAX) - 1;

		$result = preg_replace('/("\w+"):\s*(-?\d{'.$max_int_length.',}(\.\d{'.$max_int_length.',})?)/', '\\1:"\\2"', $json_string);

		return $result;
	}
}
