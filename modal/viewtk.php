<section>
	<div class="container">
				<div class="page-header">
			<h1>查看服务单 #<?=$_GET['id']?></h1>
		</div>
		
				
		<h2><?=$data['w_title']?></h2>
		
		<div class="row text-center">
			<div class="col-md-3">
				<div class="well well-sm">
					<span class="lead">更新</span>
					<div><?=$data['w_endtime']?></div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="well well-sm">
					<span class="lead">部门</span>
					<div>售后咨询</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="well well-sm">
					<span class="lead">优先级别</span>
					<div>中</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="well well-sm">
					<span class="lead">状态</span>
					<div><span style="color:#779500">开启</span></div>
				</div>
			</div>
		</div>
		
		<div class="margin-bottom">
			<a href="#" class="btn btn-default" onclick="history.go(-1);" title="« 返回">« 返回</a> 
			<button type="button" class="btn btn-primary" onclick="$('#replycontainer').slideToggle().removeClass('hide');">回复</button> 
			<a href="/member/viewtk/close/<?=$_GET['id']?>" class="btn btn-danger" title="关闭服务单">关闭服务单</a>		</div>
		 
		<form method="post" action="/member/viewtk/<?=$_GET['id']?>" id="replycontainer" class="panel panel-default hide">
			<div class="panel-body">
				<div class="row form-group">
					<div class="col-md-4">
						<label for="name">姓名</label>
												<input class="disabled form-control" type="text" id="name" value="Customer" disabled="disabled">
											</div>
					<div class="col-md-4">
						<label for="email">Email</label>
												<input class="form-control disabled" type="text" id="email" value="<?=$_SESSION['username']?>" disabled="disabled">
											</div>
				</div>
				<div class="row form-group">
					<div class="col-md-12">
						<label for="message">信息</label>
						<textarea name="replymessage" id="message" rows="12" class="form-control"></textarea>
					</div>
				</div>
				<div class="text-center">
																		<div class="col-md-3 col-md-offset-3">
										<input type="text" name="captcha_img" class="form-control input-sm" maxlength="5">
									</div>
									<div class="col-md-6 text-left">
										<img src="/api/vicode.php?r=<?php echo rand(); ?>" name="captcha_img" alt="captcha" style="margin-bottom: 20px;">
										<a href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='/api/vicode.php?r='+Math.random()"> 换一个?</a>
									</div>
																	</div>
				<div class="form-group text-center">
					<button class="btn btn-primary" onclick="$('#modalpleasewait').modal();">提交</button>
				</div>
			</div>
		</form>
		
		<div class="ticketreplys">
					<div class="well well-sm" style="margin-bottom:0">
				<span class="pull-right"><?=$data['w_starttime']?></span>
				Customer
							<span class="label label-info">客户</span>
						</div>
			<div class="ticketreply clearfix">
				<p><?=$data['w_content']?><br>
</p>

		<?php 
			if($data['w_image1']){
		?>
		<img src='<?=$data['w_image1']?>' style="width:30%;height:30%" />
	 	 
	
						
			<?php 
 }

			$sql = "select * from web_word where to_w_id = ? ORDER BY w_endtime ASC";
			$params = array($_GET['id']);
			$data = $pdo->getSome($sql, $params);
			foreach($data as $value){
				  
				if($value['w_user']=="admin"){$hf="<span class='label label-danger'>管理员</span>";}else{$hf="<span class='label label-info'>".$value['w_user']."</span>";}
				echo "<div class='well well-sm' style='margin-bottom:0'><span class='pull-right'>".$value['w_endtime']."</span>";
				echo "";
				echo "$hf</div>";
				echo "<div class='ticketreply clearfix'>";
				echo "<p>".$value['w_content']."<br><br>----------------------------<br>";
				echo "IP Address: ".getRealIp()."</p>";
				echo "</div>";
 
				
			}

			?>
						
						
						
						
				</div>
		
		<div class="modal fade" id="modalpleasewait">
			<div class="modal-dialog">
				<div class="modal-content">
				   <div class="modal-header text-center">
				      <h3> 请稍后……</h3>
				   </div>
				</div>
			</div>
		</div>
		
		<script type="text/javascript">
		
		$(function() { 
			$('.rating.interactive').mouseleave(function() {
				$(this).children().removeClass('selected');
			});
			$('.rating.interactive span').mouseover(function() {
				$(this).addClass('selected');
				$(this).prevAll().addClass('selected');
				$(this).nextAll().removeClass('selected');
			});
		});
		
		</script>
		
			</div>
</section>