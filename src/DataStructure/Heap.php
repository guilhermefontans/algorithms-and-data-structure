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

    public function pool()
    {
        $this->items[0] = $this->items[$this->size -1];
        $this->size--;
        $this->heapifyDown();
    }

    public function add(int $item)
    {
        $this->items[$this->size] = $item;
        $this->size++;
        $this->heapifyUp();
    }

    private function swap(int $firstIndex, int $secondIndex)
    {
        $tmp = $this->items[$firstIndex];
        $this->items[$firstIndex] = $this->items[$secondIndex];
        $this->items[$secondIndex] = $tmp;
    }

    public function heapifyUp()
    {
        $index = $this->size -1;

        while ($this->hasParent($index) && $this->getParent($index) > $this->items[$index]) {
            $this->swap($this->getParentIndex($index), $index);
            $index = $this->getParentIndex($index);
        }
    }

    public function heapifyDown()
    {
        $index = 0;
        while ($this->hasLeftChild($index)) {
            $smallerChildIndex = $this->getLeftChildIndex($index);
            if ($this->hasRightChild($index) && $this->getRightChild($index) < $this->getLeftChild($index)) {
                $smallerChildIndex = $this->getRightChildIndex($index);
            }

            if ($this->items[$index] < $this->items[$smallerChildIndex]) {
                break;
            } else {
                $this->swap($index, $smallerChildIndex);
            }

            $index = $smallerChildIndex;
        }
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
     * @param  int   $childIndex
     * @return int
     */
    private function getParentIndex(int $childIndex)
    {
        return floor(($childIndex - 1) / 2);
    }

    /**
     * @param int $index
     * @return mixed
     */
    private function getLeftChild(int $index)
    {
        return $this->items[$this->getLeftChild($index)];
    }

    /**
     * @param int $index
     * @return mixed
     */
    private function getRightChild(int $index)
    {
        return $this->items[$this->getRightChild($index)];
    }

    /**
     * @param int $index
     * @return mixed
     */
    private function getParent(int $index)
    {
        return $this->items[$this->getParent($index)];
    }

    /**
     * @param int $index
     * @return bool
     */
    private function hasParent(int $index)
    {
        return $this->getParentIndex($index) >= 0;
    }

    /**
     * @param int $index
     * @return bool
     */
    private function hasLeftChild(int $index)
    {
        return $this->getLeftChildIndex($index) < $this->size;
    }

    /**
     * @param int $index
     * @return bool
     */
    private function hasRightChild(int $index)
    {
        return $this->getRightChildIndex($index) < $this->size;
    }
}
