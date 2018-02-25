
    <?php if(!$p){exit();} ?>
      <link href="css/style.min2.css?v=4.0.0" rel="stylesheet">
		 
		<link href="css/foundation-datepicker.css" rel="stylesheet" type="text/css">

        <div class="static-content-wrapper">
          <div class="static-content">
            <div class="page-content">
              <div class="container-fluid">
                <div style="height:16px"></div>
    
<div class="row  border-bottom white-bg dashboard-header">

<div class="page-header" style="margin-top: -40px;">
							<h1>
								控制台
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									账号管理 &amp; OpenVPN修改 - <?php echo $Fdata['iuser']; ?>
								</small>
							</h1>
						</div><!-- /.page-header -->
<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon fa fa-check green"></i>

									欢迎使用
									<strong class="green" onclick="openLog();">
										Html OS
										<small> (<?php echo file_get_contents('../version.txt'); ?>)</small>
									</strong>,全新SS+OP结合版流量控制系统.
								</div>
            
			<div class="row">
                <div class="col-sm-12">
                    
                  <div class="panel panel-default">
                    
                    <div class="panel-body">

      

                <form id="qset" action="index.php?action=web_user_op_set&id=<?=$_GET['id']?>" method="post" role="form" class="form-horizontal">
			 

                  <div class="form-group">
                    <label class="col-sm-2 control-label">承载用户</label>
                    <div class="col-sm-9">
					
						<input type="hidden" name="id" value="<?=$_GET['id']?>" >
                      <input type="text" class="form-control" id="field-1" placeholder="" name="czuser" value="<?php echo $Fdata['user_name']; ?>">
                    </div>
                  </div>  

				  <div class="form-group">
                    <label class="col-sm-2 control-label">OP账号</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="field-1" placeholder="" name="iuser" value="<?php echo $Fdata['iuser']; ?>">
                    </div>
                  </div> 
				  
				 
				  
				  <div class="form-group">
                    <label class="col-sm-2 control-label">OP密码</label>
                    <div class="col-sm-9">
                      <div class="input-group">
                        <input type="text" class="form-control" name="pass" value="<?php echo $Fdata['pass']; ?>">
                       
                      </div>
                    </div>
                  </div>
				  
                    	 
						 <div class="form-group">
                    <label class="col-sm-2 control-label">账号状态</label>
                    <div class="col-sm-9">
                      <select name="state" class="form-control">
                       
						<?php 


if($Fdata['i']==1){
	
	echo "<option value='0' >禁用</option>";
	echo "<option value='1' selected>开通</option>";
}else if($Fdata['i']==0){
	echo "<option value='0' selected>禁用</option>";
	echo "<option value='1'>开通</option>";
}





						?>
                      </select>
                    </div>
                  </div>  
						 
						 
				  
				    <div class="form-group">
                    <label class="col-sm-2 control-label">到期时间</label>
                    <div class="col-sm-9">
                      <div class="input-group">
                         
						
						<input type="text" class="form-control" name="endtime" value="<?php echo date('Y-m-d H:i:s',$Fdata['endtime']); ?>" id="demo-2">
						
                       
                      </div>
                    </div>
                  </div>
				  
				    <div class="form-group">
                    <label class="col-sm-2 control-label">总流量</label>
                    <div class="col-sm-9">
                      <div class="input-group"> 
                        <input type="text" class="form-control" name="maxll" value="<?php echo round($Fdata['maxll']/1024/1024); ?>">
                        <span class="input-group-addon">MB</span> 
                      </div>
                    </div>
                  </div>
				  
				   
					
					  
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9">
                      <button type="submit" type="button" class="btn btn-info btn-block">修改</button>
                    </div>
                  </div>
                  
                </form>

                      
                    </div>
                  
                 
                    
               

            </div>

			
        <hr>

</div>







						</div>
            </div>
          </div>
					<br>
					<!-- footer.php -->
					<?php include_once('footer.php');   ?>
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
	
	<script src="css/jquery.flot.tooltip.min.js"></script>    <!-- Flot Tooltips -->
	<!-- End loading page level scripts </script> 	 -->

											<!-- Initialize scripts for this page-->
	<script src="css/jquery-1.11.3.min.js"></script>
		<script src="css/foundation-datepicker.js"></script>
		<script src="css/locales/foundation-datepicker.zh-CN.js"></script>		
		<script>
		$('#demo-1').fdatepicker();
		$('#demo-2').fdatepicker({
			format: 'yyyy-mm-dd hh:ii:ss',
			pickTime: true
		});
		$('#demo-3').fdatepicker();

		var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
		var checkin = $('#dpd1').fdatepicker({
			onRender: function (date) {
				return date.valueOf() < now.valueOf() ? 'disabled' : '';
			}
		}).on('changeDate', function (ev) {
			if (ev.date.valueOf() > checkout.date.valueOf()) {
				var newDate = new Date(ev.date)
				newDate.setDate(newDate.getDate() + 1);
				checkout.update(newDate);
			}
			checkin.hide();
			$('#dpd2')[0].focus();
		}).data('datepicker');
		var checkout = $('#dpd2').fdatepicker({
			onRender: function (date) {
				return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
			}
		}).on('changeDate', function (ev) {
			checkout.hide();
		}).data('datepicker');
		</script>