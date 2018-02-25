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
									服务器管理 &amp; OpenVPN服务器
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
                <div class="col-sm-12">
                    
						<form action="?action=op_node" method="post" class="form-inline">
  <div class="form-group">
   
  <input type="text" class="form-control" size="25" name="fwqname" placeholder="服务器名称">
  </div>
   <button type="submit" class="btn btn-secondary btn-single">查询</button>&nbsp; <a href="index.php?action=oponline" class="btn btn-blue" style="margin-top: 10px;">参考:在线人数:共计<?php
   
$sql = "select * from web_op_node";
 
$data = $pdo->getSome($sql);

$num  = 0;
foreach($data as $arr)
  {
  $name=$arr["name"];
  $times= $arr["times"];
  $ip=$arr["ip"];
 
$str=file_get_contents('http://'.$ip.'/resources/openvpn-status.txt',false,stream_context_create(array('http' => array('method' => "GET", 'timeout' => 0.5))));
$onlinenum = (substr_count($str,date('Y'))-1)/2;

$str2=file_get_contents('http://'.$ip.'/resources/openvpn-statusudp.txt',false,stream_context_create(array('http' => array('method' => "GET", 'timeout' => 0.5))));

$onlinenum2 = (substr_count($str2,date('Y'))-1)/2;

$str3=file_get_contents('http://'.$ip.'/resources/openvpn-statusudp2.txt',false,stream_context_create(array('http' => array('method' => "GET", 'timeout' => 0.5))));

$onlinenum3 = (substr_count($str3,date('Y'))-1)/2;

$onlinelast=$onlinenum+$onlinenum2+$onlinenum3;

$num=$num+$onlinelast;
	 
  }
  
  echo ceil($num);
 ?>人</a><br>
   <a href="index.php?action=add_op_node" class="btn btn-info">添加服务器</a>
  
 <br>
</form>
               
                     

                    <div class="tab-content">
                  <div class="tab-pane active" id="others">
                      <div class="table-responsive" style="overflow-y:scroll;">
           
             
                      
                                  <table class="table table-striped">    
                                      <thead>
                                          <tr>
                                               
                                                <th data-priority="1">服务器名称</th>
                                                <th data-priority="3">地址</th>
                                                <th data-priority="6">在线人数</th>
                                                <th data-priority="6">添加时间</th>
                                                <th data-priority="6">操作</th>
                                          </tr>
                                      </thead>
                                      <tbody>
									 
									  
									  <?php 

$seafwq=$_POST["fwqname"];
if(empty($seafwq)){

$sql = "select * from web_op_node";
 
$data = $pdo->getSome($sql);
 
foreach($data as $arr)
  {
  $name=$arr["name"];
  $times= $arr["times"];
  $ip=$arr["ip"];
  $speed=$arr["speed"];
 if(preg_match('/\d+/',$speed,$arr)){
       $speed=$arr[0];
    }	
$str=file_get_contents('http://'.$ip.'/resources/openvpn-status.txt',false,stream_context_create(array('http' => array('method' => "GET", 'timeout' => 0.5))));
$onlinenum = (substr_count($str,date('Y'))-1)/2;

$str2=file_get_contents('http://'.$ip.'/resources/openvpn-statusudp.txt',false,stream_context_create(array('http' => array('method' => "GET", 'timeout' => 0.5))));

$onlinenum2 = (substr_count($str2,date('Y'))-1)/2;

$str3=file_get_contents('http://'.$ip.'/resources/openvpn-statusudp2.txt',false,stream_context_create(array('http' => array('method' => "GET", 'timeout' => 0.5))));

$onlinenum3 = (substr_count($str3,date('Y'))-1)/2;

$onlinelast=$onlinenum+$onlinenum2+$onlinenum3;
$onlinelast=ceil($onlinelast);

if($onlinelast < 0){
	
			$onlinelast="<font style='color:red'>超时</font>";
}else{
	

}

 echo "<tr>";
 echo "<td>".$name."</td>";
 echo "<td>".$ip."</td>"; 
 echo "<td>".$onlinelast."</td>"; 
  echo "<td>".$times."</td>";
  
  
 echo "<td><a class='btn btn-danger' onclick=\"delect('".$name."','".$ip."','op_node');\">删除</a></td>";
 
  
 
echo '<tr>';
                                         

  }

}
else{
	
	
$sql = "select * from web_op_node where name= ? ";
 
$params = array($seafwq);
$data = $pdo->getOne($sql, $params);
  $name=$data["name"];
  $times= $data["times"];
  $ip=$data["ip"];
 
$str=file_get_contents('http://'.$ip.'/resources/openvpn-status.txt',false,stream_context_create(array('http' => array('method' => "GET", 'timeout' => 0.5))));
$onlinenum = (substr_count($str,date('Y'))-1)/2;

 
 echo "<tr>";
 echo "<td>".$name."</td>";
 echo "<td>".$ip."</td>"; 
 echo "<td>".$onlinenum."</td>"; 
  echo "<td>".$times."</td>";
 echo "<td><a class='btn btn-danger' onclick=\"delect('".$name."','".$ip."','op_node');\">删除</a></td>";
echo '<tr>';
                                         

 
	
	
}




									  ?>
									  
									  
									  
									  
                                                                               

                                                                                </tbody>
                                  </table>
                      
                      </div>
                      
                      <ul class="pagination pagination-sm"><li class="disabled"><a>首页</a></li><li class="disabled"><a>«</a></li><li class="disabled"><a>1</a></li><li class="disabled"><a>»</a></li><li class="disabled"><a>尾页</a></li></ul>                      
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
        
  </div></div></div>

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

	<script src="css/jquery.flot.tooltip.min.js"></script>    <!-- Flot Tooltips -->
	<!-- End loading page level scripts </script> 	 -->

			</script>								<!-- Initialize scripts for this page-->
	  <script>
   
    function limit(id,ip){
        $("#ip").val(ip);
         $("#value").val(id);
        $("#form-limit").modal("show");
    }

    
 
</script>
	
	
 
