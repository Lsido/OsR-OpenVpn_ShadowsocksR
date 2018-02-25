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
									账号管理 &amp; ShadowSocks - User
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
			<form action="index.php?action=web_ss_user" method="post" class="form-inline">
  <div class="form-group" style="margin-top: -10px;">
   
  <input type="text" class="form-control" name="password" placeholder="输入密码">
  </div>
  <button type="submit" class="btn btn-primary">搜索</button>&nbsp;<a class="btn btn-info">平台共有 <b><?=$sldata['count'];?></b> 个账号</a><br><br>
  <a href="javascript:;" onclick="add_ss_user();" class="btn btn-success">添加账号</a>
 
  
  
  <a class="btn btn-red" onclick="delect('所有SS账号','1','web_ss_user_all');">清空所有账号</a>
 <br>
</form>
		
                       
                             
   
             

                
                <div class="tab-content">
                  <div class="tab-pane active" id="others">
                      <div class="table-responsive">
           
             
                      
                                  <table class="table table-striped table-hover" style="overflow-y: hidden">    
                    <thead>
                    <tr>
                      <th style="text-align:center;">ID</th>
					  <th style="text-align:center;">所属用户</th>
                        <th style="text-align:center;">密码</th>
                     <th style="text-align:center;">端口</th>
                        <th style="text-align:center;">最后登录</th>
						<th style="text-align:center;">到期时间</th>
                        <th style="text-align:center;">上传</th>
                        <th style="text-align:center;">下载</th>
						<th style="text-align:center;">总流量</th>
                        <th style="text-align:center;">加密方式</th>
						<th style="text-align:center;">协议</th>
						<th style="text-align:center;">混淆</th>
						 
                        <th colspan="2" style="text-align:center;">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                            
					
				<?php

$pagesize=8; 
$page=$_GET["page"];
$pagenum=ceil($sldata['count']/$pagesize);
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



$sql = "SELECT * FROM user ORDER BY id DESC limit $offset,$pagesize";
$data = $pdo->getSome($sql);

if(empty($_POST['password'])){

$sql = "SELECT * FROM user ORDER BY id DESC limit $offset,$pagesize";
$data = $pdo->getSome($sql);
}else{

$sql = "SELECT * FROM user where pass= ? ";
$params = array($_POST['password']);
$data = $pdo->getSome($sql, $params);

}

foreach($data as $value)
  {
		
		echo "<tr>";
		echo "<td>#".$value['id']."</td>";
		echo "<td>".$value['user_name']."</td>";

		echo "<td>".$value['passwd']."</td>";
		
		
		echo "<td>".$value['port']."</td>";
		echo "<td>".date('Y-m-d H:i:s',$value['t'])."</td>";
		echo "<td>".$value['expire_in']."</td>";
 
 
 		echo "<td>".round($value['u']/1024/1024)." MB</td>";
		echo "<td>".round($value['d']/1024/1024)." MB</td>";
 
		echo "<td>".round($value['transfer_enable']/1024/1024)." MB</td>";
		
		 		echo "<td>".$value['method']."</td>";
		echo "<td>".$value['protocol']."</td>";

		echo "<td>".$value['obfs']."</td>";
 
		echo "<td><a class='btn btn-info' href='index.php?action=web_user_ss_set&id=".$value['id']."'>配置</a><a class='btn btn-danger' onclick=\"delect('".$value['port']."','".$value['id']."','web_ss_user');\">删除</a></td>";
		echo "</tr>";
  
  }
 


?>
					
					




				 

					
					 </tbody>

                </table>
				</div>
                     <br>            
                <br><br>
				<ul class="pagination pagination-sm">
				  <li class=''><a href="index.php?action=web_ss_user&page=<?php echo "1";  ?>">首页</a></li>
<?php 

for($i=$start1;$i<=$end;$i++){

       $show=($i!=$page)?"<li class=''><a href='index.php?action=web_ss_user&page=".$i."'>$i</a></li>":"";
       echo $show."&nbsp;&nbsp";
	 
}


 ?>
 
 <li class=''><a href="index.php?action=web_ss_user&page=<?php echo $pagenum;  ?>">尾页</a></li>
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
function add_ss_user(){	
 
layer.open({
  type: 1,
  skin: 'layui-layer-demo', //样式类名
  closeBtn: 0, //不显示关闭按钮
  anim: 2,
  area: ['90%','70%'],
  shadeClose: true, //开启遮罩关闭
  content: '<div class=""><div class=""><div class="panel panel-default"><div class="panel-body"><p style="text-align: center;">SS账号需归属网站用户名下，请确保所添加的SS账号已有可承载网站账号</p><form class="modal-body form-horizontal"action="?action=web_ss_user&c=add"method="post"><div class="form-group"><label class="col-sm-2 control-label">承载用户</label><div class="col-sm-8"><input type="text"name="web_user"class="form-control"value=""/></div></div><div class="form-group"><label class="col-sm-2 control-label">SS密码</label><div class="col-sm-8"><input type="text"name="sspass"class="form-control"value=""/></div></div><div class="form-group"><label class="col-sm-2 control-label">流量（GB）</label><div class="col-sm-8"><input type="text"name="ssll"class="form-control"value="0"/></div></div><div class="form-group"><label class="col-sm-2 control-label">时效（天）</label><div class="col-sm-8"><input type="text"name="sstime"class="form-control"value="0"/></div></div><div class="form-group"><label class="col-sm-2 control-label">加密方式</label><div class="col-sm-8"><select name="ssmethod"class="form-control"><?php $list=array('rc4-md5','aes-128-cfb','aes-256-cfb','aes-128-ctr','camellia-256-cfb','chacha20','salsa20','chacha20-ietf');foreach($list as $key => $value){echo '<option value="'.$value.'">'.$value.'</option>';}?></select></div></div><div class="form-group"><label class="col-sm-2 control-label">协议</label><div class="col-sm-8"><select name="ssprotocol"class="form-control"><?php $list=array('origin','verify_simple','verify_sha1','auth_sha1','auth_sha1_v4','auth_aes128_sha1','auth_aes128_md5');foreach($list as $key => $value){echo '<option value="'.$value.'">'.$value.'</option>';}?></select></div></div><div class="form-group"><label class="col-sm-2 control-label">混淆</label><div class="col-sm-8"><select name="ssobfs"class="form-control"><?php $list=array('plain','http_simple','http_post','tls_simple','tls1.2_ticket_auth');foreach($list as $key => $value){echo '<option value="'.$value.'">'.$value.'</option>';}?></select></div></div><div class="modal-footer"><button type="submit"class="btn btn-green">保存</button></div></form></div></div><hr></div></div>'
});

}
	</script>
	<script src="css/jquery.flot.min.js"></script>             <!-- Flot Main File -->

	<script src="css/jquery.flot.tooltip.min.js"></script>    <!-- Flot Tooltips -->
	<!-- End loading page level scripts </script> 	 -->

	

 