
<?php 
$page=$_GET["id"];
if(empty($_POST['itemlimit'])){
$pagesize=5; 
}else{
$pagesize=$_POST['itemlimit']; 	
}
$pagenum=ceil($data['count']/$pagesize);
if(empty($page)){
	$page=1;
}
else{
	$page=$_GET["id"];
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
 
?>
		
			<section>
	<div class="container">
		<h1>我的产品与服务 <small>您账户下的产品列表</small></h1>
		<div class="row">
			<div class="col-md-7">
				<div id="resultsfound" style="padding-top:20px;"><?=$data['count']?> 记录, 页 <?=$pagenum?> / <?=$pagesize?></div>
			</div>
		</div>
	
		<div class="panel panel-default">
		<div class="table-responsive">

			<table id="resultslist" class="table table-striped">
				<thead>
					<tr>
						<th><a href="#">产品/服务 <span class="fa fa-sort-asc"></span></a></th>
						<th><a href="#">价格</a></th>
						<th><a href="#">账单周期</a></th>
						<th><a href="#">下次付款日期</a></th>
						<th><a href="#">状态</a></th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
				
				
				<?php
		
$sql = "select * from web_bill where user_name = ? ORDER BY b_end_time DESC limit $offset,$pagesize";
$params = array($_SESSION['username']);
$data = $pdo->getSome($sql, $params);
 
foreach($data as $value)
  {
	  
  if($value['b_i']==1){
	  $i="<span class='label label-active'>有效的</span>";
	  
	   
  }elseif($value['b_i']==0){
	  
	  $i="<span class='label label-terminated'>已删除</span>";
	  
  }
  
   if($value['b_tid']==1 && $value['b_i'] ==1){
	   $b_z="ShadowSocksR";
	   $a="/member/Ssgoods/".$value['id']."";
	   
   }elseif($value['b_tid']==2 && $value['b_i'] ==1){
	    $b_z="OpenVPN";
	    $a="/member/Opgoods/".$value['id']."";
	   
   }elseif($value['b_tid']==2){
	    $b_z="OpenVPN";
	    $a="";
	   
   }elseif($value['b_tid']==1){
	  $b_z="ShadowSocksR";
	  $a="";
	   
   }else{
	   
	   $a="";
	   
   }
   
  echo "<tr>";
  echo "<td>".$b_z."-".$value['b_name']."</td>";
  echo "<td>￥".$value['b_price'].".00 RMB</td>";
  echo "<td>一次性</td><td>".$value['b_end_time']."</td>";
  echo "<td>".$i."</td>";
  echo "<td class='text-center'>";
  echo "<a href='$a' class='btn btn-primary' title='查看详情'>查看详情</a>";
  echo "</td>";
  echo "</tr>";
   
  }
				
				?>
				
				
				
										 
									</tbody>
			</table>
		</div>
	
		<form id="resultslimit" method="post" action="" class="pull-right" style="margin-top: 18px">
			
			<fieldset>
				<select name="itemlimit" onchange="submit()" class="form-control">
					<option>每页结果数</option>
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="20">20</option>
					<option value="30">30</option>
					<option value="100">100</option>
				</select>
			</fieldset>
		</form>

 
		
<nav aria-label="Page navigation">
  <ul class="pagination">
    <li>
      <a href="/member/goods/1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
 <?php 

for($i=$start1;$i<=$end;$i++){

       $show=($i!=$page)?"<li class=''><a href='/member/goods/".$i."'>$i</a></li>":"";
       echo $show."&nbsp;&nbsp";
	 
}


 ?>
    <li>
      <a href="/member/goods/<?=$pagenum?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
		
	</div>
	</div>
</section>



		 