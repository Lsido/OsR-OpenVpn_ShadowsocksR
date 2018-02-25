 
<section class="margin-top">
	<div class="container">
				<h1>推介计划 <small>此处是实时统计并实时更新</small></h1>

		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="text-center">
					<h3>属于您的唯一推荐链接</h3>
					<div class="panel panel-default">
						<div class="panel-body text-center">
							<span class="lead"><?=$url?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row text-center">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<div class="col-md-4">
						<div class="well">
							<h4>推荐的注册数量</h4>
							<span class="lead"><?php if($v_c_data['count']){echo $v_c_data['count'];}else{echo "0";}?></span>
						</div> 
					</div>
					<div class="col-md-4">
						<div class="well">
							<h4>总佣金</h4>
							<span class="lead"><?php if($m_data['SUM(money)']){echo $m_data['SUM(money)'];}else{echo "0";}?></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="well">
							<h4>返利阈</h4>
						 	<span class="lead"><?php echo $profit*100;?>%</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<table class="table table-striped">
						<tbody>
							<tr>
								<td>确认中的佣金金额</td>
								<td class="text-center"><strong>￥0.00 RMB</strong></td>
							</tr>
							<tr>
								<td>有效的佣金金额</td>
								<td class="text-center"><strong>￥<?=round($m_data['SUM(money)'],2)?> RMB</strong></td>
							</tr>
							<tr>
								<td>当前账户余额</td>
								<td class="text-center"><strong>￥<?=round($ydata['money'],2)?> RMB</strong></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	
			
		<div class="page-header">
			<h2>您的邀请消费列表</h2>
		</div>
<?php 

$sql = "select count(*) as count from web_paylog where username in ( select username from web_user where spread_id = ? )";
$params = array($_SESSION['username']);
$data = $pdo->getOne($sql, $params);
$page=$_GET["id"];
$pagesize=5; 
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
		

		<p><?=$data['count']?> 记录, 页 <?=$pagenum?> / <?=$pagesize?> 
	
		<div class="panel panel-default">
			<table class="table table-striped">
				<thead>
					<tr>
						<th><a href="#">用户</a></th>
						<th><a href="#">消费时间</a></th>
						<th><a href="#">金额(RMB)</a></th>
						<th><a href="#">佣金(RMB)</a></th>
						<th><a href="#">状态</a></th>
					</tr>
				</thead>
				<tbody>
				
				
				<?php 


		$sql = "select * from web_paylog where username in ( select username from web_user where spread_id = ? ) limit $offset,$pagesize";
		$params = array($_SESSION['username']);
		$data = $pdo->getSome($sql, $params);
		if($data){
		foreach($data as $value){
			
			
			echo "<tr>";
			echo "<td>".$value['username']."</td>";
			echo "<td>".$value['ptime']."</td>";
			echo "<td>".round($value['money'],2)."</td>";
			echo "<td>".round($value['money']*$profit,2)."</td>";
			echo "<td><span class=\"label label-success\">正常</span></td>";
			echo "</tr>";
			
			
		}  

		}else{
			
			echo "<tr><td colspan=\"5\" class=\"text-center\">没有记录</td></tr>";
			
		}




 







				?>
				
									</tbody>
			</table>
		</div>
		
		 
	 
					
					<nav aria-label="Page navigation">
  <ul class="pagination">
    <li>
      <a href="/member/affiliates/1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
 <?php 

for($i=$start1;$i<=$end;$i++){

       $show=($i!=$page)?"<li class=''><a href='/member/affiliates/".$i."'>$i</a></li>":"";
       echo $show."&nbsp;&nbsp";
	 
}


 ?>
    <li>
      <a href="/member/affiliates/<?=$pagenum?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</section>