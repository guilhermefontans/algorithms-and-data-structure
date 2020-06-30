<?php

namespace Algorithms\Sort;

/**
 * Class BubbleSort
 * @package Algorithms\Sort
 */
class BubbleSort
{
    public function sort(array $array)
    {
        $isSorted = false;
        $lastUnsorted = count($array) -1;

        while(!$isSorted) {
            $isSorted = true;
            for ($i = 0; $i < $lastUnsorted; $i++) {
                if ($array[$i] > $array[$i+1]) {
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