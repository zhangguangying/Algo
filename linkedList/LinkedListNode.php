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
}