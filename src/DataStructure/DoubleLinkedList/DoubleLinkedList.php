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

    /**
     * @param int $value
     */
    public function delete(int $value): void
    {
        if (is_null($this->head)) {
            return;
        }

        $deletedNode = null;
        $current = $this->head;
        while (! is_null($current)) {
            if ($current->value === $value) {
                $deletedNode = $current;

                if ($deletedNode === $this->head) {
                    $this->head = $deletedNode->next;
                    if (! is_null($this->head)) {
                        $this->head->previous = null;
                    }

                    if ($deletedNode === $this->tail) {
                        $this->tail = null;
                    }
                } elseif ($deletedNode === $this->tail) {
                    $this->tail = $deletedNode->previous;
                    $this->tail->next = null;
                } else {
                    $previousNode = $deletedNode->previous;
                    $nextNode = $deletedNode->next;
                    $previousNode->next = $nextNode;
                    $nextNode->previous = $previousNode;
                }
            }
            $current = $current->next;
        }
    }
}
