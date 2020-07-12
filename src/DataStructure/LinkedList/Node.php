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
     * @var int
     */
    public $value;

    /**
     * Node constructor.
     *
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }
}
