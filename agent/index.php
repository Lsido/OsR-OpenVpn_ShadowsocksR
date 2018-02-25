<?php  

include('../api/system.php');
$websql = "select * from web_admin";
$webdata = $pdo->getOne($websql);
$action = $_GET['action'];
$p = true;

$ag_sql = "select * from web_agent where username = ? ";
$ag_params = array($_SESSION["dusername"]);
$ag_info = $pdo->getOne($ag_sql, $ag_params);		

$zk_sql = "select * from web_agent_grd where id = ? ";
$zk_params = array($ag_info['grade']);
$zk_info = $pdo->getOne($zk_sql, $zk_params);


if($action == "index"){
	include('top.php');
	include('head.php');
	include('agent_index.php');
	include('footer.php');
	
}elseif($action == "sub_user"){
	
	include('top.php');
	include('head.php');
	include('sub_user.php');
	include('footer.php');
	
	if($_POST['email']){
		
		
	$sql = "SELECT * FROM web_user WHERE username = ? ";
	$params = array(addslashes($_POST['email']));
	$data = $pdo->getOne($sql, $params);
		
	if($data){echo "<script type=\"text/javascript\">layer.msg('用户名已存在');setTimeout(function(){history.go(-1);}, 2000);</script>";}
	else{
	$sql = "insert into web_user(username,password,safeid,money,RegTime,agent_id) values (?, ?, ?, ?, ?, ?)";
	$params = array(addslashes($_POST['email']), $_POST['pass'], $_POST['safeid'], '0', date('Y-m-d H:i:s'), $ag_info['id']);
	$insert_id = $pdo->insert($sql, $params);
	 
	 echo "<script type=\"text/javascript\">layer.msg('添加成功');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
	}
	}
	
	
	
}elseif($action == "sub_op_user"){
	$sql = "select count(*) as count from openvpn where user_name in ( select username from web_user where agent_id = ? )";
	$params = array($ag_info['id']);
	$opdata = $pdo->getOne($sql, $params);	
	$pdsql = "select * from web_product where pd_tid = ? ";
	$pdarams = array(2);
	$pddata = $pdo->getSome($pdsql, $pdarams);
	include('top.php');
	include('head.php');
	include('sub_op_user.php');
	include('footer.php');
	
	if($_GET['c'] == "add"){
		
		$sql = "select * from web_user where username = ? ";
		$params = array($_POST['web_user']);
		$data = $pdo->getOne($sql, $params);
		
		$sql = "select * from openvpn where iuser = ? ";
		$params = array($_POST['opuser']);
		$odata = $pdo->getOne($sql, $params);
		if($_POST['web_user'] == ""){
			 echo "<script type=\"text/javascript\">layer.msg('承载账号为空');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
		}
		elseif($data['agent_id'] != $ag_info['id']){
			echo "<script type=\"text/javascript\">layer.msg('承载账号错误');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
		}
		elseif($odata){
		echo "<script type=\"text/javascript\">layer.msg('OpenVPN账号已存在');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
			
		}else{
			$ai = true;
		}
		
		
		$sql = "select * from web_product where id = ? ";
		$params = array($_POST['state']);
		$data = $pdo->getOne($sql, $params);
		
		$price = $zk_info["discount"]*$data['pd_price'];
		
		
		if($ai AND $price > $ag_info['money']){
			 
			echo "<script type=\"text/javascript\">layer.msg('余额不足，返回充值');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
		}elseif($ai AND $price < $ag_info['money']){
			$OrderNum = date('YmdHis');
			$lv=$data['pd_llvalues']*1024*1024*1024;
			$endtime=time()+24*60*60*$data['pd_time'];
			$sql = "insert into openvpn(`iuser`, `isent`, `irecv`, `maxll`, `pass`, `i`, `starttime`, `endtime`, `tian`, `user_name`, `bill_id`) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$params = array($_POST['opuser'], '0', '0', $lv, $_POST['oppass'], '1', time(), $endtime, '0', $_POST['web_user'], $OrderNum);
			$insert_id = $pdo->insert($sql, $params);
			$sql = "insert into web_bill(user_name,b_name,b_price,b_time,b_end_time,b_i,b_pd,b_tid,attach) values (?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$params = array($_POST['web_user'], '代理OpenVpn套餐['.$_SESSION["dusername"].']', '0', date('Y-m-d H:i:s'), date('Y-m-d H:i:s',strtotime("".date('Y-m-d H:i:s')." +".$data['pd_time']." day")), '1', '5','2',$OrderNum);
			$insert_id = $pdo->insert($sql, $params);
			
			$sql = "update web_agent set money =money- ? where id = ? ";
			$params = array($price,$ag_info['id']);
			$affected_rows = $pdo->query($sql, $params);
			
			if($affected_rows){echo "<script type=\"text/javascript\">layer.msg('添加成功');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";}else{echo "<script type=\"text/javascript\">layer.msg('添加失败');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";}
		}
		
		
		
		
		
	}
	
	
	
}elseif($action == "sub_ss_user"){
	$sql = "select count(*) as count from user where user_name in ( select username from web_user where agent_id = ? )";
	$params = array($ag_info['id']);
	$ssdata = $pdo->getOne($sql, $params);	
	$pdsql = "select * from web_product where pd_tid = ? ";
	$pdarams = array(1);
	$pddata = $pdo->getSome($pdsql, $pdarams);
	include('top.php');
	include('head.php');
	include('sub_ss_user.php');
	include('footer.php');
	
		if($_GET['c'] == "add"){
		
		$sql = "select * from web_user where username = ? ";
		$params = array($_POST['web_user']);
		$data = $pdo->getOne($sql, $params);
		if($_POST['web_user'] == ""){
			 echo "<script type=\"text/javascript\">layer.msg('承载账号为空');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
		}
		elseif($data['agent_id'] != $ag_info['id']){
			echo "<script type=\"text/javascript\">layer.msg('承载账号错误');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
		}else{
			$ai = true;
		}

		
		$sql = "select * from web_product where id = ? ";
		$params = array($_POST['state']);
		$data = $pdo->getOne($sql, $params);
		$price = $zk_info["discount"]*$data['pd_price'];
		if($ai AND $price > $ag_info['money']){
			echo "<script type=\"text/javascript\">layer.msg('余额不足，返回充值');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
		}elseif($ai AND $price < $ag_info['money']){
			$sport = "3".generate_code(4);
			$OrderNum = date('YmdHis');
			$sql = "insert into user(`bill_id`, `user_name`, `passwd`, `transfer_enable`, `port`, `reg_date`, `method`, `class_expire`, `expire_in`, `theme`, `protocol`, `obfs`) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$params = array($OrderNum, $_POST['web_user'], $_POST['sspass'], $data['pd_llvalues']*1024*1024*1024, $sport, date('Y-m-d H:i:s'), $_POST['ssmethod'], date('Y-m-d H:i:s'), date('Y-m-d H:i:s',strtotime("".date('Y-m-d H:i:s')." +".$data['pd_time']." day")), 'material', 'auth_aes128_sha1', 'http_simple');
			$insert_id = $pdo->insert($sql, $params);

			$sql = "insert into web_bill(user_name,b_name,b_price,b_time,b_end_time,b_i,b_pd,b_tid,attach) values (?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$params = array($_POST['web_user'], '代理SSR套餐['.$_SESSION["dusername"].']', '0', date('Y-m-d H:i:s'), date('Y-m-d H:i:s',strtotime("".date('Y-m-d H:i:s')." +".$data['pd_time']." day")), '1', '1','1',$OrderNum);
			$insert_id = $pdo->insert($sql, $params);
			
			$sql = "update web_agent set money =money- ? where id = ? ";
			$params = array($price,$ag_info['id']);
			$affected_rows = $pdo->query($sql, $params);
			
			if($affected_rows){echo "<script type=\"text/javascript\">layer.msg('添加成功');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";}else{echo "<script type=\"text/javascript\">layer.msg('添加失败');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";}
		}
		
		
		
		
		
	}
}elseif($action == "onlinepay"){
	
		if(isset($_GET['id'])){

		$idsql = "select * from web_paylog where pid = ? ";
		$idparams = array($_GET['id']);
		$iddata = $pdo->getOne($idsql, $idparams);

		if($iddata){
			echo "<script type=\"text/javascript\">layer.msg('充值成功');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
			 
			
		}else{
			echo "<script type=\"text/javascript\">layer.msg('充值失败');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
		 
		}
		}
	
	include('top.php');
	include('head.php');
	include('alipay.php');
	include('footer.php');
	
}elseif($action == "sub_bill"){
	
	include('top.php');
	include('head.php');
	include('sub_bill.php');
	include('footer.php');
	
}elseif($action == "agent_set"){
	
	include('top.php');
	include('head.php');
	include('agent_set.php');
	include('footer.php');
	
}elseif($action == "invite"){
	
	include('top.php');
	include('head.php');
	include('invite.php');
	include('footer.php');
	
}elseif($action == "sub_user_set"){
	$sql = "select * from web_user where id = ? ";
	$params = array($_GET['id']);
	$Fdata = $pdo->getOne($sql, $params);
	
	
	if($_POST){
		$sql = "UPDATE web_user SET password = ?,safeid= ? where username = ? AND agent_id = ?";
		$params = array($_POST['pass'],$_POST['notes'],$_POST['user'],$ag_info['id']);
		$affected_rows = $pdo->query($sql, $params);
	 
		 echo "<script type=\"text/javascript\">layer.msg('修改成功');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
		 
		
	}
	
	
	include('top.php');
	include('head.php');
	include('sub_user_set.php');
	include('footer.php');
	
}elseif($action == "delect"){
 
	 if($_GET['type'] =="sub_user")
	{
	 
	$sql = "DELETE FROM web_user WHERE id= ? AND agent_id = ?";
	$params = array($_GET['id'],$ag_info['id']);
	$affected_rows = $pdo->query($sql, $params);
	 
	}elseif($_GET['type'] =="sub_op_user"){
		
		$idsql = "select * from openvpn where id = ? ";
		$idparams = array($_GET['id']);
		$iddata = $pdo->getOne($idsql, $idparams);
		
		$Ag_idsql = "select * from web_user where username = ? ";
		$Ag_idparams = array($iddata['user_name']);
		$Ag_iddata = $pdo->getOne($Ag_idsql, $Ag_idparams);
		
		if($Ag_iddata['agent_id'] == $ag_info['id']){
			
			$sql = "DELETE FROM openvpn WHERE id= ?";
			$params = array($_GET['id']);
			$affected_rows = $pdo->query($sql, $params);
				
			 
		}else{
			
			returnJson(false,'删除异常');
			
		}

	}elseif($_GET['type'] =="sub_ss_user"){
		
		$idsql = "select * from user where id = ? ";
		$idparams = array($_GET['id']);
		$iddata = $pdo->getOne($idsql, $idparams);
		
		$Ag_idsql = "select * from web_user where username = ? ";
		$Ag_idparams = array($iddata['user_name']);
		$Ag_iddata = $pdo->getOne($Ag_idsql, $Ag_idparams);
		
		if($Ag_iddata['agent_id'] == $ag_info['id']){
			
			$sql = "DELETE FROM user WHERE id= ?";
			$params = array($_GET['id']);
			$affected_rows = $pdo->query($sql, $params);
			 
		}else{
			
			returnJson(false,'删除异常');
			
		}

	}
	
	returnJson(true,'删除成功');
	
	 
}elseif($action == "logout"){
			session_start();
         $_SESSION = array();
         if (isset($_COOKIE[session_name()])) {
               setcookie(session_name(), '', time()-42000, '/');
          }
         session_destroy();
		@header('Content-Type: text/html; charset=UTF-8');
		
		 echo "<script type=\"text/javascript\">alert('您已成功注销本次登录！');window.location.href='/member/login';</script>";
		 
}























?>