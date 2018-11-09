<?php

namespace linkedList;

class LinkedListNode
{
    public $data;

    public $next;

    public function __construct($data = null, $next = null)
    {
        $this->data = $data;
        $this->next = $next;
    }

    public function __clone()
    {
        if (is_object($this->next)) {
            $this->next = clone $this->next;
        }
    }
}