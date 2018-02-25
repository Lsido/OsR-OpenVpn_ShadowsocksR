<?php if(!$p){exit();} ?> 
 <style>
td{
	
	text-align:center;
	border-color:#eeeeee;
}
 </style>
  <link href="../admin/css/style.min2.css?v=4.0.0" rel="stylesheet">
  <link href="../admin/css/foundation-datepicker.css" rel="stylesheet" type="text/css">

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
									控制台 &amp; 账单管理
								</small>
							</h1>
						</div><!-- /.page-header -->

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
                    	<th style="text-align:center;">流水号</th>
						<th style="text-align:center;">下单日期</th>
						<th style="text-align:center;">截单日期</th>
						<th style="text-align:center;">备注</th>
						
						<th style="text-align:center;">涉及金额</th>
						<th style="text-align:center;">账单状态</th>
						<th style="text-align:center;">操作用户</th>
                    </tr>
                    </thead>
                    <tbody>
                            
			<?php

			
$bisql = "select count(*) as count from web_bill where user_name in ( select username from web_user where agent_id = ".$ag_info['id']." )";
$bidata = $pdo->getOne($bisql);
$pagesize=15; 
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


if($_POST){
  
 


$sql = "select * from web_bill where user_name in ( select username from web_user where agent_id = ".$ag_info['id']." ) and b_time between '".$_POST['start']."' and '".$_POST['end']."' ORDER BY id DESC limit $offset,$pagesize";
$data = $pdo->getSome($sql);

}else{
$sql = "select * from web_bill where user_name in ( select username from web_user where agent_id = ".$ag_info['id']." ) ORDER BY id DESC limit $offset,$pagesize";
$data = $pdo->getSome($sql);

}


foreach($data as $value)
  {
		
		if($value['b_i']==1){$i="<span class='label label-success'>有效</span>";}else{$i="<span class='label label-default'>已删除</span>";}
		echo "<tr>";
		echo "<td>".$value['attach']."</td>";
		echo "<td>".$value['b_time']."</td>";
		echo "<td>".$value['b_end_time']."</td>";
		echo "<td>".$value['b_name']."</td>";
	 
		echo "<td>".$value['b_price']."</td>";
 
  
		 		echo "<td>".$i."</td>";
		echo "<td>".$value['user_name']."</td>";

		 
 
		 
		echo "</tr>";
  
  }

 


?>	
					
 



				 

					
					 </tbody>

                </table>
				</div>
                     <br>            
                <br><br>
				<ul class="pagination pagination-sm">
				  <li class=''><a href="index.php?action=sub_bill&page=<?php echo "1";  ?>">首页</a></li>
<?php 

for($i=$start1;$i<=$end;$i++){

       $show=($i!=$page)?"<li class=''><a href='index.php?action=sub_bill&page=".$i."'>$i</a></li>":"";
       echo $show."&nbsp;&nbsp";
	 
}


 ?>
 
 <li class=''><a href="index.php?action=sub_bill&page=<?php echo $pagenum;  ?>">尾页</a></li>
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
					 

	 
		<script src="../admin/css/foundation-datepicker.js"></script>
		<script src="../admin/css/locales/foundation-datepicker.zh-CN.js"></script>	
				
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
	

 
	

 