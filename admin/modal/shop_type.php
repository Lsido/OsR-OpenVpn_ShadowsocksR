<?php if(!$p){exit();} ?>
<link href="css/style.min2.css?v=4.0.0" rel="stylesheet"> 
        <div class="static-content-wrapper">
          <div class="static-content">
            <div class="page-content">
              <div>
			  <div class="page-title" style="margin-left: -12px;">
         
            
           
          
           </div>
              
<!-- 引入封装了failback的接口--initGeetest -->
 
 

<div class="row  border-bottom white-bg dashboard-header">
<div class="page-header" style="margin-top: -40px;">
							<h1>
								控制台
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									商品管理 &amp; 分类
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
   
                        <div class="col-md-12">
 <a href="index.php?action=add_shop" class="btn btn-blue">添加分类</a>
 
  
          <div class="tab-content">
                  <div class="tab-pane active" id="others">
                      <div class="table-responsive" style="overflow-y:scroll;">
           
             
                      
                                  <table class="table table-striped">    
                    <thead>
                    
                    <tr>
                      
                        <th>ID</th>
						<th>所属</th>
						<th>分类名</th>
                         
                        <th colspan="2">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                            
					
				<?php
				
		$sql = "select * from web_pdtype";
		$data = $pdo->getSome($sql);
		foreach($data as $value){
			if($value['type_id'] =="1"){$tid="ShadowSocks";}else{$tid="OpenVPN";}
 
			echo "<tr>";
			echo "<td>".$value['id']."</td>";
			echo "<td>".$tid."</td>";
			echo "<td>".$value['type_name']."</td>";
		 
			echo "<td><a class='btn btn-danger' onclick=\"delect('".$value['type_name']."','".$value['id']."','shop_type');\">删除</a></td>";
			echo "</tr>";
			 
		}
		 
		 
?>
					
					
					 </tbody>
                </table>
                                  
    
                <br>

                <br>
               
            </div>

        <hr>

</div>







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

											<!-- Initialize scripts for this page-->
	