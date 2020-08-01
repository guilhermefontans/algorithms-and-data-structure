<?php

declare(strict_types=1);

namespace Tests\Search;

use Algorithms\Search\LinearSearch;
use PHPUnit\Framework\TestCase;

/**
 * Class LinearSearchTest
 *
 * @package Tests\Search
 */
class LinearSearchTest extends TestCase
{
    public function testSearch(): void
    {
        $array = range(0, 100);

        $binarySearch = new LinearSearch();

        $key = $binarySearch->search($array, 78);
        $this->assertEquals(78, $key);

        $key = $binarySearch->search($array, 101);
        $this->assertEquals(-1, $key);
    }
}
