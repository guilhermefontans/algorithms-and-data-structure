<?php

declare(strict_types=1);

namespace Algorithms\DataStructure;

use Algorithms\DataStructure\LinkedList\LinkedList;

/**
 * Class Queue
 * @package Algorithms\DataStructure
 */
class Queue
{
    /**
     * @var LinkedList
     */
    private $linkedList;

    public function __construct()
    {
        $this->linkedList = new LinkedList();
    }

    public function peek(): ?int
    {
        if (is_null($this->linkedList->head)) {
            return null;
        }
        return $this->linkedList->head->value;
    }


    public function dequeue(): void
    {
        $this->linkedList->deleteHead();
    }

    public function enqueue(int $data): void
    {
        $this->linkedList->append($data);
    }
}
