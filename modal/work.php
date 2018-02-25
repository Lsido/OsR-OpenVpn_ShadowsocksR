
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
		<h1>我的服务单 <small>您可以在这里提交、查看和回复您的服务单</small></h1>
		
		<div class="row">
			<div class="col-md-7">
			
			 
			
				<a href="/member/supportticket" class="btn btn-primary margin-bottom" title="提交新支持票">提交新支持票</a>
				<p><?=$data['count']?> 记录, 页 <?=$pagenum?> / <?=$pagesize?></p>
			</div>
		</div>
		
		<div class="panel panel-default">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
							<th><a href="#">日期</a></th>
							<th><a href="#">主题</a></th>
							<th><a href="#">部门</a></th>
							<th><a href="#">状态</a></th>
							<th><a href="#">最后更新 <span class="fa fa-sort-desc"></span></a></th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
				 
										<?php 


$sql = "select * from web_word where w_user = ? and to_w_id IS NULL ORDER BY w_is_over ASC limit $offset,$pagesize";
$params = array($_SESSION['username']);
$data = $pdo->getSome($sql, $params);

if($data){

foreach($data as $value){
	
	if($value['w_is_over'] ==1){$i="已关闭";$u="#";}else{$i="处理中";$u="/member/viewtk/".$value['id']."";}
	
	echo "<tr>";
	echo "<td>".$value['w_starttime']."</td>";
	echo "<td><a href='$u' style='color:#f05f40;'>#".$value['id']." - ".$value['w_title']."</a></td>";
	echo "<td>售后部门</td>";
	echo "<td>$i</td>";
	echo "<td>".$value['w_endtime']."</td>";
	echo "</tr>";
}
}else{
	echo "<tr>";
 
	echo "<td colspan='6' class='text-center'>您目前没有提交的服务单</td>";
 
	echo "</tr>";
}



		?>
									</tbody>
			</table>
		</div>
		
		<form method="post" action="#" class="pull-right">
 
			<fieldset>
				<select name="itemlimit" onchange="submit()" class="form-control" style="margin-top: 15px">
					<option>每页结果数</option>
					<option value="10" selected="selected">10</option>
					<option value="25">25</option>
					<option value="50">50</option>
					<option value="100">100</option>
					<option value="all">无限</option>
				</select>
			</fieldset>
		</form>
		
		<nav aria-label="Page navigation">
  <ul class="pagination">
    <li>
      <a href="/member/work/1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
 <?php 

for($i=$start1;$i<=$end;$i++){

       $show=($i!=$page)?"<li class=''><a href='/member/work/".$i."'>$i</a></li>":"";
       echo $show."&nbsp;&nbsp";
	 
}


 ?>
    <li>
      <a href="/member/work/<?=$pagenum?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
	</div></div>
</section>