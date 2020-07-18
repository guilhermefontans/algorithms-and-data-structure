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
     * @var Node
     */
    public $tail;

    /**
     * LinkedList constructor.
     *
     * @param null $head
     * @param null $tail
     */
    public function __construct($head = null, $tail = null)
    {
        $this->head = $head;
        $this->tail = $tail;
    }

    /**
     * @param  int  $data
     * @return void
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
        $this->tail = $newNode;
    }

    /**
     * @param int $data
     */
    public function prepend(int $data): void
    {
        $newNode = new Node($data);
        $newNode->next = $this->head;
        $this->head = $newNode;

        if (is_null($this->tail)) {
            $this->tail = $newNode;
        }
    }

    /**
     * @param  int       $value
     * @return Node|null
     */
    public function find(int $value): ?Node
    {
        if (is_null($this->head)) {
            return null;
        }

        $current = $this->head;
        while (! is_null($current)) {
            if ($current->value == $value) {
                return $current;
            }
            $current = $current->next;
        }

        return null;
    }

    /**
     * @param  int  $value
     * @return void
     */
    public function delete(int $value): void
    {
        if (is_null($this->head)) {
            return;
        }

        if ($this->head->value == $value) {
            $this->head = $this->head->next;
        }

        $current = $this->head;

        while (is_null($current->next)) {
            if ($this->tail->value == $value) {
                $this->tail = $current;
            }

            if ($current->next->value == $value) {
                $current->next = $current->next->next;
                return;
            }
            $current = $current->next;
        }
    }

    public function deleteHead()
    {
        if (is_null($this->head)) {
            return null;
        }

        $deletedHead = $this->head;
        if ($this->head->next) {
            $this->head = $this->head->next;
        } else {
            $this->head = null;
            $this->tail = null;
        }

        return $deletedHead;
    }

    public function deleteTail()
    {
        $deletedTail = $this->tail;

        if ($this->tail === $this->head) {
            $this->head = null;
            $this->tail = null;

            return $deletedTail;
        }

        $current = $this->head;
        while (! is_null($current->next)) {
            if (is_null($current->next->next)) {
                $current->next = null;
            } else {
                $current = $current->next;
            }
        }
        $this->tail = $current;
        return $deletedTail;
    }
}
