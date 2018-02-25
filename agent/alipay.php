
        <div class="static-content-wrapper">
        <div class="static-content">
            <div class="page-content">
              <div class="container-fluid">
                <div style="height:16px"></div>
<link type="text/css" href="//cdn.bootcss.com/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet">
<link type="text/css" href="../admin/css/ion.rangeSlider.css" rel="stylesheet">                    <!-- Ion Range Slider -->
<link type="text/css" href="../admin/css/ion.rangeSlider.skinModern.css" rel="stylesheet">           <!-- Ion Range Slider Default Skin -->
<style>
    .slider-vertical-value {margin-bottom: 10px}
    .ui-slider.ui-widget-content {margin-top: 12px !important;}
    .mlt10{margin-left: 10px !important}
    .js-irs-0,.js-irs-1{margin-left: 10px !important;margin-top: -10px !important;}
    .label-success {background-color: rgba(139,195,74,0.76);}
</style>

        <!-- NAVI -->
        <div class="page-tabs">
            <ul class="nav nav-tabs">
				<li><a href='#alipay' data-toggle='tab'>在线充值</a></li>
            </ul>
        </div>
        <div class="tab-content">
           
			<link rel="stylesheet" href="../admin/css/payway.css">
			 
			<script type="text/javascript">
    
     function alipay()
	 {
		 $("#txtbanktype").val("alipay");
	 }
	 function weixin()
	 {
		 $("#txtbanktype").val("WEIXINWAP");
	 }
	 function tenpay()
	 {
		 $("#txtbanktype").val("TENPAYWAP");
	 }
	 function qq()
	 {
		 $("#txtbanktype").val("QQWAP");
	 }
</script>
			<div class="tab-pane active" id="alipay">

               <div class="box box-product">

			   
			   
			   <div class="panel" id="expensehome">
<div class="panel-body">
<form id="regform" name="f" method="post" target="_blank" action="../bank/pay.php">
<input style="display: none" type="text" name="paymode" id="txtbanktype" />
<div class="tab-content" style="padding: 12px 12px">
<div class="tab-pane active pay-list">
<div class="row">
<div class="form-group">
<div class="col-sm-12 mb40">
 <div class="form-group">
    <label>请输入数额:</label>
    <input type="text" class="form-control" name="v_amount" placeholder="请输入数额">
  </div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-3">
<a href="#" class="shortcut-tile tile-white">
<div class="tile-body">
<div class="icon-default icon-ali" channel="ALIPAY" onclick="alipay()"></div>
</div>
</a>
</div>
<div class="col-md-3">
<a href="#" class="shortcut-tile tile-white">
<div class="tile-body">
<div class="icon-default icon-wx" channel="WEIXIN" onclick="weixin()"></div>
</div>
</a>
</div>
<div class="col-md-3">
<a href="#" class="shortcut-tile tile-white">
<div class="tile-body">
<div class="icon-default icon-ten" channel="TENPAY" onclick="tenpay()"></div>
</div>
</a>
</div>
<div class="col-md-3">
<a href="#" class="shortcut-tile tile-white">
<div class="tile-body">
<div class="icon-default icon-qq" channel="QQ" onclick="qq()"></div>
</div>
</a>
</div>
</div>
</div>
<input name="payuser" type="hidden" ID="id" value="<?php echo $_SESSION["dusername"];?>" >
<br>
<button type="submit" class="btn btn-lg btn-primary-alt btn-label pull-right"><i class="fa fa-cny"></i><span style="margin-left:-16px">支付订单</span></button>
</div>
</form>
</div>
</div>
		<script type="text/javascript" src="../admin/css/expense.js"></script>	
			
			
			
			
        </div>


						</div>
            </div>
          </div>
 
				 