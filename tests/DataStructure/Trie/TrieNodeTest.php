<?php

declare(strict_types=1);

namespace Tests\DataStructure\Trie;

use Algorithms\DataStructure\Trie\TrieNode;
use PHPUnit\Framework\TestCase;

/**
 * Class TrieNodeTest
 * @package Tests\DataStructure\Trie
 */
class TrieNodeTest extends TestCase
{
    /**
     * @var TrieNode
     */
    private $trieNode;

    public function setUp(): void
    {
        $this->trieNode = new TrieNode("c");
    }

    public function testCreateTrieNode(): void
    {
        $trieNode = new TrieNode("c", true);
        $this->assertEquals("c", $trieNode->getCharacter());
        $this->assertTrue($trieNode->isCompletedWord());
        $this->assertEquals("c*", $trieNode->toString());
    }

    public function testTrieNodeToString(): void
    {
        $this->trieNode->addChild("a", true);
        $this->trieNode->addChild("o");
        $this->assertEquals("c:a,o", $this->trieNode->toString());
    }

    public function testGetChild(): void
    {
        $this->trieNode->addChild("a");
        $this->trieNode->addChild("o");
        $this->assertEquals("a", $this->trieNode->getChild("a")->toString());
        $this->assertEquals("a", $this->trieNode->getChild("a")->getCharacter());
        $this->assertEquals("o", $this->trieNode->getChild("o")->toString());
        $this->assertNull($this->trieNode->getChild("d"));
    }

    public function testSuggestChildren(): void
    {
        $this->trieNode->addChild("a");
        $this->trieNode->addChild("o");

        $this->assertEquals(["a", "o"], $this->trieNode->suggestChildren());
    }
}
