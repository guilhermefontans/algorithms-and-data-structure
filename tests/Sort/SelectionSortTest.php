<?php

declare(strict_types=1);


namespace Tests\Sort;

use Algorithms\Sort\SelectionSort;
use PHPUnit\Framework\TestCase;

class SelectionSortTest extends TestCase
{
    public function testSort(): void
    {
        $arrayToCompare = $arrayUnsorted = range(1, 10);
        shuffle($arrayUnsorted);

        $selectionSort = new SelectionSort();
        $arraySorted = $selectionSort->sort($arrayUnsorted);
        $this->assertEquals($arrayToCompare, $arraySorted);
    }
}
