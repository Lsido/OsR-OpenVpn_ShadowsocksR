 

<section>
	<div class="container">
             
			 
			 
			 <div id="pageBody" style='margin-top:-5%;'>


<h4 class="page-header" style="margin-top:100px;">帐户充值</h4>

    <div class="alert alert-warning">
如您的不支持『在线支付』,请使用【<a href="#" target="_blank">其他支付方式</a>】通知我们的工作人员.<br><br>

 即刻成为VIP代理，享超低价商品，无限开通下级子账号，详情<a data-toggle="modal" data-target="#myModal" >点击查看</a> 

</div> 

<div style="color:#4796f2; font-weight:bold; margin-bottom:20px; font-size:14px;">其他支付方式:<a style="text-decoration:underline" target="_blank">QQ红包，线下汇款，微信转账</a></div>

<form method="post" name="form1" action="/bank/pay.php" target="_blank" onsubmit="return checkform(this);">
	<input type="hidden" name="payuser" value="<?=$_SESSION['username']?>">
	 
<table width="100%" class="table">
          <tbody><tr> 
            <th>支付用户</th>
            <td> 
              <?=$_SESSION['username']?></td>
          </tr>
		  <tr> 
            <th>账户余额</th>
            <td> 
              <?=round($data['money'],2)?> 元</td>
          </tr>
          <tr> 
            <th>支付金额</th>
            <td><input name="v_amount" type="text" id="v_amount" size="10" value="5">
最少充值5元人民币</td>
          </tr>
        </tbody></table>


<ul class="nav nav-tabs" id="payment_nav">
    
<li class="active"><a id="1_paymode_nav" href="#tab1_content" data-toggle="tab">支付平台</a></li>
<li class=""><a id="2_paymode_nav" href="#tab2_content" data-toggle="tab">在线支付</a></li>
<li class=""><a id="4_paymode_nav" href="#tab4_content" data-toggle="tab">微信支付</a></li>
</ul>
    <div class="tab-content">

	<div id="tab1_content" class="tab-pane panel-body active">
	 	 <input type="radio" name="paymode" value="ALIPAY" checked=""><a href="https://www.alipay.com" border="0" target="_blank"><img src="https://sudu.cn/images/pay/alipay.gif" alt="支付宝支付" border="0"></a>
	     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
 <input type="radio" name="paymode" value="QQ"><a href="httpss://qpay.qq.com/" border="0" target="_blank"><img src="/static/images/qqpay.png" alt="QQ钱包" border="0"></a>
	     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 
		 
    <button id="paymode" onclick="return morepay()" style="background: white; display: none;"><font color="#428BCA" style="font-style:italic;">更多支付方式</font></button>
    
    <span id="morepay" style="">
    <input type="radio" name="paymode" value="TENPAY"><a href="httpss://www.tenpay.com/" border="0" target="_blank"><img src="https://sudu.cn/images/pay/tenpay.gif" alt="财付通支付" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="paymode" value="BANKWAP"><a href="httpss://www.shengpay.com/" border="0" target="_blank"><img src="https://sudu.cn/images/pay/chyl.gif" alt="银联在线" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;			

	<span class="red">信用卡大额支付可多次充值到快钱账户后再支付。</span>
   	</span>	
	<br>
	
          </div><!-- /#tab1_content -->
      <div id="tab2_content" class="tab-pane panel-body">
				<label><input type="radio" name="paymode" value="ICBC"><img src="https://sudu.cn/images/bank_logo/bank_icbcb2c.gif" alt="中国工商银行" border="1"></label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="paymode" value="CCB"><img src="https://sudu.cn/images/bank_logo/bank_ccb.gif" alt="中国建设银行" border="1"></label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="paymode" value="ABC"><img src="https://sudu.cn/images/bank_logo/bank_abc.gif" alt="中国农业银行" border="1"></label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="paymode" value="COMM"><img src="https://sudu.cn/images/bank_logo/bank_comm.gif" alt="交通银行" border="1"></label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="paymode" value="BOCB2C"><img src="https://sudu.cn/images/bank_logo/bank_bocb2c.gif" alt="中国银行" border="1"></label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="paymode" value="PSBC-DEBIT"><img src="https://sudu.cn/images/bank_logo/bank_psbc-debit.gif" alt="中国邮政储蓄银行" border="1"></label>&nbsp;&nbsp;&nbsp;&nbsp;<br><br><label><input type="radio" name="paymode" value="CMB"><img src="https://sudu.cn/images/bank_logo/bank_cmb.gif" alt="招商银行" border="1"></label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="paymode" value="CITIC"><img src="https://sudu.cn/images/bank_logo/bank_citic.gif" alt="中信银行" border="1"></label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="paymode" value="CIB"><img src="https://sudu.cn/images/bank_logo/bank_cib.gif" alt="兴业银行" border="1"></label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="paymode" value="CEBBANK"><img src="https://sudu.cn/images/bank_logo/bank_cebbank.gif" alt="中国光大银行" border="1"></label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="paymode" value="CMBC"><img src="https://sudu.cn/images/bank_logo/bank_cmbc.gif" alt="中国民生银行" border="1"></label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="paymode" value="SPDB"><img src="https://sudu.cn/images/bank_logo/bank_spdb.gif" alt="上海浦东发展银行" border="1"></label>&nbsp;&nbsp;&nbsp;&nbsp;<br><br><label><input type="radio" name="paymode" value="GDB"><img src="https://sudu.cn/images/bank_logo/bank_gdb.gif" alt="广东发展银行" border="1"></label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="paymode" value="SDB"><img src="https://sudu.cn/images/bank_logo/bank_sdb.gif" alt="深圳发展银行" border="1"></label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="paymode" value="HZCBB2C"><img src="https://sudu.cn/images/bank_logo/bank_hzcbb2c.gif" alt="杭州银行" border="1"></label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="paymode" value="SHBANK"><img src="https://sudu.cn/images/bank_logo/bank_shbank.gif" alt="上海银行" border="1"></label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="paymode" value="NBBANK"><img src="https://sudu.cn/images/bank_logo/bank_nbbank.gif" alt="宁波银行" border="1"></label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="paymode" value="SPABANK"><img src="https://sudu.cn/images/bank_logo/bank_spabank.gif" alt="深圳平安银行" border="1"></label>&nbsp;&nbsp;&nbsp;&nbsp;<br><br><label><input type="radio" name="paymode" value="BJRCB"><img src="https://sudu.cn/images/bank_logo/bank_bjrcb.gif" alt="北京农村商业银行" border="1"></label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="paymode" value="FDB"><img src="https://sudu.cn/images/bank_logo/bank_fdb.gif" alt="富滇银行" border="1"></label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="paymode" value="BJBANK"><img src="https://sudu.cn/images/bank_logo/bank_bjbank.gif" alt="北京银行" border="1"></label>&nbsp;&nbsp;&nbsp;&nbsp;</div><!-- /#tab2_content -->

	<div id="tab4_content" class="tab-pane panel-body">
    	<div class="pay_fs"><input type="radio" name="paymode" value="WEIXIN"><a href="#" border="0"><img src="https://sudu.cn/images/pay/alipay-weixin.gif" alt="微信支付" border="0"></a><b class="pay_note">（2%手续费, 自动到账）</b></div>
    	 
    </div><!-- /#tab4_content -->

</div>
<p style="text-align:center;margin:2em auto">
    <input type="submit" id="submit_btn" class="btn btn-primary" value="开始支付>>">
    </p>
    </form></div>
			
	
			</div>
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					预存款享VIP代理服务
				</h4>
			</div>
			<div class="modal-body">
			 我们提供的营业网点平台超级的渠道赢利体系SCP(Super Channel Provider) 是一个和主站点一模一样的网站（当然，您可以自定义您的分站），同时您还将拥有属于您的代理平台，您只要在官网中有足够的预付款，则您可以随心所欲的创建子账户，且您的用户可以在您的分站进行任何即时交易。
			 <br><br>
			 预存款等级折扣表：<br><br>
			 
			 
			 
			   <div class="table-responsive">
           
             
                      
                                  <table class="table table-striped table-hover table-bordered" style="overflow-y: hidden">    
                    <thead>
                    <tr>
                      <th>等级</th>
					  <th>折扣百分比</th>
                        <th>预存款额</th>
                    </tr>
                    </thead>
                    <tbody>
                            
					
				<?php
 

 
 
$sql = "select * from web_agent_grd";
$data = $pdo->getSome($sql);
 
foreach($data as $value)
  {
		$Z_k = $value['discount']*100;
		echo "<tr>";
		echo "<td>".is_grd($value['id'])."</td>";
		echo "<td>".$Z_k."%</td>";
		echo "<td>".$value['deposit']." 元</td>";
		echo "</tr>";
  
  }
 

  
    
   
  
 
 
 
 

?>
					
					 




				 

					
					 </tbody>

                </table>
				</div>
			 
			 
			 
			 
		 
			 <a class="btn btn-primary btn-block" target="_blank" style="color: white;" href="/member/login">代理平台登录</a>
			 
			  
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">关闭
				</button>
				<a target="_blank" style="color: white;" href="/member/request" class="btn btn-primary">
					申请开通
				</a>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>
</section>

 