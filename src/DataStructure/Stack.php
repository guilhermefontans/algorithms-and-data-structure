<?php

declare(strict_types=1);

namespace Algorithms\DataStructure;

use Algorithms\DataStructure\LinkedList\LinkedList;

/**
 * Class Stack
 *
 * @package Algorithms\DataStructure
 */
class Stack
{
    /**
     * @var LinkedList
     */
    protected $linkedList;

    public function __construct()
    {
        $this->linkedList = new LinkedList();
    }

    public function peek()
    {
        if (is_null($this->linkedList->head)) {
            return null;
        }

        return $this->linkedList->head->value;
    }

    public function push(int $data): void
    {
        $this->linkedList->prepend($data);
    }

    public function pop(): void
    {
        $this->linkedList->deleteHead();
    }
}
