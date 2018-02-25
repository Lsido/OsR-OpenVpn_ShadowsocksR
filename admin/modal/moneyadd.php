			<?php if(!$p){exit();} ?>
	     <div class="static-content-wrapper">
         <div class="static-content">
            <div class="page-content">
              <div class="container-fluid">
                <div style="height:16px"></div>
<div class="page-tabs" id="page-tabs">
  <ul class="nav nav-tabs">
  
	   <li class="">
     <a href="" aria-expanded="true">余额充值</a></li>
     
  </ul>
</div>

<div class="alert alert-info">您可以在此为用户充值余额<br></div>
<div class="alert alert-dismissable alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h3>重要!</h3>
	<p>如用户出现余额未到账，请检查是否存在此用户。</p>
	 
</div>
	<h6><b>注意：</b>余额充值将会在用户本身余额的基础上添加！</h6>
	<form action="index.php?action=moneyadd&c=add" method="post">
		<input type="hidden" name="do" value="add_form">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
				<tr>
					<th>参数</th>
					<th>值</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>用户名</td>
					<td><input id="username_add" type="text" name="username_add" class="form-control" required>
						<span id="username_add_info"></span>
					</td>
				</tr>
				<tr>
					<td>余额</td>
					<td><input type="text" name="money_add" class="form-control" required></td>
				</tr>
				
				</tbody>
			</table>
		</div>
		<input type="submit" class="btn btn-success" value="充值余额">
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

											<!-- Initialize scripts for this page-->
	 
	</script>