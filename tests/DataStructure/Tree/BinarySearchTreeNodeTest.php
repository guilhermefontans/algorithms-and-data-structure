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
    public function testInsertTree(): void
    {
        $bsTreeNode = new BinarySearchTreeNode(2);
        $this->assertEquals(2, $bsTreeNode->getValue());
        $this->assertNull($bsTreeNode->getRight());
        $this->assertNull($bsTreeNode->getLeft());
    }
}
