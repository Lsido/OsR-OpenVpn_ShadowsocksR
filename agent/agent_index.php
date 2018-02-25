 
	     <div class="static-content-wrapper">
          <div class="static-content">
            <div class="page-content">
              <div class="container-fluid">
                <div style="height:16px"></div>
 
<div class="alert alert-inverse alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<span class="glyphicon glyphicon-bullhorn"></span>&nbsp;公告：<br/><br>
	<pre style="background-color:#e0e0e0;border:0px solid #cccccc;"><?=$webdata['agent_amt'];?></pre>
	
<?php echo $webdata['site_name']; ?>运营团队
</div>
	   
<div class="row">
	<div class="col-md-3">
		<div class="amazo-tile tile-white">
			<div class="tile-heading">
				<div class="title"><?php echo $_SESSION['dusername']; ?></div>
				<div class="secondary"><a href="index.php?mod=set&rights" style="color: #a0d3ea" id="level_n">Agent</a></div></div>
			<div class="tile-body">
				<div class="content">
					<p style="width: 16px;height: 16px;background: #ebccd1;float:left;margin:14px 4px 0 0px" ></p><span style="font-weight: lighter">
					
					<?php 

switch($ag_info['grade'])
{
case 1:
  echo "一级Vip代理";
  break;  
case 2:
  echo "二级Vip代理";
  break;
case 3:
  echo "三级Vip代理";
  break;
case 4:
  echo "四级Vip代理";
  break;
case 5:
  echo "五级Vip钻石代理";
  break;
}


					?>
					
					</span>				</div></div>
			<div class="tile-footer">
				<span class="info-text text-left">
				<span style="font-weight:lighter">	
				级别
			</span></b>				</span>
				
				<div id="sparkline-revenue" class="sparkline-line"></div>
			</div>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="amazo-tile tile-white">
			<div class="tile-heading">
				<span class="title">用户数量</span>
				<span class="secondary">Vip</span></div>
			<div class="tile-body">
				<span class="content" id="flow_left">
				
				<?php
	 			$sql = "select count(*) as count from web_user where agent_id = ? ";
				$params = array($ag_info['id']);
				$dcount = $pdo->getOne($sql, $params);
				echo $dcount['count'];
 ?>
				
				</span></div>
			<div class="tile-footer">
				<span class="info-text text-left" style="color: #94c355"><i class="fa fa-refresh"></i>
				User</span>
				<span class="info-text text-right"><a href="useradd.php">添加</a></span>
				<div id="sparkline-commission" class="sparkline"></div>
			</div>
		</div>
	</div>
	
	
	
	<div class="col-md-3">
		<div class="amazo-tile tile-white">
			<div class="tile-heading">
				<span class="title">商品折扣</span>
				<span class="secondary">Discount</span></div>
			<div class="tile-body">
				<span class="content" id="flow_left">
				<?php
				echo 100-$zk_info["discount"]*100;
 ?>
				
				%</span></div>
			<div class="tile-footer">
				<span class="info-text text-left" style="color: #94c355"><i class="fa fa-refresh"></i>
				Shop</span>
				<span class="info-text text-right"><a href="onlineuser.php">查看</a></span>
				<div id="sparkline-commission" class="sparkline"></div>
			</div>
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	<div class="col-md-3">
		<div class="amazo-tile tile-white">
			<div class="tile-heading">
				<span class="title">账户余额</span>
				<span class="secondary">People</span></div>
			<div class="tile-body">
				<span class="content"><?=round($ag_info['money'] ,2);?></span></div>
			<div class="tile-footer">
				<span class="info-text text-left" style="color: #94c355"><i class="fa fa-level-up"></i>
					Money
				</span>
				<span class="info-text text-right"><a href="moneyadd.php">充值</a></span>
				<div id="sparkline-commission" class="sparkline"></div>
			</div>
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2 style="padding: 4px 2px">实时监控</h2>
			</div>
			<div class="panel-body">
			
			
			
				<div id="realtime-updates" style="height: 300px" class="centered"></div>

		
				
				
				
				
				
				
				
				
				
				
				
				</div>
				
		
		</div>
	</div>
</div>



						</div>
            </div>
          </div>
					<br>
			<script src="css/speed.js"></script>
 