<?php 
include('api/system.php');

$myarr = explode('.',$_SERVER['HTTP_HOST']);
$Quest_Agent = $myarr[0];

$websql = "select * from web_admin";
$webdata = $pdo->getOne($websql);

$ag_url_sql = "select * from web_agent where site_url = ? ";
$ag_url_params = array($Quest_Agent);
$ag_url_data = $pdo->getOne($ag_url_sql, $ag_url_params);
if($ag_url_data){
$webdata = $ag_url_data;
$is_agent = true;	

$zk_sql = "select * from web_agent_grd where id = ? ";
$zk_params = array($ag_url_data['grade']);
$zk_info = $pdo->getOne($zk_sql, $zk_params);


}

 
$action = $_GET['action'];
$username = $_SESSION['username'];
if(empty($action)){header( "Location: /member/login" ); }
if($action=="login")
{
	if($_POST){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$user_sql = "select * from web_user where username = ? and password = ? ";
		$user_params = array($username, $password);
		$user_data = $pdo->getOne($user_sql, $user_params);
		
		$admin_sql = "select * from web_admin where username = ? and password = ? ";
		$admin_params = array($username, md5($password));
		$admin_data = $pdo->getOne($admin_sql, $admin_params);
		
		$agent_sql = "select * from web_agent where username = ? and password = ? ";
		$agent_params = array($username,$password);
		$agent_data = $pdo->getOne($agent_sql, $agent_params);
		
		if($user_data){
				$_SESSION['status'] = '1';
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				$_SESSION['count'];  
				isset($PHPSESSID)?session_id($PHPSESSID):$PHPSESSID = session_id();  
				$_SESSION['count']++;  
				setcookie('PHPSESSID', $PHPSESSID, time()+3);  				
				setcookie("username", $username, time()+3600*24*365);  
				setcookie("password", $password, time()+3600*24*365);  
				die(json_encode(array('status'=>'success','type'=>'0')));
			
			}elseif($admin_data){
				
				$_SESSION["astatus"]="ok";
				$_SESSION["ausername"] = $username;
				$_SESSION["apassword"] = $password;
				$_SESSION['count'];  
				isset($PHPSESSID)?session_id($PHPSESSID):$PHPSESSID = session_id();  
				$_SESSION['count']++;  
				setcookie("username", $username, time()+3600*24*365);  
				setcookie("password", $password, time()+3600*24*365);  
				die(json_encode(array('status'=>'success','type'=>'1')));
			}elseif($agent_data){
				
				$_SESSION["dstatus"]="dok";
				$_SESSION["dusername"] = $username;
				$_SESSION["dpassword"] = $password;
				$_SESSION['count'];  
				isset($PHPSESSID)?session_id($PHPSESSID):$PHPSESSID = session_id();  
				$_SESSION['count']++;  
				setcookie("username", $username, time()+3600*24*365);  
				setcookie("password", $password, time()+3600*24*365);  
				die(json_encode(array('status'=>'success','type'=>'2')));
			}else{
				die(json_encode(array('status'=>'error')));
				
			}
	}
			//include('header.php');
			include('modal/user_login.php');
			//include('footer.php');
}elseif($action=="logout"){
	 
         session_start();
         $_SESSION = array();
         if (isset($_COOKIE[session_name()])) {
               setcookie(session_name(), '', time()-42000, '/');
          }
         session_destroy();
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('您已成功注销本次登录！');window.location.href='/member/login';</script>");
}elseif($action=="register"){
		
		if($_POST['username']){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$safeid = $_POST['safeid'];
		$captcha_img = $_POST['captcha_img'];
		$sql = "select * from web_user where username = ?";
		$params = array($username);
		$data = $pdo->getOne($sql, $params);
		if($_SESSION['authcode'] != $captcha_img){echo "<script>alert('验证码错误');history.go(-1);</script>";}
		elseif($password != $password2){echo "<script>alert('两次输入的密码不同');history.go(-1);</script>";}
		elseif($data){echo "<script>alert('用户名已被注册');history.go(-1);</script>";}
		else{
			if($_POST['spread_id']){
				
				if($is_agent){
					
			$sqla = "insert into web_user(username,password,safeid,RegTime,spread_id,agent_id) values(?, ?, ?, ?, ?, ?)";
			$paramsa = array($username, $password, $safeid, date('Y-m-d H:i:s'), $_POST['spread_id'], $ag_url_data['id']);
			$insert_id = $pdo->insert($sqla, $paramsa);		
			
				}else{
				
			$sqla = "insert into web_user(username,password,safeid,RegTime,spread_id) values(?, ?, ?, ?, ?)";
			$paramsa = array($username, $password, $safeid, date('Y-m-d H:i:s'), $_POST['spread_id']);
			$insert_id = $pdo->insert($sqla, $paramsa);		
			
				}
				
				
			}else{
				
				if($is_agent){
					
			$sqla = "insert into web_user(username,password,safeid,RegTime,agent_id) values(?, ?, ?, ?, ?)";
			$paramsa = array($username, $password, $safeid, date('Y-m-d H:i:s'), $ag_url_data['id']);
			$insert_id = $pdo->insert($sqla, $paramsa);		
			
				}else{
				
			$sqla = "insert into web_user(username,password,safeid,RegTime) values (?, ?, ?, ?)";
			$paramsa = array($username, $password, $safeid, date('Y-m-d H:i:s'));
			$insert_id = $pdo->insert($sqla, $paramsa);		
			
				}
				
 
				
			}
 
		if($insert_id){
			echo "<script>alert('注册成功');window.location.href='/member/client';</script>";
		}else{
			echo "<script>alert('注册失败');window.location.href='/member/register';";
		}
		}
		}
		include('modal/user_register.php');
 
}elseif($action=="pwreset"){
		if($_POST){
		$username = $_POST['username'];
		$password = $_POST['newpw'];
		$password2 = $_POST['confirmpw'];
		$safeid = $_POST['safeid'];
		$sql = "select * from web_user where username = ? and safeid = ? ";
		$params = array($username, $safeid);
		$data = $pdo->getOne($sql, $params);
		if($password != $password2){echo "<script>alert('两次输入的密码不同');history.go(-1);</script>";}
		elseif($data){
		$sql = "update web_user set password = ? where username = ? and safeid = ? ";
		$params = array($password, $username, $safeid);
		$affected_rows = $pdo->query($sql, $params);
		if($affected_rows){ 
			echo "<script>alert('修改成功');window.location.href='/member/login';</script>";
			}else{				 
			echo "<script>alert('修改异常:error');history.go(-1);</script>";
		 }
			}else{
			echo "<script>alert('用户安全码错误');history.go(-1);</script>";
	
				}
		 
		}
		include('modal/user_pwreset.php');
 
}elseif($action=="client"){

		$sql = "select * from web_user where username = ? ";
		$params = array($_SESSION['username']);
		$data = $pdo->getOne($sql, $params);

		$bsql = "select count(*) as count from web_bill where user_name = ? ";
		$bparams = array($_SESSION['username']);
		$bdata = $pdo->getOne($bsql, $bparams);

		$bisql = "select count(*) as count from web_bill where user_name = ? and b_i = ? ";
		$biparams = array($_SESSION['username'],1);
		$bidata = $pdo->getOne($bisql, $biparams);
		include('header.php');
		include('modal/client.php');
		include('footer.php');
 
}elseif($action=="shop"){

		include('header.php');
		include('modal/shop.php');
		include('footer.php');
 
}elseif($action=="goods"){
		$sql = "select count(*) as count from web_bill where user_name = ? ";
		$params = array($_SESSION['username']);
		$data = $pdo->getOne($sql, $params);
		include('header.php');
		include('modal/goods.php');
		include('footer.php');
 
}elseif($action=="Ssgoods"){
	
		if(strstr($_GET['id'],"Surge")){

			$ssid = explode('@',$_GET['id']);
			$id = $ssid[1];
			$port = $ssid[2];
			$method = $ssid[3];
			$pass = $ssid[4];
			$Content = file_get_contents('admin/surge.conf');

			$snsql = "select * from web_ss_node where is_multi = '0'";
			$sndata = $pdo->getSome($snsql);
			foreach($sndata as $value)
			{
				
			 $p1300 .= "\n".$value['node_name']." = custom,".$value['node_ip'].",".$port.",".$method.",".$pass.",https://ss.zftuozhan.com/SSEncrypt.module";
			$p1301 .= ",".$value['node_name']."";
			}
			
			$str1 = str_replace("p1300",$p1300,$Content);
			
			$str2 = str_replace("p1301",$p1301,$str1);
			exit($str2);
		}
		
		$bsql = "select * from web_bill where id = ? and user_name = ? ";
		$bparams = array($_GET['id'],$_SESSION['username']);
		$bdata = $pdo->getOne($bsql, $bparams);
		if($_POST){		
		$sql = "update user set passwd = ? ,method = ? ,protocol = ? ,obfs = ? where bill_id = ? ";
		$params = array($_POST['newpw'], $_POST['ssmethod'], $_POST['ssprotocol'], $_POST['ssobfs'], $_POST['id']);	
		$affected_rows = $pdo->query($sql, $params);
		echo "<script language=javascript>alert('修改成功');self.location=document.referrer;</script>";

		}
		include('header.php');
		include('modal/ssProduct.php');
		include('footer.php');
  
}elseif($action=="Opgoods"){
		$bsql = "select * from web_bill where id = ? and user_name = ? ";
		$bparams = array($_GET['id'],$_SESSION['username']);
		$bdata = $pdo->getOne($bsql, $bparams);
		if(strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone')||strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')){
		 $UA="1";
		}else if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android')){
		 $UA="2";
		}else{
		 $UA="3";
		}
		if(isset($_GET['add_line'])){
			$data = file_get_contents_post('http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].'/app_api/getLine.php', array('username'=>''.$_GET['username'].'', 'password'=>''.$_GET['password'].'','id'=>''.$_GET['lineid'].'')); 
			$obj=json_decode($data); 
			$cont = $obj->content;  
			$name = $obj->name; 
			$value=base64_decode($cont);
			$file_name=$name.".ovpn";
			$file_size=strlen($value);
			header("Content-Description: File Transfer");
			header("Content-Type:application/force-download");
			header( "Content-type:  application/ovpn ");
			header("Content-Length: {$file_size}");
			header("Content-Disposition:attachment; filename={$file_name}");
			exit($value);
		 }
		if($_GET['c']=='update'){
		$sql = "update openvpn set pass = ? where bill_id = ? ";
		$params = array($_POST['newpw'], $_POST['id']);	
		$affected_rows = $pdo->query($sql, $params);
		echo "<script language=javascript>alert('修改成功');self.location=document.referrer;</script>";
		}elseif($_GET['c']=='renewal'){
			
			
		$sql = "select * from web_user where username = ? ";
		$params = array($_SESSION['username']);
		$data = $pdo->getOne($sql, $params);
		
		$rbsql = "select * from web_bill where attach = ? ";
		$rbparams = array($_POST['id']);
		$rbdata = $pdo->getOne($rbsql, $rbparams);
		
		if($rbdata['b_price'] != 0){
			
		if($data['money'] >= $rbdata['b_price'])
		{
			
		$tc_sql = "select * from web_product where pd_name = ? ";
		$tc_params = array($rbdata['b_name']);
		$tc_data = $pdo->getOne($tc_sql, $tc_params);
			
		if($tc_data['pd_tid'] == 1){
			
		$expire_in=date('Y-m-d H:i:s',strtotime("".$rbdata['b_end_time']." +".$tc_data['pd_time']." day"));
		$maxll=$tc_data['pd_llvalues']*1024*1024*1024;
		$sql = "update user set transfer_enable = transfer_enable+ ?,expire_in = ? where bill_id = ? ";
		$params = array($maxll, $expire_in, $_POST['id']);	
		$affected_rows = $pdo->query($sql, $params);
		
		$sql = "update web_bill set b_end_time = ? where attach = ? ";
		$params = array($expire_in, $_POST['id']);	
		$affected_rows = $pdo->query($sql, $params);
		
		$sql = "update web_user set money = money- ? where username = ? ";
		$params = array($tc_data['pd_price'], $_SESSION['username']);	
		$affected_rows = $pdo->query($sql, $params);
		
		echo "<script language=javascript>alert('续费成功');self.location=document.referrer;</script>";
			
		}elseif($tc_data['pd_tid'] == 2){

		$duetime = $tc_data['pd_time']*24*60*60;
		$maxll=$tc_data['pd_llvalues']*1024*1024*1024;
		$sql = "update openvpn set maxll = maxll+ ?,endtime =endtime+ ? where bill_id = ? ";
		$params = array($maxll, $duetime, $_POST['id']);	
		$affected_rows = $pdo->query($sql, $params);
		$b_end_time=date('Y-m-d H:i:s',strtotime("".$rbdata['b_end_time']." +".$tc_data['pd_time']." day"));
		$sql = "update web_bill set b_end_time = ? where attach = ? ";
		$params = array($b_end_time, $_POST['id']);	
		$affected_rows = $pdo->query($sql, $params);
		
		$sql = "update web_user set money = money- ? where username = ? ";
		$params = array($tc_data['pd_price'], $_SESSION['username']);	
		$affected_rows = $pdo->query($sql, $params);
		if($is_agent){
		$Zj = $zk_info['discount']*$tc_data['pd_price'];
		$sql = "update `web_agent` set money =money + ? where username = ? ";
		$params = array($Zj, $ag_url_data['username']);
		$ag_affected_rows = $pdo->query($sql, $params);
		}
		echo "<script language=javascript>alert('续费成功');self.location=document.referrer;</script>";
		
		}else{
			
			echo "<script language=javascript>alert('当前套餐已不支持续费，请重新购买新产品');self.location=document.referrer;</script>";
			
		}
			
			
			
		}else{
			
			echo "<script language=javascript>alert('余额不足，请充值后再试');self.location=document.referrer;</script>";
			
		}
			
		}else{
			
			echo "<script language=javascript>alert('官方套餐不允许用户自主续费');self.location=document.referrer;</script>";
			
		}
			
			
			
			
		}
		include('header.php');
		include('modal/OProduct.php');
		include('footer.php');
 
}elseif($action=="check"){
		
		$sql = "select * from web_user where username = ? ";
		$params = array($_SESSION['username']);
		$data = $pdo->getOne($sql, $params);

		$casql = "select SUM(pd_price) as sum from web_cart where username = ? ";
		$caparams = array($_SESSION['username']);
		$cadata = $pdo->getOne($casql, $caparams);
		
		if($_POST){
		
		if($data['money'] >= $cadata['sum'])
	 {
		 
$sql = "SELECT * FROM `web_cart` WHERE username = ? ";
$params = array($_SESSION['username']);
$data = $pdo->getSome($sql, $params);
 
	foreach($data as $value)
		{
  
	$pdsql = "select * from web_product where id = ? ";
	$pdparams = array($value['pd_id']);
	$pddata = $pdo->getSome($pdsql, $pdparams);
    
		foreach($pddata as $pdvalue)
		{
			
			//平台订单号
			$OrderNum=date('YmdHis').generate_code(4);
			if($value['pd_tid']==1){
			   //添加SSR账户
			  $sport=generate_code(4);
			  $sport="1".$sport;
			  $lv=$pdvalue['pd_llvalues']*1024*1024*1024;
			  
			  $cpsql = "select count(*) as count from user where port = ? ";
			  $cpparams = array($sport);
			  $cpdata = $pdo->getOne($cpsql, $cpparams);
			  if($cpdata['count']==1){
			  $sports="1".generate_code(4);
			  $sports="1".$sports;
			  $sql = "insert into user(`bill_id`, `user_name`, `passwd`, `transfer_enable`, `port`, `reg_date`, `method`, `class_expire`, `expire_in`, `theme`, `protocol`, `obfs`) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		      $params = array($OrderNum, $_SESSION['username'], $value['attach'], $lv, $sports, date('Y-m-d H:i:s'), 'rc4-md5', date('Y-m-d H:i:s'), date('Y-m-d H:i:s',strtotime("".date('Y-m-d H:i:s')." +".$pdvalue['pd_time']." day")), 'material', 'auth_sha1_compatible', 'http_simple_compatible');
		      $insert_id = $pdo->insert($sql, $params);
			  }else{
			  $sql = "insert into user(`bill_id`, `user_name`, `passwd`, `transfer_enable`, `port`, `reg_date`, `method`, `class_expire`, `expire_in`, `theme`, `protocol`, `obfs`) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		      $params = array($OrderNum, $_SESSION['username'], $value['attach'], $lv, $sport, date('Y-m-d H:i:s'), 'rc4-md5', date('Y-m-d H:i:s'), date('Y-m-d H:i:s',strtotime("".date('Y-m-d H:i:s')." +".$pdvalue['pd_time']." day")), 'material', 'auth_sha1_compatible', 'http_simple_compatible');
		      $insert_id = $pdo->insert($sql, $params);
			  }
			}elseif($value['pd_tid']==2){
			  //添加OP账户
			  $array=explode('@', $value['attach']);
			  $lv=$pdvalue['pd_llvalues']*1024*1024*1024;
			  $endtime=time()+24*60*60*$pdvalue['pd_time'];
			  $sql = "insert into openvpn(`iuser`, `isent`, `irecv`, `maxll`, `pass`, `i`, `starttime`, `endtime`, `tian`, `user_name`, `bill_id`) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		      $params = array($array[0], '0', '0', $lv, $array[1], '1', time(), $endtime, '0', $_SESSION['username'], $OrderNum);
		      $insert_id = $pdo->insert($sql, $params);
	  
				}
	
	 
			if($insert_id){
			//ID剔除购物车
		    $sql = "DELETE FROM `web_cart` where id = ? ";
			$params = array($value['id']);
			$affected_rows = $pdo->query($sql, $params);
			//增加用户账单
			$sql = "insert into web_bill(user_name,b_name,b_price,b_time,b_end_time,b_i,b_pd,b_tid,attach) values (?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$params = array($_SESSION['username'], $pdvalue['pd_name'], $pdvalue['pd_price'], date('Y-m-d H:i:s'), date('Y-m-d H:i:s',strtotime("".date('Y-m-d H:i:s')." +".$pdvalue['pd_time']." day")), '1', $pdvalue['pd_type'],$value['pd_tid'],$OrderNum);
			$insert_id = $pdo->insert($sql, $params);

			
		}  

	
				  
			  }
			 
			  }
			  
			 //扣除余额
			$sql = "update `web_user` set money =money - ? where username = ? ";
			$params = array($cadata['sum'], $_SESSION['username']);
			$affected_rows = $pdo->query($sql, $params);
			
			//代理折扣
			if($is_agent){
			$Zj = $zk_info['discount']*$cadata['sum'];
			$sql = "update `web_agent` set money =money + ? where username = ? ";
			$params = array($Zj, $ag_url_data['username']);
			$ag_affected_rows = $pdo->query($sql, $params);
			}
			
			if($affected_rows){
			 
			$b_z_sql = "SELECT * FROM `web_bill` WHERE id = ? ";
			$b_z_params = array($insert_id);
			$b_z_data = $pdo->getOne($b_z_sql, $b_z_params);
			
			$p_z_sql = "SELECT * FROM `web_product` WHERE pd_name = ? ";
			$p_z_params = array($b_z_data['b_name']);
			$p_z_data = $pdo->getOne($p_z_sql, $p_z_params);
			
			if($b_z_data['b_tid'] == "1"){$bz = "ShadowSocksR";}else{$bz = "OpenVPN";}
			
			//邮件提醒
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
		  
			$body = "<br>亲爱的".$webdata['site_name']."用户，<br>很高兴的提醒您，您的订单编号已确认。<br>订单详情如下<br><br>您的账单已经于".date('d/m/Y')."创建完毕。<br>您的支付方式是：账户余额<br><br>账单编号#".$insert_id."<br>账单费用￥".round($b_z_data['b_price'],2)." RMB<br>账单过期日期：".$b_z_data['b_end_time']."<br>此账单的订单详情：<br><br>".$bz." - ".$b_z_data['b_name']."<br> 总价： ￥".round($b_z_data['b_price'],2)." RMB <br>流量GB/时间: ".$p_z_data['pd_llvalues']." GB/".$p_z_data['pd_time']." 天<br>------------------------------------------------------<br>小计: ￥".round($b_z_data['b_price'],2)." RMB<br>总计: ￥".round($b_z_data['b_price'],2)." RMB<br> ------------------------------------------------------<br>点击这里登录客户中心查看账单 http://".$_SERVER['HTTP_HOST']."/member/goods<br><br>".$webdata['site_name']."<br>http://".$_SERVER['HTTP_HOST']."";
   
			send_mail($_SESSION['username'],$webdata['site_name'],'用户账单生成通知',$body,$webdata['smtpuser'],$webdata['smtppass']);
			
			echo "<script language='javascript'>alert('购买成功');window.location.href='/member/goods';</script>";
			}else{
			echo "<script language='javascript'>alert('系统错误');</script>";
			}
			}else{
				
				echo "<script language='javascript'>alert('余额不足,请返回充值');window.location.href='/member/onlinepay';</script>";
				
			}
		
		}
		
		
		
		
		
		
		include('header.php');
		include('modal/check.php');
		include('footer.php');
  
}elseif($action=="onlinepay"){
	
		$sql = "select * from web_user where username = ? ";
		$params = array($_SESSION['username']);
		$data = $pdo->getOne($sql, $params);

		if(isset($_GET['id'])){

		$idsql = "select * from web_paylog where pid = ? ";
		$idparams = array($_GET['id']);
		$iddata = $pdo->getOne($idsql, $idparams);

		if($iddata){
			
			echo "<script language='javascript'>alert('充值成功');window.location.href='/member/onlinepay';</script>";
			
		}else{
			
			echo "<script language='javascript'>alert('充值失败');window.location.href='/member/onlinepay';</script>";
		}
		}
		include('header.php');
		include('modal/onlinepay.php');
		include('footer.php');
		
}elseif($action=="confproduct"){
		$sql = "select * from web_product where id = ? ";
		$params = array($_GET['id']);
		$data = $pdo->getOne($sql, $params);
		
		if($_GET['c'] == "opVeri"){
			$user=$_POST['user']; 
			$Vsql = "select * from openvpn where iuser = ? ";
			$Vparams = array($user);
			$Vdata = $pdo->getOne($Vsql, $Vparams);
			if($Vdata) 
			exit("<br><font color=red>当前OpenVPN账号已被使用！请更换其他用户名！</font>"); 
			else 
			exit("<br><font color=green>当前输入的OpenVPN账号可以使用！</font>"); 
		}
		
		if($data['pd_tid']==1){$pdt="ShadowSocksR";}elseif($data['pd_tid']==2){$pdt="OpenVpn";}
		

		if($_GET['c']=="cart" AND $data['pd_tid']==1){
			
			$sspass=$_POST['SsPass'];
			
			$sql = "insert into web_cart(username,pd_id,pd_tid,pd_price,attach) values (?, ?, ?, ?, ?)";
			$params = array($username, $_GET['id'],$data['pd_tid'],$data['pd_price'], $sspass);
			$insert_id = $pdo->insert($sql, $params);
			
			if($insert_id){
				exit("<script language='javascript'>window.location.href='/member/cart';</script>");
			}else{
				
				echo "<script language='javascript'>alert('异常');history.go(-1);</script>";
			}
			
			
			
		}elseif($_GET['c']=="cart" AND $data['pd_tid']==2){
			
			$Ouser=$_POST['Ouser'];
			$Opass=$_POST['Opass'];
			$sql = "insert into web_cart(username,pd_id,pd_tid,pd_price,attach) values (?, ?, ?, ?, ?)";
			$params = array($username, $_GET['id'],$data['pd_tid'],$data['pd_price'], $Ouser."@".$Opass);
			$insert_id = $pdo->insert($sql, $params);
			
			if($insert_id){
				exit("<script language='javascript'>window.location.href='/member/cart';</script>");
			}else{
				
				echo "<script language='javascript'>alert('异常');history.go(-1);</script>";
			}
			
		}
		include('header.php');
		include('modal/confproduct.php');
		include('footer.php');
		
}elseif($action == "cart"){
	
	
		if($_GET['c'] == "remove"){
			$sql = "DELETE FROM `web_cart` WHERE id= ? ";
			$params = array($_GET['id']);
			$affected_rows = $pdo->query($sql, $params);
			echo "<script language='javascript'>window.location.href='/member/cart';</script>";
		}elseif($_GET['c'] == "empty"){
			
			$sql = "DELETE FROM `web_cart`";
			$affected_rows = $pdo->query($sql);
			echo "<script language='javascript'>window.location.href='/member/cart';</script>";
			
		}
		include('header.php');
		include('modal/cart.php');
		include('footer.php');
	
}elseif($action == "supportticket"){
	
		$sql = "select * from web_user where username = ? ";
		$params = array($_SESSION['username']);
		$data = $pdo->getOne($sql, $params);
		
		
		 
		
		
		if($_POST){		
		if($_SESSION['authcode'] != $_POST['captcha_img']){echo "<script>alert('验证码错误');history.go(-1);</script>";exit;}
		$sql = "insert into web_word(w_title,w_user,w_level,w_relation,w_content,w_starttime,w_endtime) values (?, ?, ?, ?, ?, ?, ?)";
		$params = array($_POST['subject'],$_SESSION['username'],$_POST['urgency'],$_POST['relatedservice'],$_POST['message'],date('Y-m-d H:i:s'),date('Y-m-d H:i:s'));
		$insert_id = $pdo->insert($sql, $params);
		
		
				if($insert_id && $webdata['issmtp'] == 1){
		 

				$cnsql = "SELECT * FROM web_word WHERE id = ? ";
				$cnparams = array($insert_id);
				$cndata = $pdo->getOne($cnsql, $cnparams);
				$mailsubject = $webdata['site_name']." - [Ticket ID: ".$insert_id."] ".$cndata['w_title']."";
		  
				$file_path = 'api/email.html';
				$content = file_get_contents($file_path);
				$my=str_replace("网站URL","http://".$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"],$content);
				$my2=str_replace("用户名",$cndata['w_user'],$my);
				$my3=str_replace("工单当前状态说明","感谢您提交工单，您的工单已创建<br>详细信息如下",$my2);
				$my4=str_replace("工单ID",$insert_id,$my3);
				$my5=str_replace("工单主题名称",$cndata['w_title'],$my4);
				$my6=str_replace("工单等级",$cndata['w_level'],$my5);
				$my7=str_replace("工单底部说明","您的工单将会很快得到我们的工作人员的受理，您可以随时关注工单的状态。",$my6);
				$my8=str_replace("网站名称",$webdata['site_name'],$my7);
				$my9=str_replace("工单页面URL","http://".$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"]."/member/work",$my8);
				$mailbody =$my9;
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
		
		echo "<script language=javascript>alert('提交成功');self.location=document.referrer;</script>";
		 
		
		}
		include('header.php');
		include('modal/supporttickets.php');
		include('footer.php');
	
}elseif($action == "work"){
		$sql = "select count(*) as count from web_word where user_name = ? ";
		$params = array($_SESSION['username']);
		$data = $pdo->getOne($sql, $params);
		include('header.php');
		include('modal/work.php');
		include('footer.php');
}elseif($action == "viewtk"){
	
		$sql = "select * from web_word where id = ? ";
		$params = array($_GET['id']);
		$data = $pdo->getOne($sql, $params);
		 
		if($_POST){		
				if($_SESSION['authcode'] != $_POST['captcha_img']){echo "<script>alert('验证码错误');history.go(-1);</script>";exit;}
				$sql = "insert into web_word(w_user,w_content,w_starttime,w_endtime,to_w_id) values (?, ?, ?, ?, ?)";
				$params = array($_SESSION['username'], $_POST['replymessage'], date('Y-m-d H:i:s'), date('Y-m-d H:i:s'),$_GET['id']);
				$insert_id = $pdo->insert($sql, $params);
				$sql = "update web_word set w_endtime = ? where id = ? ";
				$params = array(date('Y-m-d H:i:s'),$_GET['id']);
				$affected_rows = $pdo->query($sql, $params);
		echo "<script language=javascript>alert('提交成功');self.location=document.referrer;</script>";
		}
		if($_GET['c'] == "close"){
			
				$sql = "update web_word set w_is_over = ? where id = ? ";
				$params = array(1, $_GET['id']);
				$affected_rows = $pdo->query($sql, $params);
		echo "<script language=javascript>alert('关闭成功');self.location=document.referrer;</script>";		
		}
		include('header.php');
		include('modal/viewtk.php');
		include('footer.php');
}elseif($action == "qcode"){
	
	$nsql = "select * from web_ss_node where id = ? ";
	$nparams = array($_GET['id']);
	$ndata = $pdo->getOne($nsql, $nparams);

	if($ndata['is_multi']==1){
		
	$usql = "select * from user where port = ? ";
	$uparams = array($ndata['node_port']);
	$udata = $pdo->getOne($usql, $uparams);
		
	}else{

	$usql = "select * from user where bill_id = ? ";
	$uparams = array($_GET['ssid']);
	$udata = $pdo->getOne($usql, $uparams);
	}
	$asql = "select * from user where bill_id = ? ";
	$aparams = array($_GET['ssid']);
	$adata = $pdo->getOne($asql, $aparams);
	include('modal/qcode.php');
	
}elseif($action == "announcements"){
	
		$sql = "select * from web_gg ORDER BY g_time DESC";
		$data = $pdo->getSome($sql);
		include('header.php');
		include('modal/announcements.php');
		include('footer.php');
}elseif(strstr($action,"spread")){
	$uid = explode('-',$action);
	$_SESSION['spread_id'] = $uid[1];		
	header( "Location: /member/register" ); 
}elseif($action == "affiliates"){
		$url = httpGet("http://50r.cn/urls/add.text?url=http://".$_SERVER['HTTP_HOST']."/index.php?action=spread-".$_SESSION['username']."");
		if(strstr($url,"http")){}else{$url = "http://".$_SERVER['HTTP_HOST']."/index.php?action=spread-".$_SESSION['dusername']."";}
		$v_c_sql = "SELECT count(*) as count FROM `web_user` WHERE `spread_id` =  ? ";
		$v_c_params = array($_SESSION['username']);
		$v_c_data = $pdo->getOne($v_c_sql, $v_c_params);
		$m_sql = "select SUM(money) from web_paylog where username in ( select username from web_user where spread_id = ? )";
		$m_params = array($_SESSION['username']);
		$m_data = $pdo->getSome($m_sql,$m_params);
		$ysql = "select * from web_user where username = ? ";
		$yparams = array($_SESSION["username"]);
		$ydata = $pdo->getOne($ysql, $yparams);		
		include('header.php');
		include('modal/affiliates.php');
		include('footer.php');
}elseif($action == "request"){
	
	$ysql = "select * from web_user where username = ? ";
		$yparams = array($_SESSION["username"]);
		$ydata = $pdo->getOne($ysql, $yparams);		
		
		$Gr_sql = "select * from web_agent_grd";
		$Gr_data = $pdo->getSome($Gr_sql);		
		foreach($Gr_data as $value){
			$deposit .=$value['deposit']."-";
		}
		$deposit_arr = explode('-',$deposit);
		
		if($ydata['money'] < $deposit_arr[0]){
			
			$grd_id = "0";
			
		}elseif($ydata['money'] < $deposit_arr[1]){
			
			$grd_id = "1";
			
		}elseif($ydata['money'] < $deposit_arr[2]){
			
			$grd_id = "2";
			
		}elseif($ydata['money'] < $deposit_arr[3]){
			
			$grd_id = "3";
			
		}elseif($ydata['money'] < $deposit_arr[4]){
			
			$grd_id = "4";
			
		}elseif($ydata['money'] >= $deposit_arr[4]){
			
			$grd_id = "5";
			
		}else{
			$grd_id = "0";
		}
	
		include('header.php');
		include('modal/request.php');
		include('footer.php');
		 
		if($_POST){
			if($grd_id){}else{echo "<script language=javascript>alert('余额不足');history.go(-1);</script>";}
			
			
			$u_sql = "SELECT * FROM web_user WHERE username = ? ";
			$u_params = array(addslashes($_POST['agent_username']));
			$u_data = $pdo->getOne($u_sql, $u_params);
			
			$a_sql = "SELECT * FROM web_agent WHERE username = ? ";
			$a_params = array(addslashes($_POST['agent_username']));
			$a_data = $pdo->getOne($a_sql, $a_params);
			if($a_data or $u_data){echo "<script language=javascript>alert('用户名已被注册');history.go(-1);</script>";}
			$sql = "insert into web_agent(username,password,grade,money,spread_id,site_name,site_title,site_foot) values (?, ?, ?, ?, ?, ?, ?, ?)";
			$params = array($_POST['agent_username'], $_POST['agent_password'], $grd_id, $ydata['money'],$_SESSION['username'],$webdata['site_name'],$webdata['site_title'],$webdata['site_foot']);
			$insert_id = $pdo->insert($sql, $params);
			$sql = "update web_agent set site_url = ? where id = ? ";
			$params = array($insert_id, $insert_id);
			$affected_rows = $pdo->query($sql, $params);
		
			$sql = "update web_user set money = ? where username = ? ";
			$params = array('0', $_SESSION['username']);
			$affected_rows = $pdo->query($sql, $params);
		
			echo "<script language=javascript>alert('申请代理成功，请返回登录');self.location=document.referrer;</script>";
			
		}
		
		
		
}


 
$pdo=null;

 ?>