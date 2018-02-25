 
 
<section>
	<div class="container">
		<h1>提交服务单</h1>
		
				 
		<form name="submitticket" method="post" action="/member/supportticket">
 
			<input type="hidden" name="step" value="3">
			<div class="row form-group">
				<div class="col-md-4">
					<label for="name">姓名</label>
										<input class="form-control disabled" type="text" id="name" value="Customer" disabled="disabled">
									</div>
				<div class="col-md-4">
					<label for="email">Email</label>
										<input class="form-control disabled" type="text" id="email" value="<?=$_SESSION['username']?>" disabled="disabled">
									</div>
			</div>
			<div class="form-group">
				<label for="subject">主题</label>
				<input class="form-control" type="text" name="subject" id="subject" value="">
			</div>
			<div class="row form-group">
				<div class="col-md-3">
					<label for="department">部门</label>
					<select name="deptid" id="department" class="form-control" onchange="getCustomFields()">
												<option value="1" selected="selected">售后咨询</option>
											</select>
				</div>
				<div class="col-md-3">
					<label for="priority">优先级别</label>
					<select name="urgency" id="priority" class="form-control">
						<option value="1">高</option>
						<option value="2" selected="selected">中</option>
						<option value="3">低</option>
					</select>
				</div>
								<div class="col-md-6">
					<label for="relatedservice">相关服务</label>
					<select name="relatedservice" id="relatedservice" class="form-control">
						<option value="">没有</option>
											 
												
												<?php 

						$sql = "select * from web_bill where user_name = ? ";
						$params = array($_SESSION['username']);
						$data = $pdo->getSome($sql, $params);
						foreach($data as $value){
							if($value['b_i']==1){$i="有效的";}else{$i="无效的";}
							echo "<option value='".$value['attach']."'>".$value['b_name']." ($i)</option>";
							
						}


												?>
												
												
											</select>
				</div>
							</div>
			<div class="form-group">
				<label for="message">信息</label>
				<textarea name="message" id="message" rows="12" class="form-control"></textarea>
			</div>
			<!-- <div id="attachments"> -->
				<!-- <h4>附件</h4> -->
				<!-- <div class="form-group"> -->
					<!-- <input type="file" name="attachments[]"> -->
				<!-- </div> -->
			<!-- </div> -->
			<!-- <script type="text/javascript"> -->
			
			<!-- function extraAttachment() { $("#attachments").append('<div class="form-group"><input type="file" name="attachments[]"></div>');} -->
			
			<!-- </script> -->
			<!-- <a href="javascript:void(0)" onclick="extraAttachment();"><span class="fa fa-plus-circle"></span> 添加更多</a> -->
			<!-- (允许文件后缀: .jpg, .gif, .jpeg, .png) -->
		
			<!-- <div id="searchresults" style="display:none;"></div> -->
		<div class="text-center">
																		<div class="col-md-3 col-md-offset-3">
										<input type="text" name="captcha_img" class="form-control input-sm" maxlength="5">
									</div>
									<div class="col-md-6 text-left">
										<img src="/api/vicode.php?r=<?php echo rand(); ?>" name="captcha_img" alt="captcha" style="margin-bottom: 20px;">
										<a href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='/api/vicode.php?r='+Math.random()"> 换一个?</a>
									</div>
																	</div>
					
			<div class="form-group" style="text-align: center;">
				<input class="btn btn-primary" type="submit" name="save" value="提交" onclick="$('#modalpleasewait').modal();">
				<button class="btn btn-default" type="reset">取消</button>
			</div>
		
		</form>
		
		<div class="modal hide fade in" id="modalpleasewait">
			<div class="modal-header text-center">
				<img src="images/loadingsml.gif" style="vertical-align:baseline">
				<span class="lead">请稍后……</span>
			</div>
		</div>

				
		<script language="javascript">
			var currentcheckcontent,lastcheckcontent;
			function getticketsuggestions() {
				currentcheckcontent = jQuery("#message").val();
				if (currentcheckcontent!=lastcheckcontent && currentcheckcontent!="") {
					jQuery.post("submitticket.php", { action: "getkbarticles", text: currentcheckcontent }, function(data) {
						if (data) {
							jQuery("#searchresults").html(data);
							jQuery("#searchresults").slideDown();
						}
					});
					lastcheckcontent = currentcheckcontent;
				}
				setTimeout('getticketsuggestions();', 3000);
			}
			getticketsuggestions();
		</script>
		
		
		
		<script language="javascript">
			$( document ).ready(function() { getCustomFields(); });
			function getCustomFields() {
				jQuery("#department").prop('disabled', true);
				jQuery("#customFields").load("submitticket.php", { action: "getcustomfields", deptid: jQuery("#department").val() });
				jQuery("#customFields").slideDown();
				jQuery("#department").prop('disabled', false);
			}
		</script>
		
	</div>
</section>




 