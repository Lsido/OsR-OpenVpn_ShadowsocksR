 <section>
 
	 <div class="container">
		<h1>购买新服务 <small>产品配置</small></h1>
		
		<p>您选择的产品/服务有以下配置选项供您选择。</p>
		
				
		
		<form method="post" action="/member/confproduct/cart/<?=$_GET['id']?>">
		
						<h3>产品/服务</h3>
			<div class="well well-sm">
				<strong><?=$pdt?> - <?=$data['pd_name']?></strong>
				<p><?=$data['pd_llvalues']?>G流量 <?=$data['pd_time']?>天<br>
				
				<?php 


				if($data['pd_tid']==1){echo "中国，美国、日本、香港、新加坡、台湾、韩国、英国等节点";}elseif($data['pd_tid']==2){echo "全国移动、联通、电信 90%地区可进行OpenVPN免流量上网服务";}


				?>
				 
				
				<br>流量套餐不限终端使用(同时仅可单一终端)<br>同时支持手机、电脑和平板</p>
			</div>
		
			<h3>账单周期</h3>
			<fieldset class="well well-sm form-inline">
				<input type="hidden" name="previousbillingcycle" value="monthly">
								<div class="form-group">
					<select name="billingcycle" onchange="submit()" class="form-control">
						<option value="monthly" selected="selected">￥<?=$data['pd_price']?> RMB <?=$data['pd_time']?>天</option>																																			</select>
				</div>
							</fieldset>
					
					
						<h3>配置选项</h3>
			<p>此产品/服务有一些额外选项，您可以从下面选择来自定义您的订单。</p>
			<fieldset class="well well-sm form-horizontal">
								<div class="form-group">
					<label class="col-md-2 control-label" for="流量GB/天">流量GB/天</label>
										<div class="col-md-4">
						<select id="流量GB/月" name="configoption[1]" class="form-control">
													<option value="1" selected="selected"><?=$data['pd_llvalues']?>GB<?=$data['pd_time']?>天</option>
												</select>
					</div>
									</div>
							</fieldset>
					
					
						<h3>附加信息</h3>
			<p>此产品/服务需要您提供一些额外信息，以方便我们处理您的订单。</p>
			
	<?php	
	
		if($data['pd_tid']==1){
		$pdt="ShadowSocksR";
		
			 ?>
			<fieldset class="well well-sm form-horizontal">
								<div class="form-group">
					<label class="col-md-2 control-label">SSR连接密码</label>
					<div class="col-md-10">
						<input type="text" class="form-control" name="SsPass" value="<?php echo GetStr(5).date('s');?>" size="30">
						<span class="help-inline">仅支持字母或者数字</span>					</div>
						
					 
					 
						
				</div>
				
				<div class="form-group">
					<label class="col-md-2 control-label">SSR加密方式</label>
					<div class="col-md-10">
						
						
						<select name="state" class="form-control">
                       
						<?php 

	
	echo "<option value='1'>rc4-md5</option>";
	echo "<option value='2'>chach20</option>";
	echo "<option value='3'>aes-128-ctr</option>";
	echo "<option value='4'>aes-128-cfb</option>";
	echo "<option value='5' selected>aes-256-cfb</option>";
	echo "<option value='6'>salsa20</option>";
	echo "<option value='7'>cemellia-256-cfb</option>";
	echo "<option value='8'>aes-128-ctr</option>";
	echo "<option value='9'>chacha20-ietf</option>";
 

						?>
                      </select>
						
						<span class="help-inline">默认即可</span>					</div>
						
					 
					 
						
				</div>
				
				
				<div class="form-group">
					<label class="col-md-2 control-label">SSR协议</label>
					<div class="col-md-10">
						
						
						<select name="state" class="form-control">
                       
						<?php 

	
	echo "<option value='1'>origin</option>";
	echo "<option value='2' selected>auth-sha1</option>";
	echo "<option value='3'>auth-sha1_v2</option>";
	echo "<option value='4'>auth-sha1_v4</option>";
	echo "<option value='5'>verify_simple</option>";
	echo "<option value='6'>verify_sha1</option>";




						?>
                      </select>
						
						<span class="help-inline">默认即可</span>					</div>
						
					 
					 
						
				</div>
				
				
				<div class="form-group">
					<label class="col-md-2 control-label">SSR混淆</label>
					<div class="col-md-10">
						
						
						<select name="state" class="form-control">
                       
						<?php 

	
	echo "<option value='1'>plain</option>";
	echo "<option value='2' selected>http_simple</option>";
	echo "<option value='3'>http_post</option>";
	echo "<option value='4'>tls_simple</option>";
	echo "<option value='5'>tls1.2_ticket_auth</option>";
	 




						?>
                      </select>
						
						<span class="help-inline">默认即可</span>					</div>
						
					 
					 
						
				</div>
				
							</fieldset>
					 <?php
					 
					 }
		elseif($data['pd_tid']==2){
			 
			?>
			
			
			<fieldset class="well well-sm form-horizontal">
				<div class="form-group">
					<label class="col-md-2 control-label">OPENVPN连接账户</label>
					<div class="col-md-10">
						<input type="text" class="form-control" id="Ouser" name="Ouser" value="<?php echo generate_code(6);?>" size="30">
						<span class="help-inline">仅支持字母或者数字</span>		<span id="chk"></span> 			</div>
				</div>
				
			 
				<div class="form-group">
					<label class="col-md-2 control-label">OPENVPN连接密码</label>
					<div class="col-md-10">
						<input type="text" class="form-control" name="Opass" value="<?php echo generate_code(6);?>" size="30">
						<span class="help-inline">仅支持字母或者数字</span>					</div>
				</div>
				
				
				 
				
				 
				
							</fieldset>
			
			
			<?php 
			
			
			}
					 
					 ?> 
			<div class="text-center form-group">
				<a href="cart.php" title="查看购物车" class="btn btn-info">查看购物车</a>
				<button type="submit" class="btn btn-primary">添加到购物车</button>
			</div>
		
		</form>
	</div>
	
	
</section>

 