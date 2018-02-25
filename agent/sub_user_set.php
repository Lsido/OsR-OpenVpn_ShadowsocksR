
    <?php if(!$p){exit();} ?>
      <link href="../admin/css/style.min2.css?v=4.0.0" rel="stylesheet">


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
									账号管理 &amp; 网站用户资料 - <?php echo $Fdata['username']; ?>
								</small>
							</h1>
						</div><!-- /.page-header -->
 
            
			<div class="row">
                <div class="col-sm-12">
                    
                  <div class="panel panel-default">
                    
                    <div class="panel-body">

      

                <form id="qset" action="index.php?action=sub_user_set&id=<?=$_GET['id']?>" method="post" role="form" class="form-horizontal">
			 

                  <div class="form-group">
                    <label class="col-sm-2 control-label">用户名</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="field-1" placeholder="" name="user" value="<?php echo $Fdata['username']; ?>">
                    </div>
                  </div>  

				  <div class="form-group">
                    <label class="col-sm-2 control-label">密码</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="field-1" placeholder="" name="pass" value="<?php echo $Fdata['password']; ?>">
                    </div>
                  </div> 
		 
                  <div class="form-group">
                    <label class="col-sm-2 control-label">安全码</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="field-1" placeholder="" name="notes" value="<?php echo $Fdata['safeid']; ?>">
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

 