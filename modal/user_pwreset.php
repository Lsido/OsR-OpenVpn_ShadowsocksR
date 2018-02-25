
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
		<h2 class="text-center">忘记密码重置新密码</h2>
		<div class="row">
			<form action='/member/pwreset' method='post' class="col-md-6 col-md-offset-3">
				
				<p class="text-center">请输入您的信息:</p>
				<hr>
								<div class="form-horizontal margin-top">
						
						<div class="form-group">
						<label class="col-md-4 control-label" for="password">您的用户名</label>
						<div class="col-md-8">
							<input type="text" name="username" id="username" class="form-control">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="password">安全码</label>
						<div class="col-md-8">
							<input type="text" name="safeid" id="safeid" class="form-control">
						</div>
					</div>
				 
					<div class="form-group">
						<label class="col-md-4 control-label" for="password">新密码</label>
						<div class="col-md-8">
							<input type="password" name="newpw" id="password" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="confirmpw">确认新密码</label>
						<div class="col-md-8">
							<input type="password" name="confirmpw" id="confirmpw" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="passstrength">密码强度（尽量复杂）</label>
						<div class="col-md-8">
							<div class="form-control-static">		<div class="progress" id="pwstrengthbox">
			<div class="progress-bar"></div>
		</div>
		
		<div id="status">
			 
			</div>
		
		<script>
		
	 
		jQuery(document).ready(function(){
			jQuery("#password").keyup(function () {
				var pw = jQuery("#password").val();
				var pwlength=(pw.length);
				if(pwlength>5)pwlength=5;
				var numnumeric=pw.replace(/[0-9]/g,"");
				var numeric=(pw.length-numnumeric.length);
				if(numeric>3)numeric=3;
				var symbols=pw.replace(/\W/g,"");
				var numsymbols=(pw.length-symbols.length);
				if(numsymbols>3)numsymbols=3;
				var numupper=pw.replace(/[A-Z]/g,"");
				var upper=(pw.length-numupper.length);
				if(upper>3)upper=3;
				var pwstrength=((pwlength*10)-20)+(numeric*10)+(numsymbols*15)+(upper*10);
				if(pwstrength<0){pwstrength=0}
				if(pwstrength>100){pwstrength=100}
				jQuery("#pwstrengthbox .progress-bar").width(pwstrength + "%");
				if(pwstrength<30) jQuery("#pwstrengthbox .progress-bar").removeClass("progress-bar-warning").removeClass("progress-bar-success").addClass("progress-bar-danger").html("弱（请尽量使用复杂密码以提高安全性）");
				if(pwstrength>=30 && pwstrength<75) jQuery("#pwstrengthbox .progress-bar").removeClass("progress-bar-danger").removeClass("progress-bar-success").addClass("progress-bar-warning").html("一般（请尽量使用复杂密码以提高安全性）");
				if(pwstrength>=75) jQuery("#pwstrengthbox .progress-bar").removeClass("progress-bar-danger").removeClass("progress-bar-warning").addClass("progress-bar-success").html("安全（请您妥善保管您的密码）");
			});
		});
		
 
		
		
		</script>
		
</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-8 col-md-offset-4">
							<input class="btn btn-primary" type="submit" id="signin_submit" value="保存修改">
							<input class="btn btn-default" type="reset" value="取消">
						</div>
					</div>
				</div>
							</form>
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
    

   
</html>
