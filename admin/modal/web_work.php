<?php if(!$p){exit();} ?> 
 <style>
td{
	
	text-align:center;
	border-color:#eeeeee;
}
 </style>
  <link href="css/style.min2.css?v=4.0.0" rel="stylesheet">
  <link href="css/foundation-datepicker.css" rel="stylesheet" type="text/css">

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
									工单管理 &amp; 工单列表
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
		  <form class="form-horizontal row-border" action="" method="post">
							<div class="form-group">
							<label class="col-sm-1 control-label" style="text-align:left;width:auto;padding-right:0">选择日期：</label>
							<div class="col-sm-3">
							<div class="input-daterange input-group" id="datepicker-range">
							<input type="text" id="demo-2" class="form-control" name="start" value="2017-03-12">
							<span class="input-group-addon">到</span>
							<input type="text" id="demo-3" class="form-control" name="end" value="2017-03-12">
							</div>
							</div>
							<div class="col-sm-3">
							<button type="submit" class="btn btn-success">查询</button>
							</div>
							</div>
							</form>  
                       
                             
   
             

                
                <div class="tab-content">
                  <div class="tab-pane active" id="others">
                      <div class="table-responsive">
           
             
                      
                                  <table id='mytable' class="table table-striped table-hover" style="overflow-y: hidden">    
                    <thead>
                   <tr>
                      <th style="text-align:center;">工单号</th>
					  <th style="text-align:center;">主题</th>
                        <th style="text-align:center;">级别</th>
                     <th style="text-align:center;">提交时间</th>
						<th style="text-align:center;">最后更新</th>
                        <th style="text-align:center;">状态</th>
                      <th style="text-align:center;">用户</th>
                        <th colspan="2" style="text-align:center;">操作</th>
                    </tr>
                    </thead>
                    <tbody>
           		
				<?php

$pagesize=8; 
$page=$_GET["page"];
$pagenum=ceil($gdata['count']/$pagesize);
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

if($_POST){
		
$sql = "SELECT * FROM web_word where to_w_id IS NULL AND w_starttime between '".$_POST['start']."' and '".$_POST['end']."' ORDER BY id DESC limit $offset,$pagesize";
$data = $pdo->getSome($sql);
		
		
	}else{

$sql = "SELECT * FROM web_word where to_w_id IS NULL ORDER BY id DESC limit $offset,$pagesize";
$data = $pdo->getSome($sql);

	}

foreach($data as $value)
  {
		
		if($value['w_is_over'] =="1"){$i="已完结";}else{$i="<b style='color:green'>处理中</b>";}
		echo "<tr>";
		echo "<td>#".$value['id']."</td>";
		echo "<td><a href='index.php?action=view_work&id=".$value['id']."' style='color:#f05f40;'>".$value['w_title']."</a></td>";
		echo "<td>".$value['w_level']."</td>";	
		echo "<td>".$value['w_starttime']."</td>";
		echo "<td>".$value['w_endtime']."</td>";
		echo "<td>".$i."</td>";
		echo "<td>".$value['w_user']."</td>";
		echo "<td><a class='btn btn-info' href='index.php?action=view_work&id=".$value['id']."'>回复</a></td>";
		echo "</tr>";
  
  }
 


?>
				



				 

					
					 </tbody>

                </table>
				</div>
                     <br>            
                <br><br>
				<ul class="pagination pagination-sm">
				  <li class=''><a href="index.php?action=work&page=<?php echo "1";  ?>">首页</a></li>
<?php 

for($i=$start1;$i<=$end;$i++){

       $show=($i!=$page)?"<li class=''><a href='index.php?action=work&page=".$i."'>$i</a></li>":"";
       echo $show."&nbsp;&nbsp";
	 
}


 ?>
 
 <li class=''><a href="index.php?action=work&page=<?php echo $pagenum;  ?>">尾页</a></li>
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
	
	<script src="css/jquery.flot.min.js"></script>             <!-- Flot Main File -->

	<script src="css/jquery.flot.tooltip.min.js"></script>    <!-- Flot Tooltips -->
	<!-- End loading page level scripts </script> 	 -->

	 
		<script src="css/foundation-datepicker.js"></script>
		<script src="css/locales/foundation-datepicker.zh-CN.js"></script>	
				
		<script>
	 
		$('#demo-2').fdatepicker({
			format: 'yyyy-mm-dd hh:ii:ss',
			pickTime: true
		});
	 $('#demo-3').fdatepicker({
			format: 'yyyy-mm-dd hh:ii:ss',
			pickTime: true
		});
		var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
		var checkin = $('#dpd1').fdatepicker({
			onRender: function (date) {
				return date.valueOf() < now.valueOf() ? 'disabled' : '';
			}
		}).on('changeDate', function (ev) {
			if (ev.date.valueOf() > checkout.date.valueOf()) {
				var newDate = new Date(ev.date)
				newDate.setDate(newDate.getDate() + 1);
				checkout.update(newDate);
			}
			checkin.hide();
			$('#dpd2')[0].focus();
		}).data('datepicker');
		var checkout = $('#dpd2').fdatepicker({
			onRender: function (date) {
				return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
			}
		}).on('changeDate', function (ev) {
			checkout.hide();
		}).data('datepicker');
		</script>
	

 