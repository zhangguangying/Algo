<?php

require_once '../vendor/autoload.php';

use hash\DoubleLinkedList;

$linkedList = new DoubleLinkedList;

$linkedList->insert(20);
$linkedList->insert(40);
$linkedList->insert(60);
$linkedList->insert(80);
$linkedList->insert(100);

// $linkedList->delete(40);

echo '<pre>';
var_dump($linkedList);
echo '</pre>';
