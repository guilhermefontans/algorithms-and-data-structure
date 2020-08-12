<?php

declare(strict_types=1);

namespace Algorithms\DataStructure\Trie;

/**
 * Class Trie
 *
 * @package Algorithms\DataStructure\Trie
 */
class Trie
{
    const HEAD_CHARACTER = "*";

    public function __construct()
    {
        $this->head = new TrieNode(self::HEAD_CHARACTER);
    }

    public function addWord(string $word)
    {
        $characters = str_split($word);
        $currentNode = $this->head;

        for ($charIndex = 0; $charIndex < strlen($word); $charIndex++) {
            $isCompleted = $charIndex === strlen($word) - 1;
            $currentNode = $currentNode->addChild($characters[$charIndex], $isCompleted);
        }
        return $this;
    }

    public function doesWordExist(string $word)
    {
        $lastCharacter = $this->getLastCharacterNode($word);
        return ! ! $lastCharacter && $lastCharacter->isCompletedWord();
    }

    /**
     * @param  string        $word
     * @return TrieNode|null
     */
    private function getLastCharacterNode(string $word): ?TrieNode
    {
        $characteres = str_split($word);
        $currentNode = $this->head;

        for ($charIndex = 0; $charIndex < strlen($word); $charIndex++) {
            if (! $currentNode->hasChild($characteres[$charIndex])) {
                return null;
            }
            $currentNode = $currentNode->getChild($characteres[$charIndex]);
        }
        return $currentNode;
    }
}
