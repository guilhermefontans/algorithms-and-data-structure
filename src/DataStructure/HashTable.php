<?php

declare(strict_types=1);

namespace Algorithms\DataStructure;

use Algorithms\DataStructure\LinkedList\LinkedList;

/**
 * Class HashTable
 *
 * @package Algorithms\DataStructure
 */
class HashTable
{
    public $buckets;

    /**
     * @var array
     */
    public $keys;

    /**
     * HashTable constructor.
     *
     * @param int $size
     */
    public function __construct()
    {
        $this->buckets = [new LinkedList(), new LinkedList(), new LinkedList(), new LinkedList(), new LinkedList()];
        $this->keys = [];
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key): bool
    {
        return isset($this->keys[$key]);
    }

    public function set($key, $value): void
    {
        $hash = $this->generateHash($key);
        $this->keys[$key] = $hash;

        /**
         * @var LinkedList $bucketLinkedList
         */
        $bucketLinkedList = $this->buckets[$hash];
        $node = $bucketLinkedList->find($value);

        if (! $node) {
            $object = new \stdClass();
            $object->key = $key;
            $object->value = $value;
            $bucketLinkedList->append($object);
        } else {
            $node->value->value = $value;
        }
    }

    public function get($key)
    {
        $bucketLinkedList = $this->buckets[$this->generateHash($key)];
        $function = fn ($node) => $node->key === $key;
        $node = $bucketLinkedList->find(null, $function);
        return $node ? $node->value->value : null;
    }

    public function delete($key): void
    {
    }

    public function getKeys()
    {
        return $this->keys;
    }

    /**
     * @param $key
     * @return int
     */
    private function generateHash($key): int
    {
        //it's temporary
        return (12345 . $key) % count($this->buckets);
    }
}
