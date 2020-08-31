<?php

declare(strict_types=1);

namespace Algorithms\DataStructure\Tree;

/**
 * Class BinaryTreeNode
 *
 * @package Algorithms\DataStructure\Tree
 */
abstract class BinaryTreeNode
{
    /**
     * @var BinaryTreeNode|null
     */
    protected $value;

    /**
     * @var BinaryTreeNode|null
     */
    protected $left;

    /**
     * @var BinaryTreeNode|null
     */
    protected $parent;

    /**
     * @var BinaryTreeNode|null
     */
    protected $right;

    /**
     * BinaryTreeNode constructor.
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

    public function setLeft(BinaryTreeNode $node)
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

    public function setRight(BinaryTreeNode $node)
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

    public function removeChild(BinaryTreeNode $nodeToRemove)
    {
        if (! is_null($this->left) && $this->left === $nodeToRemove) {
            $this->left = null;
            return true;
        }

        if (! is_null($this->right) && $this->right === $nodeToRemove) {
            $this->right = null;
            return true;
        }

        return false;
    }

    public function copyNode(BinaryTreeNode $sourceNode, BinaryTreeNode $targetNode): void
    {
        $targetNode->setValue($sourceNode->getValue());
        $targetNode->setLeft($sourceNode->getLeft());
        $targetNode->setRight($sourceNode->getRight());
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
     * @param BinaryTreeNode|null $value
     */
    public function setValue(?BinaryTreeNode $value): void
    {
        $this->value = $value;
    }

    /**
     * @return BinaryTreeNode|null
     */
    public function getLeft(): ?BinaryTreeNode
    {
        return $this->left;
    }

    /**
     * @return BinaryTreeNode|null
     */
    public function getParent(): ?BinaryTreeNode
    {
        return $this->parent;
    }

    /**
     * @return BinaryTreeNode|null
     */
    public function getRight(): ?BinaryTreeNode
    {
        return $this->right;
    }
}
