<?php

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

    public function has()
    {
        return false;
        
    }

    public function set($key, $value)
    {

    }

    public function get($key)
    {
        
    }

    public function delete($key)
    {

    }

    public function getKeys()
    {
        return $this->keys;
    }

    private function generateHash($key)
    {
        return md5($key) % count($this->buckets);
    }
}