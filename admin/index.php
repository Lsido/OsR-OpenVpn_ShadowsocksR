<?php 
include('../api/system.php');
$p=true;
$action = $_GET['action'];
if(empty($action)){header("location:/member/login");}
$websql = "select * from web_admin";
$webdata = $pdo->getOne($websql);
if($action == "admin_index"){
	
	$sql = "select count(*) as count from web_user";
	$data = $pdo->getOne($sql);
	include('modal/top.php');
	include('modal/head.php');
	include('modal/admin_index.php');
	
	
}elseif($action == "web_user"){
	$sql = "select count(*) as count from web_user";
	$data = $pdo->getOne($sql);
	include('modal/top.php');
 
	include('modal/head.php');
	include('modal/web_user.php');
	if($_POST['email']){
		
		
	$sql = "SELECT * FROM web_user WHERE username = ? ";
	$params = array(addslashes($_POST['email']));
	$data = $pdo->getOne($sql, $params);
	
	$a_sql = "SELECT * FROM web_agent WHERE username = ? ";
	$a_params = array(addslashes($_POST['email']));
	$a_data = $pdo->getOne($a_sql, $a_params);
	
		
	if($a_data or $data){echo "<script type=\"text/javascript\">layer.msg('用户名已存在');setTimeout(function(){history.go(-1);}, 2000);</script>";}
	else{
	$sql = "insert into web_user(username,password,safeid,money,RegTime) values (?, ?, ?, ?, ?)";
	$params = array(addslashes($_POST['email']), $_POST['pass'], $_POST['safeid'], $_POST['money'], date('Y-m-d H:i:s'));
	$insert_id = $pdo->insert($sql, $params);
	echo "<script language=JavaScript>alert('添加成功');self.location=document.referrer;</script>";
	}
	}
 
	
}elseif($action == "web_ss_user"){
	$slsql = "select count(*) as count from user";
	$sldata = $pdo->getOne($slsql);

	include('modal/top.php');
	include('modal/head.php');
	include('modal/web_ss_user.php');
	if($_POST){
		
	$sport = "2".generate_code(4);
	$OrderNum = date('YmdHis');
	$sql = "insert into user(`bill_id`, `user_name`, `passwd`, `transfer_enable`, `port`, `reg_date`, `method`, `class_expire`, `expire_in`, `theme`, `protocol`, `obfs`) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$params = array($OrderNum, $_POST['web_user'], $_POST['sspass'], $_POST['ssll']*1024*1024*1024, $sport, date('Y-m-d H:i:s'), $_POST['ssmethod'], date('Y-m-d H:i:s'), date('Y-m-d H:i:s',strtotime("".date('Y-m-d H:i:s')." +".$_POST['sstime']." day")), 'material', 'auth_aes128_sha1', 'http_simple');
	$insert_id = $pdo->insert($sql, $params);

	$sql = "insert into web_bill(user_name,b_name,b_price,b_time,b_end_time,b_i,b_pd,b_tid,attach) values (?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$params = array($_POST['web_user'], '官方所属Ss套餐', '0', date('Y-m-d H:i:s'), date('Y-m-d H:i:s',strtotime("".date('Y-m-d H:i:s')." +".$_POST['sstime']." day")), '1', '1','1',$OrderNum);
	$insert_id = $pdo->insert($sql, $params);
	 echo "<script type=\"text/javascript\">layer.msg('添加成功');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
	}
 
	
}elseif($action == "web_op_user"){
	$opsql = "select count(*) as count from openvpn";
	$opdata = $pdo->getOne($opsql);
	include('modal/top.php');
 
	include('modal/head.php');
	include('modal/web_op_user.php');
	
	if($_POST['opuser']){
		
		
	$sql = "SELECT * FROM openvpn WHERE iuser = ? ";
	$params = array($_POST['opuser']);
	$data = $pdo->getOne($sql, $params);
		  
	if($data){echo "<script type=\"text/javascript\">layer.msg('用户名已存在');setTimeout(function(){history.go(-1);}, 2000);</script>";}
	else{
	$OrderNum = date('YmdHis');
	$lv=$_POST['maxll']*1024*1024*1024;
	$endtime=time()+24*60*60*$_POST['tian'];
	$sql = "insert into openvpn(`iuser`, `isent`, `irecv`, `maxll`, `pass`, `i`, `starttime`, `endtime`, `tian`, `user_name`, `bill_id`) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$params = array($_POST['opuser'], '0', '0', $lv, $_POST['oppass'], '1', time(), $endtime, '0', $_POST['web_user'], $OrderNum);
	$insert_id = $pdo->insert($sql, $params);
	$sql = "insert into web_bill(user_name,b_name,b_price,b_time,b_end_time,b_i,b_pd,b_tid,attach) values (?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$params = array($_POST['web_user'], '官方所属OpenVpn套餐', '0', date('Y-m-d H:i:s'), date('Y-m-d H:i:s',strtotime("".date('Y-m-d H:i:s')." +".$_POST['tian']." day")), '1', '5','2',$OrderNum);
	$insert_id = $pdo->insert($sql, $params);
	  
	 
	 echo "<script type=\"text/javascript\">layer.msg('添加成功');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
	 
	}
	 
	}
 
	
}elseif($action == "work"){
	$gdsql = "select count(*) as count from web_word";
	$gdata = $pdo->getOne($gdsql);

	
	include('modal/top.php');
	include('modal/head.php');
	include('modal/web_work.php');
}elseif($action == "view_work"){
 
	$sql = "select * from web_word where id = ? ";
	$params = array($_GET['id']);
	$data = $pdo->getOne($sql, $params);
	include('modal/top.php');
	include('modal/head.php');
	 
	include('modal/view_work.php');
	 
	
	if($_GET['c']=="close"){
		
		$sql = "update web_word set w_is_over = ? where id = ? ";
		$params = array('1', $_GET['id']);
		$affected_rows = $pdo->query($sql, $params);
		
		echo "<script type=\"text/javascript\">layer.msg('已结单');setTimeout(function(){window.location.href='index.php?action=work';}, 2000);</script>";
		
		 
	}
	
	if($_POST){		
		$sql = "insert into web_word(w_user,w_content,w_starttime,w_endtime,to_w_id) values (?, ?, ?, ?, ?)";
		$params = array('admin', $_POST['replymessage'], date('Y-m-d H:i:s'), date('Y-m-d H:i:s'),$_GET['id']);
		$insert_id = $pdo->insert($sql, $params);
		$sql = "update web_word set w_endtime = ? where id = ? ";
		$params = array(date('Y-m-d H:i:s'),$_GET['id']);
		$affected_rows = $pdo->query($sql, $params);
		
		if($insert_id && $webdata['issmtp'] == 1){
	
			 
			 
			 
			 	$cnsql = "SELECT * FROM web_word WHERE id = ? ";
				$cnparams = array($_GET['id']);
				$cndata = $pdo->getOne($cnsql, $cnparams);
				
				$rnsql = "SELECT * FROM web_word WHERE id = ? ";
				$rnparams = array($insert_id);
				$rndata = $pdo->getOne($rnsql, $rnparams);
				
				$mailsubject = $webdata['site_name']." - [Ticket ID: ".$_GET['id']."] ".$cndata['w_title']."";
		  
				$file_path = '../api/email.html';
				$content = file_get_contents($file_path);
				$my=str_replace("网站URL","http://".$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"],$content);
				$my2=str_replace("用户名",$cndata['w_user'],$my);
				$my3=str_replace("工单当前状态说明","您的工单已经得到了客服团队的回复详细信息如下",$my2);
				$my4=str_replace("工单ID",$_GET['id'],$my3);
				$my5=str_replace("工单主题名称",$cndata['w_title'],$my4);
				$my6=str_replace("工单等级",$cndata['w_level'],$my5);
				$my7=str_replace("工单底部说明","您可以点击以下按钮进入网站对工作人员的解答做出回复。",$my6);
				$my8=str_replace("网站名称",$webdata['site_name'],$my7);
				$my9=str_replace("工单页面URL","http://".$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"]."/member/work",$my8);
				$my10=str_replace('<input type="hidden">',$rndata['w_content'],$my9);
				$mailbody =$my10;
				 function send_mail($to,$stn,$subject,$body,$api_user,$api_key) {
					$url = 'http://api.sendcloud.net/apiv2/mail/send';
				    $API_USER = $api_user;
				    $API_KEY = $api_key;

				  
				  $param = array(
					  'apiUser' => $API_USER,
					  'apiKey' => $API_KEY,
					  'from' => 'service@sendcloud.im',
					  'fromName' => $stn,
					  'to' => $to,
					  'subject' => $subject,
					  'html' => $body,
					  'respEmailId' => 'true');

				$data = http_build_query($param);

				$options = array(
					  'http' => array(
					  'method'  => 'POST',
					  'header'  => 'Content-Type: application/x-www-form-urlencoded',
					  'content' => $data
				));

				$context  = stream_context_create($options);
				$result = file_get_contents($url, false, $context);

				return $result;
			  }
		  
  
   
			send_mail($cndata['w_user'],$webdata['site_name'],$mailsubject,$mailbody,$webdata['smtpuser'],$webdata['smtppass']);
			 
			 
			 
			 
			 
			 
			 
			 
			 
			
			 
			
		}
		
		echo "<script type=\"text/javascript\">layer.msg('提交成功');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
		
	 
	}
 
}elseif($action == "web_bill"){
	
	include('modal/top.php');
	include('modal/head.php');
	include('modal/web_bill.php');
	
}elseif($action == "op_node"){
	
	include('modal/top.php');
	include('modal/head.php');
	include('modal/web_op_node.php');
	
}elseif($action == "ss_node"){
	
	include('modal/top.php');
	include('modal/head.php');
	include('modal/ss_node.php');
	
}elseif($action == "shop"){
	
	include('modal/top.php');
	include('modal/head.php');
	include('modal/admin_shop.php');
	
}elseif($action == "add_shop"){
	include('modal/top.php');
	//include('modal/add_pd_type.php');
	include('modal/head.php');
	include('modal/admin_addpd.php');
	if($_GET['c'] =="addtype"){
		
	   
	$sql = "select * from web_pdtype where type_name = ? ";
	$params = array($_POST['pdtype']);
	$data = $pdo->getOne($sql, $params);
	  if($data){
		  
		  echo "<script type=\"text/javascript\">layer.msg('已有相同的分类在当前类别下');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
		  
		 
		 
	  }else{
	$sql = "insert into web_pdtype(type_name,type_id) values (?, ?)";
	$params = array($_POST['pdtype'], $_POST['type']);
	$insert_id = $pdo->insert($sql, $params);
	  }
	   echo "<script type=\"text/javascript\">layer.msg('添加成功');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
		  
	   
 
	}elseif($_GET['c'] =="addpd"){
	$state=$_POST['state'];
	$array=explode('-', $state);
	  if(empty($state)){
		   
		  echo "<script type=\"text/javascript\">layer.msg('未选择分类');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
		  
	  }else{
	$sql = "insert into web_product(pd_type,pd_name,pd_price,pd_llvalues,pd_time,pd_content1,pd_tid) values (?, ?, ?, ?, ?, ?, ?)";
	$params = array($array[0], $_POST['pdname'],$_POST['price'],$_POST['num'],$_POST['tian'],$_POST['content'],$array[1]);
	$insert_id = $pdo->insert($sql, $params);
	  }
	  
	   echo "<script type=\"text/javascript\">layer.msg('添加成功');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
	 
	
	}
 
	
}elseif($action == "announcements"){
	
	include('modal/top.php');
	include('modal/head.php');
	include('modal/announcements.php');
	
}elseif($action == "sys"){
	
	include('modal/top.php');
	include('modal/head.php');
	include('modal/system.php');
	
}elseif($action == "add_gg"){
	
	include('modal/top.php');
	include('modal/head.php');
	include('modal/add_gg.php');
	if($_POST){		
	
				$sql = "insert into web_gg(g_name,g_conetent,g_time) values (?, ?, ?)";
				$params = array($_POST['ggname'], $_POST['content'], date('d/m/Y'));
				$insert_id = $pdo->insert($sql, $params);
		   echo "<script type=\"text/javascript\">layer.msg('添加成功');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
	 
		 
		
		}
 
	
}elseif($action == "moneyadd"){
	
	
	include('modal/top.php');
	include('modal/head.php');
	include('modal/moneyadd.php');
	
	if($_POST){
	$username_add=$_POST["username_add"];
	$money_add=$_POST["money_add"];
	$S_a_sql = "SELECT * FROM web_agent WHERE username = ? ";
	$S_a_params = array($username_add);
	$S_a_data = $pdo->getOne($S_a_sql, $S_a_params);
		
	if($S_a_data){
	$sql = "update web_agent set money=money + ? where username= ?";
	$params = array($money_add, $username_add);
	$affected_rows = $pdo->query($sql, $params);
	}
	else{
	$sql = "update web_user set money=money + ? where username= ?";
	$params = array($money_add, $username_add);
	$affected_rows = $pdo->query($sql, $params);
	   
	}
	 echo "<script type=\"text/javascript\">layer.msg('添加成功');setTimeout(function(){self.location=document.referrer;}, 2000);</script>"; 
	}
 
	
}elseif($action == "llkmlist"){

	include('modal/top.php');
	include('modal/head.php');
	include('modal/llkmlist.php');
	
}elseif($action == "add_op_node"){
	include('modal/top.php');
	include('modal/head.php');
	include('modal/addfwq.php');
	if($_GET["set"]==1){
		$name=$_POST["name"];
		$ipport=$_POST["ipport"];
			$sql = "insert into web_op_node(name,ip) values (?, ?)";
			$params = array($name, $ipport);
			$insert_id = $pdo->insert($sql, $params);
		if($insert_id){
			
			
			 echo "<script type=\"text/javascript\">layer.msg('添加成功，请返回列表查看');setTimeout(function(){window.location.href='index.php?action=op_node';}, 2000);</script>";
	 
		  
		}else{
			
			  echo "<script type=\"text/javascript\">layer.msg('添加失败');</script>";
		}
		
		
	} 
 
	
}elseif($action == "add_ss_node"){
	include('modal/top.php');
	include('modal/head.php');
	include('modal/ss_node_add.php');
	if($_POST){
	
	
	if($_POST['state2'] == 1){
		
		$sql = "insert into web_ss_node(node_name,node_ip,node_port,node_parm,is_multi,add_time) values (?, ?, ?, ?, ?, ?)";
		$params = array($_POST['node_name'], $_POST['node_ip'], $_POST['node_port'], $_POST['obfsparm'], $_POST['state2'], date('Y-m-d H:i:s'));
		$insert_id = $pdo->insert($sql, $params);
		$OrderNum = date('YmdHis');
		$passwd = "Dd".generate_code(4);
		$sql = "insert into user(`bill_id`, `user_name`, `passwd`, `transfer_enable`, `port`, `reg_date`, `method`, `class_expire`, `expire_in`, `theme`, `protocol`, `obfs`, `is_multi_user`) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$params = array($OrderNum, $_POST['node_port']."单端口承载", $passwd, "107374182400", $_POST['node_port'], date('Y-m-d H:i:s'), $_POST['method'], date('Y-m-d H:i:s'), "2099-09-09 12:12:12", 'material', $_POST['pro'], $_POST['obfs'], "2");
		$insert_id = $pdo->insert($sql, $params);
		
		 
	}elseif($_POST['state2'] == 0){
		$sql = "insert into web_ss_node(node_name,node_ip,node_port,is_multi,add_time) values (?, ?, ?, ?, ?)";
		$params = array($_POST['node_name'], $_POST['node_ip'], "用户自定义", $_POST['state2'], date('Y-m-d H:i:s'));
		$insert_id = $pdo->insert($sql, $params);
	}
	 echo "<script type=\"text/javascript\">layer.msg('添加成功，请返回列表查看');setTimeout(function(){window.location.href='index.php?action=ss_node';}, 2000);</script>";
	
	
}
 
	
}elseif($action == "oponline"){
	
	include('modal/top.php');
	include('modal/head.php');
	include('modal/op_online.php');
	
}elseif($action == "delect"){
	
	if($_GET['type'] =="web_user")
	{
	$sql = "DELETE FROM web_user WHERE id= ? ";
	$params = array($_GET['id']);
	$affected_rows = $pdo->query($sql, $params);
	}elseif($_GET['type'] =="web_user_all"){
	$sql = "DELETE FROM web_user";
	$affected_rows = $pdo->query($sql, $params);
	}elseif($_GET['type'] =="web_op_user"){
		
	$sql = "SELECT * FROM openvpn WHERE id = ? ";
	$params = array($_GET['id']);
	$data = $pdo->getOne($sql, $params);
	 
	$sql = "update web_bill set b_i = 0 WHERE attach = ? ";
	$params = array($data['bill_id']);
	$affected_rows = $pdo->query($sql, $params);
		
		
	$sql = "DELETE FROM openvpn WHERE id= ? ";
	$params = array($_GET['id']);
	$affected_rows = $pdo->query($sql, $params);
	
	
	}elseif($_GET['type'] =="web_op_user_all"){
	$sql = "DELETE FROM openvpn";
	$affected_rows = $pdo->query($sql, $params);
	
	$sql = "update web_bill set b_i = 0 WHERE b_tid= ? ";
	$params = array(2);
	$affected_rows = $pdo->query($sql, $params);
	
	}elseif($_GET['type'] =="web_op_user_all_ban"){
	$sql = "DELETE FROM openvpn WHERE i = '0'";
	$affected_rows = $pdo->query($sql, $params);
	
	$sql = "update web_bill set b_i = 0 WHERE b_tid= ? AND b_end_time < ? ";
	$params = array(2,date('Y-m-d H:i:s'));
	$affected_rows = $pdo->query($sql, $params);
	
	}elseif($_GET['type'] =="web_ss_user"){
		
	
	$sql = "SELECT * FROM user WHERE id = ? ";
	$params = array($_GET['id']);
	$data = $pdo->getOne($sql, $params);
	 
	$sql = "update web_bill set b_i = 0 WHERE attach = ? ";
	$params = array($data['bill_id']);
	$affected_rows = $pdo->query($sql, $params);
 
	
	if($data['is_multi_user']==2){
		
	$sql = "DELETE FROM web_ss_node WHERE node_port= ? ";
	$params = array($data['port']);
	$affected_rows = $pdo->query($sql, $params);
		
	}
	$sql = "DELETE FROM user WHERE id= ? ";
	$params = array($_GET['id']);
	$affected_rows = $pdo->query($sql, $params);
	
	}elseif($_GET['type'] =="web_ss_user_all"){
 
	$sql = "DELETE FROM user";
	$affected_rows = $pdo->query($sql, $params);
	
	$sql = "update web_bill set b_i = 0 WHERE b_tid= ? ";
	$params = array(1);
	$affected_rows = $pdo->query($sql, $params);
	
	}elseif($_GET['type'] =="web_work"){
	$sql = "DELETE FROM web_word WHERE id= ? ";
	$params = array($_GET['id']);
	$affected_rows = $pdo->query($sql, $params);
	}elseif($_GET['type'] =="op_node"){
	$sql = "DELETE FROM web_op_node WHERE ip= ? ";
	$params = array($_GET['id']);
	$affected_rows = $pdo->query($sql, $params);
	}elseif($_GET['type'] =="web_ss_node"){
	
	$sql = "SELECT * FROM web_ss_node WHERE id = ? ";
	$params = array($_GET['id']);
	$data = $pdo->getOne($sql, $params);
		
	$sql = "DELETE FROM web_ss_node WHERE id= ? ";
	$params = array($_GET['id']);
	$affected_rows = $pdo->query($sql, $params);
	
	if($data['is_multi']==1){
		
	$sql = "DELETE FROM user WHERE port= ? ";
	$params = array($data['node_port']);
	$affected_rows = $pdo->query($sql, $params);
		
	}
	
	}elseif($_GET['type'] =="web_gg"){
		
	$sql = "DELETE FROM web_gg WHERE id= ? ";
	$params = array($_GET['id']);
	$affected_rows = $pdo->query($sql, $params);
	
	if($_GET['id'] == 'all'){
		
	$sql = "DELETE FROM web_gg";
	$affected_rows = $pdo->query($sql);
		
	}
	
	}elseif($_GET['type'] =="web_agent_user"){
		
	$sql = "DELETE FROM web_agent WHERE id= ? ";
	$params = array($_GET['id']);
	$affected_rows = $pdo->query($sql, $params);
	
	if($_GET['id'] == 'all'){
		
	$sql = "DELETE FROM web_agent";
	$affected_rows = $pdo->query($sql);
		
	}
	
	}elseif($_GET['type'] =="shop"){
	$sql = "DELETE FROM web_product WHERE id= ? ";
	$params = array($_GET['id']);
	$affected_rows = $pdo->query($sql, $params);
	}elseif($_GET['type'] =="llkm"){
	
	if($_GET['id'] == "used"){
		
	$sql = "DELETE FROM llpaynum WHERE i <> ? ";
	$params = array(0);
	$affected_rows = $pdo->query($sql, $params);
		
	}elseif($_GET['id'] == "all"){
	$sql = "DELETE FROM llpaynum";
	$affected_rows = $pdo->query($sql);
		
	}else{
		
	$sql = "DELETE FROM llpaynum WHERE id= ? ";
	$params = array($_GET['id']);
	$affected_rows = $pdo->query($sql, $params);
		
	}
	
	}elseif($_GET['type'] =="shop_type"){
		
	$sql = "select * from web_product where pd_type = ? ";
	$params = array($_GET['id']);
	$data = $pdo->getSome($sql, $params);
	if($data){
		returnJson(false,'此分类下还有未删的产品');
	}else{
		
	$sql = "DELETE FROM web_pdtype WHERE id= ? ";
	$params = array($_GET['id']);
	$affected_rows = $pdo->query($sql, $params);
	
	}
	}
	returnJson(true,'删除成功');	
}elseif($action == "shop_type"){
	
	include('modal/top.php');
	include('modal/head.php');
	include('modal/shop_type.php');
	
}elseif($action == "logout"){
			session_start();
         $_SESSION = array();
         if (isset($_COOKIE[session_name()])) {
               setcookie(session_name(), '', time()-42000, '/');
          }
         session_destroy();
		@header('Content-Type: text/html; charset=UTF-8');
		
		 echo "<script type=\"text/javascript\">alert('您已成功注销本次登录！');window.location.href='/member/login';</script>";
		 
}elseif($action == "offline"){
	  
	include('../resources/offline.php');  
 
}elseif($action == "web_user_set"){
	
	
	$Fsql = "SELECT * FROM web_user WHERE id = ? ";
	$Fparams = array($_GET['id']);
	$Fdata = $pdo->getOne($Fsql, $Fparams);
	
	include('modal/top.php');
	include('modal/head.php');
	include('modal/web_user_set.php');  
	
	if($_POST){
		$sql = "UPDATE web_user SET password = ?,safeid= ?,money= ? where username = ? ";
		$params = array($_POST['pass'],$_POST['notes'],$_POST['money'],$_POST['user']);
		$affected_rows = $pdo->query($sql, $params);
		echo "<script type=\"text/javascript\">layer.msg('修改成功');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
		 
		
	}
	
  

 
}elseif($action == "web_user_ss_set"){
	
	
	$Fsql = "SELECT * FROM user WHERE id = ? ";
	$Fparams = array($_GET['id']);
	$Fdata = $pdo->getOne($Fsql, $Fparams);
	include('modal/top.php');
	include('modal/head.php');
	include('modal/web_user_ss_set.php');  
	
	if($_POST){
		$expire_in=$_POST['expire_in'];
		$transfer_enable=$_POST['transfer_enable']*1024*1024;
		$sql = "UPDATE user SET user_name = ?,passwd= ?,port= ?,method= ?,protocol= ?,obfs= ?,expire_in= ?,transfer_enable= ? where id = ? ";
		$params = array($_POST['czuser'],$_POST['sspass'],$_POST['port'],$_POST['ssmethod'],$_POST['ssprotocol'],$_POST['ssobfs'],$expire_in,$transfer_enable,$_POST['id']);
		$affected_rows = $pdo->query($sql, $params);
		
		$sql = "UPDATE web_bill SET user_name = ? where attach = ? ";
		$params = array($_POST['czuser'],$Fdata['bill_id']);
		$affected_rows = $pdo->query($sql, $params);
		
		
		echo "<script type=\"text/javascript\">layer.msg('修改成功');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
	}
	
 
 
}elseif($action == "web_user_op_set"){
	
	
	$Fsql = "SELECT * FROM openvpn WHERE id = ? ";
	$Fparams = array($_GET['id']);
	$Fdata = $pdo->getOne($Fsql, $Fparams);
	include('modal/top.php');
	include('modal/head.php');
	include('modal/web_user_op_set.php');  
	
	if($_POST){
		
	 
		
		
		$endtime=strtotime($_POST['endtime']);
		
		$maxll=$_POST['maxll']*1024*1024;
		$sql = "UPDATE openvpn SET user_name = ?,iuser= ?,pass= ?,endtime= ?,i= ?,maxll= ? where id = ? ";
		$params = array($_POST['czuser'],$_POST['iuser'],$_POST['pass'],$endtime,$_POST['state'],$maxll,$_POST['id']);
		$affected_rows = $pdo->query($sql, $params);
		
		$sql = "UPDATE web_bill SET user_name = ? where attach = ? ";
		$params = array($_POST['czuser'],$Fdata['bill_id']);
		$affected_rows = $pdo->query($sql, $params);
		
		
		echo "<script type=\"text/javascript\">layer.msg('修改成功');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
	}
	
 
 
}elseif($action == "web_gg_set"){
	
	$Gsql = "SELECT * FROM web_gg where id = ? ";
	$Gparams = array($_GET['id']);
	$Gdata = $pdo->getOne($Gsql, $Gparams);
	include('modal/top.php');
	include('modal/head.php');
	include('modal/set_gg.php');  
	
	if($_POST){
		
		$sql = "UPDATE web_gg SET g_name = ?,g_conetent= ? where id = ? ";
		$params = array($_POST['g_name'],$_POST['g_conetent'],$_POST['id']);
		$affected_rows = $pdo->query($sql, $params);
		echo "<script type=\"text/javascript\">layer.msg('修改成功');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
	}
	
	
 
	
}elseif($action == "getUpdateLogs"){
	
	 echo getUpdateLogs();
	 
		
	
}elseif($action == "GetNetTotal"){
	
		echo GetNetTotal();
	
}elseif($action == "GetSystemTotal"){
	
		echo GetSystemTotal();
	
}elseif($action == "updateweb"){
	 
	 
		$file = "../test.txt";
		file_put_contents($file,"test");
		$get = @file_get_contents($file);
		$rand = false;
		if($get == "test"){
			@unlink($file);
			$rand = true;
		}
		$updateInfo = json_decode(httpGet('http://update.mlhtml.com/updateLinuxClient.php'),true);
		
		$local_v = file_get_contents('../version.txt');
		
		if($local_v == $updateInfo['version']){
			returnJson(false,"当前已经是最新版本!");
		}elseif(empty($updateInfo)){
			
			returnJson(false,"连接云端服务器失败!");
			
		}

		if($updateInfo['force'] == true || $_GET['toUpdate'] == 'yes'){
			
			if($rand){
				$up=webUpdate($updateInfo['attach'],$updateInfo['downUrl'],$updateInfo['version'],$pi);
				if($up){
					returnJson(true,'成功升级到'.$updateInfo['version']);
				}else{
					returnJson(false,'升级失败，请检查服务器');
				}
			}else{
				
				returnJson(false,'权限不足，请到服务器执行命令后重试：chmod -R 0777 /var/www/html');
				
			}
			
			
		}
		
		
		$data = array(
		'status' => true,
		'version'=> $updateInfo['version'],
		'updateMsg'=> $updateInfo['updateMsg'],
		);
		ajax_return($data);
		
	
}elseif($action == "web_agent_user"){
	
	$Ag_c_sql = "SELECT count(*) as count FROM web_agent";
	$Ag_c_data = $pdo->getOne($Ag_c_sql);
	
	$Grd_c_sql = "SELECT * FROM web_agent_grd";
	$Grd_c_data = $pdo->getSome($Grd_c_sql);
	
	include('modal/top.php');
	include('modal/head.php');
	include('modal/web_agent_user.php');  
		
	if($_POST['email']){
		
	$as_sql = "SELECT * FROM web_agent WHERE username = ? ";
	$as_params = array(addslashes($_POST['email']));
	$as_data = $pdo->getOne($as_sql, $as_params);
		
	$sql = "SELECT * FROM web_user WHERE username = ? ";
	$params = array(addslashes($_POST['email']));
	$data = $pdo->getOne($sql, $params);
		 
	if($as_data or $data){echo "<script type=\"text/javascript\">layer.msg('用户名已存在');setTimeout(function(){history.go(-1);}, 2000);</script>";}
	else{
	$sql = "insert into web_agent(username,password,grade,money,site_name,site_title,site_foot) values (?, ?, ?, ?, ?, ?, ?)";
	$params = array(addslashes($_POST['email']), $_POST['pass'], $_POST['state'], $_POST['money'], $webdata['site_name'], $webdata['site_title'], $webdata['site_foot']);
	$insert_id = $pdo->insert($sql, $params);
	
	$sql = "UPDATE web_agent SET site_url = ? where id = ? ";
	$params = array($insert_id,$insert_id);
	$affected_rows = $pdo->query($sql, $params);
	
	 echo "<script type=\"text/javascript\">layer.msg('添加成功');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
	}
	}elseif($_POST['discount1']){
		
		
		for($i=1;$i<=5;$i++){
			
			
		$sql = "UPDATE web_agent_grd SET discount = ? where id = ? ";
		$params = array($_POST['discount'.$i.''],$i);
		$affected_rows = $pdo->query($sql, $params);
			
		$sql = "UPDATE web_agent_grd SET deposit = ? where id = ? ";
		$params = array($_POST['deposit'.$i.''],$i);
		$affected_rows = $pdo->query($sql, $params);
			
			
			
		}
		
	echo "<script type=\"text/javascript\">layer.msg('修改成功');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
		
		
		
	}
 
	
	
 
}elseif($action == "web_agent_set"){
	
	$Fsql = "SELECT * FROM web_agent WHERE id = ? ";
	$Fparams = array($_GET['id']);
	$Fdata = $pdo->getOne($Fsql, $Fparams);
	include('modal/top.php');
	include('modal/head.php');
	include('modal/web_agent_set.php');  
	
	if($_POST){
		$myarr = explode('.',$_POST['agent_url']);
		$Quest_Agent = $myarr[0];
		$sql = "UPDATE web_agent SET password = ?,money= ?,grade= ?,site_url= ? where id = ? ";
		$params = array($_POST['pass'],$_POST['money'],$_POST['state'],$Quest_Agent,$_GET['id']);
		$affected_rows = $pdo->query($sql, $params);
		echo "<script type=\"text/javascript\">layer.msg('修改成功');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
		
		
	}
	
}elseif($action == "agent_aoment"){
	
 
	include('modal/top.php');
	include('modal/head.php');
	include('modal/agent_aoment.php');  
	
	if($_POST){
		$sql = "UPDATE web_admin SET agent_amt = ?";
		$params = array($_POST['content']);
		$affected_rows = $pdo->query($sql, $params);
		echo "<script type=\"text/javascript\">layer.msg('修改成功');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
	}
	
	
}elseif($action == "Surge"){
	chmod("/var/www/html/admin/surge.conf", 0777);
	include('modal/top.php');
	include('modal/head.php');
	include('modal/Surge.php');  
	if($_POST){
		file_put_contents("surge.conf",$_POST['content']);
		echo "<script type=\"text/javascript\">layer.msg('修改成功');setTimeout(function(){self.location=document.referrer;}, 2000);</script>";
	}
}


  
  





 






























 ?>