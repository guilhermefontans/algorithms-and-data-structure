<?php

declare(strict_types=1);


namespace Algorithms\DataStructure\Tree;

/**
 * Class BinarySearchTree
 *
 * @package Algorithms\DataStructure\Tree
 */
class BinarySearchTree
{
    /**
     * @var BinarySearchTreeNode
     */
    private $root;

    public function __construct()
    {
        $this->root = new BinarySearchTreeNode(null);
    }

    public function insert($value)
    {
        return $this->root->insert($value);
    }

    public function contains($value)
    {
        return $this->root->contains($value);
    }

    public function remove($value)
    {
        return $this->root->remove($value);
    }

    public function toString(): void
    {
        $this->root->toString();
    }

    /**
     * @return BinarySearchTreeNode
     */
    public function getRoot(): BinarySearchTreeNode
    {
        return $this->root;
    }
}