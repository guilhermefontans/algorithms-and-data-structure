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

    public function testFindInTreeNode()
    {
        $this->assertEquals(2, $this->bsTreeNode->find(2)->getValue());
    }

    public function testRemoveChild()
    {
        $nodeToRemove = $this->bsTreeNode->find(1);
        $this->assertTrue($this->bsTreeNode->removeChild($nodeToRemove));
        $nodeToRemove = $this->bsTreeNode->find(3);
        $this->assertTrue($this->bsTreeNode->removeChild($nodeToRemove));
    }
}
