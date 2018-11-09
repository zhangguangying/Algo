<?php

namespace linkedList;

/**
 * 单链表
 * TODO:循环链表、双向链表、数组实现LRU缓存淘汰算法
 */     
class SingleLinkedList
{
    protected $head;

    protected $length;

    public function __construct($data = null, $next = null)
    {
        $this->head = new LinkedListNode($data, $next);
        $this->length = 0;
    }

    public function __clone()
    {
        $this->head = clone $this->head;
    }

    public function insert($data)
    {
        if (is_object($data)) {
            $this->insertNode($data);
        } else {
            $this->insertData($data);
        }
        $this->length++;
        return true;
    }

    public function insertNode(LinkedListNode $node)
    {
        $node->next = $this->head->next;
        $this->head->next = $node;
    }

    public function insertData($data)
    {
        $node = new LinkedListNode($data, $this->head->next);
        $this->head->next = $node;
    }

    public function find($k)
    {
        if ($k > $this->length) return false;

        $i = 1;
        $node = $this->head->next;
        while ($i <= $this->length) {
            if ($i == $k) return $node;
            $node = $node->next;
            $i++;
        }
    }

    public function findData($data)
    {
        $i = 1;
        $node = $this->head->next;
        while ($i <= $this->length) {
            if ($node->data === $data) return $node;
            $node = $node->next;
            $i++;
        }
        return -1;
    }

    public function delete($data)
    {
        if (is_object($data)) {
            $this->deleteNode($data);
        } else {
            $this->deleteData($data);
        }
        $this->length--;
        return true;
    }

    private function deleteData($data)
    {
        $i = 0;
        $curNode = $this->head;
        $preNode = $this->head;
        while ($i <= $this->length) {
            if ($curNode->data === $data) {
                $preNode->next = $curNode->next;
                return 1;
            }
            $preNode = $curNode;
            $curNode = $curNode->next;
            $i++;
        }
        return -1;
    }

    private function deleteNode(LinkedListNode $node)
    {
        $i = 0;
        $curNode = $this->head;
        $preNode = $this->head;
        while ($i <= $this->length) {
            if ($curNode === $node) {
                $preNode->next = $curNode->next;
                return 1;
            }
            $preNode = $curNode;
            $curNode = $curNode->next;
            $i++;
        }
        return -1;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function reverse($list)
    {
        $headNode = NULL;
        $preNode = NULL;
        $curNode = clone $list;
        $curNode = $curNode->head->next;
        while ($curNode !== NULL) {
            $nextNode = $curNode->next;
            
            $curNode->next = $preNode;
            
            $preNode = $curNode;

            if ($nextNode === NULL) {
                return $curNode;
            }
            $curNode = $nextNode;
        }
    }
}