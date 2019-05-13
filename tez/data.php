<?php 
   //Connecting to Redis server on localhost 
    $redis = new Redis(); 
   $redis->connect('192.168.0.15', 6379); 
   
$arList = $redis->lrange("AKIDr", 0 ,-1	);
//print_r($arList);

$counts = array_count_values($arList);
arsort($counts);
$list = array_keys($counts);
var_dump($list);

echo $list[0];
?>