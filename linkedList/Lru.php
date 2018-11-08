<?php

namespace linkedList;

class Lru
{
    protected $head;

    protected $length;

    protected $max;

    public function __construct($max = 128, $data = null, $next = null)
    {
        $this->head = new LinkedListNode($data, $next);
        $this->length = 0;
        $this->max = 3;
    }

    public function insert($data)
    {
        if ($this->length >= $this->max) {
            $curNode = $this->head;
            $preNode = $this->head;

            while ($curNode->next !== NULL) {
                $preNode = $curNode;
                $curNode = $curNode->next;
            }

            $preNode->next = $curNode->next;
            $this->length--;
        }

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
            if ($i == $k) return $node->data;
            $node = $node->next;
            $i++;
        }
    }

    public function findData($data)
    {
        $i = 1;
        $curNode = $this->head;
        $preNode = $this->head;
        while ($i <= $this->length) {
            if ($curNode->data === $data) {
                $newNode = new LinkedListNode($curNode->data);
                $preNode->next = $curNode->next;
                $newNode->next = $this->head->next;
                $this->head->next = $newNode;
                return true;
            }
            $preNode = $curNode;
            $curNode = $curNode->next;
            $i++;
        }
        $this->insert($data);
        return true;
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
}