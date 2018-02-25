<?php if(!$p){exit();} ?> 
 <style>
td{
	
	text-align:center;
	border-color:#eeeeee;
}
 </style>
  <link href="css/style.min2.css?v=4.0.0" rel="stylesheet">
        <div class="static-content-wrapper">
          <div class="static-content">
            <div class="page-content">
              <div class="container-fluid">
                <div style="height:16px"></div>
<!-- 引入封装了failback的接口--initGeetest -->

 

<div class="row  border-bottom white-bg dashboard-header">

<div class="page-header" style="margin-top: -40px;">
							<h1>
								控制台
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									账号管理 &amp; 代理列表
								</small>
							</h1>
						</div><!-- /.page-header -->
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

<div class="row">
   
                        <div class="col-md-12">
			<form action="index.php?action=web_agent_user" method="post" class="form-inline">
  <div class="form-group" style="margin-top: -10px;">
   
  <input type="text" class="form-control" name="username" placeholder="输入账号">
  </div>
  <button type="submit" class="btn btn-primary">搜索</button>&nbsp;<a class="btn btn-info">平台共有 <b><?=$Ag_c_data['count']?></b> 个账号</a><br><br>
  <a href="javascript:;" onclick="add_agent_user();" class="btn btn-success">添加账号</a>
  <a href="javascript:;" onclick="update_grd();" class="btn btn-primary">等级折扣设置</a>
  <a href="index.php?action=moneyadd" class="btn btn-info">余额充值</a>
  <a class="btn btn-red" onclick="delect('所有网站账号','1','web_agent_user');">清空所有账号</a>
   
 <br>
</form>
		
                       
                             
   
             

                
                <div class="tab-content">
                  <div class="tab-pane active" id="others">
                      <div class="table-responsive">
           
             
                      
                                  <table id='mytable' class="table table-striped table-hover" style="overflow-y: hidden">    
                    <thead>
                    <tr>
                      <th style="text-align:center;">ID</th>
                        <th style="text-align:center;">用户名</th>
                     <th style="text-align:center;">密码</th>
                       
                        <th style="text-align:center;">余额</th>
  
				
                        <th style="text-align:center;">子用户</th>
					<th style="text-align:center;">域名</th>
                        <th colspan="2" style="text-align:center;">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                            
					
				<?php

$pagesize=15; 
$page=$_GET["page"];
$pagenum=ceil($Ag_c_data['count']/$pagesize);
if(empty($page)){
	$page=1;
}
else{
	$page=$_GET["page"];
}

$offset=$pagesize*($page - 1);

if ($page > $pagenum) {
$page = $pagenum;
}
if ($page < 5) {
if($pagenum < 5){
$start1 = 1;
$end = $pagenum;
}else{
	$start1 = 1;
$end = 5;
}
}
elseif ($page >= 5 && $page < $pagenum-4) {
$start1 = $page - 1;
$end = $page+3;
}
elseif ($page >= $pagenum) {
$start1 = $pagenum-4;
$end = $pagenum;
}

if(empty($_POST['username'])){
 
$sql = "select * from web_agent limit ".$offset.",".$pagesize."";
$data = $pdo->getSome($sql);

}else{

$sql = "SELECT * FROM web_agent where username= ? ";
$params = array($_POST['username']);
$data = $pdo->getSome($sql, $params);

}
foreach($data as $value)
  {
 
		$s_sql = "select count(*) as count from web_user where agent_id = ? ";
		$s_params = array($value['id']);
		$s_data = $pdo->getOne($s_sql, $s_params);
		
		if($webdata['agent_url']){
			$a_u = $value['site_url'].".".$webdata['agent_url'];
		}else{
			
			$a_u = "未添加分站域名";
		}
		
		echo "<tr>";
		echo "<td>".$value['id']."</td>";
		echo "<td>".$value['username']."</td>";

		 
		echo "<td>".$value['password']."</td>";
 
		echo "<td>".round($value['money'],2)."</td>";
 
		echo "<td>".$s_data['count']."</td>";
		echo "<td>".$a_u."</td>";
 
		echo "<td><a class='btn btn-info' href='index.php?action=web_agent_set&id=".$value['id']."'>配置</a><a class='btn btn-danger' onclick=\"delect('".$value['username']."','".$value['id']."','web_agent_user');\">删除</a></td>";
		echo "</tr>";
	 
  }
 


?>
					
					
 



				 

					
					 </tbody>

                </table>
				</div>
                     <br>            
                <br><br>
				<ul class="pagination pagination-sm">
				  <li class=''><a href="index.php?action=web_user&page=<?php echo "1";  ?>">首页</a></li>
<?php 

for($i=$start1;$i<=$end;$i++){

       $show=($i!=$page)?"<li class=''><a href='index.php?action=web_user&page=".$i."'>$i</a></li>":"";
       echo $show."&nbsp;&nbsp";
	 
}


 ?>
 
 <li class=''><a href="index.php?action=web_user&page=<?php echo $pagenum;  ?>">尾页</a></li>
 </ul>
                <br>
               
            </div>

        <hr>

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
   <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					官方ShadowSocksR服务
				</h4>
			</div>
		 <div class="modal-body">
			 官方SS 科学上网体验<br><br>
			 采用官方最新控制系统 OS2.0 已部署日本，香港，新加坡，洛杉矶，德国，澳大利亚，纽约等CN2路线，希望给每个翻墙娃一个最好的体验
			 <br><br>
			 支持Surge，支持Mac，采用Html团队全新编写Surge规则，可突破部分内网限制（公司、学校），所有国内网站直线连接，屏蔽常用视频广告，Apple 服务加速（App Store、Apple Music、Apple流媒体、iCloud备份、iCloud Drive、iTunes 等）	 <br><br>
			 
			 最后一点，保证每个用户在汤不热不会突然卡顿，你懂得！
	 

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">关闭
				</button>
				<a href="http://ss.zftuozhan.com" target="_blank" style="color: white;" class="btn btn-primary">
					购买服务
				</a>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
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
<script type="text/javascript">
function add_agent_user(){	
 
layer.open({
  type: 1,
  skin: 'layui-layer-demo', //样式类名
  closeBtn: 0, //不显示关闭按钮
  anim: 2,
  area: ['90%','70%'],
  shadeClose: true, //开启遮罩关闭
  content: '<div class=""><div class=""><div class="panel panel-default"><div class="panel-body"><p style="text-align: center;">添加代理用户</p><form class="modal-body form-horizontal"action="?action=web_agent_user&c=add" method="post"><div class="form-group"><label class="col-sm-2 control-label">邮箱账号</label><div class="col-sm-8"><input type="text"name="email" class="form-control "value=""/></div></div><div class="form-group"><label class="col-sm-2 control-label">登录密码</label><div class="col-sm-8"><input type="text"name="pass"class="form-control"value=""/></div></div><div class="form-group"><label class="col-sm-2 control-label">余额</label><div class="col-sm-8"><input type="text"name="money"class="form-control"value="0"/></div></div><div class="form-group"><label class="col-sm-2 control-label">选择套餐</label> <div class="col-sm-8"> <select name="state" class="form-control"><option value ="1">一级VIP代理</option><option value ="2">二级VIP代理</option><option value ="3">三级VIP代理</option><option value ="4">四级VIP代理</option><option value ="5">五级钻石代理</option></select> </div></div><div class="modal-footer"><button type="submit"class="btn btn-green">保存</button></div></form></div></div><hr></div></div>'
});

}

function update_grd(){	
 
layer.open({
  type: 1,
  skin: 'layui-layer-demo', //样式类名
  closeBtn: 0, //不显示关闭按钮
  anim: 2,
  area: ['90%','70%'],
  shadeClose: true, //开启遮罩关闭
  content: '<div class=""><div class=""><div class="panel panel-default"><div class="panel-body"><p style="text-align: center;">等级折扣-预存款升级设置</p>   <form class="modal-body form-horizontal" action="?action=web_agent_user&c=add" method="post"><?php $i = 1;foreach($Grd_c_data as $value){echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">".$i."级VIP代理折扣值</label><div class=\"col-sm-8\">";echo "<input type=\"text\" name=\"discount".$i."\" class=\"form-control\" value=\"".$value['discount']."\" /></div></div><div class=\"form-group\"><label class=\"col-sm-2 control-label\">预存款项（元）</label><div class=\"col-sm-8\">";echo "<input type=\"text\" name=\"deposit".$i."\" class=\"form-control\" value=\"".$value['deposit']."\" /></div></div>";$i++;}?><div class="modal-footer"><button type="submit" class="btn btn-green">保存</button></div></form>          </div></div><hr></div></div>'
});

}

 
	</script>
	<script src="css/jquery.flot.min.js"></script>             <!-- Flot Main File -->

	<script src="css/jquery.flot.tooltip.min.js"></script>    <!-- Flot Tooltips -->
	<!-- End loading page level scripts </script> 	 -->

	<html>
 <head></head>
 <body>
   
 </body>
</html>
 
  