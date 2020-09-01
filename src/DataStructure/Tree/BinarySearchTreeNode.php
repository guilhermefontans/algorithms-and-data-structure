<?php

declare(strict_types=1);

namespace Algorithms\DataStructure\Tree;

/**
 * Class BinarySearchTreeNode
 *
 * @package Algorithms\DataStructure\Tree
 */
class BinarySearchTreeNode extends BinaryTreeNode
{

    /**
     * BinarySearchTreeNode constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
    }

    /**
     * @param $value
     *
     * @return $this|BinaryTreeNode
     */
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

        if (! is_null($this->left) && $value < $this->getValue()) {
            return $this->left->find($value);
        }

        if (! is_null($this->right) && $value > $this->getValue()) {
            return $this->right->find($value);
        }

        return null;
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

    public function contains($value)
    {
        return (bool) $this->find($value);
    }

    public function findMin()
    {
        if (! $this->left) {
            return $this;
        }

        return $this->left->findMin();
    }
}