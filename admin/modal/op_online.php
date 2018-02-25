<?php if(!$p){exit();} ?> 
<link href="css/style.min2.css?v=4.0.0" rel="stylesheet">
        <div class="static-content-wrapper">
          <div class="static-content">
            <div class="page-content">
              <div class="container-fluid">
                <div style="height:16px"></div>
<!-- 引入封装了failback的接口--initGeetest -->
 
<script type="text/javascript">
  var $_POST = (function(){
    var url = window.document.location.href.toString();
    var u = url.split("?");
    if(typeof(u[1]) == "string"){
        u = u[1].split("&");
        var get = {};
        for(var i in u){
            var j = u[i].split("=");
            get[j[0]] = j[1];
        }
        return get;
    } else {
        return {};
    }
})();
	str = document.getElementById("getid");
    obj = document.getElementById("fwqid");
	if(str.value==0){
    for(i=0;i<obj.length;i++){
        if(obj[i].value==str)
            obj[i].selected = true;
    }
    } 
</script>

<div class="row  border-bottom white-bg dashboard-header">

<div class="page-header" style="margin-top: -40px;">
							<h1>
								控制台
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									账号管理 &amp; 在线用户
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
				<input type="hidden" id="getid" value="<?php 
				if(isset($_POST['fwqid'])){
				echo $_POST['fwqid'];
				}else{
					echo "0";
				}
				?>">
				<input type="hidden" id="getlook" value="<?php if(isset($_POST['looking'])){
				echo $_POST['looking'];
				}else{
					echo "0";
				} ?>">
                        <div class="col-md-12">
			<form action="index.php?action=oponline" method="post" class="form-inline">
  <div class="form-group" style="margin-top: -10px;">
  <select class="form-control" name="fwqid" id="fwqid">
  


<?php 


$sql = "select * from web_op_node";
 
$data = $pdo->getSome($sql);

$num  = 0;
foreach($data as $arr)
  {
 $name=$arr["name"];
	$times= $arr["times"];
	$ip=$arr["ip"];
 echo "<option value='$name'>$name</option>";
  
  }


 ?>

</select>


<select class="form-control" name="looking" id="look">
<option value="1" selected>TCP</option><option value="2">UDP-1</option><option value="3">UDP-2</option></select>
  </div>
  <button type="submit" class="btn btn-primary">查看在线</button>&nbsp;<a class="btn btn-info">平台在线 <b><?php
$sql = "select * from web_op_node";
 
$data = $pdo->getSome($sql);

$num  = 0;
foreach($data as $arr)
  {
  $name=$arr["name"];
  $times= $arr["times"];
  $ip=$arr["ip"];
 
$str=file_get_contents('http://'.$ip.'/resources/openvpn-status.txt',false,stream_context_create(array('http' => array('method' => "GET", 'timeout' => 0.3))));
$onlinenum = (substr_count($str,date('Y'))-1)/2;

$str2=file_get_contents('http://'.$ip.'/resources/openvpn-statusudp.txt',false,stream_context_create(array('http' => array('method' => "GET", 'timeout' => 0.3))));

$onlinenum2 = (substr_count($str2,date('Y'))-1)/2;

$str3=file_get_contents('http://'.$ip.'/resources/openvpn-statusudp2.txt',false,stream_context_create(array('http' => array('method' => "GET", 'timeout' => 0.3))));

$onlinenum3 = (substr_count($str3,date('Y'))-1)/2;

$onlinelast=$onlinenum+$onlinenum2+$onlinenum3;

$num=$num+$onlinelast;
	 
  }
  
  echo ceil($num);
 ?></b> 个账号</a>
 
</form>
		
<script type="text/javascript">
  
	str = document.getElementById("getid");
    obj = document.getElementById("fwqid");
    for(i=0;i<obj.length;i++){
        if(obj[i].value==str.value)
            obj[i].selected = true;
    }
     
	 str = document.getElementById("getlook");
    obj = document.getElementById("look");
    for(i=0;i<obj.length;i++){
        if(obj[i].value==str.value)
            obj[i].selected = true;
    }
</script>
                <div class="tab-content">
                  <div class="tab-pane active" id="others">
                      <div class="table-responsive">
           
             
                      
                                  <table class="table table-striped">     
                    <thead>
                    <tr>
                      
                        <th style="text-align:center;">ID</th>
                     <th style="text-align:center;">用户名</th>
                        <th style="text-align:center;">上传流量</th>
                        <th style="text-align:center;">下载流量</th>
                        <th style="text-align:center;">总共使用</th>
                      <th style="text-align:center;">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                            
					
				<?php
    
	 $looking=$_POST['looking'];
	if(isset($_POST['fwqid'])){
	$id=$_POST['fwqid'];
 
	
	$sql = "select * from web_op_node where name = ? ";
	$params = array($id);
	$data = $pdo->getOne($sql, $params);
 
	$name=$data["name"];
	$times= $data["times"];
	$ip=$data["ip"];
	if(!$data){
		echo "此服务器不存在";
	}else{
		
		if(isset($_POST['looking'])){
			
		
		
		switch($looking)
        {
            case 1:
			$file = 'http://'.$ip.'/resources/openvpn-status.txt';
            break;
			case 2:
			$file = 'http://'.$ip.'/resources/openvpn-statusudp2.txt';
            break;
			case 3:
			$file = 'http://'.$ip.'/resources/openvpn-statusudp.txt';
            break;
		}
		
		}else{
			
			$file = 'http://'.$ip.'/resources/openvpn-status.txt';
			$looking=1;
		}
		
	}
}else{
	$file = '../resources/openvpn-status.txt';
	$looking=1;
}

$sql = "select * from web_admin where username = ? ";
$params = array('admin');
$data = $pdo->getOne($sql, $params);
 
$ps=md5(base64_decode($data["password"]));
$context = stream_context_create(array(
     'http' => array(
      'timeout' => 0.3
     ) 
));
$str=file_get_contents($file,0,$context);
$num=(substr_count($str,date('Y'))-1)/2;
$fp=fopen($file,"r");
fgets($fp);
fgets($fp);
fgets($fp);
for($i=0;$i<$num;$i++){
$j=$i+1;
echo "<tr>";
	$line=fgets($fp);
	$arr=explode(",",$line);
	$recv=round($arr[2]/1024)/1000;
	$sent=round($arr[3]/1024)/1000;
	$all=$recv+$sent;
	echo "<td style=\"text-align:center;\">".$j."</td>";
echo "<td style=\"text-align:center;\">".$arr[0]."</td>";
echo "<td style=\"text-align:center;\">".$recv."MB</td>";
echo "<td style=\"text-align:center;\">".$sent."MB</td>";
echo "<td style=\"text-align:center;\">".$all."MB</td>";
echo "<td style=\"text-align:center;\"><a class='btn btn-danger' onclick='if(!confirm('确定踢此用户下线？')){return false;}' href='../resources/offline.php?username=".$arr[0]."&look=".$looking."&token=".$ps."' >强制下线</a></td>";
echo "</tr>";
}

 	


?>
					
					


 

					<a href="#" onclick="gotoTop();return false;" class="totop"></a>

					
					 </tbody>

                </table>
                     <br>            
                <br><br>
				<ul class="pagination pagination-sm">
				<li class='disabled'><a>首页</a></li>
				<li class='disabled'><a>«</a></li>
<?php 

for($i=1;$i<=$pagenum;$i++){

       $show=($i!=$page)?"<li class='disabled'><a href='index.php?action=oponline&page=".$i."'>$i</font></a></li>":"";
       echo $show."&nbsp;&nbsp";
	 
}


 ?>
 <li class='disabled'><a>»</a></li>
 <li class='disabled'><a>尾页</a></li>
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
	