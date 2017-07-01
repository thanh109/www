<?php
class hitandrun
{
	function showonline(){
		$hit = json_decode(file_get_contents('https://munongdan.pro/ap123/getonlin.php'), true);
		if(empty($hit)){
			return "Can't Check user online now!";
			
		}else {
			$totaluser = $hit['online'];
			$useronmap = $hit['user_map'];
			$checkon = $hit['timecheck'];
			$entry = "<div class=\"crumb-wrap\"><div class=\"crumb-list\"><i class=\"icon-font\">&#xe06b;</i><span>Hiện tại có : {$totaluser} người đang online. Tại thời điểm {$checkon}</span></div></div>";
			return $entry;
			
		}
}
function telegram($mess){
	
	
	$api = "https://api.telegram.org/bot326166502:AAGzrfOGaWYcioJXW3_jr1dri3he__oeHFw";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $api . "/sendmessage?chat_id=-213381308&text=" . urlencode($mess));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
 

curl_exec($ch);
 

curl_close($ch);
	
}
function Write_File($dir, $chat, $set = 'a')
{
    if ($set == 'w')
        $file = fopen($dir, 'w');
    else
        $file = fopen($dir, 'a');
    fwrite($file, $chat);
    fclose($file);
    return true;
}

function Read_File($dir)
{
    if (!file_exists($dir))
        fopen($dir, 'w');
    $file = fopen($dir, 'r');
    $data = fread($file, filesize($dir));
    fclose($file);
    return $data;
}
function senditem($rid, $itemid){
	$ch = @curl_init();
	$url = "https://munongdan.pro/iracvnad/GM/email.php";
	$post = array(
	"receiverrid" => $rid,
	"attachgoods" => $itemid,
	"gcount" => "1",
	"binding" => "0",
	"yuanbao" => "0",
	"yinliang" => "0"
	
	);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; rv:26.0) Gecko/20100101 Firefox/26.0');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 17);
    $page = curl_exec($ch);
    curl_close($ch);
    return $page;


}
}
?>