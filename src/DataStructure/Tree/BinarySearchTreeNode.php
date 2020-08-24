<?php

declare(strict_types=1);

namespace Algorithms\DataStructure\Tree;

use Algorithms\DataStructure\HashTable;

/**
 * Class BinarySearchTreeNode
 *
 * @package Algorithms\DataStructure\Tree
 */
class BinarySearchTreeNode
{
    /**
     * @var null
     */
    private $value;

    /**
     * @var BinarySearchTreeNode|null
     */
    private $left;

    /**
     * @var BinarySearchTreeNode|null
     */
    private $parent;

    /**
     * @var BinarySearchTreeNode|null
     */
    private $right;

    /**
     * @var HashTable
     */
    private $meta;

    /**
     * BinarySearchTreeNode constructor.
     *
     * @param null $value
     */
    public function __construct($value = null)
    {
        $this->left = null;
        $this->right = null;
        $this->parent = null;
        $this->value = $value;

        $this->meta = new HashTable();
    }

    public function getLeftHeight()
    {
        if (is_null($this->left)) {
            return 0;
        }

        return $this->left->getHeight() + 1;
    }

    public function getRightHeight()
    {
        if (is_null($this->right)) {
            return 0;
        }

        return $this->right->getHeight() + 1;
    }

    public function getHeight()
    {
        return max($this->getLeftHeight(), $this->getRightHeight());
    }

    public function getBalanceFactor()
    {
        return $this->getLeftHeight() - $this->getRightHeight();
    }

    public function setLeft(BinarySearchTreeNode $node)
    {
        if ($this->left) {
            $this->left->parent = null;
        }

        $this->left = $node;

        if ($this->left) {
            $this->left->parent = $this;
        }

        return $this;
    }

    public function setRight(BinarySearchTreeNode $node)
    {
        if ($this->right) {
            $this->right->parent = null;
        }

        $this->right = $node;

        if ($this->right) {
            $this->right->parent = $this;
        }

        return $this;
    }

    public function insert($value)
    {
        if (is_null($this->value)) {
            $this->value = $value;
            return $this;
        }

        if ($value < $this->value) {
            if (! is_null($this->left)) {
                return $this->left->insert($value);
            }

            $newNode = new BinarySearchTreeNode($value);
            $this->setLeft($newNode);
            return $newNode;
        }

        if ($value > $this->value) {
            if (! is_null($this->right)) {
                return $this->right->insert($value);
            }
            $newNode = new BinarySearchTreeNode($value);
            $this->setRight($newNode);
            return $newNode;
        }
    }

    /**
     * @return null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return BinarySearchTreeNode|null
     */
    public function getLeft(): ?BinarySearchTreeNode
    {
        return $this->left;
    }

    /**
     * @return BinarySearchTreeNode|null
     */
    public function getParent(): ?BinarySearchTreeNode
    {
        return $this->parent;
    }

    /**
     * @return BinarySearchTreeNode|null
     */
    public function getRight(): ?BinarySearchTreeNode
    {
        return $this->right;
    }
}