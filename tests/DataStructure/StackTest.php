<?php

declare(strict_types=1);

namespace Tests\DataStructure;

use Algorithms\DataStructure\Stack;
use PHPUnit\Framework\TestCase;

/**
 * Class StackTest
 *
 * @package Tests\DataStructure
 */
class StackTest extends TestCase
{
    /**
     * @var Stack
     */
    protected $stack;

    public function setUp(): void
    {
        $this->stack = new Stack();
    }

    public function testPeekWillReturnNullWithEmptyStack(): void
    {
        $this->assertNull($this->stack->peek());
    }

    public function testPeekWillReturnFirsElementInStack(): void
    {
        $this->stack->push(10);
        $this->assertEquals(10, $this->stack->peek());
    }

    public function testPushWillPutElementsInFrontTheFirst(): void
    {
        $this->stack->push(10);
        $this->stack->push(20);
        $this->stack->push(30);

        $this->assertEquals(30, $this->stack->peek());
    }

    public function testPopWillRemoveFirstElementOfTheStack(): void
    {
        $this->stack->push(10);
        $this->stack->push(20);
        $this->stack->pop();

        $this->assertEquals(10, $this->stack->peek());
    }
}
