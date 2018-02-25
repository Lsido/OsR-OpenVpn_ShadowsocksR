<?php if(!$p){exit();} ?> 
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
									节点管理 &amp; shadowsock 节点列表
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
<div id="more">
		
		
		
		
                       </div>
 
<div>
 <a href="index.php?action=add_ss_node" class="btn btn-success">添加节点</a>
<br>
  <div class="tab-content">
                  <div class="tab-pane active" id="others">
                      <div class="table-responsive" style="overflow-y:scroll;">
                               <table class="table table-striped">    
                    <thead>
                    <tr>
                      
                        <th>节点ID</th>
                     <th>节点名称</th>
                        <th>IP</th>
						<th>节点端口</th>
                        <th>是否单多</th>
						 <th>添加时间</th>
						  <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                            
					
				<?php

$bisql = "select count(*) as count from web_ss_node";
$bidata = $pdo->getOne($bisql);
$pagesize=20; 
$page=$_GET["page"];
$pagenum=ceil($bidata['count']/$pagesize);



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
if ($page < 9) {
if($pagenum < 9){
$start1 = 1;
$end = $pagenum;
}else{
	$start1 = 1;
$end = 9;
}
}
elseif ($page >= 5 && $page < $pagenum-4) {
$start1 = $page - 4;
$end = $page+4;
}
elseif ($page >= $pagenum) {
$start1 = $pagenum-4;
$end = $pagenum;
}



$sql = "SELECT * FROM web_ss_node limit $offset,$pagesize";
$data = $pdo->getSome($sql);
foreach($data as $value)
  {
		
		if($value['is_multi']==1){$i="<span class='label label-success'>Yes</span>";}else{$i="<span class='label label-default'>No</span>";}
		echo "<tr>";
		echo "<td>".$value['id']."</td>";
		echo "<td>".$value['node_name']."</td>";
		echo "<td>".$value['node_ip']."</td>";
		echo "<td>".$value['node_port']."</td>";
	 
		echo "<td>".$i."</td>";
 
  
		 		 
		echo "<td>".$value['add_time']."</td>";

		echo "<td><a class='btn btn-danger' onclick=\"delect('".$value['node_name']."','".$value['id']."','web_ss_node');\">删除</a></td>";
 
		  
		echo "</tr>";
  
  }


?>
					
					




					<a href="#" onclick="gotoTop();return false;" class="totop"></a>

					
					 </tbody>

                </table>
                     <br>            
                <br><br>
				<ul class="pagination pagination-sm">
				  <li class=''><a href="index.php?action=ss_node&page=<?php echo "1";  ?>">首页</a></li>
<?php 

for($i=$start1;$i<=$end;$i++){

       $show=($i!=$page)?"<li class=''><a href='index.php?action=ss_node&page=".$i."'>$i</a></li>":"";
       echo $show."&nbsp;&nbsp";
	 
}


 ?>
 
 <li class=''><a href="index.php?action=ss_node&page=<?php echo $pagenum;  ?>">尾页</a></li>
 </ul>
                <br>
               
            </div>

        <hr>

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
 