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
        $childNode->isCompletedWord = $childNode->isCompletedWord
            ?:
            $isCompletedWord;

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

    /**
     * @param $character
     */
    public function removeChild($character): void
    {
        /** @var TrieNode $childNode */
        $childNode = $this->getChild($character);

        if ($childNode && ! $childNode->isCompletedWord && ! $childNode->hasChildren()) {
            $this->children->delete($character);
        }
    }

    /**
     * @return bool
     */
    public function hasChildren(): bool
    {
        return count($this->children->getKeys()) !== 0;
    }

    /**
     * @param $character
     *
     * @return bool
     */
    public function hasChild($character): bool
    {
        return $this->children->has($character);
    }

    /**
     * @return bool
     */
    public function isCompletedWord(): bool
    {
        return $this->isCompletedWord;
    }

    /**
     * @param bool $isCompletedWord
     */
    public function setIsCompletedWord(bool $isCompletedWord): void
    {
        $this->isCompletedWord = $isCompletedWord;
    }

    public function suggestChildren()
    {
        return array_keys($this->children->getKeys());
    }

    public function toString()
    {
        $childrenAsString = implode(',', $this->suggestChildren());
        $childrenAsString = $childrenAsString ? ":{$childrenAsString}" : '';
        $isCompleteString = $this->isCompletedWord ? '*' : '';
        return $this->character . $isCompleteString . $childrenAsString;
    }

    /**
     * @return string
     */
    public function getCharacter(): string
    {
        return $this->character;
    }
}
