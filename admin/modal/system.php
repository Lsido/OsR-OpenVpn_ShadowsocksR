 
	 
	   
	    
	   
	     <div class="static-content-wrapper">
         <div class="static-content">
            <div class="page-content">
              <div class="container-fluid">
                <div style="height:16px"></div>

<?php 
$sql = "select * from web_alipay";
$data = $pdo->getOne($sql);

if($_GET["set"]==1){


$newpassword=md5($_POST["newpassword"]);
$sitename=$_POST["sitename"];
$sitetitle=$_POST["sitetitle"];
$keywords=$_POST["keywords"];
$userqd2=$_POST["userqd2"];
$description=$_POST["description"];
$state=$_POST["state"];
$content=$_POST["content"];
$smtpserver=$_POST["smtpserver"];
$smtpuser=$_POST["smtpuser"];
$smtppass=$_POST["smtppass"];
$shid=$_POST["payid"];
$shkey=$_POST["paykey"];
$shurl=$_POST["notifyurl"];
$returnurl=$_POST["returnurl"];
$state2=$_POST["state2"];

if($_POST['state_domain'] == "0"){
	
	$a_url = NULL;
	
}else{
	
	$a_url = $_POST['domain'];
	
}

if(!empty($_POST['newpassword'])){
	
	$sql = "update web_admin set password = ? where username = ? ";
	$params = array(md5($_POST['newpassword']), 'admin');
	$affected_rows = $pdo->query($sql, $params);
	
	echo "<script language=javascript>alert('修改成功');window.location.href='/member/login';</script>";
	
}
else{ 																													
	
 
	$sql = "update web_alipay set payid = ?, paykey= ?, isopen= ? ";
	$params = array($shid, $shkey, $state);
	$affected_rows = $pdo->query($sql, $params);
	$sql = "update web_admin set site_name = ?, site_title= ?, site_keyword= ?, site_desc= ?, site_foot= ?, smtpserver= ?, smtpuser= ?, smtppass= ?, issmtp= ?,agent_url=? ";
	$params = array($sitename, $sitetitle, $keywords, $description, $content, $smtpserver, $smtpuser, $smtppass, $state2, $a_url);
	$affected_rows = $pdo->query($sql, $params);
	
	echo "<script language=javascript>alert('修改成功');window.location.href='index.php?action=sys';</script>";
	
} 



}





 ?>
<div class="row  border-bottom white-bg dashboard-header">

            
			 
	<link rel="stylesheet" href="css/content.css" />

			
			
			
			
			<div class="container">
		<div class="page-header" style="margin-top: -7px;">
							<h1>
								控制台
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									管理员选项 &amp; 系统设置
								</small>
							</h1>
						</div><!-- /.page-header -->


		<div class="public-content">
			<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon fa fa-check green"></i>

									欢迎使用
									<strong class="green" onclick="openLog();">
										 Html OS
										<small> (<?php echo file_get_contents('../version.txt'); ?>)</small> 
									</strong>,全新SS+OP结合版流量控制系统.
								</div>

			<div class="public-content-cont">
			<form action="index.php?action=sys&set=1" method="POST">
				<div class="form-group">
					<label for="">网站名称</label> 
					<input class="form-input-txt" type="text" name="sitename" style="width: 50%;" value="<?php echo $webdata['site_name']; ?>" />
				</div>
				<div class="form-group">
					<label for="">网站标题</label>
					<input class="form-input-txt" type="text" name="sitetitle" style="width: 50%;" value="<?php echo $webdata['site_title']; ?>" />
				</div>
				<div class="form-group">
					<label for="">网站关键词</label>
					<input class="form-input-txt" type="text" name="keywords" style="width: 50%;" value="<?php echo $webdata['site_keyword']; ?>" />
				</div>
				<div class="form-group">
					<label for="">网站描述</label>
					<input class="form-input-txt" type="text" name="description" style="width: 50%;" value="<?php echo $webdata['site_desc']; ?>" />
				</div>
				 
				<div class="form-group">
					<label for="">后台密码</label>
					<input class="form-input-txt" type="text" name="newpassword" style="width: 50%;" value="" placeholder="留空则不修改" />
				</div>
				<div class="form-group">
					<label for="">第三方邮箱</label>
					 
						<input class="form-input-txt" type="hidden" id="iss" value="<?php echo $issmtp; ?>">
						

					 <select class="form-control" name="state2" id="smtpsele" onchange="gra2deChange()" style="width:50%;">
				
                       
<?php 


if($webdata['issmtp']==1){
	
	echo "<option value='0'>禁用</option>";
	echo "<option value='1' selected>启用</option>";
   
}else if($webdata['issmtp']==0){
	echo "<option value='0' selected>禁用</option>";
	echo "<option value='1'>启用</option>";
}


						?>
	
                      </select>
				 
				</div>
				 
				<div id="s11t">
				<?php 




 if($webdata['issmtp']==1){ 

echo "<div class='form-group'><label for=''>发件地址</label><input class='form-input-txt' type='text' name='smtpserver' style='width: 50%;' value='http://api.sendcloud.net/apiv2/mail/send' placeholder='第三方发件地址' /></div><div class='form-group'><label for=''>APP_USER</label><input class='form-input-txt' type='text' name='smtpuser' style='width: 50%;' value='".$webdata['smtpuser']."' placeholder='Sendemail申请的APP_USER' /></div><div class='form-group'><label for=''>APP_KEY</label><input class='form-input-txt' type='text' name='smtppass' style='width: 50%;' value='".$webdata['smtppass']."' placeholder='Sendemail申请的APP_KEY' /><a href='http://sendcloud.sohu.com/' class='btn btn-info' target='_blank'>申请KEY</a></div>";



 }





				?>
				
					</div>
					 
					 <div class="form-group">
					<label for="">分站域名</label> 
	 

					 <select class="form-control" name="state_domain" id="domain" onchange="gra3deChange()" style="width:50%;">
				
                       
<?php 


if($webdata['agent_url']){
	
	echo "<option grade='0' value='0'>禁用</option>";
	echo "<option grade='1' value='1' selected>启用</option>";
   
}else{
	echo "<option grade='0' value='0' selected>禁用</option>";
	echo "<option grade='1' value='1'>启用</option>";
}


						?>
	
                      </select>
				  
				</div>
					 
					 <div id="d">
				<?php 




 if($webdata['agent_url']){ 

echo "<div class='form-group'><label for=''>顶级域名</label><input class='form-input-txt' type='text' name='domain' style='width: 50%;' value='".$webdata['agent_url']."' placeholder='请输入顶级域名例如：baidu.com' /><a href='http://www.juming.com/ykj/' class='btn btn-info' target='_blank'>低价已备案域名</a></div> ";



 }





				?>
				 
					</div>
					 
					 
				<div class="form-group">
					<label for="">在线支付</label> 
					 
						<input class="form-input-txt" type="hidden" id="isp" value="<?php echo $data['isopen']; ?>">
						

					 <select class="form-control" name="state" id="mySelect" onchange="gra1deChange()" style="width:50%;">
				
                       
<?php 


if($data['isopen']==1){
	
	echo "<option grade='0' value='0'>禁用</option>";
	echo "<option grade='1' value='1' selected>启用</option>";
   
}else if($data['isopen']==0){
	echo "<option grade='0' value='0' selected>禁用</option>";
	echo "<option grade='1' value='1'>启用</option>";
}


						?>
	
                      </select>
				  
				</div>
				
				<script type="text/javascript">
    
	
window.onload = function() {
	gra1deChange();
	gra2deChange();
	gra3deChange();
	}
	function gra1deChange(){
		var sel = document.getElementById("mySelect");
		var isp = document.getElementById("isp");
        if(sel&&sel.addEventListener){
            sel.addEventListener('change',function(e){
                var ev = e||window.event;
                var target = ev.target||ev.srcElement;
                if(target.value==1){
	document.getElementById("sc").innerHTML="<div class='form-group'><label for=''>商户ID</label><input class='form-input-txt' type='text' style='width: 50%;' name='payid' value='<?php echo $data['payid']; ?>' /></div><div class='form-group'><label for=''>商户key</label><input class='form-input-txt' style='width: 50%;' type='text' name='paykey' value='<?php echo $data['paykey']; ?>' /><a href='http://pay.mlhtml.com' class='btn btn-info' target='_blank'>申请支付</a></div>";
	
	 }
	 
	 if(target.value==0){
	document.getElementById("sc").innerHTML="";
	 }
            },false)
        }
		
	}
	function gra2deChange(){
		
		
		 var sel = document.getElementById("smtpsele");
		var iss = document.getElementById("iss");
      if(sel&&sel.addEventListener){
            sel.addEventListener('change',function(e){
                var ev = e||window.event;
                var target = ev.target||ev.srcElement;
                if(target.value==1){
	document.getElementById("s11t").innerHTML="<div class='form-group'><label for=''>发件地址</label><input class='form-input-txt' type='text' name='smtpserver' style='width: 50%;' value='http://api.sendcloud.net/apiv2/mail/send' placeholder='第三方发件地址' /></div><div class='form-group'><label for=''>APP_USER</label><input class='form-input-txt' type='text' name='smtpuser' style='width: 50%;' value='<?php echo $webdata['smtpuser']; ?>' placeholder='Sendemail申请的APP_USER' /></div><div class='form-group'><label for=''>APP_KEY</label><input class='form-input-txt' type='text' name='smtppass' style='width: 50%;' value='<?php echo $webdata['smtppass']; ?>' placeholder='Sendemail申请的APP_KEY' /><a href='http://sendcloud.sohu.com/' class='btn btn-info' target='_blank'>申请KEY</a></div>";
	 
	 
	 }
	 
	 if(target.value==0){
	document.getElementById("s11t").innerHTML="";
	
	 }
            },false)
        }
		
	}
	
	
	function gra3deChange(){
		
		
		 var sel = document.getElementById("domain");
		var iss = document.getElementById("iss");
      if(sel&&sel.addEventListener){
            sel.addEventListener('change',function(e){
                var ev = e||window.event;
                var target = ev.target||ev.srcElement;
                if(target.value==1){
	document.getElementById("d").innerHTML="<div class='form-group'><label for=''>顶级域名</label><input class='form-input-txt' type='text' name='domain' style='width: 50%;' value='<?php echo $webdata['agent_url']; ?>' placeholder='请输入顶级域名例如：baidu.com' /><a href='http://www.juming.com/ykj/' class='btn btn-info' target='_blank'>低价已备案域名</a></div>  ";
	 
	 
	 }
	 
	 if(target.value==0){
	document.getElementById("d").innerHTML="";
	
	 }
            },false)
        }
		
	}
	
	
</script>
				 <div id="sc">
				 <?php 
				 if($data['isopen']==1){
					 
					 echo "<div class='form-group'><label for=''>商户ID</label><input class='form-input-txt' type='text' style='width: 50%;' name='payid' value='".$data['payid']."' /></div><div class='form-group'><label for=''>商户key</label><input class='form-input-txt' style='width: 50%;' type='text' name='paykey' value='".$data['paykey']."' /><a href='http://pay.mlhtml.com' class='btn btn-info' target='_blank'>申请支付</a></div>";
				 }



				 ?>
				 
				  
				 
				 </div>
				
				
				<div class="clearfix"></div>
				
				<div class="form-group">
					<label for="">网站底部</label>
					<textarea id="editor_id" name="content" rows="12" class="form-control diff-textarea" placeholder='可输入HTML代码'>
						<?php echo $webdata['site_foot']; ?>
					</textarea> 
				</div>
				<div class="form-group" style="margin-left:150px;">
					<input type="submit" class="sub-btn" value="提  交" />
					<input type="reset" class="sub-btn" value="重  置" />
				</div>
				</form>
			</div>
		</div>
	</div>

			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
          </div>
			 </div>
          </div>
</div>
          

					<br>
				<!-- footer.php -->
					<?php include_once('modal/footer.php');   ?>
					<!-- footer.php -->
        </div>
      </div>
    </div> 
<!-- /Switcher -->
<!-- Load site level scripts -->
  
<script type="text/javascript" src="css/prettify.js"></script> 				<!-- Code Prettifier  -->
<script type="text/javascript" src="css/bootstrap-switch.js"></script> 		<!-- Swith/Toggle Button -->
<script type="text/javascript" src="css/bootstrap-tabdrop.js"></script>  <!-- Bootstrap Tabdrop -->
<script type="text/javascript" src="css/jquery.sparkline.min.js"></script><!-- Sparkline -->
 
<script type="text/javascript" src="css/icheck.min.js"></script>     					<!-- iCheck -->
<script type="text/javascript" src="css/enquire.min.js"></script> 									<!-- Enquire for Responsiveness -->
<script type="text/javascript" src="css/bootbox.js"></script>							<!-- Bootbox -->
<script type="text/javascript" src="css/jquery.nanoscroller.min.js"></script> <!-- nano scroller -->
<script type="text/javascript" src="css/jquery.mousewheel.min.js"></script> 	<!-- Mousewheel support needed for jScrollPane -->
<script type="text/javascript" src="css/application.js"></script>
<script type="text/javascript" src="css/demo.js"></script>
<!-- End loading site level scripts -->
	<!-- Load page level scripts-->
	
	<script src="css/jquery.flot.min.js"></script>             <!-- Flot Main File -->
	<script src="css/jquery.flot.resize.js"></script>          <!-- Flot Responsive -->
	<script src="css/jquery.flot.tooltip.min.js"></script>    <!-- Flot Tooltips -->
	<!-- End loading page level scripts </script> 	 -->
	
 
  
	 