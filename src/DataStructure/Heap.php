<?php

declare(strict_types=1);


namespace Algorithms\DataStructure;

/**
 * Class Heap
 *
 * @package Algorithms\DataStructure
 */
class Heap
{
    /**
     * @param  int       $parentIndex
     * @return float|int
     */
    public function getLeftChildIndex(int $parentIndex)
    {
        return (2 * $parentIndex) + 1;
    }

    /**
     * @param  int       $parentIndex
     * @return float|int
     */
    public function getRightChildIndex(int $parentIndex)
    {
        return (2 * $parentIndex) + 2;
    }

    /**
     * @param  int   $childIndex
     * @return float
     */
    public function getParentIndex(int $childIndex): float
    {
        return floor(($childIndex - 1) / 2);
    }
}
