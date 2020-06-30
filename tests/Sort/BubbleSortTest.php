<?php

namespace Tests\Sort;

use Algorithms\Sort\BubbleSort;
use PHPUnit\Framework\TestCase;

/**
 * Class BubbleSortTest
 *
 * @package Tests\Sort
 */
class BubbleSortTest extends TestCase
{
    public function testSort()
    {
        $arrayUnsorted  = [4, 5, 6, 2, 19, 30, 1, 27];
        $arrayToCompare = [1, 2, 4, 5, 6, 19, 27, 30];

        $bubbleSort = new BubbleSort();
        $arraySorted = $bubbleSort->sort($arrayUnsorted);
        $this->assertEquals($arrayToCompare, $arraySorted);
    }

}