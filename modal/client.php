
<section>
	<div class="container">
                <div class="row">
                        <div class="col-lg-6 text-center">
                                <h2>我的产品与服务</h2>
                                <hr class="primary">
                                <p>产品/服务数量:<?=$bidata['count']?></strong> (<?=$bdata['count']?>)</p>
                                <div class="text-center">
                                        <a href="/member/goods" title="查看产品 & 服务" class="btn btn-info">查看产品 & 服务</a>
                                </div>
                        </div>
                        <div class="col-lg-6 text-center">
                                <h2>购买新服务</h2>
                                <hr class="primary">
                                <p>查看可购买的产品与服务,老客户也可以购买产品与增值服务.</p>
                                <div class="text-center">
                                        <a href="/member/shop" title="购买新服务" class="btn btn-primary">购买新服务</a>
                                </div>
                        </div>
                </div><br><br>
		
				<div class="alert alert-warning alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4 class="alert-heading">最新公告</h4>
			
			<p><?php
			
			$sql = "select * from web_gg ORDER BY id DESC limit 1";
			$data = $pdo->getOne($sql);
			echo mb_strimwidth($data['g_conetent'], 0, 230, '...', 'utf-8');
			
			 
			
			?><a href="/member/announcements/<?=$data['id']?>" title="更多" class="alert-link">查看 &raquo;</a></p>
		</div>
			
				
			
		 
				
				<div class="clearfix">
			<h3>0 打开服务单 <small>( <a href="/member/supportticket">提交新支持票</a> )</small></h3>
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
						</tr>
					</thead>
					<tbody>
												 
												
													
		<?php 


$sql = "select * from web_word where w_user = ? and w_is_over='0' and to_w_id IS NULL ORDER BY id DESC";
$params = array($_SESSION['username']);
$data = $pdo->getSome($sql, $params);

if($data){

foreach($data as $value){
	echo "<tr>";
	echo "<td>".$value['w_starttime']."</td>";
	echo "<td><a href='/member/viewtk/".$value['id']."' style='color:#f05f40;'>#".$value['id']." - ".$value['w_title']."</a></td>";
	echo "<td>售后部门</td>";
	echo "<td>处理中</td>";
	echo "<td>".$value['w_endtime']."</td>";
	echo "</tr>";
}
}else{
	echo "<tr>";
 
	echo "<td colspan='6' class='text-center'>您目前没有正在处理的服务单</td>";
 
	echo "</tr>";
}



		?>
										 
											</tbody>
				</table>
			</div></div>
		</div>
			
				<h3>0 应付账单 <small>( <a href="#">查看</a> )</small></h3>
		<form method="post" action="#" class="clearfix">
 
			<div class="panel panel-default">
				<table class="table table-striped">
					<thead>
						<tr>
							<th class="text-center"><input type="checkbox" onclick="toggleCheckboxes('invids')"></th>							<th><a href="#">账单 # <span class="fa fa-sort-desc"></span></a></th>
							<th><a href="#">账单日期</a></th>
							<th><a href="#">过期日期</a></th>
							<th><a href="#">总计</a></th>
							<th><a href="#">余额</a></th>
							<th><a href="#">状态</a></th>
						</tr>
					</thead>
					<tbody>
												<tr>
							<td colspan="7" class="text-center">您目前没有未支付的账单</td>
						</tr>
											</tbody>
					<tfoot>
											</tfoot>
				</table>
			</div>
		</form>
			
	
			</div>
</section>






		 