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
     * @return void
     */
    public function append(int $data): void
    {
        if (is_null($this->head)) {
            $this->head = new Node($data);
            return;
        }

        /** @var Node $current */
        $current = $this->head;

        while (! is_null($current->next)) {
            $current = $current->next;
        }

        $current->next = new Node($data);
    }

    /**
     * @param int $data
     */
    public function prepend(int $data): void
    {
        $nextHead = new Node($data);
        $nextHead->next = $this->head;
        $this->head = $nextHead;
    }
}
