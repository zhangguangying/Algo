<?php

require_once '../vendor/autoload.php';

use linkedList\SingleLinkedList;
use linkedList\LinkedListNode;
use linkedList\Lru;

$singleLinkedList = new SingleLinkedList();
$node = new LinkedListNode(14);
$singleLinkedList->insert(12);
$singleLinkedList->insert(13);
$singleLinkedList->insert($node);
$singleLinkedList->insert(15);

$reverse = $singleLinkedList->reverse($singleLinkedList);

print_r($singleLinkedList);

print_r($reverse);