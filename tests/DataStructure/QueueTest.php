<?php

declare(strict_types=1);

namespace Tests\DataStructure;

use Algorithms\DataStructure\Queue;
use PHPUnit\Framework\TestCase;

/**
 * Class QueueTest
 *
 * @package Tests\DataStructure
 */
class QueueTest extends TestCase
{
    /**
     * @var Queue
     */
    protected $queue;

    public function setUp(): void
    {
        $this->queue = new Queue();
    }

    public function testPeekWillReturnNullWithEmptyQueue(): void
    {
        $this->assertNull($this->queue->peek());
    }

    public function testPeekWillReturnFirsElementInQueue(): void
    {
        $this->queue->enqueue(10);
        $this->assertEquals(10, $this->queue->peek());
    }

    public function testQueueWillEnqueueElementsBehindTheFirst(): void
    {
        $this->queue->enqueue(10);
        $this->queue->enqueue(20);
        $this->queue->enqueue(30);

        $this->assertEquals(10, $this->queue->peek());
    }

    public function testDequeueWillRemoveFirstElementOfTheQueue(): void
    {
        $this->queue->enqueue(10);
        $this->queue->enqueue(20);
        $this->queue->dequeue();

        $this->assertEquals(20, $this->queue->peek());
    }
}
