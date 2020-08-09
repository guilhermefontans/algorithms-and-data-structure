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
    protected $size = 0;

    protected $items = [];

    public function peek()
    {
        return $this->items[0];
    }

    public function pool(): void
    {
        $this->items[0] = $this->items[$this->size - 1];
        $this->size--;
        $this->heapifyDown();
    }

    public function add(int $item): void
    {
        $this->items[$this->size] = $item;
        $this->size++;
        $this->heapifyUp();
    }

    public function heapifyUp(): void
    {
        $index = $this->size - 1;

        while ($this->hasParent($index) && $this->getParent($index) > $this->items[$index]) {
            $this->swap($this->getParentIndex($index), $index);
            $index = $this->getParentIndex($index);
        }
    }

    public function heapifyDown(): void
    {
        $index = 0;
        while ($this->hasLeftChild($index)) {
            $smallerChildIndex = $this->getLeftChildIndex($index);
            if ($this->hasRightChild($index) && $this->getRightChild($index) < $this->getLeftChild($index)) {
                $smallerChildIndex = $this->getRightChildIndex($index);
            }

            if ($this->items[$index] < $this->items[$smallerChildIndex]) {
                break;
            }

            $this->swap($index, $smallerChildIndex);
            $index = $smallerChildIndex;
        }
    }

    private function swap(int $firstIndex, int $secondIndex): void
    {
        $tmp = $this->items[$firstIndex];
        $this->items[$firstIndex] = $this->items[$secondIndex];
        $this->items[$secondIndex] = $tmp;
    }

    /**
     * @param  int       $parentIndex
     * @return float|int
     */
    private function getLeftChildIndex(int $parentIndex)
    {
        return (2 * $parentIndex) + 1;
    }

    /**
     * @param  int       $parentIndex
     * @return float|int
     */
    private function getRightChildIndex(int $parentIndex)
    {
        return (2 * $parentIndex) + 2;
    }

    /**
     * @param  int $childIndex
     * @return int
     */
    private function getParentIndex(int $childIndex): int
    {
        return (int) floor(($childIndex - 1) / 2);
    }

    /**
     * @param  int $index
     * @return int
     */
    private function getLeftChild(int $index): int
    {
        return $this->items[$this->getLeftChildIndex($index)];
    }

    /**
     * @param  int $index
     * @return int
     */
    private function getRightChild(int $index): int
    {
        return $this->items[$this->getRightChildIndex($index)];
    }

    /**
     * @param  int   $index
     * @return mixed
     */
    private function getParent(int $index)
    {
        return $this->items[$this->getParentIndex($index)];
    }

    /**
     * @param  int  $index
     * @return bool
     */
    private function hasParent(int $index): bool
    {
        return $this->getParentIndex($index) >= 0;
    }

    /**
     * @param  int  $index
     * @return bool
     */
    private function hasLeftChild(int $index): bool
    {
        return $this->getLeftChildIndex($index) < $this->size;
    }

    /**
     * @param  int  $index
     * @return bool
     */
    private function hasRightChild(int $index): bool
    {
        return $this->getRightChildIndex($index) < $this->size;
    }
}
