<?php


namespace Tests\DataStructure;

use Algorithms\DataStructure\Heap;
use PHPUnit\Framework\TestCase;

/**
 * Class HeapTest
 *
 * @package Tests\DataStructure
 */
class HeapTest extends TestCase
{
    /**
     * @var Heap
     */
    private $heap;

    public function setUp(): void
    {
        $this->heap = new Heap();
    }

    public function testIfHeapWillReplaceHeadWhenLesserNumberIsAdded()
    {
        $this->heap->add(10);
        $this->heap->add(15);
        $this->heap->add(20);
        $this->heap->add(17);
        $this->heap->add(8);

        $this->assertEquals(8, $this->heap->peek());
    }

    public function testIfHeapWillActualizeHeadWhenTheIndexIsRemoved()
    {
        $this->heap->add(10);
        $this->heap->add(15);
        $this->heap->add(20);
        $this->heap->add(17);

        $this->heap->pool();

        $this->assertEquals(15, $this->heap->peek());
    }
}