<?php 
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


$news = curl("https://newsapi.org/v2/everything?q=win&from=2019-05-12&sortBy=publishedAt&apiKey=b6837bcd35b241c3bb46f38f7ed32503");
//$itunes =file_get_contents($itunes);
$haber = json_decode($news, true);
 
 $articles = $haber["articles"];

echo "yazar:" . $articles[0]["author"];
echo "  <img src='" . $articles[0]["urlToImage"] . "'>";
//print_r( $articles[1]);

?>