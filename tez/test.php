<?php 
   //Connecting to Redis server on localhost 
    $redis = new Redis(); 
   $redis->connect('192.168.0.15', 6379); 


//	echo  "response:". $_POST["title"];
	$words = explode(" ", $_POST["title"]);

for ($i = 0; $i < count($words) ; $i++) {
   
	$redis->lpush($_POST["user"], $words[$i]); 
}
	
	
	echo "added:".$_POST["title"];

 //$arList = $redis->lrange($_POST["user"], 0 ,5);
 
 //echo "telden gelen:".$arList[2];
?>