 <?php
$url = httpGet("http://50r.cn/urls/add.text?url=http://".$_SERVER['HTTP_HOST']."/index.php?action=spread-".$_SESSION['dusername']."");
if(strstr($url,"http")){}else{$url = "http://".$_SERVER['HTTP_HOST']."/index.php?action=spread-".$_SESSION['dusername']."";}
 
?>

   
        <div class="static-content-wrapper">
         <div class="static-content">
            <div class="page-content">
              <div class="container-fluid">
                <div style="height:16px"></div>
<div class="page-tabs" id="page-tabs">
  <ul class="nav nav-tabs">
    <li class="">
      <a href="#" aria-expanded="true">邀请好友</a></li>
    
  </ul>
</div>
<script type="text/javascript"> 
    function jsCopy(){ 
        var e=document.getElementById("inviteurl1"); 
        e.select();  
        document.execCommand("Copy");  
       alert("复制完成,已可粘贴"); 
    } 
</script> 
<script type="text/javascript" src="../admin/css/ZeroClipboard.js"></script>

<div class="alert alert-info">您可以复制该地址发送给您的好友,他进入当前链接后进行注册的账号将会对你充值反馈！ <br><br>
<li>受邀者每次 充值任意金额,您将获得<b> <?php echo $profit*100;?> %</b>提成奖励</li>
</div>

<div class="input-group">
	<span class="input-group-addon">地址</span>
	<input type="text" class="form-control" name="inviteurl" id="inviteurl1" value="<?php echo $url; ?>">
	<span class="input-group-btn"  id="clip_container"><input type="submit" onclick="jsCopy()" class="btn btn-primary" id="clip_button1" value="复制"></span>
</div><br/>
<br/>
<script>
	function showqrcode(){
		alert('<img style="display: block;margin-left: 150px;" data-no-retina="" src="images/2wm.png"><br/>','分享二维码');
	}
	$(document).ready(function () {
		$("ul.nav-tabs li:eq(0)").addClass('active'); 
	});
</script>

</body>
<script type="text/javaScript">
	function copy(t,b) {
		var clip = new ZeroClipboard.Client();
		clip.setHandCursor(true);
		clip.setText(document.getElementById(t).value);
		clip.addEventListener('complete',  function(client, text) {
			alert("该地址已经复制，你可以使用Ctrl+V 粘贴。");
		});
		clip.glue(b);
	}
</script>

						</div>
            </div>
          </div>
  