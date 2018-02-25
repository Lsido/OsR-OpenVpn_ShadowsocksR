 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" name="viewport">
	<meta name="theme-color" content="#4caf50">
	<meta http-equiv="X-Frame-Options" content="sameorigin">
	<title></title>
	<link href="/static/assets/css/base.min.css" rel="stylesheet">
	<link href="/static/assets/css/project.min.css" rel="stylesheet">
	<style>
		.pagination {
			display:inline-block;
			padding-left:0;
			margin:20px 0;
			border-radius:4px
		}
		.pagination>li {
			display:inline
		}
		.pagination>li>a,.pagination>li>span {
			position:relative;
			float:left;
			padding:6px 12px;
			margin-left:-1px;
			line-height:1.42857143;
			color:#337ab7;
			text-decoration:none;
			background-color:#fff;
			border:1px solid #ddd
		}
		.pagination>li:first-child>a,.pagination>li:first-child>span {
			margin-left:0;
			border-top-left-radius:4px;
			border-bottom-left-radius:4px
		}
		.pagination>li:last-child>a,.pagination>li:last-child>span {
			border-top-right-radius:4px;
			border-bottom-right-radius:4px
		}
		.pagination>li>a:focus,.pagination>li>a:hover,.pagination>li>span:focus,.pagination>li>span:hover 
{
			color:#23527c;
			background-color:#eee;
			border-color:#ddd
		}
		.pagination>.active>a,.pagination>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span
,.pagination>.active>span:focus,.pagination>.active>span:hover {
			z-index:2;
			color:#fff;
			cursor:default;
			background-color:#337ab7;
			border-color:#337ab7
		}
		.pagination>.disabled>a,.pagination>.disabled>a:focus,.pagination>.disabled>a:hover,.pagination>.disabled
>span,.pagination>.disabled>span:focus,.pagination>.disabled>span:hover {
			color:#777;
			cursor:not-allowed;
			background-color:#fff;
			border-color:#ddd
		}
		.pagination-lg>li>a,.pagination-lg>li>span {
			padding:10px 16px;
			font-size:18px
		}
		.pagination-lg>li:first-child>a,.pagination-lg>li:first-child>span {
			border-top-left-radius:6px;
			border-bottom-left-radius:6px
		}
		.pagination-lg>li:last-child>a,.pagination-lg>li:last-child>span {
			border-top-right-radius:6px;
			border-bottom-right-radius:6px
		}
		.pagination-sm>li>a,.pagination-sm>li>span {
			padding:5px 10px;
			font-size:12px
		}
		.pagination-sm>li:first-child>a,.pagination-sm>li:first-child>span {
			border-top-left-radius:3px;
			border-bottom-left-radius:3px
		}
		.pagination-sm>li:last-child>a,.pagination-sm>li:last-child>span {
			border-top-right-radius:3px;
			border-bottom-right-radius:3px
		}
		.pager {
			padding-left:0;
			margin:20px 0;
			text-align:center;
			list-style:none
		}
		.pager li {
			display:inline
		}
		.pager li>a,.pager li>span {
			display:inline-block;
			padding:5px 14px;
			background-color:#fff;
			border:1px solid #ddd;
			border-radius:15px
		}
		.pager li>a:focus,.pager li>a:hover {
			text-decoration:none;
			background-color:#eee
		}
		.pager .next>a,.pager .next>span {
			float:right
		}
		.pager .previous>a,.pager .previous>span {
			float:left
		}
		.pager .disabled>a,.pager .disabled>a:focus,.pager .disabled>a:hover,.pager .disabled>span {
			color:#777;
			cursor:not-allowed;
			background-color:#fff
		}

		
		
		
		
		.pagination>li>a,
		.pagination>li>span {
		  border: 1px solid white;
		}
		.pagination>li.active>a {
		  background: #f50057;
		  color: #fff;
		}
		
		.pagination>li>a {
		  background: white;
		  color: #000;
		}
		
		
		.pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination
 > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover {
			color: #fff;
			background-color: #000;
			border-color: #000;
		}

		.pagination>.active>span {
		  background-color: #f50057;
		  color: #fff;
		  border-color: #fff;
		}
		
		
		
		.pagination > .disabled > span {
		  border-color: #fff;
		}
		
		
		pre {
			white-space: pre-wrap;
			word-wrap: break-word;
		}
		
		.page-green .ui-content-header {
			background-image: url(/static/images/green.jpg);
		}
		
		
		.content-header-green, .page-green .content-header {
			background-color: #459f47;
			color: #fff;
		}
	</style>
</head>
<body class="page-green">
	








	<main class="content">
		<div class="content-header ui-content-header">
			<div class="container">
				<h1 class="content-heading">节点信息</h1>
			</div>
		</div>
		<div class="container">
			<section class="content-inner margin-top-no">
				<div class="ui-card-wrap">
					<div class="row">
						<div class="col-lg-12 col-sm-12">
							<div class="card">
								<div class="card-main">
									<div class="card-inner margin-bottom-no">
										<p class="card-heading">注意！</p>
										<p>配置文件以及二维码请勿泄露！</p>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-sm-12">
							<div class="card">
								<div class="card-main">
									<div class="card-inner margin-bottom-no">
										<p class="card-heading">配置信息</p>
										<p>服务器地址：<?=$ndata['node_ip']?><br>
										服务器端口：<?=$udata['port']?><br>
										加密方式：<?=$udata['method']?><br>
										密码：<?=$udata['passwd']?><br>
										协议：<?=$udata['protocol']?><br>
										协议参数：<?php if($ndata['is_multi']==1){echo $adata['id'].":".$adata['passwd'];} ?><br>
										混淆：<?=$udata['obfs']?><br>
										混淆参数：<?=$ndata['node_parm']?><br>
										
										</p>
									</div>
									
								</div>
							</div>
						</div>					
						<div class="col-lg-12 col-sm-12">
							<div class="card">
								<div class="card-main">
									<div class="card-inner margin-bottom-no">
										<p class="card-heading">客户端下载</p>
										<p><i class="icon icon-lg"></i>&nbsp;<a href="https://github.com/shadowsocksr/shadowsocksr-csharp/releases/download/4.1.0/ShadowsocksR-4.1.0-win.7z">Windows
</a></p>
										<p><i class="icon icon-lg"></i>&nbsp;<a href="https://github.com/shadowsocksr/ShadowsocksX-NG/releases/download/1.3.9-R8-build7-fix/ShadowsocksX-NG-R8.dmg">Mac OS X
</a></p>
										<p><i class="icon icon-lg"></i>&nbsp;<a href="https://github.com/breakwa11/shadowsocks-rss
/wiki/Python-client">Linux</a></p>
										<p><i class="icon icon-lg"></i>&nbsp;<a href="https://github.com/shadowsocksr/shadowsocksr-android/releases/download/v3.3.4.5/shadowsocksr-release.apk">Android
</a></p>
										<p><i class="icon icon-lg"></i>&nbsp;<a href="https://itunes.apple.com/us/app/shadowrocket
/id932747118">iOS</a></p>
									</div>
									
								</div>
							</div>
						</div>
						
						
						 
						
						
						
						
						<div class="col-lg-12 col-sm-12">
							<div class="card">
								<div class="card-main">
									<div class="card-inner margin-bottom-no">
										<p class="card-heading">SSR-Python 配置Json</p>
										<textarea class="form-control" rows="6">
	{
    "server": "<?=$ndata['node_ip']?>",
    "local_address": "127.0.0.1",
    "local_port": 1080,
    "timeout": 300,
    "workers": 1,
    "server_port": <?=$udata['port']?>,
    "password": "<?=$udata['passwd']?>",
    "method": "<?=$udata['method']?>",
    "obfs": "<?=$udata['obfs']?>",
    "obfs_param": "<?=$ndata['node_parm']?>",
    "protocol_param": "<?php if($ndata['is_multi']==1){echo $adata['id'].":".$adata['passwd'];} ?>",
    "protocol": "<?=$udata['protocol']?>"
}
	
	 
</textarea>
									</div>
									
								</div>
							</div>
						</div>
						<?php
if($ndata['is_multi']==1){$ptparam=$adata['id'].":".$adata['passwd'];}
// $ssurl = "".$ndata['node_ip'].":".$udata['port'].":".str_replace("_compatible","",$udata['protocol']).":".$udata['method'].":".str_replace("_compatible","",$udata['obfs']).":".base64_url_encode($udata['passwd'])."/?obfsparam=".base64_url_encode("".$ndata['node_parm']."") . "&protoparam=".base64_url_encode("".$ptparam."") . "&remarks=".base64_url_encode("".$ndata['node_name']." - ".$udata['port']."") . "&group=";
// $ssqr_s_new = "ssr://" . base64_url_encode($ssurl);
// $android_add .= $ssqr_s_new." ";

// $ssurl = $ndata['node_ip']. ":" . $udata['port'].":".str_replace("_compatible", "", $udata['protocol']).":".$udata['method'].":".str_replace("_compatible", "", $udata['obfs']).":".base64_url_encode($udata['passwd'])."/?obfsparam=".base64_url_encode($ndata['node_parm'])."&remarks=".base64_url_encode($ndata['node_name']) . "&group=";
                    // $ssqr_s_new = "ssr://" .base64_url_encode($ssurl);
                    // $android_add .= $ssqr_s_new." ";
                    // $android_add_without_mu .= $ssqr_s_new." ";
					
					 $ssurl = $ndata['node_ip']. ":" . $udata['port'].":".str_replace("_compatible", "", $udata['protocol']).":".$udata['method'].":".str_replace("_compatible", "", $udata['obfs']).":".base64_url_encode($udata['passwd'])."/?obfsparam=".base64_url_encode($ndata['node_parm'])."&protoparam=".base64_url_encode($ptparam)."&remarks=".base64_url_encode($ndata['node_name']." - ".$udata['port']."") . "&group=";
                    $ssqr_s_new = "ssr://" . base64_url_encode($ssurl);
                    $android_add .= $ssqr_s_new." ";
					
					
					
					

						?>
						<div class="col-lg-12 col-sm-12">
							<div class="card">
								<div class="card-main">
									<div class="card-inner margin-bottom-no">
										
																				<p><a href="<?=$android_add?>" target="_blank"
/>Android 手机上用默认浏览器打开点我就可以直接添加了(给 SSR)</a></p>
										<p><a href="<?=$ssqr_s_new?>" target="_blank"
/>iOS 上用 Safari 按住我，用Shadowrocket打开即可 (给 Shadowrocket)</a></p>

 
<p><a href="/member/Ssgoods/Surge@1937@<?=$udata['port']?>@<?=$udata['method']?>@<?=$udata['passwd']?>" target="_blank"
/>2017最新Surge规则，去广告 (给 Surge [按住复制链接])</a></p>

									</div>
									
								</div>
							</div>
						</div>
							
						 
						
						<div class="col-lg-12 col-sm-12">
							<div class="card">
								<div class="card-main">
									<div class="card-inner margin-bottom-no">
										<p class="card-heading">SSR配置二维码</p>
										<div class="text-center">
											<div id="ss-qr-n"></div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						
						
														 
			</section>
		</div>
	</main>
	<footer class="ui-footer">
		<div class="container">
			   		</div>
	</footer>

	<!-- js -->
	<script src="//cdn.staticfile.org/jquery/2.2.1/jquery.min.js"></script>
	<script src="//cdn.staticfile.org/jquery-validate/1.15.0/jquery.validate.min.js"></script>
	<script src="//static.geetest.com/static/tools/gt.js"></script>
	
	<script src="/static/assets/js/base.min.js"></script>
	<script src="/static/assets/js/project.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.16/clipboard.min.js"></script>
</body>
</html>
<script src="/static/assets/js/jquery.qrcode.min.js"></script>
<script>
	var text_qrcode2 = '<?=$ssqr_s_new?>';
	jQuery('#ss-qr-n').qrcode({
		"text": text_qrcode2
	});
</script>