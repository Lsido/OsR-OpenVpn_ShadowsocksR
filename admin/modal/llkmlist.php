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
									全局索引 &amp; 流量卡密列表
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
							 <br>
									<?php 
if($_GET["addkm"]==1){
function getkm($len = 18)
{
	$str = "1234567890";
	$strlen = strlen($str);
	$randstr = "";
	for ($i = 0; $i < $len; $i++) {
		$randstr .= $str[mt_rand(0, $strlen - 1)];
	}
	return $randstr;
}
		
$num=intval($_POST['num']);
$llvalue=strval($_POST['llvalue']);
$lltian=strval($_POST['lltian']);
for ($i = 0; $i < $num; $i++) {
	$km=getkm(18);
	$sql = "insert into llpaynum(llvalue,lltian,num,i) values (?, ?, ?, ?)";
	$params = array($llvalue, $lltian, $km, 0);
	$insert_id = $pdo->insert($sql, $params);
	
	if($insert_id) {
		echo "<b>$km</b><br />";
	}
}

		}
$pagesize=8; 
$page=$_GET["page"];
$sql = "SELECT count(*) as count FROM llpaynum";
$data = $pdo->getOne($sql);
$pagenum=ceil($data['count']/$pagesize);
$sql = "SELECT count(*) as count FROM llpaynum";
$data = $pdo->getOne($sql);


		?>
									
									
									
								</div>
           <div class="row">
		   
		   <div id="more">
		
		
		
		
                       </div>
		   
		   
 
						
						
						
						
                       
	<form action="index.php?action=llkmlist&addkm=1" method="post" role="form" class="form-inline">
<div>
生成数量:
<input type="text" class="form-control" name="num" placeholder="卡密数量">
流量数值:
<input type="text" class="form-control" name="llvalue" placeholder="单位(MB)">
流量天数:
<input type="text" class="form-control" name="lltian" placeholder="单位(天)">
 
 
  

  <button type="submit" class="btn btn-secondary btn-single">生成</button><a onclick="btmore()" class="btn btn-info" style="margin-top: 11px;">更多功能</a>

                        </div>
                      
					 <script type="text/javascript">
	function btmore(){
		
	document.getElementById("more").innerHTML="<form action='index.php?action=llkmlist' method='post' class='form-inline'><div class='form-group' style='margin-top: -10px;'><input type='text' class='form-control' name='kmnum' placeholder='输入卡密'></div>&nbsp;&nbsp;<button type='submit' class='btn btn-primary'>搜索</button>&nbsp;<br></form><a class='btn btn-danger' onclick=\"delect('已用卡密','used','llkm');\">一键清空已用卡密</a>        <a class='btn btn-info' onclick=\"delect('所有卡密','all','llkm');\">一键清空所有卡密</a>  <a href='index.php?action=exct' class='btn btn-success' onclick='if(!confirm('你确实导出所有卡密吗？')){return false;}'>一键导出所有卡密</a><br>";
	
	 }
	 
	
	
	</script>
</form>
<br> 
  <div class="tab-content">
                  <div class="tab-pane active" id="others">
                      <div class="table-responsive" style="overflow-y:scroll;">
                              <table class="table table-striped">  
                    <thead>
                    <tr>
                      
                        <th>卡密ID</th>
                     <th>卡密面额</th>
                        <th>库存卡信息</th>
						<th>状态</th>
                        <th colspan="2">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                            
					
				<?php




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

if(empty($_POST['kmnum']))

	{

$sql = "SELECT * FROM llpaynum limit $offset,$pagesize";
$data = $pdo->getSome($sql);

	}else{
		
$sql = "SELECT * FROM llpaynum WHERE num = ? ";
$params = array($_POST['kmnum']);
$data = $pdo->getSome($sql,$params);
		
		
	}
foreach($data as $source)
  {
  $kamid=$source["id"];
   $llvalue=$source["llvalue"];
   $lltian=$source["lltian"];
   $kami=$source["num"];
  $kaactive=$source["i"];
  
   $kmlx="流量值:".$llvalue."M 有效天数:".$lltian."天";
  
  if($kaactive==="0"){
	 $kmzt="未使用";
  }else{
  $kmzt="<font style='color:red'>已使用,ID:$kaactive</font>";
  }
echo "<tr>";
echo "<td>".$kamid."</td>";
echo "<td>".$kmlx."</td>";
echo "<td>".$kami."</td>";
echo "<td>".$kmzt."</td>";
echo "<td><a class='btn btn-danger' onclick=\"delect('".$kami."','".$value['id']."','llkm');\">删除</a></td>";
echo "</tr>";
} 


?>
					
					




					<a href="#" onclick="gotoTop();return false;" class="totop"></a>

					
					 </tbody>

                </table>
                     <br>            
                <br><br>
				<ul class="pagination pagination-sm">
				  <li class=''><a href="index.php?action=llkmlist&page=<?php echo "1";  ?>">首页</a></li>
<?php 

for($i=$start1;$i<=$end;$i++){

       $show=($i!=$page)?"<li class=''><a href='index.php?action=llkmlist&page=".$i."'>$i</a></li>":"";
       echo $show."&nbsp;&nbsp";
	 
}


 ?>
 
 <li class=''><a href="index.php?action=llkmlist&page=<?php echo $pagenum;  ?>">尾页</a></li>
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

											<!-- Initialize scripts for this page-->
	