<?php

require_once '../vendor/autoload.php';

use linkedList\SingleLinkedList;
use linkedList\LinkedListNode;
use linkedList\Lru;

$singleLinkedList = new lru();
$node = new LinkedListNode(14);
$singleLinkedList->insert(12);
$singleLinkedList->insert(13);
$singleLinkedList->insert($node);
$singleLinkedList->insert(15);
print_r($singleLinkedList->findData(14));
print_r($singleLinkedList->findData(12));

print_r($singleLinkedList);