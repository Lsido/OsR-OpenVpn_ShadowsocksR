
			<section>
	<div class="container">
				
		<div class="page-header">
			<h1>购买新服务 <small>结账</small></h1>
		</div>
		
				
				
				
		
		<script type="text/javascript">
			function toggleLoginForm() {
				if($('#custtype').val() == 'new') {
					$('#custtype').val('existing');
					$('#signupform').fadeToggle('', function() {
						$('#loginform').fadeToggle('slow');
					});
				} else {
					$('#custtype').val('new');
					$('#loginform').fadeToggle('slow', function() {
						$('#signupform').fadeToggle('slow');
					});
				}
			}
		</script>
		
		
		<form method="post" action="/member/check">
			<div class="panel panel-default">
				<div class="panel-heading">您的详情</div>
				<div class="panel-body">
					 
		
					<fieldset id="signupform" class="form-horizontal">
												<div class="row">
							<div class="col-md-6">
								<div class="form-group">
						 			<label class="col-md-4 control-label" for="firstname">名</label>
									<div class="col-md-8">
										<input type="text" name="firstname" id="firstname" value="Customer" disabled="disabled" class="form-control disabled">
									</div>
								</div>
								<div class="form-group">
						 			<label class="col-md-4 control-label" for="lastname">姓</label>
									<div class="col-md-8">
										<input type="text" name="lastname" id="lastname" value="Html" disabled="disabled" class="form-control disabled">
									</div>
								</div>
							 	<div class="form-group">
									<label class="col-md-4 control-label" for="companyname">公司名称（个人请填写姓名）</label>
									<div class="col-md-8">
										<input type="text" name="companyname" id="companyname" value="Html LLC." disabled="disabled" class="form-control disabled">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="email">电子邮件地址</label>
									<div class="col-md-8">
										<input type="text" name="email" id="email" value="<?=$_SESSION['username']?>" disabled="disabled" class="form-control disabled">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-4 control-label" for="email">本次订单总额(元)</label>
									<div class="col-md-8">
										<input type="text" name="email" id="email" value="<?=$cadata['sum']?>" disabled="disabled" class="form-control disabled">
									</div>
								</div>
								
								
								<div class="form-group">
									<label class="col-md-4 control-label" for="email">账户余额(元)</label>
									<div class="col-md-8">
										<input type="text" name="email" id="email" value="<?=round($data['money'],2)?>" disabled="disabled" class="form-control disabled">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-4 control-label" for="email">在线充值</label>
									<div class="col-md-8">
										<a href="/member/onlinepay"><button type="button" class="btn btn-success">闪电充值</button></a>
									</div>
								</div>
								
								
															</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-md-4 control-label" for="address1">联系地址</label>
									<div class="col-md-8">
										<input type="text" name="address1" id="address1" value="Street No.1" disabled="disabled" class="form-control disabled">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="address2">地址（第二行）</label>
									<div class="col-md-8">
										<input type="text" name="address2" id="address2" value="Room 2046" disabled="disabled" class="form-control disabled">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="city">城市</label>
									<div class="col-md-8">
										<input type="text" name="city" id="city" value="Guang Zhou" disabled="disabled" class="form-control disabled">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="state">省</label>
									<div class="col-md-8">
																				<input type="text" id="state" value="Guang Dong" disabled="disabled" class="disabled form-control">
																			</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="postcode">邮编</label>
									<div class="col-md-8">
										<input type="text" name="postcode" id="postcode" value="510000" disabled="disabled" class="form-control disabled">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="country">国家</label>
									<div class="col-md-8">
																				<input type="text" id="country" value="China" disabled="disabled" class="disabled form-control">
																			</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="phonenumber">电话号码</label>
									<div class="col-md-8">
										<input type="text" name="phonenumber" id="phonenumber" value="08618812345678" disabled="disabled" class="form-control disabled">
									</div>
								</div>
							</div>
						</div>
		
								
										
					</fieldset>
				</div>
			</div>
		
					
						
			<div class="panel panel-default">
				<div class="panel-heading">付款方式</div>
				<div class="panel-body">
					<fieldset id="fieldset-payment-method">
											<label class="radio-inline">
							<input type="radio" name="paymentmethod" value="alipay" checked="checked"> 余额支付
						</label>
										</fieldset>
					<script>
					
						$(function() {
							$('input[name=paymentmethod]').change(function() {
								if($(this).hasClass('toggle-creditcard-fields')) {
									$('#fieldset-payment-method-creditcard').show();
								} else {
									$('#fieldset-payment-method-creditcard').hide();
								}
							});
							$('input[name=paymentmethod]:checked').change();
		
							$('input[name=ccinfo]').change(function() {
								if($(this).val() == 'useexisting') {
									$('#cctype').hide();
									$('#ccnumber').hide();
									$('#ccexpiry').hide();
									$('#ccstart').hide();
									$('#ccissue').hide();
									$('#ccstore').hide();
								} else {
									$('#cctype').show();
									$('#ccnumber').show();
									$('#ccexpiry').show();
									$('#ccstart').show();
									$('#ccissue').show();
									$('#ccstore').show();
								}
							});
							$('input[name=ccinfo]:checked').change();
						});
					
					</script>
					<fieldset id="fieldset-payment-method-creditcard" style="display: none;">
						<hr>
												<input type="hidden" name="ccinfo" value="new">
												<div class="well well-sm">
							<div class="row">
								<div class="col-md-6" id="cctype">
									<div class="form-group">
										<label>卡片类型</label>
										<select name="cctype" class="form-control">
																						<option>Visa</option>
																						<option>MasterCard</option>
																						<option>Discover</option>
																						<option>American Express</option>
																						<option>JCB</option>
																						<option>EnRoute</option>
																						<option>Diners Club</option>
																					</select>
									</div>
								</div>
								<div class="col-md-6" id="ccnumber">
									<div class="form-group">
										<label>信用卡号码</label>
										<input type="text" name="ccnumber" value="" autocomplete="off" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6" id="ccexpiry">
									<div class="form-group">
										<label>失效日期</label>
										<div class="row">
											<div class="col-md-5">
												<select name="ccexpirymonth" id="ccexpirymonth" class="form-control">
																										<option>01</option>
																										<option>02</option>
																										<option>03</option>
																										<option>04</option>
																										<option>05</option>
																										<option>06</option>
																										<option>07</option>
																										<option>08</option>
																										<option>09</option>
																										<option>10</option>
																										<option>11</option>
																										<option>12</option>
																									</select>
											</div>
											<div class="col-md-2 text-center">
												<p class="help-block">/</p>
											</div>
											<div class="col-md-5">
												<select name="ccexpiryyear" class="form-control">
																										<option>2017</option>
																										<option>2018</option>
																										<option>2019</option>
																										<option>2020</option>
																										<option>2021</option>
																										<option>2022</option>
																										<option>2023</option>
																										<option>2024</option>
																										<option>2025</option>
																										<option>2026</option>
																										<option>2027</option>
																										<option>2028</option>
																										<option>2029</option>
																									</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6" id="cccvv">
									<div class="form-group">
										<label>CVV/CVC2 号码</label>
										<div class="row">
											<div class="col-md-4">
												<input type="text" name="cccvv" value="" class="form-control" size="5" autocomplete="off">
											</div>
											<div class="col-md-8">
												<span class="help-block"><a href="#" onclick="window.open('images/ccv.gif','','width=280,height=200,scrollbars=no,top=100,left=100');return false">从哪找到？</a></span>
											</div>
										</div>
									</div>
								</div>
							</div>
														<div class="form-group" id="ccstore">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="nostore"> 如果您不想让我们存储您的信用卡信息以自动续费，请选择此项
									</label>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
		
						<div class="panel panel-default">
				<div class="panel-heading">备注/额外信息</div>
				<div class="panel-body">
					<div class="text-center form-group">
						<p>您可以输入任何您想包含在订单中的额外注释或信息……</p>
						<textarea name="notes" rows="4" class="form-control"></textarea>
					</div>
				</div>
			</div>
					
		
			<div class="well well-sm text-center">
								<div class="form-group">
					<input type="submit" class="btn btn-primary" value="完成订购" onclick="this.value='请稍后……'">
				</div>
				<p class="text-center">
					这个订单可以被安全的使用，以防诈骗，您的目前 IP (<strong><?php echo getRealIp();?></strong>) 已经记录到日志中。
				</p>
			</div>
		
		
		</form>
			</div>
</section>
