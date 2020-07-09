<?php

declare(strict_types=1);

namespace Algorithms\Sort;

/**
 * Class QuickSort
 *
 * @package Algorithms\Sort
 */
class QuickSort
{
    /**
     * @param  array<int> $array
     * @return array<int>
     */
    public function sort(array $array): array
    {
        if (count($array) <= 1) {
            return $array;
        }

        $pivot = $this->parseStringToBigInt(array_shift($array));
        $arrayLeft = $arrayRight = [];
        $centerArray = [$pivot];

        foreach ($array as $item) {
            $currentElement = $this->parseStringToBigInt($item);

            if ($currentElement === $pivot) {
                array_push($centerArray, $currentElement);
            } elseif ($currentElement < $pivot) {
                array_push($arrayLeft, $currentElement);
            } else {
                array_push($arrayRight, $currentElement);
            }
        }

        $leftArraySorted = $this->sort($arrayLeft);
        $rightArraySorted = $this->sort($arrayRight);

        return array_merge($leftArraySorted, $centerArray, $rightArraySorted);
    }

    /**
     * @param $string
     * @return \GMP|resource
     */
    private function parseStringToBigInt($string)
    {
        if (! is_string($string)) {
            return $string;
        }
        return \gmp_init($string);
    }
}
