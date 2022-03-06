<?php

Class Queue extends SplQueue
{

}
$queue = [];

$dummyQueue = new Queue();

$this->traverseTree($id, $dummyQueue);

function traverseTree($rootNode, $dummyQueue)
{
    if ($rootNode->lft != 0) {
        $dummyQueue->enqueue($rootNode->lft);
    }
    if ($rootNode->rgt != 0) {
        $dummyQueue->enqueue($rootNode->rgt);
    }
    if (!($dummyQueue->isEmpty())) {
        $nextId = $dummyQueue->dequeue();
        $nextNode = array_push($this->queue, $nextNode);
        $this->traverseTree($nextNode, $dummyQueue);
    }
}
