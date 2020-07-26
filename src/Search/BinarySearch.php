<?php

declare(strict_types=1);

namespace Algorithms\Search;

/**
 * Class BinarySearch
 *
 * @package Algorithms\Search
 */
class BinarySearch
{
    /**
     * @param  array     $array
     * @param  int       $x
     * @return float|int
     */
    public function search(array $array, int $x)
    {
        $left = 0;
        $right = count($array) - 1;

        while ($left <= $right) {
            $mid = $left + (ceil(($right - $left) / 2));

            if ($array[$mid] === $x) {
                return $mid;
            }

            if ($x < $array[$mid]) {
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }
        return -1;
    }
}
