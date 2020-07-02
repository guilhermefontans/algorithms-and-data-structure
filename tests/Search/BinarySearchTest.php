<?php

declare(strict_types=1);

namespace Tests\Search;

use Algorithms\Search\BinarySearch;
use PHPUnit\Framework\TestCase;

/**
 * Class BinarySearchTest
 *
 * @package Tests\Search
 */
class BinarySearchTest extends TestCase
{
    /**
     *
     */
    public function testSearch(): void
    {
        $array = [3, 6, 8, 13, 35, 56, 78, 89, 92, 95];

        $binarySearch = new BinarySearch();

        $key = $binarySearch->search($array, 78);
        $this->assertEquals(6, $key);

        $key = $binarySearch->search($array, 5);
        $this->assertEquals(-1, $key);
    }
}
