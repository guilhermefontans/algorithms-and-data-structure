<?php

declare(strict_types=1);

namespace Tests\Sort;

use Algorithms\Sort\QuickSort;
use PHPUnit\Framework\TestCase;

/**
 * Class QuickSortTest
 *
 * @package Tests\Sort
 */
class QuickSortTest extends TestCase
{
    public function testSort(): void
    {
        $arrayToCompare = $arrayUnsorted = range(1, 100);
        shuffle($arrayUnsorted);

        $quickSort = new QuickSort();
        $arraySorted = $quickSort->sort($arrayUnsorted);
        $this->assertEquals($arrayToCompare, $arraySorted);
    }
}
