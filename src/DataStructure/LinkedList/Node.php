<?php

declare(strict_types=1);

namespace Algorithms\DataStructure\LinkedList;

/**
 * Class Node
 */
class Node
{
    /**
     * @var Node
     */
    public $next;

    /**
     * @var
     */
    public $value;

    /**
     * Node constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }
}
