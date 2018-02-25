 
 
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?=$webdata['site_desc']?>" />
            <meta name="keywords" content="<?=$webdata['site_keyword']?>" />
    <title><?=$webdata['site_title']?></title>
   <!-- Bootstrap Core CSS -->
  	<script type="text/javascript" src="/static/assets/js/jquery-1.11.2.min.js"></script>
	
			<script type="text/javascript" src="/static/css/bootstrap.min.js"></script>
			<link href="/static/css/bootstrap.min.css" rel="stylesheet">

			<script type="text/javascript" src="/static/assets/js/bootbox.min.js"></script>

			<link href="/static/css/font-awesome.min.css" rel="stylesheet">
	
			<script src="/static/assets/js/whmcs.js"></script>
			<link href="/static/assets/css/whmcs.css" rel="stylesheet">

			<!-- Custom CSS -->
    			<link rel="stylesheet" href="/static/assets/css/creative.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond./static/css/1.4.2/respond.min.js"></script>
    <![endif]-->
						
			
		</head>
		<body>

			
			
				<header id="mainNav" class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
							<span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="/member/client" title="OS|Html"><img src="/static/images/icon.png" alt="OS|Html" id="navbar-logo" class="img-responsive"></a>
					</div>
					<nav class="collapse navbar-collapse" id="navbar-collapse-1" role="navigation">
						<ul class="nav navbar-nav navbar-left">
							<li><a  href="/member/client" title="首页"><?php echo $webdata['site_name']; ?></a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a class="page-scroll" href="/member/client" title="首页">首页</a></li>
                                                        <li><a href="/member/shop">购买新服务</a></li>
                                                        <li><a href="/member/register">注册账户</a></li>
                                                        <li><a href="/member/pwreset">忘记密码/密码找回</a></li>
						</ul>
					</nav>
				</div>
			</header>

<section>
	<div class="container">
		<div class="row text-center">
			<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 margin-top margin-bottom">
				<h1 class="h2">登陆</h1>
								<div class="well well-sm margin-top">
 
					<fieldset>
						<div class="form-group">
							<input type="email" id="username" value="<?php echo $_COOKIE["username"]; ?>" placeholder="用户名/邮箱" class="form-control text-center input-lg">
						</div>
						<div class="form-group">
							<input type="password" id="password" placeholder="密码" value="<?php echo $_COOKIE["password"]; ?>" class="form-control text-center input-lg">
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" id="rememberme"> 自动登录
							</label>
						</div>
						<div class="form-group">
							<button type="submit" id="signin_submit" class="btn btn-info btn-lg btn-block">登录</button>
						</div>
						 
						 
						<p class="form-group">
							<a href="/member/register" title="忘记密码/找回密码">注册账户</a><a>/</a><a href="/member/pwreset" title="忘记密码/找回密码">找回密码</a>
						</p>
					</fieldset>
				</div>
				<div id="status">
			 
			</div></div>
			 
		</div>
	</div>
</section>





		<footer id="whmcs-footer">
			<div class="container">
								<p class="text-center text-muted">Copyright &copy; 2017 <?=$webdata['site_title']?>. All Rights Reserved.</p>
			</div>
		</footer>
		
	</body>
	  <!-- jQuery -->
   <script type="text/javascript">
   $("#signin_submit").click(function(e){
e.preventDefault();
if($("#username").val() == "" || $("#password").val() == ""){
		
		document.getElementById("status").innerHTML="<div class='alert alert-warning' role='alert'>用户名密码不能为空</div>";
		
		
	}else{
		$.post(
			'/member/login',{
				"username":$("#username").val(),
				"password":$("#password").val()
			},function(data){
				if(data.status == "success"){
				 
				document.getElementById('status').innerHTML =   "<div class='alert alert-success' role='alert'>登录成功,3秒后跳转...</div>";
				
				if(data.type == "1")
				{
					
				 setTimeout("AdmindelayURL()","3000");
				 
				}else if(data.type == "2"){
					
				 setTimeout("AgentdelayURL()","3000");
				 
				}else{
					
				 setTimeout("UserdelayURL()","3000");
					
				}
				
				
				}else{
				 
				document.getElementById("status").innerHTML="<div class='alert alert-danger' role='alert'>用户名密码错误</div>";
				}
			},"JSON"
		)
	}




});
function UserdelayURL() {window.location.href="/member/client";}  
function AgentdelayURL() {window.location.href="/agent/index.php?action=index";}  
function AdmindelayURL() {window.location.href="/admin/index.php?action=admin_index";} 
   </script>
 
    <!-- Bootstrap Core JavaScript -->
    <script src="/static/css/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="/static/css/jquery.easing.min.js"></script>
    <script src="/static/css/jquery.fittext.js"></script>
    <script src="/static/css/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/static/css/creative.js"></script>

</html>
 