<?php

class Node{

  public $children = array();
  public $name = '';
  
  public function __construct(string $nameNode){
    $this->name = $nameNode;
  }
  
  public function isLinked(Node $node):bool{
    foreach($this->children as $c){
      if($c->name === $node->name){
        return true;
      }
    }
    return false;
  }

  public function linkTo(Node $node):Node{
    //Todo  verify if already linked
    $this->children[] = $node;
    
    return $node;
  }
  
  public function notVisitedArray(array $visitedArray):array{
    $notVisited = array();
    foreach($this->children as $c){
      if(!in_array($c->name,$visitedArray)){
        $notVisited[] = $c;
      }
    }
    return $notVisited;
  }
}

$node1 = new Node('1');
$node2 = new Node('2');
$node3 = new Node('3');
$node4 = new Node('4');

$node1->linkTo($node2);
$node1->linkTo($node3);
$node3->linkTo($node4);

//print_r($node1);
//$r = $node1->notVisitedArray(array('1'));
 // print_r($r);
//var_dump($node1);

dfs($node1);

function dfs(Node $node, 
             string $path = '',
             array $visited = array()): void{

  $visited[] = $node->name;
  $notVisited = $node->notVisitedArray($visited);
  if(sizeOf($notVisited) === 0){
    echo 'path: '.$path.'->'."$node->name"."\n\r";  
    return ;
  }
  foreach($notVisited as $key => $n){
    dfs($n, $path.'->'.$node->name, $visited);
  }
}
