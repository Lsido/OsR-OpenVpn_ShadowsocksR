<?php if(!$p){exit();} ?> 
	   
	     <div class="static-content-wrapper">
         <div class="static-content">
            <div class="page-content">
              <div class="container-fluid">
                <div style="height:16px"></div>
<div class="page-tabs" id="page-tabs">
  <ul class="nav nav-tabs">
    <li class="">
      <a href="index.php?action=shop" aria-expanded="true">流量商城</a></li>
	   <li class="">
     <a href="index.php?action=add_shop" aria-expanded="true">产品添加</a></li>
   
  </ul>
</div>

<div class="alert alert-info">您可以在此添加用户商品，请注意。</div>
<div class="alert alert-dismissable alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h3>重要!</h3>
	<p>如前台显示不正常，请到后台重新删除，添加。设置套餐请自行测试。</p>
	<p>数量也只填数字，流量单位GB，流量设置为999时，默认为无限流量用户</p>
	 
</div>
	<h6><b>注意：</b>添加商品前请先添加子类类型</h6>
	
	<form class="form-horizontal" action="?action=add_shop&c=addpd" method="post">
		<input type="hidden" name="do" value="add_form">
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
				<tr>
					<th>参数</th>
					<th>值</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>商品类型</td>
					<td> <select name="state" class="form-control">
                       
						 
						 
				
                       
					<?php 


							$sql = "select * from web_pdtype";
 
							$data = $pdo->getSome($sql);
							foreach($data as $value){
								
								echo "<option value='".$value['id']."-".$value['type_id']."'>".$value['type_name']."</option>";
								
							}
							


											?>
						 
                      </select>
						
						  
					</td>	 <a href="javascript:;" onclick="add_pdtype();" class="btn btn-success">添加分类</a>
				</tr>
				<tr>
					<td>产品名：</td>
					<td><input type="text" name="pdname" class="form-control" required></td>
				</tr>
				<tr>
					<td>数量(单位:GB)：</td>
					<td><input type="text" name="num" class="form-control" required></td>
				</tr>
				<tr>
					<td>时效(单位:天)：</td>
					<td><input type="text" name="tian" class="form-control" required></td>
				</tr>
				<tr>
					<td>单价(单位:元)：</td>
					<td><input type="text" name="price" class="form-control" required></td>
				</tr>
				<tr>
					<td>特别说明：</td>
					<td> 
					
					<textarea class="form-control" cols="5" id="field-5" name="content" rows="3"></textarea>
					
					</td>
				</tr>
				</tbody>
			</table>
		</div>
		<input type="submit" class="btn btn-primary" value="产品添加">
	</form>


						</div>
            </div>
          </div>
			


					<br>
				<!-- footer.php -->
					<?php include_once('modal/footer.php');   ?>
					<!-- footer.php -->
        </div>
      </div>
    </div> 
<!-- /Switcher -->
<!-- Load site level scripts -->
<script type="text/javascript" src="css/prettify.js"></script> 				<!-- Code Prettifier  -->
<script type="text/javascript" src="css/bootstrap-switch.js"></script> 		<!-- Swith/Toggle Button -->
<script type="text/javascript" src="css/bootstrap-tabdrop.js"></script>  <!-- Bootstrap Tabdrop -->
<script type="text/javascript" src="css/jquery.sparkline.min.js"></script><!-- Sparkline -->

<script type="text/javascript" src="css/icheck.min.js"></script>     					<!-- iCheck -->
<script type="text/javascript" src="css/enquire.min.js"></script> 									<!-- Enquire for Responsiveness -->
<script type="text/javascript" src="css/bootbox.js"></script>							<!-- Bootbox -->
<script type="text/javascript" src="css/jquery.nanoscroller.min.js"></script> <!-- nano scroller -->
<script type="text/javascript" src="css/jquery.mousewheel.min.js"></script> 	<!-- Mousewheel support needed for jScrollPane -->
<script type="text/javascript" src="css/application.js"></script>
<script type="text/javascript" src="css/demo.js"></script>
<!-- End loading site level scripts -->
	<!-- Load page level scripts-->
	
	<script src="css/jquery.flot.min.js"></script>             <!-- Flot Main File -->
	<script src="css/jquery.flot.resize.js"></script>          <!-- Flot Responsive -->
	<script src="css/jquery.flot.tooltip.min.js"></script>    <!-- Flot Tooltips -->
	<!-- End loading page level scripts </script> 	 -->

	<script type="text/javascript">
function add_pdtype(){	
 
layer.open({
  type: 1,
  skin: 'layui-layer-demo', //样式类名
  closeBtn: 0, //不显示关闭按钮
  anim: 2,
  area: ['90%','70%'],
  shadeClose: true, //开启遮罩关闭
  content: '<div class=""><div class=""><div class="panel panel-default"><div class="panel-body"><p style="text-align: center;">添加网站用户</p><form class="modal-body form-horizontal"action="?action=add_shop&c=addtype"method="post"><div class="form-group"><label class="col-sm-2 control-label">商品总类</label><div class="col-sm-8"><select name="type"class="form-control"><option value="1">ShadowSockS</option><option value="2">OpenVPN</option></select></div></div><div class="form-group"><label class="col-sm-2 control-label">商品子类</label><div class="col-sm-8"><input type="text"name="pdtype"class="form-control"value=""/></div></div><div class="modal-footer"><button type="submit"class="btn btn-green">保存</button></div></form></div></div><hr></div></div>'
});

}
	</script>