<?php
			header("Content-type: text/html; charset=utf-8"); 
			include('../api/system.php');
			$sql = "select * from web_alipay";
			$data = $pdo->getOne($sql);
			$userkey = $data['paykey'];
			$customerid = $data['payid'];
			$status=$_POST['status'];
			$sdorderno=$_POST['sdorderno'];
			$total_fee=$_POST['total_fee'];
			$payuser=$_POST['batmark'];
			$sign = $_POST["sign"];
			
			$signSource = sprintf("customerid=%s&userkey=%s&status=%s&total_fee=%s%s", $customerid, $userkey, $status, $total_fee , $sdorderno); 
			
			if($status=='1' and $sign == md5($signSource)){
			//if(1){
				
			$cxsql = "select count(*) as count from web_paylog where pid = ?";
			$cxparams = array($sdorderno);
			$cxdata = $pdo->getOne($cxsql, $cxparams);
			
			$usql = "select * from web_agent where username = ?";
			$uparams = array($payuser);
			$udata = $pdo->getOne($usql, $uparams);
			
			
			if($cxdata['count']==0){
			//if(1){
			$insql = "insert into web_paylog(pid,ptime,money,attach,username) values (?, ?, ?, ?, ?)";
			$inparams = array($sdorderno, date('Y-m-d H:i:s'), $total_fee, '在线充值'.$total_fee."元", $payuser);
			$insert_id = $pdo->insert($insql, $inparams);
			if($udata){$cum="web_agent";}else{$cum="web_user";}
			$upsql = "update ".$cum." set money = money + ? where username = ? ";
			$upparams = array($total_fee, $payuser);
			$affected_rows = $pdo->query($upsql, $upparams);
			
			
			$sql = "select * from ".$cum." where username = ? ";
			$params = array($payuser);
			$data = $pdo->getOne($sql, $params);
			
			if(!empty($data['spread_id'])){
				
			$usql = "select * from web_agent where username = ?";
			$uparams = array($data['spread_id']);
			$udata = $pdo->getOne($usql, $uparams);
				
			if($udata){$cum="web_agent";}else{$cum="web_user";}
				
				
			$upsql = "update ".$cum." set money = money + ? where username = ? ";
			$upparams = array($total_fee*$profit, $data['spread_id']);
			$affected_rows = $pdo->query($upsql, $upparams);
				
			$insql = "insert into web_paylog(pid,ptime,money,attach,username) values (?, ?, ?, ?, ?)";
			$inparams = array($sdorderno, date('Y-m-d H:i:s'), $total_fee*$profit, $data['spread_id'].'-获得返利'.$total_fee*$profit."元", $payuser);
			$insert_id = $pdo->insert($insql, $inparams);
				
				
			}
			
			
			
			
			}
			else{
				
				
			
			}
			
			
			
			
			echo 'success';
			
			} else {
				
			echo 'fail';
			
				}

 
 
?>
