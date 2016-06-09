<?php

require_once("test2/twitteroauth.php");

$consumerKey = "9bcPJ8aOmgVifW79Ef9I2smmN";
$consumerSecret = "5sGspXMFfIxkqPFRd5FdThpRfGh9Gkhs8LymPuyfcU1C6wzE3v";
$accessToken = "618061012-y2RmtmJNqECUSG1PQy6B1nJYwX0GPcPnA7U3RYcj";
$accessTokenSecret = "ji5ojqev1lengUefXac8WvBATsChfDnH56jzQZnOOdw6l";

$twObj = new TwitterOAuth($consumerKey,$consumerSecret,$accessToken,$accessTokenSecret);

$andkey = "webnaut AND beeworks";
$options = array('q'=>$andkey,'count'=>'30');

$json = $twObj->OAuthRequest(
    'https://api.twitter.com/1.1/search/tweets.json',
    'GET',
    $options
);

$jset = json_decode($json, true);

foreach ($jset['statuses'] as $result){
    $name = $result['user']['name'];
    $link = $result['user']['profile_image_url'];
    $content = $result['text'];
    $updated = $result['created_at'];
    $time = $time = date("Y-m-d H:i:s",strtotime($updated));

    echo "<img src='".$link."''>"." | ".$name." | ".$content." | ".$time;
	echo '<br>';
}
?>