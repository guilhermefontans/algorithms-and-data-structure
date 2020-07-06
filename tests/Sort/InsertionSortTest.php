<?php

declare(strict_types=1);

namespace Tests\Sort;

use Algorithms\Sort\InsertionSort;
use PHPStan\Testing\TestCase;

/**
 * Class InsertionSortTest
 *
 * @package Tests\Sort
 */
class InsertionSortTest extends TestCase
{
    public function testSort(): void
    {
        $arrayUnsorted = [4, 5, 6, 2, 19, 30, 1, 27];
        $arrayToCompare = [1, 2, 4, 5, 6, 19, 27, 30];

        $insertionSort = new InsertionSort($arrayUnsorted);
        $insertionSort->sort();
        $this->assertEquals($arrayToCompare, $insertionSort->getArray());
    }
}
