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
     * @param  int  $data
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
            if ($current->next->value == $value) {
                $current->next = $current->next->next;
                return;
            }
            $current = $current->next;
        }
    }
}
