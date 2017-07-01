<html>
<meta http-equiv='refresh' content='5'>
<?php
include './hitlibs/class.php';
$hit = new hitandrun;
date_default_timezone_set('Asia/Ho_Chi_Minh');
if (file_get_contents("AUTOPOST.txt") <= (time() - 3 * 60)) {
					@file_put_contents("AUTOPOST.txt", time());
					$mamau = array("ff3300","66ff66","ff9900","ff3399");
					$mau = $mamau[rand(0, count($mamau) - 1)];
					$mess = array(
					"\{".$mau."\}https://munongdan.pro",
					"\{".$mau."\}Server mở free toàn bộ ! ",
					"\{".$mau."\}Free toàn bộ kim cương !",
					"\{".$mau."\}Anh em lưu ý cả thiên chước và phù VIP là 100k. ",
					//"\{".$mau."\}",
				//	"\{".$mau."\}Server gap su co va mat du lieu, code den bu :DENBU",
				//	"\{".$mau."\}Server se bao tri vao luc 13h. Thoi gian du kien 15 phut."
					//"\{".$mau."\}S"
					);
					$mess = $mess[rand(0, count($mess) - 1)];
					$mess = $hit->khongdau($mess);
					$hit->thongbao($mess);

}
$temp =  file_get_contents('https://idm.munongdan.pro/account/log/carddung.dat');
$temp = str_replace("\n", "<br>", $temp);
echo $date2   = date("Y-m-d, G:i:s")."<br>";
echo $time2   = time('Y-m-d, H:i:s')."<br>";
echo strtotime('2017-04-14 00:00:00')."<br>";
echo $temp;

$time_del = time() - 60*60;
###### FUNCTION DELETE ALL FILES AND SUBFOLDERS IN USER #######
$files = glob('dump/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    if (filemtime($file) <= $time_del) unlink($file); // delete file
}