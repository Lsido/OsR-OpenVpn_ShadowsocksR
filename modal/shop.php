<section>
	<div class="container">
		
		<h1>购买新服务</h1>
		
		<div class="row">
			<div class="col-md-3">
				<div class="page-header">
					<h3>订购产品 分类</h3>
				</div>
				 
				
				<div class="btn-group">
			  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
				Shadowsocksr套餐 <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
				 
				
				<?php 
$sql = "select * from web_pdtype where type_id = ? ";
$params = array(1);
$data = $pdo->getSome($sql, $params);
foreach($data as $value)
  {
      
  echo "<li><a href='/member/shop/".$value['id']."'>".$value['type_name']."</a></li>";
  
  }
				?>
				
				
			  </ul>
</div>
<br><br>
				<div class="btn-group">
			  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
				CloudOpenVpn 套餐 <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
			<?php 


$sql = "select * from web_pdtype where type_id = ? ";
$params = array(2);
$data = $pdo->getSome($sql, $params);
foreach($data as $value)
  {
  
  echo "<li><a href='/member/shop/".$value['id']."'>".$value['type_name']."</a></li>";
  
  }





				?>
			  </ul>
</div>
				
			</div>
			
			
			
			 
			
			
			
			<div class="col-md-9">
				<div class="page-header">
					<h3>查看产品与服务</h3>
				</div>
								 
						
						
				<?php 
				
				
				
 

  
if(empty($_GET['id'])){

$sql = "select * from web_product where pd_type = ? ";
$params = array(1);
$data = $pdo->getSome($sql, $params);

}else{
$sql = "select * from web_product where pd_type = ? ";
$params = array($_GET['id']);
$data = $pdo->getSome($sql, $params);

}

 

foreach($data as $value)
  {
  if($value['pd_tid']==1){$jdsm = "中国，美国、日本、香港、新加坡、台湾、韩国、英国等节点";}elseif($value['pd_tid']==2){$jdsm =  "全国移动、联通、电信 90%地区可进行OpenVPN免流量上网服务";}
  if($value['pd_llvalues']==999){$llz = "不限";}else{$llz =  $value['pd_llvalues']."G";}
  echo "<div class='panel panel-default'>";
  echo "<div class='panel-body'>";
  echo "<div class='row'>";
  echo "<div class='col-md-8'>";
  echo "<h3 class='text-info' style='margin-top:0px'>".$value['pd_name']."</h3>";
  echo "<p>".$llz."流量，有效期".$value['pd_time']."天<br />$jdsm<br />流量套餐不限终端使用(同时仅可单一终端)<br />同时支持手机、电脑和平板<br />";
  if(!empty($value['pd_content1'])){echo "<strong><font color='red'>".$value['pd_content1']."</font></strong>";}
  echo "</p></div>";
  echo "<div class='col-md-4 text-center'>";
  echo "<strong>起价</strong><br><div class='lead'>"; 
  echo "￥".$value['pd_price']." RMB </div><a href='/member/confproduct/".$value['id']."' class='btn btn-primary'>  现在订购</a></div></div></div></div>";
   
  }

 
 
  
  
  
  


				?>		
						
						
						
						
						
						
						
						
						
				<div class="text-center form-group">
					<a href="/member/cart" title="查看购物车" class="btn btn-info">查看购物车</a>
				</div>
		
			</div>
		</div>
	</div>
</section>


 