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
    /**
     * @var LinkedList
     */
    protected $linkedList;

    public function setUp(): void
    {
        $this->linkedList = new LinkedList();
    }

    public function testHeadAndTailWillBeNullInAnEmptyLinkedList(): void
    {
        $this->assertNull($this->linkedList->head);
        $this->assertNull($this->linkedList->tail);
    }

    public function testAppendInLinkedList(): void
    {
        $this->linkedList->append(10);
        $this->linkedList->append(30);

        $this->assertEquals(10, $this->linkedList->head->value);
        $this->assertEquals(30, $this->linkedList->tail->value);
        $this->assertNull($this->linkedList->head->next->next);
    }

    public function testDeleteTail(): void
    {
        $this->linkedList->append(10);
        $this->linkedList->append(20);
        $this->linkedList->append(30);

        $this->assertEquals(10, $this->linkedList->head->value);
        $this->assertEquals(30, $this->linkedList->tail->value);

        $this->linkedList->deleteTail();
        $this->assertEquals(20, $this->linkedList->tail->value);
    }

    public function testDeleteHead(): void
    {
        $this->linkedList->append(10);
        $this->linkedList->append(20);
        $this->linkedList->append(30);

        $this->assertEquals(10, $this->linkedList->head->value);
        $this->assertEquals(30, $this->linkedList->tail->value);

        $this->linkedList->deleteHead();
        $this->assertEquals(20, $this->linkedList->head->value);
    }

    public function testPrePendInLinkedList(): void
    {
        $this->linkedList->append(20);
        $this->linkedList->prepend(10);
        $this->linkedList->append(40);

        $this->assertEquals(10, $this->linkedList->head->value);
        $this->assertEquals(40, $this->linkedList->tail->value);
        $this->assertNull($this->linkedList->head->next->next->next);
        $this->assertInstanceOf(Node::class, $this->linkedList->head->next);
    }

    public function testDeleteWillReorganizeHeadInLinkedList(): void
    {
        $this->linkedList->append(20);
        $this->linkedList->prepend(10);
        $this->linkedList->append(30);
        $this->linkedList->append(40);
        $this->linkedList->append(50);

        $this->assertEquals(10, $this->linkedList->head->value);
        $this->assertEquals(50, $this->linkedList->tail->value);

        $this->linkedList->delete(10);
        $this->assertEquals(20, $this->linkedList->head->value);
    }

    public function testDeleteWillReorganizeTailInLinkedList(): void
    {
        $this->linkedList->append(10);
        $this->linkedList->append(20);
        $this->linkedList->append(30);

        $this->assertEquals(10, $this->linkedList->head->value);
        $this->assertEquals(30, $this->linkedList->tail->value);

        $this->linkedList->delete(30);
        $this->assertEquals(20, $this->linkedList->tail->value);
    }


    public function testFindWillReturnNullWhenNotFoundData(): void
    {
        $this->assertNull($this->linkedList->find(30));
    }

    public function testFindWillReturnTheNodeRequested(): void
    {
        $this->linkedList->append(10);
        $this->linkedList->append(20);
        $this->linkedList->append(30);

        $this->assertEquals(20, $this->linkedList->find(20)->value);
        $this->assertInstanceOf(Node::class, $this->linkedList->find(10));
    }
}
