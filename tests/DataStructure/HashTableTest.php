<?php

declare(strict_types=1);

namespace Tests\DataStructure;

use Algorithms\DataStructure\HashTable;
use PHPUnit\Framework\TestCase;

/**
 * Class HashTableTest
 *
 * @package Tests\DataStructure
 */
class HashTableTest extends TestCase
{
    public function testIfKeysBeActualized(): void
    {
        $hashTable = new HashTable();

        $hashTable->set('foo', 'bar');
        $hashTable->set('tom', 'jerry');
        $hashTable->set('timao', 'pumba');

        $hashTable->delete('foo');

        $this->assertFalse($hashTable->has('foo'));
        $this->assertTrue($hashTable->has('tom'));
        $this->assertTrue($hashTable->has('timao'));
    }

    public function testIfWillReturnExpectedKeys(): void
    {
        $hashTable = new HashTable();

        $hashTable->set('foo', 'bar');
        $hashTable->set('tom', 'jerry');
        $hashTable->set('timao', 'pumba');

        $arrayExpected = ['foo', 'tom', 'timao'];

        $hashKeys = $hashTable->getKeys();
        $this->assertIsArray($hashKeys);
        $this->assertEquals($arrayExpected, $hashKeys);
    }
}
