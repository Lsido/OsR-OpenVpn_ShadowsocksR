 
		<?php if(!$p){exit();} ?>
	     <div class="static-content-wrapper">
         <div class="static-content">
            <div class="page-content">
              <div class="container-fluid">
                <div style="height:16px"></div>
 
<div class="row  border-bottom white-bg dashboard-header">

            
			 

			
			
			
			
		<div class="row">
		   <div class="col-sm-12">
                    
                  <div class="panel panel-default">
		<div class="page-header" style="margin-top: -7px;">
							<h1>
								控制台
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									节点管理 &amp; shadowsock 添加节点
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
			    <div class="panel-body">
			<form action="index.php?action=add_ss_node&c=add" method="POST" class="form-horizontal validate">
				<div class="form-group">
					<div class="col-sm-12">
					节点名称 
					<input class="form-control" type="text" name="node_name" value="" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">节点地址 
					<input class="form-control" type="text" id="field-1" name="node_ip" value="" />
				</div>
				 </div>
				<div class="form-group">
				<div class="col-sm-12">端口多用 
 
					 <select class="form-control" name="state2" id="mySelect" onchange="gra1deChange()">
	 
						 <option value='0' selected>禁用</option>;
						 <option value='1'>启用</option>;
    
	
                      </select>
				 </div>
				</div>
				 
	<div style="display: none;" id="typediv1">
	
	
	<div class="form-group">
					<p>单端口多用户配置说明：开启后自动生成一个SS账号为承载账号作为所有用户多用接口(请勿删除)，用户可到前台节点查看此单多节点，参数为管理员定义，建议最好用默认参数</p>
 
				</div>
	
	
	
								<div class="form-group">
					<div class="col-sm-12">节点端口 
 
				 
						
						<input class="form-control" type="text" name="node_port" value="" />
	
                     
				 </div>
				</div>
				
				
								<div class="form-group">
					<div class="col-sm-12">加密方式 
 
					 <select class="form-control" name="method" id="mySelect">
	 
						 	<?php  
				$list=array('rc4-md5','aes-128-cfb','aes-256-cfb','aes-128-ctr','camellia-256-cfb','chacha20','salsa20','chacha20-ietf');
				foreach($list as $key => $value){  
					$selected = "";
					if($value == "aes-256-cfb"){
						$selected = 'selected';
					}
					
					echo '<option value="'.$value.'" '.$selected.'>'.$value.'</option>';
				}
						?>
    
	
                      </select>
				 </div>
				</div>
				
				
				
								<div class="form-group">
					<div class="col-sm-12">协议方式 
					 <select class="form-control" name="pro" id="mySelect">
	 
							<?php 

	 
				$list=array('origin','verify_simple','verify_sha1','auth_sha1','auth_sha1_v4','auth_aes128_sha1','auth_aes128_md5');
				foreach($list as $key => $value){  
					$selected = "";
					if($value == "auth_aes128_sha1"){
						$selected = 'selected';
					}
					
					echo '<option value="'.$value.'" '.$selected.'>'.$value.'</option>';
				}



						?>
	
                      </select>
				 </div>
				</div>
				
				
				
								<div class="form-group">
					<div class="col-sm-12"> 混淆方式
 
					 <select class="form-control" name="obfs" id="mySelect">
	 <?php 

	
				$list=array('plain','http_simple','http_post','tls_simple','tls1.2_ticket_auth');
				foreach($list as $key => $value){  
					$selected = "";
					if($value == 'http_simple'){
						$selected = 'selected';
					}
					
					echo '<option value="'.$value.'" '.$selected.'>'.$value.'</option>';
				}



						?>
    
	
                      </select>
				 
				</div>
				</div>
				
				                <div class="form-group">
                  <div class="col-sm-12">
                   混淆参数<br><br><input type="text" class="form-control" id="field-1" placeholder="" name="obfsparm" data-validate="required">
                  </div>
                </div>
				
				
				</div>
	
				 
				 </div>
				
				
				<div class="clearfix"></div>
				
				 
			 
				
				<button type="submit" class="btn btn-success btn-block">提  交</button>
				
				<button type="reset" class="btn btn-info btn-block">重  置</button>
				
				</div>
				</form>
			</div>
		</div>
	</div>

			
			
			
			
				<script type="text/javascript">
    
	
window.onload = function() {
	gra1deChange();
	}
	function gra1deChange(){
		var sel = document.getElementById("mySelect");
        if(sel&&sel.addEventListener){
            sel.addEventListener('change',function(e){
                var ev = e||window.event;
                var target = ev.target||ev.srcElement;
                if(target.value==1){
	document.getElementById("typediv1").style.display="";
	
	 }
	 
	 if(target.value==0){
	document.getElementById("typediv1").style.display="none";
	 }
            },false)
        }
		
	}
	 
</script>
			
			
			
			
			
			
			
			
			
			
			
			
			 
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
	<script type="text/javascript">
		jQuery(document).ready(function() {
						loadsign('614391');
					});
	</script>