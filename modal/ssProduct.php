 
			<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 text-center">
				<h1>ShadowSocksR - <?=$bdata['b_name']?></h1>
				<hr>
				<div class="h2 text-center"><?php
	  if($bdata['b_i']==0){
	  
	  echo "<span class='label label-terminated'>已删除</span>";
	   
  }elseif($bdata['b_i']==1){
	  
	    echo "<span class='label label-active'>有效的</span>";
	   ?>
 </div>
			</div>
		</div><br>
				
		<div class="row">
			<div class="col-md-8">
                                <div class="panel panel-default">
                                        <div class="panel-heading"><strong>相关信息</strong></div>
				                                <div class="table-responsive">
<table class="table table-hover table-striped table-bordered" style="font-size:16px;">
    <thead>
        <tr class="warning">
            <th colspan="10">
                配置信息
            </th>
        </tr>
    </thead>
    <tbody>
	
	 
        
			
			
			<?php
	
		$sql = "select * from user where user_name = ? and bill_id = ? ";
		$params = array($_SESSION['username'],$bdata['attach']);
		$data = $pdo->getOne($sql, $params);
 
 
		$used=$data['u']+$data['d'];
		$surplus=$data['transfer_enable']-$used;
		
		 
		
		if($data['transfer_enable']>107374182400){$max="不限制";$surplus="不限制";}else{$max=round($data['transfer_enable']/1024/1024/1024)." GB";$surplus=round($surplus/1024/1024)." MB";}
		
		echo "<td>端口</td><td>".$data['port']."</td>";
		echo "<td>密码</td><td>".$data['passwd']."</td>";
		echo "<td>流量</td><td>".$max."</td>";
		echo "<td>已用</td><td>".round($used/1024/1024)." MB</td>";
		echo "<td>剩余</td><td>".$surplus."</td>";
	    
		
 
	
	?>
        </tr>
    </tbody>
	
	 
	
    <thead>
        <tr class="warning">
            <th colspan="10">
                节点/服务器/IP地址
            </th>
        </tr>
        <tr>
            <th class="text-center" colspan="1">#</th>
            <th class="text-center" colspan="2">节点名</th>
            <th class="text-center" colspan="2">加密</th>
            <th class="text-center" colspan="3">服务器IP地址</th>
            <th class="text-center" colspan="2">二维码</th>
        </tr>
    </thead>
    <tbody>
             
		
		<?php 
 
$snsql = "select * from web_ss_node where is_multi = '0'";
$sndata = $pdo->getSome($snsql);

foreach($sndata as $value)
  {
  
   echo "<tr>";
   echo "<td class='text-center' colspan='1'>#".$value['id']."</td>";
   echo "<td class='text-center' colspan='2'>".$value['node_name']."</td>";
   echo " <td class='text-center' colspan='2'>".$data['method']."</td>";
   echo "<td class='text-center' colspan='3'>".$value['node_ip']."</td>";
   echo "<td class='text-center' colspan='2'>";
   echo " <a name='qrcode' data-qrcode='#' href=\"javascript:void(0);\" onClick=\"urlChange('".$value['id']."','".$bdata['attach']."')\">";
   echo "二维码</a>";
   echo "</td>";
   echo "</tr>";
    
  }

$mlsnsql = "select * from web_ss_node where is_multi = '1'";
$mlsndata = $pdo->getSome($mlsnsql);

foreach($mlsndata as $value)
  {
  
  
	   $mlsql = "select * from user where port = ? and is_multi_user = ? ";
	   $mlparams = array($value['node_port'], '2');
	   $mldata = $pdo->getOne($mlsql, $mlparams);
	   echo "<tr>";
	   echo "<td class='text-center' colspan='1'>#".$value['id']."</td>";
	   echo "<td class='text-center' colspan='2'>".$value['node_name']."</td>";
	   echo " <td class='text-center' colspan='2'>".$mldata['method']."</td>";
	   echo "<td class='text-center' colspan='3'>".$value['node_ip']."</td>";
	   echo "<td class='text-center' colspan='2'>";
	   echo " <a name='qrcode' data-qrcode='#' href=\"javascript:void(0);\" onClick=\"urlChange('".$value['id']."','".$bdata['attach']."')\">";
	   echo "二维码</a>";
	   echo "</td>";
	   echo "</tr>";
    
  }
		?>
		 
           
        </tbody>
		
		 
	 
	 
	     
	  <tr class="warning">
            <th colspan="10">
               <a href='/shadowsocksr-release.apk'> 安卓ShadowSocksR 软件点此下载(苹果请到商店下载[Shadowrocket][Surge])</a>
            </th>
        </tr>
 
           
         
    
	
</table>

<!-- Modal -->
<div style="position: fixed; height: 256px; width: 256px; border-radius: 5px; background-color: rgba(0, 0, 0, 0.498039); top: 40%; left: 40%; box-shadow: rgb(238, 238, 238) 0px 2px 5px 8px; display: none;" id="qrcode">
    <div style="background-color:white;text-align:right" class="text-right">
        <a href="javascript:void(0)" id="qr-close">
      <!--   <i class="fa fa-times"></i> -->
      x
        </a>&nbsp;
    </div>
    <div class="qr-body"><canvas width="256" height="256"></canvas></div>
</div></div>
                                				</div>
			</div>
                        <div class="col-md-4">
                                                                <div class="panel panel-default">
                                        <div class="panel-heading"><strong>管理产品</strong></div>
                                        <div class="panel-body">
                                                <a href="#modal-modulechangepassword" data-toggle="modal" title="修改密码" class="btn btn-info btn-sm">修改SS连接参数</a>                                                                                        </div>
                                </div>
                                                                <div class="panel panel-default">
                                       <div class="panel-heading"><strong>财务管理</strong> <span class="pull-right"><a href="#modal-modulequest" data-toggle="modal">续费</a></span></div>
                                        <div class="panel-body">
                                                <p><strong>注册日期:</strong><br><?=$bdata['b_time']?></p>
                                                <p><strong>首次付款金额:</strong><br>￥<?=$bdata['b_price']?>.00 RMB</p>
                                                <p><strong>续约价格:</strong><br>￥<?=$bdata['b_price']?>.00 RMB</p> 
                                                <p><strong>下次付款日期:</strong><br><?=$bdata['b_end_time']?></p> 
                                                <p><strong>账单周期:</strong><br>一次性</p>
                                                <p><strong>付款方式:</strong><br>账户余额</p>
                                        </div>
                                </div>
                                                        </div>
		
	</div>
</div></section>
  <?php }
	  ?>
<div class="modal fade" id="modal-modulechangepassword">
	<div class="modal-dialog">
		<form method="post" action="/member/Ssgoods/update/<?=$_GET['id']?>" class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title"><span class="fa fa-lock"></span> 修改参数</h4>
			</div>
			<div class="modal-body">
				<p class="text-warning">您可以在此修改SSR连接参数（注意：修改此密码不会影响您在客户中心的密码）</p>
				<input type="hidden" name="id" value="<?=$bdata['attach']?>">
				
				<div class="row">
				
					<div class="col-md-6">
						<div class="form-group has-feedback">
							<label for="modulenewpw">SSR加密</label>
							
							<select name="ssmethod" class="form-control">
                       
						<?php  
				$list=array('rc4-md5','aes-128-cfb','aes-256-cfb','aes-128-ctr','camellia-256-cfb','chacha20','salsa20','chacha20-ietf');
				foreach($list as $key => $value){  
					$selected = "";
					if($value == str_replace("_compatible","",$data['method'])){
						$selected = 'selected';
					}
					
					echo '<option value="'.$value.'" '.$selected.'>'.$value.'</option>';
				}
						?>
                      </select>
							
							
							<span class="form-control-feedback glyphicon"></span>
						</div>
					</div>
				
					<div class="col-md-6">
						<div class="form-group has-feedback">
							<label for="modulenewpw">SSR协议</label>
							<select name="ssprotocol" class="form-control">
                       
						<?php 

	 
				$list=array('origin','verify_simple','verify_sha1','auth_sha1','auth_sha1_v4','auth_aes128_sha1','auth_aes128_md5');
				foreach($list as $key => $value){  
					$selected = "";
					if($value == str_replace("_compatible","",$data['protocol'])){
						$selected = 'selected';
					}
					
					echo '<option value="'.$value.'" '.$selected.'>'.$value.'</option>';
				}



						?>
                      </select>
							<span class="form-control-feedback glyphicon"></span>
						</div>
					</div>
				
					<div class="col-md-6">
						<div class="form-group has-feedback">
							<label for="modulenewpw">SSR混淆</label>
							<select name="ssobfs" class="form-control">
                       
						<?php 

	
				$list=array('plain','http_simple','http_post','tls_simple','tls1.2_ticket_auth');
				foreach($list as $key => $value){  
					$selected = "";
					if($value == str_replace("_compatible","",$data['obfs'])){
						$selected = 'selected';
					}
					
					echo '<option value="'.$value.'" '.$selected.'>'.$value.'</option>';
				}



						?>
                      </select>
							<span class="form-control-feedback glyphicon"></span>
						</div>
					</div>
				
				
					<div class="col-md-6">
						<div class="form-group has-feedback">
							<label for="modulenewpw">新SS密码</label>
							<input type="text" name="newpw" id="modulenewpw" class="form-control" value="<?=$data['passwd']?>">
							<span class="form-control-feedback glyphicon"></span>
						</div>
					</div>
					 
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">提交修改</button>
				<button type="reset" class="btn btn-default" data-dismiss="modal">取消</button>
			</div>
		</form>
	</div>
</div>
    <div class="modal fade" id="modal-modulequest">
	<div class="modal-dialog">   
		<form method="post" action="/member/Opgoods/renewal/<?=$_GET['id']?>" class="modal-content">
 
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title"><span class="fa fa-lock"></span> 申请续费</h4>
			</div>
			<div class="modal-body">
				<p class="text-warning">您可以随时申请续费，续费后，流量与时间叠加</p>
 
				<div class="row">
					<div class="col-md-6">
						<div class="form-group has-feedback">
							
							  <input type="hidden" name="id" value="<?=$bdata['attach']?>">
							  <input type="hidden" name="renewal_price" value="<?=$bdata['attach']?>">
							  
							  <input type="hidden" name="id" value="<?=$bdata['attach']?>">
							  
							  <strong>续约价格:</strong> ￥<?=$bdata['b_price']?>.00 RMB  
							 <br>
							  <strong>付款方式:</strong>    账户余额  <br> <strong>当前可用余额为：</strong><?=$ydata["money"]?>元
							 
							 
							 
							<span class="form-control-feedback glyphicon"></span>
						</div>
					</div>
					 
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">续费</button>
				<button type="reset" class="btn btn-default" data-dismiss="modal">取消</button>
			</div>
		</form>
		
		
	</div>
</div>
						
	 <div aria-hidden="true" class="modals modals-va-middle fade" id="nodeinfo" role="dialog" tabindex="-1" style="margin-top:4%;">
							<div class="modals-dialog modals-full">
								<div class="modals-content">
									<iframe class="iframe-seamless" title="Modal with iFrame" id="infoifram"></iframe>
								</div>
							</div>
						</div>

 
 
<script>
function urlChange(id,ss_id) {
    var site = '/index.php?action=qcode&id='+id+'&ssid='+ss_id;
	document.getElementById('infoifram').src = site;
	$("#nodeinfo").modal();
}
</script>
		