<?php if(!$p){exit();} ?>
<?php 
if($_SESSION["dstatus"]=="dok" and isset($_SESSION["dusername"])){
}
else{
 exit("<script language='javascript'>window.location.href='/member/login';</script>");
 
}
?>
<!DOCTYPE html><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="charset" content="utf-8">
<meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" name="viewport">
<title><?php echo $webdata['site_title']; ?></title>
<meta name="description" content="<?php echo $webdata['site_desc']; ?>">
<meta name="keywords" content="<?php echo $webdata['site_keyword']; ?>">