<?php 
if($_SESSION["status"]=="1" and !empty($_SESSION["username"])){
}
else{
exit("<script language='javascript'>window.location.href='/member/login';</script>");
}
 ?>
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
			<style>
			
.modalss-scrollbar-measure {
	height:50px;
	overflow:scroll;
	position:absolute;
	top:-99999px;
	width:50px
}
.card-img,.card-side.card-side-img,.modals,.no-overflow,.text-overflow {
	overflow:hidden
}
.modals-content,.picker__wrap {
	box-shadow:0 1px 30px rgba(0,0,0,.5);
	outline:0
}
.textarea-autosize {
	min-height:36px;
	overflow-x:hidden
}

.modals-close,.modals-title {
	font-size:20px;
	line-height:28px
}
.label-brand {
	background-color:#3f51b5;
	color:#fff
}
.label-brand-accent {
	background-color:#ff4081;
	color:#fff
}
.label-green {
	background-color:#4caf50;
	color:rgba(0,0,0,.87)
}
.label-orange {
	background-color:#ff9800;
	color:rgba(0,0,0,.87)
}
.label-red {
	background-color:#f44336;
	color:#fff
}
.modals {
	-webkit-backface-visibility:hidden;
	backface-visibility:hidden;
	display:none;
	outline:0;
	position:fixed;
	overflow:scroll;
	position:absolute;
	top:0;
	right:0;
	bottom:0;
	left:0;
	z-index:40;
	-webkit-overflow-scrolling:touch;
	-ms-overflow-style:-ms-autohiding-scrollbar
}
.modals-backdrop,.picker__holder {
	-webkit-backface-visibility:hidden;
	right:0;
	top:0;
	left:0;
	bottom:0
}
.iframe-seamless {
	border:0;
	display:block;
	height:100%;
	margin:0;
	padding:0;
	width:100%
}
.modals-open .modals {
	overflow-x:hidden;
	overflow-y:auto
}
.modals-backdrop {
	backface-visibility:hidden;
	background-color:#000;
	opacity:0;
	position:fixed;
	-webkit-transition:opacity .3s cubic-bezier(.4,0,.2,1);
	transition:opacity .3s cubic-bezier(.4,0,.2,1);
	z-index:39
}
.menu~.modals-backdrop.in,.modals-backdrop.fade.in {
	opacity:.54
}
.modals-content,.modals-dialog,.modals-heading,.nav,.nav .a,.nav a,.nav li {
	position:relative
}
.menu~.modals-backdrop {
	z-index:30
}
.modals-close {
	color:#727272;
	cursor:pointer;
	display:block;
	float:right;
	margin-right:-8px;
	padding-right:8px;
	padding-left:8px
}
.modals-close:focus,.modals-close:hover {
	color:#ff4081;
	text-decoration:none
}
.modals-content {
	background-clip:padding-box;
	background-color:#fff;
	border:1px solid transparent;
	border-radius:4px
}
.modals-dialog {
	margin:48px 16px
}
.modals-heading,.modals-inner {
	margin-top:24px;
	padding-right:24px;
	padding-left:24px
}
.modals-dialog.modals-full {
	height:100%;
	height:calc(100% - 96px)
}
.modals-dialog.modals-full .modals-content {
	height:100%
}
.modals.fade .modals-dialog {
	-webkit-transform:scale(0,0);
	transform:scale(0,0);
	-webkit-transition:-webkit-transform .3s cubic-bezier(.4,0,.2,1);
	transition:-webkit-transform .3s cubic-bezier(.4,0,.2,1);
	transition:transform .3s cubic-bezier(.4,0,.2,1);
	transition:transform .3s cubic-bezier(.4,0,.2,1),-webkit-transform .3s cubic-bezier(.4,0,.2,1)
}
.modals.fade.in .modals-dialog {
	-webkit-transform:scale(1,1);
	transform:scale(1,1)
}
@media only screen and (min-width:480px) {
	.modals-dialog.modals-xs {
	margin-right:auto;
	margin-left:auto;
	width:448px
}
}@media only screen and (min-width:992px) {
	.modals-dialog {
	margin-right:auto;
	margin-left:auto;
	width:960px
}
}@media only screen and (min-width:1440px) {
	.modals-dialog {
	width:1408px
}
}.modals-footer {
	padding-right:24px;
	padding-left:24px
}
.modals-footer .btn+.btn {
	margin-right:16px
}
.modals-footer .text-right .btn+.btn {
	margin-right:auto;
	margin-left:16px
}
.modals-heading,.modals-inner {
	margin-bottom:24px
}
.modals-open {
	overflow:hidden
}
.modals-title {
	margin-top:0;
	margin-right:28px;
	margin-bottom:24px
}
.modals-va-middle {
	-webkit-box-align:center;
	-webkit-align-items:center;
	-ms-flex-align:center;
	-ms-grid-row-align:center;
	align-items:center
}
.modals-va-middle .modals-dialog {
	-webkit-box-flex:1;
	-webkit-flex-grow:1;
	-ms-flex-positive:1;
	flex-grow:1
}
@media only screen and (min-width:480px) {
	.modals-va-middle .modals-dialog.modals-xs {
	-webkit-box-flex:0;
	-webkit-flex-grow:0;
	-ms-flex-positive:0;
	flex-grow:0
}
}@media only screen and (min-width:992px) {
	.modals-va-middle .modals-dialog {
	-webkit-box-flex:0;
	-webkit-flex-grow:0;
	-ms-flex-positive:0;
	flex-grow:0
}
}.modals-va-middle-show {
	display:-webkit-box;
	display:-webkit-flex;
	display:-ms-flexbox;
	display:flex
}
			
			</style>			
			 
		</head>
		<body>

				<div id="ycf-alert" class="modal">
		 
		</div>
			
			<header id="mainNav" class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
							<span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="#" title="OS|Html"><img src="/static/images/icon.png" alt="OS|Html" id="navbar-logo" class="img-responsive"></a>
					</div>
					<nav class="collapse navbar-collapse" id="navbar-collapse-1" role="navigation">
						<ul class="nav navbar-nav navbar-left"> 
							<li><a  href="" title="首页"><?php echo $webdata['site_name']; ?></a></li>
                                                </ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="/member/client" title="首页">首页</a></li>
							<li><a href="/member/goods" title="我的产品与服务">我的产品与服务</a></li>
							<li><a href="/member/shop" title="购买新服务">购买新服务</a></li>
						 
							<li><a href="/member/onlinepay" title="如何使用">在线充值</a></li>
							<li><a href="/member/work" title="服务单">服务单</a></li>
							<li><a href="/member/affiliates" title="推广有奖">推广有奖</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle navbar-gravatar" data-toggle="dropdown"><i class="fa fa-2x fa-user"></i><span class="fa fa-angle-down"></span></a>
								<ul class="dropdown-menu">
								<li><a href="#" title="User"><?=$_SESSION["username"]?></a></li>
									<?php 
										$ysql = "select * from web_user where username = ? ";
										$yparams = array($_SESSION["username"]);
										$ydata = $pdo->getOne($ysql, $yparams);		
									?>
									<li><a href="#" title="余额">当前余额：<?=round($ydata["money"],2)?>元</a></li>
									<li><a href="/member/onlinepay" title="余额">在线充值</a></li>
									
									 
									
									<li><a href="/member/pwreset" title="修改密码">修改密码</a></li>
									<li class="divider"></li>
									<li><a href="/member/logout" title="退出账户">退出账户</a></li>
								</ul>
							</li>
													</ul>
					</nav>
				</div>
			</header>