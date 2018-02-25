
    <?php if(!$p){exit();} ?>
      <link href="css/style.min2.css?v=4.0.0" rel="stylesheet">


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
									账号管理 &amp; 代理用户资料 - <?php echo $Fdata['username']; ?>
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

      

                <form id="qset" action="index.php?action=web_agent_set&id=<?=$_GET['id']?>" method="post" role="form" class="form-horizontal">
			 

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
                    <label class="col-sm-2 control-label">账户余额</label>
                    <div class="col-sm-9">
                      <div class="input-group">
                        <input type="text" class="form-control" name="money" value="<?php echo round($Fdata['money'],2); ?>">
                        <span class="input-group-addon">元</span> 
                      </div>
                    </div>
                  </div>
				  
 

                  <div class="form-group">
                    <label class="col-sm-2 control-label">代理域名</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="field-1" placeholder="" name="agent_url" value="<?php 
					  
					  
					  		if($webdata['agent_url']){
								$a_u = $Fdata['site_url'].".".$webdata['agent_url'];
							}else{
								
								$a_u = "未添加分站域名";
							}
					  
					  echo $a_u;

					  ?>">
                    </div>
                  </div>  
					
					<div class="form-group">
                    <label class="col-sm-2 control-label">代理等级设置</label>
                    <div class="col-sm-9">
							<select name="state" class="form-control">
                       
						<?php 
 
					$Gd_sql = "SELECT * FROM web_agent_grd";
					$Gd_data = $pdo->getSome($Gd_sql, $Gd_data);
				foreach($Gd_data as $value){  
					$selected = "";
					$g = is_grd($value['id']);
					if($value['id'] == $Fdata['grade']){
						$selected = 'selected';
					}
					
					echo '<option value="'.$value['id'].'" '.$selected.'>'.$g.'</option>';
				}

 

						?>
                      </select>
							<span class="form-control-feedback glyphicon"></span>
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

 