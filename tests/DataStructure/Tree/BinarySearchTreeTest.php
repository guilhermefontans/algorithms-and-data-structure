<?php

declare(strict_types=1);

namespace Tests\DataStructure\Tree;

use Algorithms\DataStructure\Tree\BinarySearchTree;
use PHPUnit\Framework\TestCase;

/**
 * Class BinarySearchTreeTest
 *
 * @package Tests\DataStructure\Tree
 */
class BinarySearchTreeTest extends TestCase
{
    /**
     * @var BinarySearchTree
     */
    private $bsTree;

    public function setUp(): void
    {
        $this->bsTree = new BinarySearchTree();
    }

    public function testCreateBinarySearchTree(): void
    {
        $this->assertInstanceOf(BinarySearchTree::class, $this->bsTree);
        $this->assertNull($this->bsTree->getRoot()->getValue());
        $this->assertNull($this->bsTree->getRoot()->getLeft());
        $this->assertNull($this->bsTree->getRoot()->getRight());
    }

    public function testCheckValuesInBinarySearchTree(): void
    {
        $this->bsTree->insert(10);
        $this->bsTree->insert(20);
        $this->bsTree->insert(5);

        $this->assertTrue($this->bsTree->contains(20));
        $this->assertFalse($this->bsTree->contains(15));
    }

    public function testInsertValuesInBinarySearchTree(): void
    {
        $this->bsTree->insert(10);
        $this->bsTree->insert(20);
        $this->bsTree->insert(5);
        $this->bsTree->insert(15);

        $this->assertEquals("5, 10, 15, 20", $this->bsTree->getRoot()->toString());
    }

    public function testRemoveNode(): void
    {
        $this->bsTree->insert(10);
        $this->bsTree->insert(20);
        $this->bsTree->insert(5);
        $this->bsTree->insert(15);
        $this->assertEquals("5, 10, 15, 20", $this->bsTree->getRoot()->toString());
        $this->bsTree->remove(15);
        $this->assertEquals("5, 10, 20", $this->bsTree->getRoot()->toString());
    }
}
