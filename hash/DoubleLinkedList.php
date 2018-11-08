<?php

namespace hash;

class DoubleLinkedList
{
    private $head;
    private $length;
    private $max;
    private $hnext;

    public function __construct()
    {
        $this->head = new LinkedListNode();
        $this->length = 0;
        $this->max = 4;
        $this->hnext = null;
    }

    public function insert($value)
    {
        $node = new LinkedListNode();
        $node->data = $value;

        // 判断数据是否在缓存中
        $checkNode = $this->head->next;
        $flag = false;
        while (is_object($checkNode)) {
            if ($checkNode->data === $value) {
                $flag = true;
                break;
            }
            $checkNode = $checkNode->next;
        }

        // 如果在其中，将该节点放到链表的尾部
        if ($flag) {
            $this->head->next = $checkNode;
            $checkNode->prev = $this->head;
            return true;
        }
        
        // 如果不在其中，查看缓存是否已经满，如果满了，则将链表的头部节点删除，将数据移动到链表的尾部
        if ($this->length === $this->max) {
            $preNode = $this->head;
            $curNode = $this->head;
            while ($curNode->next !== NULL) {
                $preNode = $curNode;
                $curNode = $curNode->next;
            }
            $preNode->next = NULL;
            $this->length--;

            // 不能这么写，$checkNode->prev是整个链表，而他的next是头节点下的剩余链表
            /* $checkNode = $this->head;
            while ($checkNode->next !== NULL) {
                $checkNode = $checkNode->next;
            }
            $checkNode->prev->next = NULL; */
        }

        // 如果没有满，将数据直接放到链表的尾部
        $node->prev = $this->head;
        $node->next = $this->head->next;
        $this->head->next = $node;

        $this->length++;

        return true;
    }
    
}