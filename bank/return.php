<?php
			header("Content-type: text/html; charset=utf-8"); 
			include('../api/system.php');
			$sdorderno=$_GET['sdorderno'];
			$total_fee=$_GET['total_fee'];
			$payuser=$_GET['batmark'];
			$sign = $_GET["sign"];
			$sql = "select * from web_agent where username = ? ";
			$params = array($payuser);
			$data = $pdo->getOne($sql, $params);
			if($data){
			header( "Location: ../agent/index.php?action=onlinepay&id=$sdorderno" ); 
			}else{
			header( "Location: ../index.php?action=onlinepay&id=$sdorderno" ); 
			}
?>
