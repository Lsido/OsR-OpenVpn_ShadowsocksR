 
<?php
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set('Asia/Shanghai');
session_start();
define('IN_CRONLITE', true);
$pi=$_SERVER["SERVER_PORT"];
define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");
include(BASE_PATH . 'function.php');
include(BASE_PATH . 'Pdo.Class.php');
$pdo = FastPDO::getInstance();
$st_zd_sql = "SELECT * FROM web_bill";
$wbill_data = $pdo->getSome($st_zd_sql);
$profit = 0.1;//邀请好友返利阈值
foreach($wbill_data as $value)
  {
	  $bill_endtime=$value['b_end_time'];
	  if($bill_endtime < date('Y-m-d H:i:s')){
		$sql = "update web_bill set b_i = ? where id = ? ";
		$params = array('0', $value['id']);
		$affected_rows = $pdo->query($sql, $params);
		if($value['b_tid'] == 1){
		$sql = "DELETE FROM user WHERE bill_id= ? ";
		$params = array($value['attach']);
		$affected_rows = $pdo->query($sql, $params);
		}elseif($value['b_tid'] == 2){
		$sql = "DELETE FROM openvpn WHERE bill_id= ? ";
		$params = array($value['attach']);
		$affected_rows = $pdo->query($sql, $params);
		}
	  }
  }

?>