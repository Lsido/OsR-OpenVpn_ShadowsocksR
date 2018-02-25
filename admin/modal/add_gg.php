<?php if(!$p){exit();} ?>
	     <div class="static-content-wrapper">
         <div class="static-content">
            <div class="page-content">
              <div class="container-fluid">
                <div style="height:16px"></div>
 
<div class="row  border-bottom white-bg dashboard-header">

            
			<link rel="stylesheet" href="../css/reset.css" />
	<link rel="stylesheet" href="css/content.css" />
 
			
			
			
			
			<div class="container">
		<div class="page-header" style="margin-top: -7px;">
							<h1>
								控制台
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									管理员选项 &amp; 添加公告
								</small>
							</h1>
						</div><!-- /.page-header -->


		<div class="public-content">
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

			<div class="public-content-cont">
			<form class="form-horizontal" action="index.php?action=add_gg" method="post">
				<div class="form-group">
					<label for="">公告主题</label>
					<input class="form-input-txt" type="text" name="ggname" style="width: 50%;" value="" />
				</div>
				 
					 
				 
				 	 <div class="form-group">
					<label for="">公告内容</label>
					<textarea id="editor_id" name="content" rows="12" class="form-control diff-textarea" placeholder='可输入HTML代码'></textarea> 
				</div>
				
			 
				 
				<div class="form-group" style="margin-left:150px;">
					<input type="submit" class="sub-btn" value="提  交" />
					<input type="reset" class="sub-btn" value="重  置" />
				</div>
				</form>
			</div>
		</div>
	</div>

			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
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
	<script src="css/jquery.flot.resize.js"></script>          <!-- Flot Responsive -->
	<script src="css/jquery.flot.tooltip.min.js"></script>    <!-- Flot Tooltips -->
	<!-- End loading page level scripts </script> 	 -->

	</script>										<!-- Initialize scripts for this page-->
 