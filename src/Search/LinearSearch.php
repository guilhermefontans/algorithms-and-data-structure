<?php

declare(strict_types=1);

namespace Algorithms\Search;

/**
 * Class LinearSearch
 * @package Algorithms\Search
 */
class LinearSearch
{
    /**
     * @return int
     */
    public function search(array $array, int $needle): int
    {
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i] === $needle) {
                return $i;
            }
        }
        return -1;
    }
}
