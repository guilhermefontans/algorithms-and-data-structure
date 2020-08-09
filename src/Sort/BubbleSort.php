<?php

declare(strict_types=1);

namespace Algorithms\Sort;

/**
 * Class BubbleSort
 *
 * @package Algorithms\Sort
 */
final class BubbleSort
{
    /**
     * @param  array<int> $array
     * @return array<int>
     */
    public function sort(array $array): array
    {
        $isSorted = false;
        $lastUnsorted = count($array) - 1;

        while (! $isSorted) {
            $isSorted = true;
            for ($i = 0; $i < $lastUnsorted; $i++) {
                if ($array[$i] > $array[$i + 1]) {
                    $aux = $array[$i];
                    $array[$i] = $array[$i + 1];
                    $array[$i + 1] = $aux;
                    $isSorted = false;
                }
            }
            $lastUnsorted--;
        }
        return $array;
    }
}
