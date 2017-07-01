<?php
include "./config.php";
require_once './common.inc.php';
//$db          = new dbstuff;
//提取参数
$serverid    = "0"; //$_POST['serverid'];
$senderrid   = "-1";
$senderrname = "GM";
$receiverrid = $_POST['receiverrid'];
$reveiverrname = "hello";
$subject       = "MU-NONGDAN"; // $_POST['subject'];
$content       = "MU-NONGDAN"; // $_POST['content'];
$yinliang      = $_POST['yinliang'];
$tongqian      = "0"; //$_POST['tongqian'];
$yuanbao       = $_POST['yuanbao'];
$attachgoods   = $_POST['attachgoods'];
$gcount        = $_POST['gcount'];
$binding       = $_POST['binding'];
$lucky       = $_POST['lucky'];
$append       = $_POST['append'];
$level       = $_POST['level'];
$exinfo		= $_POST['exinfo'];
date_default_timezone_set("PRC");
$sendtime = date("Y-m-d G:i:s");
//系统邮件默认类型为0
$mailtype = 0;
if (!isset($serverid) or !isset($reveiverrname) or !isset($subject) or !isset($content)) {
    echo "Không thể gửi do thiếu thông tin";
    return 'fail';
}
//对mailContent 和 mailSubject 进行base64解码
//先替换掉被post底层处理出错的空格成base64中的加号
$senderrname   = str_replace(" ", "+", $senderrname);
$reveiverrname = str_replace(" ", "+", $reveiverrname);
$subject       = str_replace(" ", "+", $subject);
$content       = str_replace(" ", "+", $content);
$sql           = "select * from t_roles where rid=" . $receiverrid;
$isRecord      = $db->query($sql);
if (null == $isRecord) {
    echo "err isRecord";
    logStr("error", "角色Id不存在=" . $sql);
    return 'fail';
}
$mailsql = "INSERT INTO t_mail (senderrid, senderrname, sendtime, receiverrid, reveiverrname, readtime, isread, mailtype, hasfetchattachment, subject,
					content, yinliang, tongqian, yuanbao)
					VALUES ($senderrid,'$senderrname','$sendtime', $receiverrid, '0','1900-01-01 12:00:00',0,$mailtype,0,'$subject','$content',$yinliang, $tongqian, $yuanbao)";
$isorder = $db->query($mailsql);
if (null == $isorder) {
    echo "err isorder";
    logStr("error", "插入系统邮件数据错误sql=" . $mailsql);
    return 'fail';
}
$idSql   = "SELECT LAST_INSERT_ID() as mylastid";
$isorder = $db->query($idSql);
$count   = $db->num_rows($isorder);
if ($count <= 0) {
    return 'fail';
}
$mailId  = mysql_result($isorder, 0, "mylastid");
$mailsql = "INSERT INTO t_mailtemp (mailid, receiverrid) VALUES ($mailId, $receiverrid)";
$db->query($mailsql);
logStr("Info", "mailId=" . $mailId);
//物品属性=物品ID-0|数量-1|是否绑定-2|级别-3|是否幸运-4|卓越-5|追加-6,
$attachgoodsArr = explode(",", $attachgoods);
if ($attachgoods == "") {
    exit('Gửi thành công');
}
foreach ($attachgoodsArr as $goods) {
    logStr("warning", "goods=" . $goods);
    $goodsAttrs      = explode("|", $goods);
    $goodsid         = $goodsAttrs[0];
    $gcount2         = $goodsAttrs[1];
    $binding1        = $goodsAttrs[2];
    $forge_level1    = $goodsAttrs[3];
    $lucky1          = $goodsAttrs[4];
    $excellenceinfo2 = $goodsAttrs[5];
    $appendproplev2  = $goodsAttrs[6];
    $goodssql        = "INSERT INTO t_mailgoods (mailid, goodsid, gcount,   binding,  appendproplev,  lucky,  excellenceinfo,  forge_level,strong, quality,Props,origholenum,rmbholenum,jewellist,addpropindex,bornindex,equipchangelife) 
		                               VALUES ($mailId, $goodsid, $gcount, $binding, $append, $lucky, $exinfo, $level, 0, 0, '0', 0, 0, '0', 0, 0,  0)";
    logStr("warning", "goodssql=" . $goodssql);
    $isorder = $db->query($goodssql);
    if (null == $isorder) {
        logStr("warning", "Insert item attachment data error sql=" . $goodssql);
        continue;
    }
    logStr("goodssql", $goodssql);
}
echo 'Gửi thành công';
function logStr($str, $value)
{
    $fp = fopen("addmail_log.txt", "a+");
    fwrite($fp, "$str=" . $value . "\r\n");
    fclose($fp);
}

?>