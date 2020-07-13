<?php

declare(strict_types=1);

namespace Tests\DataStructure\LinkedList;

use Algorithms\DataStructure\LinkedList\LinkedList;
use Algorithms\DataStructure\LinkedList\Node;
use PHPUnit\Framework\TestCase;

/**
 * Class LinkedListTest
 *
 * @package Tests\DataStructure\LinkedList
 */
class LinkedListTest extends TestCase
{
    public function testAppend(): void
    {
        $linkedList = new LinkedList();
        $linkedList->append(10);
        $linkedList->append(30);

        $this->assertEquals(10, $linkedList->head->value);
        $this->assertEquals(30, $linkedList->head->next->value);
        $this->assertNull($linkedList->head->next->next);
    }

    public function testPrepend(): void
    {
        $linkedList = new LinkedList();
        $linkedList->append(20);
        $linkedList->prepend(10);
        $linkedList->append(40);

        $this->assertEquals(10, $linkedList->head->value);
        $this->assertEquals(40, $linkedList->head->next->next->value);
        $this->assertNull($linkedList->head->next->next->next);
        $this->assertInstanceOf(Node::class, $linkedList->head->next);
    }

    public function testDelete(): void
    {
        $linkedList = new LinkedList();
        $linkedList->append(20);
        $linkedList->prepend(10);
        $linkedList->append(40);

        $this->assertEquals(10, $linkedList->head->value);
        $this->assertEquals(40, $linkedList->head->next->next->value);

        $linkedList->delete(10);
        $this->assertEquals(20, $linkedList->head->value);
    }

    public function testFind(): void
    {
        $linkedList = new LinkedList();

        $this->assertNull($linkedList->find(30));

        $linkedList->append(20);
        $linkedList->prepend(10);
        $linkedList->append(40);

        $this->assertEquals(20, $linkedList->find(20)->value);
        $this->assertInstanceOf(Node::class, $linkedList->find(10));
        $this->assertNull($linkedList->find(30));
    }
}
