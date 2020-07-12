<?php

declare(strict_types=1);


namespace Algorithms\DataStructure\LinkedList;

/**
 * Class LinkedList
 *
 * @package Algorithms\DataStructure\LinkedList
 */
class LinkedList
{
    /**
     * @var Node
     */
    public $head;

    /**
     * LinkedList constructor.
     *
     * @param Node|null $head
     */
    public function __construct($head = null)
    {
        $this->head = $head;
    }

    /**
     * @param  int   $data
     * @return $this
     */
    public function append(int $data)
    {
        if (is_null($this->head)) {
            $this->head = new Node($data);
            return $this;
        }

        /** @var Node $current */
        $current = $this->head;

        while (! is_null($current->next)) {
            $current = $current->next;
        }

        $current->next = new Node($data);
    }
}
