<?php

declare(strict_types=1);

namespace Algorithms\Sort;

/**
 * Class SelectionSortTest
 *
 * @package Algorithms\Sort
 */
class SelectionSort
{
    /**
     * @param  array<int> $array
     * @return array<int>
     */
    public function sort(array $array): array
    {
        for ($i = 0; $i < count($array) - 1; $i++) {
            $minIndex = $i;

            for ($j = $i + 1; $j < count($array); $j++) {
                if ($array[$j] < $array[$minIndex]) {
                    $minIndex = $j;
                }
            }

            if ($minIndex != $i) {
                [$array[$i], $array[$minIndex]] = [$array[$minIndex], $array[$i]];
            }
        }
        return $array;
    }
}
