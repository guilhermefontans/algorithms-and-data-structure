<?php

declare(strict_types=1);

namespace Tests\DataStructure\Trie;

use Algorithms\DataStructure\Trie\TrieNode;
use PHPUnit\Framework\TestCase;

/**
 * Class TrieTest
 *
 * @package Tests\DataStructure\Trie
 */
class TrieTest extends TestCase
{
    const HEAD_CHARACTER = "*";

    public function __construct()
    {
        $this->head = new TrieNode(self::HEAD_CHARACTER);
    }
}
