<?php

declare(strict_types=1);

namespace Algorithms\DataStructure\DoubleLinkedList;

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
     * @var int
     */
    public $previous;

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
