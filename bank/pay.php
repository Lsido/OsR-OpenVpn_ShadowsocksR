<?php
header("Content-type: text/html; charset=utf-8"); 
include('../api/system.php');
$sql = "select * from web_alipay";
$data = $pdo->getOne($sql);
$userkey = $data['paykey'];
$customerid = $data['payid'];
$ordernum="OS".date("YmdHis");
$total_fee=$_POST['v_amount'];
$paytype=$_POST['paymode'];
$bankcode=$_POST['paymode'];
if($_SERVER["SERVER_PORT"] == "443"){$web_port="";}else{$web_port=':'.$_SERVER["SERVER_PORT"];}

if ($_SERVER['HTTPS'] != "on") {
    $ht = "http";
 }else{
    $ht = "https";
}

$notifyurl=''.$ht.'://'.$_SERVER['SERVER_NAME'].''.$web_port.'/bank/notify.php';
$returnurl=''.$ht.'://'.$_SERVER['SERVER_NAME'].''.$web_port.'/bank/return.php';
$batmark=$_POST['payuser'];

$signSource = sprintf("customerid=%s&bankcode=%s&total_fee=%s&ordernum=%s&notifyurl=%s%s", $customerid, $bankcode, $total_fee, $ordernum, $notifyurl, $userkey);
$sign = md5($signSource);
 
?>
<!doctype html>
<html>
<head>
<title>正在转到付款页</title>
</head>
<body onload="document.pay.submit()">
    <form name="pay" action="https://pay.mlhtml.com/HTMLAPI/pay.php" method="post">
         <input type="hidden" name="userkey" value="<?php echo $userkey?>">
		 <input type="hidden" name="customerid" value="<?php echo $customerid?>">
        <input type="hidden" name="ordernum" value="<?php echo $ordernum?>">
        <input type="hidden" name="total_fee" value="<?php echo $total_fee?>">
        <input type="hidden" name="paytype" value="<?php echo $paytype?>">
		 <input type="hidden" name="returnurl" value="<?php echo $returnurl?>">
        <input type="hidden" name="notifyurl" value="<?php echo $notifyurl?>">
           <input type="hidden" name="bankcode" value="<?php echo $bankcode?>">
		   <input type="hidden" name="batmark" value="<?php echo $batmark?>">
		    <input type="hidden" name="sign" value="<?php echo $sign?>">
     </form>
</body>
</html>
