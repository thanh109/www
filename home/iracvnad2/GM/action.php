<?php
include "config.php";
require_once './common.inc.php';
$sql      = "";
$act      = $_POST['act'];
$note     = $_POST['note'];
$hongbao  = $_POST['hongbao'];
$hbnum    = $_POST['hbnum'];
$playerID = $_POST['playerID'];
$tiall    = $_POST['tiall'];
$rename   = $_POST['rename'];
$gn       = $_POST['gn'];
$gnvalue  = $_POST['gnvalue'];
$note = $hit->khongdau($note);
switch ($act) {
    case 1:
$mailId = mt_rand();
$msg = "-bull 1 1 1 {$note}";
        
        $sql    = "insert into $dbname.t_gmmsg (Id, msg) VALUES ('1', '$msg');";
        
        break;
    case 2:
 $sql = "INSERT INTO mu_game_1.t_gmmsg (id, msg) VALUES (1,-bull 1 1 1 $note)";
        break;
    case 3:
        if ($tiall == '0') {
            $sql = "insert into db_game.gm_cmd(CmdID,INSERTDATE,Cmd) VALUES ('1','1','kick={$playerID}')";
        } else {
            $sql = "insert into db_game.gm_cmd(CmdID,INSERTDATE,Cmd) VALUES ('1','1','kickall=0')";
        }
        break;
    case 4:
        $sql = "insert into mu_game_1.t_roles(CmdID,INSERTDATE,Cmd) VALUES ('1','1','roleinfo=rename+{$playerID}+{$rename}')";
        break;
    case 5:
        $sql = "insert into db_game.gm_cmd(CmdID,INSERTDATE,Cmd) VALUES ('1','1','roleinfo={$gn}+{$playerID}+{$gnvalue}')";
        break;
    default:
        $sql = "";
}
//echo $sql;


$result = $db->query($sql);
echo "Hoạt động thành công";
?>