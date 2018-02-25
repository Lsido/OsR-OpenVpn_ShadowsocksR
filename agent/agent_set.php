 
	 
	   
	    
	   
	     <div class="static-content-wrapper">
         <div class="static-content">
            <div class="page-content">
              <div class="container-fluid">
                <div style="height:16px"></div>

<?php 
 
if($_GET["set"]==1){
 
$sitename=$_POST["sitename"];
$sitetitle=$_POST["sitetitle"];
$userqd2=$_POST["userqd2"];
$state=$_POST["state"];
$content=$_POST["content"];
$o_url=$_POST["o_url"];

if(!empty($_POST['newpassword'])){
	
	$sql = "update web_agent set password = ? where username = ? ";
	$params = array($_POST['newpassword'], $_SESSION["dusername"]);
	$affected_rows = $pdo->query($sql, $params);
	
	echo "<script language=javascript>alert('修改成功');window.location.href='/member/login';</script>";
	
}
else{ 																													
	
	
	
	$select_url_sql = "select count(*) as count from web_agent where site_url = ? and username != '".$_SESSION['dusername']."'";
	$select_url_params = array($o_url);
	$select_url_data = $pdo->getOne($select_url_sql, $select_url_params);
	
	if($select_url_data){
		
		echo "<script language=javascript>alert('网站域名前缀重复');history.go(-1);</script>";
		exit;
		
	}
 
	$sql = "update web_agent set site_name = ?, site_title= ?, site_foot= ?, site_url= ?";
	$params = array($sitename, $sitetitle, $content, $o_url);
	$affected_rows = $pdo->query($sql, $params);
	
	echo "<script language=javascript>alert('修改成功');window.location.href='index.php?action=agent_set';</script>";
	
} 



}





 ?>
<div class="row  border-bottom white-bg dashboard-header">

            
			 
	<link rel="stylesheet" href="../admin/css/content.css" />

			
			
			
			
			<div class="container">
		<div class="page-header" style="margin-top: -7px;">
							<h1>
								控制台
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									后台管理 &amp; 代理设置
								</small>
							</h1>
						</div><!-- /.page-header -->


		<div class="public-content">
 
			<div class="public-content-cont">
			<form action="index.php?action=agent_set&set=1" method="POST">
			
				<div class="form-group">
					<label for="" style="width:inherit;"><b style="color:red;">网站域名前缀：</b></label> 
					<input class="form-control" type="text" name="siteurl" value="<?php echo $ag_info['site_url']; ?>" />
				 
				</div>
			
				<div class="form-group">
					<label for="" style="width:inherit;">网站后缀域名：</label> 
					<input class="form-control" type="text" value="<?php 
					
						if($webdata['agent_url']){
								$a_u = $webdata['agent_url']."-当前代理完整域名：".$ag_info['site_url'].".".$webdata['agent_url'];
							}else{
								
								$a_u = "未添加分站域名";
							}
			 
					echo $a_u; ?>" disabled="disabled" />
				</div>
			
				
				<div class="form-group">
					<label for="" style="width:inherit;">代理网站名称：</label> 
					<input class="form-control" type="text" name="sitename" value="<?php echo $ag_info['site_name']; ?>" />
				</div>
				<div class="form-group">
					<label for="" style="width:inherit;">代理网站标题：</label>
					<input class="form-control" type="text" name="sitetitle" value="<?php echo $ag_info['site_title']; ?>" />
				</div>
				<div class="form-group">
					<label for="" style="width:inherit;">代理密码修改：</label>
					<input class="form-control" type="text" name="newpassword" value="" placeholder="留空则不修改" />
				</div>
			
			
				<div class="form-group">
					<label for="" style="width:inherit;">当前代理折扣：</label>
					<input class="form-control" type="text" name="discount" value="<?php
				echo 100-$zk_info["discount"]*100;
 ?>%" disabled="disabled" />
				</div>
			
				<div class="clearfix"></div>
				
				<div class="form-group">
					<label for="" style="width:inherit;">代理网站底部：</label>
					<textarea id="editor_id" name="content" rows="12" class="form-control diff-textarea" placeholder='可输入HTML代码'>
						<?php echo $ag_info['site_foot']; ?>
					</textarea> 
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
          

				 
  
	 