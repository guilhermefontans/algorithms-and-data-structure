<?php

declare(strict_types=1);

namespace Algorithms\DataStructure\Trie;

use Algorithms\DataStructure\HashTable;

/**
 * Class TrieNode
 *
 * @package Algorithms\DataStructure\Trie
 */
final class TrieNode
{
    /**
     * @var string
     */
    private $character;

    /**
     * @var bool
     */
    private $isCompletedWord;

    /**
     * @var HashTable
     */
    private $children;

    /**
     * TrieNode constructor.
     *
     * @param string $character
     * @param bool   $isCompletedWord
     */
    public function __construct(string $character, bool $isCompletedWord = false)
    {
        $this->character = $character;
        $this->isCompletedWord = $isCompletedWord;
        $this->children = new HashTable();
    }

    /**
     * @param $character
     * @param bool $isCompletedWord
     *
     * @return TrieNode
     */
    public function addChild($character, $isCompletedWord = false): TrieNode
    {
        if (! $this->children->has($character)) {
            $this->children->set($character, new TrieNode($character, $isCompletedWord));
        }

        /** @var TrieNode $childNode */
        $childNode = $this->children->get($character);
        $childNode->isCompletedWord = $childNode->isCompletedWord ?: $isCompletedWord;

        return $childNode;
    }

    /**
     * @param $character
     *
     * @return TrieNode|null
     */
    public function getChild($character): ?TrieNode
    {
        return $this->children->get($character);
    }

    public function removeChild($character): void
    {
        /** @var TrieNode $childNode */
        $childNode = $this->getChild($character);

        if ($childNode && ! $childNode->isCompletedWord && ! $childNode->hasChildren()) {
            $this->children->delete($character);
        }
    }

    public function hasChildren()
    {
        return count($this->children->getKeys()) !== 0;
    }

    public function hasChild($character)
    {
        return $this->children->has($character);
    }

    public function isCompletedWord()
    {
        return $this->isCompletedWord;
    }
}
