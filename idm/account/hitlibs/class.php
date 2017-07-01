<?php
class hitandrun
{
    function showonline()
    {
        $hit = json_decode(file_get_contents('http://127.0.0.1/ap123/getonlin.php'), true);
        if (empty($hit)) {
            return "Can't Check user online now!";
            
        } else {
            $totaluser = $hit['online'];
            $useronmap = $hit['user_map'];
            $checkon   = $hit['timecheck'];
            $entry     = "<div class=\"crumb-wrap\"><div class=\"crumb-list\"><i class=\"icon-font\">&#xe06b;</i><span>Hiện tại có : {$totaluser} người đang online. Tại thời điểm {$checkon}</span></div></div>";
            return $entry;
            
        }
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
    function senditem($rid, $itemid, $soluong)
    {
        $ch   = @curl_init();
        $url  = "http://munongdan.pro/iracvnad/GM/email.php";
        $post = array(
            "receiverrid" => $rid,
            "attachgoods" => $itemid,
            "gcount" => $soluong,
            "binding" => "1",
            "yuanbao" => "0",
            "append" => "80",
            "lucky" => "1",
            "exinfo" => "95158272",
            "level" => "0",
            "yinliang" => "0"
            
        );
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; rv:26.0) Gecko/20100101 Firefox/26.0');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 17);
        $page = curl_exec($ch);
        curl_close($ch);
        return true;
        
        
    }
    function sendgift($rid, $itemid, $soluong, $exinfo, $level, $kc)
    {
        $ch   = @curl_init();
        $url  = "http://munongdan.pro/iracvnad/GM/email2.php";
        $post = array(
            "receiverrid" => $rid,
            "attachgoods" => $itemid,
            "gcount" => $soluong,
            "binding" => "1",
            "yuanbao" => $kc,
			"lucky" => "1",
            "exinfo" => $exinfo,
            "level" => $level,
            "yinliang" => "0",
			"append" => "80"
            
        );
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; rv:26.0) Gecko/20100101 Firefox/26.0');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 17);
        $page = curl_exec($ch);
        curl_close($ch);
        return true;
        
        
    }
    function telegram($mess, $api, $chatid)
    {
        
        
        $url = "https://api.telegram.org/bot" . $api;
        $ch  = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url . "/sendmessage?chat_id=" . $chatid . "&text=" . urlencode($mess));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        
        
        curl_exec($ch);
        
        
        curl_close($ch);
        
    }
    function thongbao($mess)
    {
        
        $ch   = @curl_init();
        $url  = "http://idm.munongdan.pro/account/recharge.php?username=1";
        $post = array(
            "act" => "1",
            "note" => $mess,
            "idp" => "1"
            
        );
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; rv:26.0) Gecko/20100101 Firefox/26.0');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 17);
        $page = curl_exec($ch);
        curl_close($ch);
        return true;
        
        
        
        
    }
    function khongdau($str)
    {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
        $str = preg_replace("/(đ)/", "d", $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
        $str = preg_replace("/(Đ)/", "D", $str);
        $str = str_replace(" ", ".", str_replace("&*#39;", "", $str));
        
        return $str;
    }
	function random($length) 
	{
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
			return $randomString;
	}
}
?>