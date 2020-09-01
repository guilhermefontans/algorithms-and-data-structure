<?php

declare(strict_types=1);

namespace Tests\DataStructure\Tree;

use Algorithms\DataStructure\Tree\BinarySearchTreeNode;
use PHPUnit\Framework\TestCase;

/**
 * Class BinarySearchTreeNodeTest
 *
 * @package Tests\DataStructure\Tree
 */
class BinarySearchTreeNodeTest extends TestCase
{
    /**
     * @var BinarySearchTreeNode
     */
    private $bsTreeNode;

    public function setUp(): void
    {
        $this->bsTreeNode = new BinarySearchTreeNode(2);
        $nodeRight = new BinarySearchTreeNode(3);
        $nodeLeft = new BinarySearchTreeNode(1);

        $this->bsTreeNode->setRight($nodeRight);
        $this->bsTreeNode->setLeft($nodeLeft);
    }

    public function testInsertTree(): void
    {
        $this->assertEquals(2, $this->bsTreeNode->getValue());
        $this->assertEquals(3, $this->bsTreeNode->getRight()->getValue());
        $this->assertEquals(1, $this->bsTreeNode->getLeft()->getValue());
    }

    public function testRemove(): void
    {
        $this->bsTreeNode->insert(15);
        $this->bsTreeNode->insert(10);
        $this->bsTreeNode->insert(16);
        $this->bsTreeNode->insert(18);

        $this->bsTreeNode->remove(16);
        $this->assertEquals("1, 2, 3, 10, 15, 18", $this->bsTreeNode->toString());
    }

    public function testTraverseInOrder(): void
    {
        $this->bsTreeNode->insert(15);
        $this->bsTreeNode->insert(4);
        $this->bsTreeNode->insert(17);
        $this->bsTreeNode->insert(32);
        $this->bsTreeNode->insert(8);

        $this->assertEquals([1, 2, 3, 4, 8, 15, 17, 32], $this->bsTreeNode->traverseInOrder());
    }

    public function testToString(): void
    {
        $this->bsTreeNode->insert(32);
        $this->bsTreeNode->insert(18);
        $this->assertEquals("1, 2, 3, 18, 32", $this->bsTreeNode->toString());
    }

    public function testFindInTreeNode(): void
    {
        $this->assertEquals(2, $this->bsTreeNode->find(2)->getValue());
    }

    public function testRemoveChild(): void
    {
        $nodeToRemove = $this->bsTreeNode->find(1);
        $this->assertTrue($this->bsTreeNode->removeChild($nodeToRemove));
        $nodeToRemove = $this->bsTreeNode->find(3);
        $this->assertTrue($this->bsTreeNode->removeChild($nodeToRemove));
    }
}