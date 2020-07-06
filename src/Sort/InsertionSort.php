<?php

declare(strict_types=1);

namespace Algorithms\Sort;

/**
 * Class InsertionSort
 *
 * @package Algorithms\Sort
 */
class InsertionSort
{
    /**
     * @var array<int>
     */
    private $array;

    /**
     * InsertionSort constructor.
     *
     * @param array<int> $array
     */
    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function sort(): void
    {
        for ($i = 0; $i < count($this->array); $i++) {
            $currentIndex = $i;
            while (
                isset($this->array[$currentIndex - 1])
                && $this->array[$currentIndex] < $this->array[$currentIndex - 1]
            ) {
                $aux = $this->array[$currentIndex];
                $this->array[$currentIndex] = $this->array[$currentIndex - 1];
                $this->array[$currentIndex - 1] = $aux;
                $currentIndex--;
            }
        }
    }

    /**
     * @return array<int>
     */
    public function getArray(): array
    {
        return $this->array;
    }
}
