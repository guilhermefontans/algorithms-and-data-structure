<?php

declare(strict_types=1);

namespace Tests\DataStructure\LinkedList;

use Algorithms\DataStructure\LinkedList\LinkedList;
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
}
