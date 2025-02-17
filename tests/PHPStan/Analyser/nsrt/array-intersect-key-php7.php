<?php // lint < 8.0

namespace ArrayIntersectKeyPhp7;

use function array_intersect_key;
use function PHPStan\Testing\assertType;

class Foo
{

	public function mixedAndSubtractedArray($mixed, array $otherArrs): void
	{
		if (is_array($mixed)) {
			/** @var array<int, string> $otherArrs */
			assertType('array<int, mixed>', array_intersect_key($mixed, $otherArrs));
			/** @var array<string, int> $otherArrs */
			assertType('array<string, mixed>', array_intersect_key($mixed, $otherArrs));
		} else {
			assertType('mixed~array<mixed, mixed>', $mixed);
			/** @var array<int, string> $otherArrs */
			assertType('null', array_intersect_key($mixed, $otherArrs));
			/** @var array<string, int> $otherArrs */
			assertType('null', array_intersect_key($mixed, $otherArrs));
		}
	}

}
