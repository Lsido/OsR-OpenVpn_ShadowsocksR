		<?php if(!$p){exit();} ?>
	     <div class="static-content-wrapper">
          <div class="static-content">
            <div class="page-content">
              <div class="container-fluid">
                <div style="height:16px"></div>
<!-- 引入封装了failback的接口--initGeetest -->
<div class="alert alert-inverse alert-dismissable">
	<?=GetHtml();?>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="amazo-tile tile-white">
			<div class="tile-heading">
				<div class="title"><?=$_SESSION['ausername'] ?></div>
				<div class="secondary"><a href="index.php?mod=set&rights" style="color: #a0d3ea" id="level_n">admin</a></div></div>
			<div class="tile-body">
				<div class="content">
					<p style="width: 16px;height: 16px;background: #ebccd1;float:left;margin:14px 4px 0 0px" ></p><span style="font-weight: lighter">
					
					管理员
					
					</span>				</div></div>
			<div class="tile-footer">
				<span class="info-text text-left">
				<span style="font-weight:lighter">	
				级别
			</span></b>				</span>
				
				<div id="sparkline-revenue" class="sparkline-line"></div>
			</div>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="amazo-tile tile-white">
			<div class="tile-heading">
				<span class="title">网站人数</span>
				<span class="secondary">User</span></div>
			<div class="tile-body">
				<span class="content" id="flow_left"><?=$data['count']?></span></div>
			<div class="tile-footer">
				<span class="info-text text-left" style="color: #94c355"><i class="fa fa-refresh"></i>
				个</span>
				<span class="info-text text-right"><a href="index.php?action=web_user">添加</a></span>
				<div id="sparkline-commission" class="sparkline"></div>
			</div>
		</div>
	</div>
	
	
	
	<div class="col-md-3">
		<div class="amazo-tile tile-white">
			<div class="tile-heading">
				<span class="title">今日订单</span>
				<span class="secondary">Order</span></div>
			<div class="tile-body">
				<span class="content" id="flow_left">
				
				<?php

$sql = "select count(*) as count from web_bill where b_time BETWEEN '".date('Y-m-d 00:00:00')."' AND '".date('Y-m-d 23:59:59')."'";
$data = $pdo->getOne($sql, $params);
echo $data['count'];
 
 ?>
				
				</span></div>
			<div class="tile-footer">
				<span class="info-text text-left" style="color: #94c355"><i class="fa fa-refresh"></i>
				笔</span>
				<span class="info-text text-right"><a href="index.php?action=web_bill">查看</a></span>
				<div id="sparkline-commission" class="sparkline"></div>
			</div>
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	<div class="col-md-3">
		<div class="amazo-tile tile-white">
			<div class="tile-heading">
				<span class="title">今日收入</span>
				<span class="secondary">Money</span></div>
			<div class="tile-body">
				<span class="content"><?php 
				
$sql = "select SUM(b_price) as sum from web_bill where b_time BETWEEN '".date('Y-m-d 00:00:00')."' AND '".date('Y-m-d 23:59:59')."'";
$data = $pdo->getOne($sql, $params);
if(empty($data['sum'])){
	echo "0";
}else{
echo $data['sum'];
}


				?></span></div>
			<div class="tile-footer">
				<span class="info-text text-left" style="color: #94c355"><i class="fa fa-level-up"></i>
					元
				</span>
				<span class="info-text text-right"><a href="">主页</a></span>
				<div id="sparkline-commission" class="sparkline"></div>
			</div>
		</div>
	</div>
	
	
	
	<div class="col-md-3">
		<div class="amazo-tile tile-white">
			<div class="tile-heading">
				<span class="title">上行速度</span>
				<span class="secondary">Speed</span></div>
			<div class="tile-body">
				<span class="content">   <span id="upSpeed">获取中</span>   </span></div>
			<div class="tile-footer">
				<span class="info-text text-left" style="color: #94c355"><i class="fa fa-level-up"></i>
					KB/S
				</span>
				<span class="info-text text-right"><a href="javascript:;" onclick="getInfo()">刷新</a></span>
				<div id="sparkline-commission" class="sparkline"></div>
			</div>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="amazo-tile tile-white">
			<div class="tile-heading">
				<span class="title">下行速度</span>
				<span class="secondary">Speed</span></div>
			<div class="tile-body">
				<span class="content">   <span id="downSpeed">获取中</span>   </span></div>
			<div class="tile-footer">
				<span class="info-text text-left" style="color: #94c355"><i class="fa fa-level-up"></i>
					KB/S
				</span>
				<span class="info-text text-right"><a href="javascript:;" onclick="getInfo()">刷新</a></span>
				<div id="sparkline-commission" class="sparkline"></div>
			</div>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="amazo-tile tile-white">
			<div class="tile-heading">
				<span class="title">CPU使用</span>
				<span class="secondary">info</span></div>
			<div class="tile-body">
				<span class="content">   <span id="state">获取中</span>  </span></div>
			<div class="tile-footer">
				<span class="info-text text-left" style="color: #94c355"><i class="fa fa-level-up"></i>
					%
				</span>
				<span class="info-text text-right"><a href="javascript:;" onclick="getInfo()">刷新</a></span>
				<div id="sparkline-commission" class="sparkline"></div>
			</div>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="amazo-tile tile-white">
			<div class="tile-heading">
				<span class="title">内存使用</span>
				<span class="secondary">info</span></div>
			<div class="tile-body">
				<span class="content">  <span id="memory">获取中</span>    </span></div>
			<div class="tile-footer">
				<span class="info-text text-left" style="color: #94c355"><i class="fa fa-level-up"></i>
					 %
				</span>
				<span class="info-text text-right"><a href="javascript:;" onclick="getInfo()">刷新</a></span>
				<div id="sparkline-commission" class="sparkline"></div>
			</div>
		</div>
	</div>
	
	
	
	
	
	
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
		 
		 
		 <div class="span6">
					<div class="bw">
						<div class="bg">
						 
						<div id="NetImg" style="width:98%;height:330px;"></div>
						</div>
					</div>
				</div>
				
		
		</div>
	</div>
</div>



						</div>
            </div>
          </div>
					<br>
					<!-- footer.php -->
					<?php include('modal/footer.php'); ?>
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
		<script type="text/javascript" src="css/highcharts.js"></script>
	 
  
<script type="text/javascript">
		 
			 
			
			function getInfo() {
				var loadT = layer.load({
					shade: true,
					shadeClose: false
				});
				$.get("index.php?action=GetSystemTotal", function(info) {
					$("#memory").html(parseInt((info.memTotal-info.memRealUsed))+'/'+info.memTotal+' (MB)');
					$("#left").html(Math.floor(info.memRealUsed / (info.memTotal / 100)));
					$("#info").html(info.system);
					$("#running").html(info.time);
					$("#core").html(info.cpuNum + " 核心");
					$("#state").html(info.cpuRealUsed + "%");
					layer.close(loadT);
					setImg();
				});
			}
		
			getInfo();
			
			function getNet(){
				var up;
				var down;
				$.ajax({
					type:"get",
					url:"index.php?action=GetNetTotal",
					async:true,
					success:function(net){
						$("#InterfaceSpeed").html("接口速率： 1.0Gbps");
						$("#upSpeed").html(net.up+ ' KB');
						$("#downSpeed").html(net.down+' KB');
						$("#downAll").html(net.downTotal);
						$("#upAll").html(net.upTotal);
						$("#state").html(net.cpuinfo.used+ "%");
						setCookie("upNet",net.up);
						setCookie("downNet",net.down);
					}
				});
				//var result = Number(getCookie("upNet"));
				//return result;
			}
		
			$(document).ready(function() {                                                  
				Highcharts.setOptions({                                                     
					global: {                                                               
						useUTC: false                                                       
					}                                                                       
				});                                                                         
																							
				var chart;                                                                  
				$('#NetImg').highcharts({                                                
					chart: {                                                                
						type: 'areaspline',                                                     
						animation: Highcharts.svg, // don't animate in old IE               
						//marginRight: 10,
						events: {                                                           
							load: function() {                            														        
								var series = this.series[0];
								var series1 = this.series[1];
								
								setInterval(function() {
									getNet();								
									var x = (new Date()).getTime(), // 时间         
										y = Number(getCookie("upNet")), //取回流量数据
										z = Number(getCookie("downNet")); //取回流量数据
									series1.addPoint([x, z], true, true);				
									series.addPoint([x, y], true, true);									
								}, 3000);                                                   
							}                                                               
						}                                                                   
					}, 
					colors: ['#ff8c00','#1e90ff'],
					title: {                                                                
						text: '当前服务器实时流量',
						style: {"color":"#666"}
					},                                                                      
					xAxis: {                                                                
						type: 'datetime',                                                   
						tickPixelInterval: 100,
						gridLineColor: '#eeeeee',//纵向网格线颜色
						gridLineWidth: 1 //纵向网格线宽度
					},                                                                      
					yAxis: {                                                                
						title: {                                                            
							text: '带宽 KB/S',
							style: {"color":"#666"}
						},                                                                  
						plotLines: [{                                                       
							value: 0,                                                       
							width: 0,                                                       
							color: '#eeeeee'                                                
						}],
						gridLineDashStyle:'Dash',
						gridLineColor: '#ddd',//横向网格线颜色
						gridLineWidth: 1//横向网格线宽度
					},                                                                      
					tooltip: {
						shared: true,
						borderColor:"#cccccc"
					},                                                                      
					plotOptions: {
						areaspline: {
							fillOpacity: 0.46
						}
					},
					legend: {
						borderWidth: 0
					},
					series: [{                                                              
						name: '上行',
						marker:{
							radius: 0,
							lineColor: "#ff8c00",
							lineWidth:2
						},
						data: (function() {
							var data = [],
								time = (new Date()).getTime(),
								i;
							for (i = -16; i <= 0; i++){
								data.push({                                                 
									x: time + i * 1000,                                     
									y: null                       
								});                                                         
							}                                                              
							return data;                                              
						})()                                                            
					},{                                                              
						name: '下行',
						marker:{
							radius: 0,
							lineColor: "#1e90ff",
							lineWidth:1
						},
						data: (function() {                                                                          
							var data1 = [],                                                  
								time1 = (new Date()).getTime(),                              
								i;                                                          							
							for (i = -16; i <= 0; i++){
								data1.push({                                                 
									x: time1 + i * 1000,                                     
									z: null                       
								});                                                         
							}                                                              
							return data1;                                                    
						})()                                                          
					}]                                                                       
				});                                                                         
			});
			
			function setImg() {
				$('.circle').each(function(index, el) {
					var num = $(this).find('span').text() * 3.6;
					if (num <= 180) {
						$(this).find('.left').css('transform', "rotate(0deg)");
						$(this).find('.right').css('transform', "rotate(" + num + "deg)");
					} else {
						$(this).find('.right').css('transform', "rotate(180deg)");
						$(this).find('.left').css('transform', "rotate(" + (num - 180) + "deg)");
					};
				});
			
			}
			setImg();
			
			 
			 
			
		</script>
  