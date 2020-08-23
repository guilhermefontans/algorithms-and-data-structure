<?php

declare(strict_types=1);

namespace Tests\DataStructure\Trie;

use Algorithms\DataStructure\Trie\Trie;
use PHPUnit\Framework\TestCase;

/**
 * Class TrieTest
 *
 * @package Tests\DataStructure\Trie
 */
class TrieTest extends TestCase
{
    /**
     * @var Trie
     */
    private $trie;

    public function setUp(): void
    {
        $this->trie = new Trie();
        $this->trie->addWord("car");
        $this->trie->addWord("cat");
        $this->trie->addWord("cart");
    }

    public function testAddWordInTrie(): void
    {
        $this->assertTrue($this->trie->doesWordExist('car'));
        $this->assertTrue($this->trie->doesWordExist('cat'));
        $this->assertTrue($this->trie->doesWordExist('cart'));
        $this->assertFalse($this->trie->doesWordExist('carrot'));
    }

    public function testDeleteWordInTrie(): void
    {
        $this->trie->deleteWord('cart');
        $this->assertFalse($this->trie->doesWordExist('cart'));
    }

    public function testSuggestNextCharacters(): void
    {
        $this->assertEquals(["r", "t"], $this->trie->suggestNextCharacter("ca"));
        $this->assertNull($this->trie->suggestNextCharacter("cap"));
    }
}
