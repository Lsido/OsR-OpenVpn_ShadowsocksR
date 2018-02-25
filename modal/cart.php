  <section>
	
	<div class="container">
				
		<div class="page-header">
			<h1>购买新服务 <small>订购总额</small></h1>
		</div>
		
				
				 
				<form method="post" action="/member/cart/view">
			<table class="table">
				<thead>
					<tr>
						<th class="active">描述</th>
						<th class="active">价格</th>
					</tr>
				</thead>
				<tbody>
										 
					
					<?php 


$sql = "SELECT * FROM `web_cart` WHERE username = ? ";
$params = array($_SESSION['username']);
$data = $pdo->getSome($sql, $params);
$num  = 0;

foreach($data as $value)
  {
  
	$pdsql = "select * from web_product where id = ? ";
	$pdparams = array($value['pd_id']);
	$pddata = $pdo->getSome($pdsql, $pdparams);
    
	foreach($pddata as $pdvalue)
  {
  
	 
	
	 $pd_name=$pdvalue["pd_name"];
  $id=$pdvalue["id"];
  $pd_tid=$pdvalue["pd_tid"];
  $pd_price=$pdvalue["pd_price"];
	 $pd_llvalues=$pdvalue["pd_llvalues"];
$pd_time=$pdvalue["pd_time"];


 
  if($pd_tid==1){$tn='Shadowsocks';}else{$tn='OpenVpn';}
   echo "<tr><td><em>$tn</em> - $pd_name<ul><li>流量GB/天: $pd_llvalues GB $pd_time 天</li></ul></td><td>￥".$pd_price.".00 RMB</td></tr><tr>";
   echo "<td colspan='2'><fieldset class='form-inline'>";
   echo "<a class='text-success'>编辑配置</a>";
    echo "<span class='text-muted'>|</span>";
	 echo '<a href="/member/cart/remove/'.$value['id'].'" title="移除" class="text-danger" onclick="return confirm("您确定从购物车删除此项目？")">移除</a>';
	  echo "</fieldset></td></tr><tr><td colspan='2' class='active'>&nbsp;</td></tr>";
	 
		$jiage+=$pd_price;
	
  
  }
	 
	
  
  }
					
  
 











					?>
					
					
					 
							
							
							
										<tr>
						<td class="text-right">小计</td>
						<td>￥<?php if(empty($jiage)){echo "0";}else{echo $jiage;}?>.00 RMB</td>
					</tr>
																				<tr>
						<td class="text-right">当前总计</td>
						<td>￥<?php if(empty($jiage)){echo "0";}else{echo $jiage;}?>.00 RMB</td>
					</tr>
										<tr>
						<td class="text-right">下次付款总计</td>
						<td>
														￥<?php if(empty($jiage)){echo "0";}else{echo $jiage;}?>.00 RMB<br>																																		</td>
					</tr>
						
				</tbody>
			</table>
				 
			
		</form>
		
		<div class="row text-center">
			<div class="col-md-6">
				<form method="post" action="/cart.php?a=view" class="form-horizontal well well-sm">
 
					<input type="hidden" name="validatepromo" value="true">
					<div class="row">
						<label class="control-label col-md-4" for="promocode">优惠码</label>
												<div class="col-md-8">
							<div class="input-group">
								<input type="text" name="promocode" id="promocode" class="form-control">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-info">验证 &gt;&gt;</button>
								</span>
							</div>
						</div>
											</div>
				</form>
			</div>
			<div class="col-md-6">
				<div class="well well-sm" style="border:none;background:none;box-shadow:none">
					<a href="/member/cart/empty/1" class="btn btn-danger" title="清空购物车" onclick="return confirm('您确认清空购物车？')">清空购物车</a>
					<a href="/member/shop" class="btn btn-success" title="继续购物">继续购物</a>
					<a href="/member/check" class="btn btn-primary" title="结账">结账</a>
									</div>
			</div>
		</div>
		
			</div>
	
	
</section>