<?php

namespace hash;

class LinkedListNode
{
    public $prev;
    public $next;
    public $data;
    
    public function __construct($prev = NULL, $next = NULL)
    {
        $this->prev = $prev;
        $this->next = $next;
        $this->data = null;
    }
}