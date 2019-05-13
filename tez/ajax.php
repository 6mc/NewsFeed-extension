<?php 
//echo "gelen veri: ". $_POST["user"];
function curl($url){
		$curl=curl_init();
		curl_setopt($curl,CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl,CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		$cikti= curl_exec($curl);
		curl_close($curl);
		return str_replace(array("","",""), null, $cikti);
	}


    $redis = new Redis(); 
   $redis->connect('192.168.0.15', 6379); 
//echo explode("=", $_POST["user"])[1];   
$arList = $redis->lrange(explode("=", $_POST["user"])[1], 0 ,-1	);
//print_r($arList);

$counts = array_count_values($arList);
arsort($counts);
$list = array_keys($counts);
//var_dump($list);

//echo json_encode( $list);
$bugun = getdate();


for ($i = 0; $i <5 ; $i++) {

	$redis->lRem($_POST["user"], $list[$i], 0); 
	
$news = curl("https://newsapi.org/v2/everything?q=".$list[$i+10]."&from=".$bugun["year"]."-".$bugun["mon"]."-".$bugun["mday"]."&sortBy=publishedAt&apiKey=b6837bcd35b241c3bb46f38f7ed32503");
//$itunes =file_get_contents($itunes);
$haber = json_decode($news, true);
 
 $articles = $haber["articles"];

  
  $result[$i]["title"] = $articles[$i]["title"];
	  $result[$i]["img"] = $articles[$i]["urlToImage"];
			$result[$i]["content"] = $articles[$i]["content"];
			$source= $articles[$i]["source"];

			$result[$i]["source"] = $source["name"];

//	$redis->lpush($_POST["user"], $words[$i]); 

}

echo json_encode( $result);


?> 