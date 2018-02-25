<section>
	<div class="container">
		<h1>申请成为代理</h1>
		
		<ul class="nav nav-tabs" style="margin-bottom: 30px;">
			 
			<li class="active"><a href="clientarea.php?action=changepw">提交申请单</a></li>
					</ul>
  <div class="alert alert-warning">
注意：申请成功后，您将会获得一个您在下方创建的代理账户，当前用户下余额将转换为代理账户预存款<br>
	  申请后代理等级无法变更，如需提升等级请联系客服！<br>
	  创建完成后，请自行退出当前账户，在客户登录页面登录代理账户即可！
</div> 
		<form class="form-horizontal" method="post" action="">
 
			<div class="form-group">
				<label class="col-md-2 control-label" for="existingpw">当前余额</label>
				<div class="col-md-4">
					<input type="text" name="money" id="money" class="form-control" value="<?=round($ydata['money'],2)?>" disabled="disabled">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label" for="password">可申请代理等级</label>
				<div class="col-md-4">
					<input type="text" name="grd" id="grd" class="form-control" value="<?php if($grd_id){echo is_grd($grd_id);}else{echo "余额不足"; }?>" disabled="disabled">
				</div>
				<div class="col-md-6">
					<div class="help-block"></div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label" for="agent_username">创建代理用户名</label>
				<div class="col-md-4">
					<input type="text" name="agent_username" id="agent_username" class="form-control">
				</div>
				<div class="col-md-6">
					<div class="help-block"></div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label" for="agent_password">密码</label>
				<div class="col-md-4">
					<input type="text" name="agent_password" id="agent_password" class="form-control">
				</div>
				<div class="col-md-6">
					<div class="help-block"></div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4 col-md-offset-2">
					<input class="btn btn-primary" type="submit" name="submit" value="保存修改">
					<input class="btn btn-default" type="reset" value="取消">
				</div>
			</div>
		</form>
		
		
		
		 
		
	</div>
</section>