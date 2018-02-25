<?php if(!$p){exit();} ?>
 <style>
td{
	
	text-align:center;
	border-color:#eeeeee;
}
 </style>
   <link href="../admin/css/style.min2.css?v=4.0.0" rel="stylesheet">
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
									账号管理 &amp; OpenVpn - User
								</small>
							</h1>
						</div><!-- /.page-header -->

<div class="row">
   
                        <div class="col-md-12">
			<form action="index.php?action=web_op_user" method="post" class="form-inline">
  <div class="form-group" style="margin-top: -10px;">
   
  <input type="text" class="form-control" name="username" placeholder="输入账号">
  </div>
  <button type="submit" class="btn btn-primary">搜索</button>&nbsp;<a class="btn btn-info">您共有 <b><?=$opdata['count'];?></b> 个OP账单账号</a><br><br>
  <a onclick="add_op_user();" class="btn btn-success">添加账号</a>
 
  <a class="btn btn-red" onclick="delect('所有OP账号','1','web_op_user_all');">清空所有账号</a>
  
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
                        <th style="text-align:center;">账号</th>
                     <th style="text-align:center;">密码</th>
						<th style="text-align:center;">到期时间</th>
						<th style="text-align:center;">总流量</th>
                        <th style="text-align:center;">已用流量</th>
                        <th style="text-align:center;">剩余流量</th>
						  <th style="text-align:center;">状态</th>
						 <th style="text-align:center;">代理ID</th>
                        <th colspan="2" style="text-align:center;">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                            
					
				<?php

$pagesize=8; 
$page=$_GET["page"];
$pagenum=ceil($opdata['count']/$pagesize);
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

 

$sql = "select * from openvpn where user_name in ( select username from web_user where agent_id = ? ) ORDER BY id DESC limit $offset,$pagesize";
$params = array($ag_info['id']);
$data = $pdo->getSome($sql,$params);
}else{
 
$sql = "select * from openvpn where user_name in ( select username from web_user where agent_id = ? ) and iuser= ? ORDER BY id DESC limit $offset,$pagesize";
$params = array($ag_info['id'],$_POST['username']);
$data = $pdo->getSome($sql, $params);

}

foreach($data as $value)
  {
		
		if($value['i'] == 0){$i="<span class=\"label label-danger\">禁用</span>";}else{$i="<span class=\"label label-success\">正常</span>";}
		echo "<tr>";
		echo "<td>#".$value['id']."</td>";
		echo "<td>".$value['user_name']."</td>";
		echo "<td>".$value['iuser']."</td>";
		echo "<td>".$value['pass']."</td>";
		echo "<td>".date('Y-m-d H:i:s',$value['endtime'])."</td>";
		echo "<td>".round($value['maxll']/1024/1024)." MB</td>";
		$used_bytes=$value['isent']+$value['irecv'];
		$surplus_bytes=$value['maxll']-$used_bytes;
 		echo "<td>".round($used_bytes/1024/1024)." MB</td>";
		echo "<td>".round($surplus_bytes/1024/1024)." MB</td>";
		echo "<td>".$i."</td>";
		echo "<td>".$ag_info['id']."</td>";
		echo "<td><a class='btn btn-danger' onclick=\"delect('".$value['iuser']."','".$value['id']."','sub_op_user');\">删除</a></td>";
		echo "</tr>";
  
  }
 

  
    
   
  
 
 
 
 

?>
					
					 




				 

					
					 </tbody>

                </table>
				</div>
                     <br>            
                <br><br>
				<ul class="pagination pagination-sm">
				  <li class=''><a href="index.php?action=sub_op_user&page=<?php echo "1";  ?>">首页</a></li>
<?php 

for($i=$start1;$i<=$end;$i++){

       $show=($i!=$page)?"<li class=''><a href='index.php?action=sub_op_user&page=".$i."'>$i</a></li>":"";
       echo $show."&nbsp;&nbsp";
	 
}


 ?>
 
 <li class=''><a href="index.php?action=sub_op_user&page=<?php echo $pagenum;  ?>">尾页</a></li>
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
				 
	<script type="text/javascript">
function add_op_user(){	
 
layer.open({
  type: 1,
  skin: 'layui-layer-demo', //样式类名
  closeBtn: 0, //不显示关闭按钮
  anim: 2,
  area: ['90%','70%'],
  shadeClose: true, //开启遮罩关闭
  content: '<div class=""><div class=""><div class="panel panel-default"><div class="panel-body"><p style="text-align: center;">OpenVPN账号必须归属于你的子账号名下</p><form class="modal-body form-horizontal" action="?action=sub_op_user&c=add" method="post"><div class="form-group"><label class="col-sm-2 control-label">承载用户</label><div class="col-sm-8"><input type="text" name="web_user" class="form-control" value="" /></div></div> <div class="form-group"><label class="col-sm-2 control-label">选择套餐</label> <div class="col-sm-8"> <select name="state" class="form-control"><?php foreach($pddata as $value){echo "<option value =\"".$value['id']."\">".$value['pd_name']."-".$value['pd_llvalues']."G-".$value['pd_time']."天-".$value['pd_price']."元</option>";}?></select> </div></div><div class="form-group"><label class="col-sm-2 control-label">OP账号</label><div class="col-sm-8"><input type="text" name="opuser" class="form-control" value="<?=generate_code(8)?>" /></div></div><div class="form-group"><label class="col-sm-2 control-label">OP密码</label><div class="col-sm-8"><input type="text" name="oppass" class="form-control" value="<?=generate_code(7)?>" /></div></div><div class="modal-footer"><button type="submit" class="btn btn-green">保存</button></div></form></div></div><hr></div></div>'
});

}
	</script>
 

	

 