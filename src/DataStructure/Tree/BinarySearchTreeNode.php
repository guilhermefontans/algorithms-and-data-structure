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
     * @var BinarySearchTreeNode|null
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

    public function find($value)
    {
        if ($value === $this->getValue()) {
            return $this;
        }

        if ($value < $this->getValue()) {
            return $this->left->find($value);
        }

        if ($value > $this->getValue()) {
            return $this->right->find($value);
        }

        return null;
    }

    public function removeChild(BinarySearchTreeNode $nodeToRemove)
    {
        if (! is_null($this->left && $this->left === $nodeToRemove)) {
            $this->left = null;
            return true;
        }

        if (! is_null($this->right && $this->right === $nodeToRemove)) {
            $this->right = null;
            return true;
        }

        return false;
    }

    public function remove($value)
    {
        $nodeToRemove = $this->find($value);

        if (is_null($nodeToRemove)) {
            return false;
        }

        $parent = $nodeToRemove->getParent();

        if (is_null($nodeToRemove->getLeft()) && is_null($nodeToRemove->getRight())) {
            if ($parent) {
                $parent->removeChild($nodeToRemove);
            } else {
                $nodeToRemove->setValue(null);
            }
        } elseif (! is_null($nodeToRemove->getLeft()) && ! is_null($nodeToRemove->getRight())) {
            $nextBiggerNode = $nodeToRemove->getRight()->findMin();

            if ($nextBiggerNode !== $nodeToRemove->getRight()) {
                $this->remove($nextBiggerNode->getValue());
                $nodeToRemove->setValue($nextBiggerNode->getValue());
            } else {
                $nodeToRemove->setValue($nodeToRemove->getRight()->getValue());
                $nodeToRemove->setRight($nodeToRemove->getRight()->getRight());
            }
        } else {
            $childNode = $nodeToRemove->getLeft() ?: $nodeToRemove->getRight();

            if ($parent) {
                $parent->replaceChild($nodeToRemove, $childNode);
            } else {
                $this->copyNode($childNode, $nodeToRemove);
            }
        }

        $nodeToRemove->parent = null;
        return true;
    }

    public function copyNode(BinarySearchTreeNode $sourceNode, BinarySearchTreeNode $targetNode): void
    {
        $targetNode->setValue($sourceNode->getValue());
        $targetNode->setLeft($sourceNode->getLeft());
        $targetNode->setRight($sourceNode->getRight());
    }

    public function findMin()
    {
        if (! $this->left) {
            return $this;
        }

        return $this->left->findMin();
    }

    public function replaceChild($nodeToReplace, $replacementNode)
    {
        if (! $nodeToReplace || ! $replacementNode) {
            return false;
        }

        if ($this->left && $this->left === $nodeToReplace) {
            $this->left = $replacementNode;
            return true;
        }

        if ($this->right && $this->right === $nodeToReplace) {
            $this->right = $replacementNode;
            return true;
        }
        return false;
    }

    public function traverseInOrder()
    {
        $traverse = [];
        if ($this->left) {
            $traverse = array_merge($traverse, $this->getLeft()->traverseInOrder());
        }

        $traverse[] = $this->value;

        if ($this->right) {
            $traverse = array_merge($traverse, $this->getRight()->traverseInOrder());
        }
        return $traverse;
    }

    public function toString()
    {
        return implode(', ', $this->traverseInOrder());
    }

    /**
     * @return null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param BinarySearchTreeNode|null $value
     */
    public function setValue(?BinarySearchTreeNode $value): void
    {
        $this->value = $value;
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
