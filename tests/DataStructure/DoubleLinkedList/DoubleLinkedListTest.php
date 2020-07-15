<?php

declare(strict_types=1);

namespace Tests\DataStructure\DoubleLinkedList;

use Algorithms\DataStructure\DoubleLinkedList\DoubleLinkedList;
use PHPUnit\Framework\TestCase;

/**
 * Class LinkedListTest
 *
 * @package Tests\DataStructure\LinkedList
 */
class DoubleLinkedListTest extends TestCase
{
    public function testAppend(): void
    {
        $linkedList = new DoubleLinkedList();
        $linkedList->append(10);
        $linkedList->append(20);
        $linkedList->append(30);

        $this->assertEquals(10, $linkedList->head->value);
        $this->assertEquals(20, $linkedList->head->next->value);
        $this->assertEquals(10, $linkedList->tail->previous->previous->value);
        $this->assertNull($linkedList->head->next->next->next);
    }
}
