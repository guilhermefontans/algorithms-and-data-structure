<?php

declare(strict_types=1);

namespace Algorithms\DataStructure\DoubleLinkedList;

/**
 * Class DoubleLinkedList
 *
 * @package Algorithms\DataStructure\DoubleLinkedList
 */
class DoubleLinkedList
{
    /**
     * @var Node|null
     */
    public $head;

    /**
     * @var Node|null
     */
    public $tail;

    /**
     * DoubleLinkedList constructor.
     *
     * @param null $head
     */
    public function __construct($head = null)
    {
        $this->head = $head;
    }

    /**
     * @param int $data
     */
    public function append(int $data): void
    {
        $newNode = new Node($data);
        if (is_null($this->head)) {
            $this->head = $newNode;
            $this->tail = $newNode;
            return;
        }

        $this->tail->next = $newNode;
        $newNode->previous = $this->tail;
        $this->tail = $newNode;
    }
}
