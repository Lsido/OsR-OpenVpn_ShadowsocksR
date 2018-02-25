
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="renderer" content="webkit">
<meta name="screen-orientation" content="portrait">
<meta name="x5-orientation" content="portrait">
<meta name="full-screen" content="yes">
<meta name="x5-fullscreen" content="true">
<meta name="browsermode" content="application">
<meta name="x5-page-mode" content="app">
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="msapplication-tap-highlight" content="no">
<meta name="theme-color" content="##f8f8f8">
 
    <link type="text/css" href="../admin/css/font-awesome.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link type="text/css" href="../admin/css/styles.css" rel="stylesheet">
    <!-- Core CSS with all styles -->
    <link type="text/css" href="../admin/css/style.min.css" rel="stylesheet">

<link type="text/css" href="../admin/css/xemon.css" rel="stylesheet">

    <!-- jsTree -->
    <link type="text/css" href="../admin/css/prettify.css" rel="stylesheet">
    <!-- Code Prettifier -->
    <link type="text/css" href="../admin/css/blue.css" rel="stylesheet">
    <!-- iCheck -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
    <!--[if lt IE 9]>
      <link type="text/css" href="assets/../admin/css/ie8.css" rel="stylesheet">
      <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
      <script type="text/javascript" src="assets/plugins/charts-flot/excanvas.min.js"></script>
      <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- The following CSS are included as <link rel="stylesheet" href="../admin/css/loading.css"> plugins and can be removed if unused-->
   
    <!-- DateRangePicker -->
    <link type="text/css" href="../admin/css/fullcalendar.css" rel="stylesheet">
    <!-- FullCalendar -->
    <link type="text/css" href="../admin/css/chartist.min.css" rel="stylesheet">
    <!-- Chartist -->
		<script src="../admin/css/jquery-1.10.2.min.js"></script>
		 
		<script src="../admin/css/jquery-ui-1.10.4.custom.min.js"></script>
		<script src="../admin/css/jquery.zclip.min.js"></script>
	 
		<script src="../admin/css/zun.js?2.8.7"></script>
		<script src="../admin/css/codemirror.js"></script>
		<script src="../admin/css/matchbrackets.js"></script>
		<script src="../admin/css/matchtags.js"></script>
		<script src="../admin/css/css.js"></script>

	
		<script type="text/javascript" src="/static/assets/layer/layer.js"></script>
		<script type="text/javascript" src="../admin/css/bootstrap.min.js"></script> 							 
		 
		<style type="text/css">body { font-family:"微软雅黑","Microsoft YaHei";background: #eee; cursor: url('images/mouse.png'), default; }</style>
		 
		<link rel="stylesheet" href="../admin/css/ui.css">
		<link rel="stylesheet" href="../admin/css/my.css">
		<link type="text/css" href="../admin/css/labalert.css" rel="stylesheet">
		<link rel="stylesheet" href="../admin/css/nanoscroller.css">
 
		<script type="text/javascript" src="../admin/css/js.js"></script>
		<script type="text/javascript" src="../admin/css/my.js"></script> 
<script type="text/javascript">

	
 </script> 

</head>
<body class="infobar-offcanvas nano">
<div class ="nano-content">

	<div id="loading">
		<div id="loading-center">
			<div id="loading-center-absolute">
				<div class="object" id="object_one"></div>
				<div class="object" id="object_two"></div>
				<div class="object" id="object_three"></div>
				<div class="object" id="object_four"></div>
				<div class="object" id="object_five"></div>
				<div class="object" id="object_six"></div>
				<div class="object" id="object_seven"></div>
				<div class="object" id="object_eight"></div>
				<div class="object" id="object_big"></div>
			</div>
		</div>
	</div><!--NEW-->

    
    <header id="topnav" class="navbar navbar-midnightblue navbar-static-top clearfix" role="banner"><!--navbar-fixed-top-->
      <span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
        <a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
          <span class="icon-bg">
            <i class="fa fa-fw fa-bars"></i>
          </span>
        </a>
      </span>
      <a class="navbar-brand" href="#"><span style="font-weight: lighter;"><?php echo $webdata['site_name']; ?><span style="color: #FF6C60;font-weight: normal;">OS</span></span></a>
      <span id="trigger-infobar" class="toolbar-trigger toolbar-icon-bg">
        <a data-toggle="tooltips" data-placement="left" title="Toggle Infobar">
        </a>
      </span>
      
      <ul class="nav navbar-nav toolbar pull-right">
        
        <li class="toolbar-icon-bg hidden-xs" id="trigger-fullscreen">
          <a href="#" class="toggle-fullscreen">
            <span class="icon-bg">
              <i class="fa fa-fw fa-arrows-alt"></i>
            </span>
            </i>
          </a>
        </li>
        <li class="dropdown toolbar-icon-bg">
          <a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'>
            <span class="icon-bg">
              <i class="fa fa-fw fa-bell"></i>
            </span>
            <span class="badge badge-info"><?php
			$wdsql = "select count(*) as count from web_word where w_is_over = ? and to_w_id IS NULL";
			$wdparams = array(0);
			$wddata = $pdo->getOne($wdsql, $wdparams);
			echo $wddata['count'];
			?></span></a>
          
        </li>
        <li class="dropdown toolbar-icon-bg">
          <a href="#" class="dropdown-toggle" data-toggle='dropdown'>
            <span class="icon-bg">
              <i class="fa fa-fw fa-user"></i>
            </span>
          </a>
          <ul class="dropdown-menu userinfo arrow">
            
			
            <li>
              <a href="index.php?action=agent_set">
                <span class="pull-left">代理设置</span>
                <i class="pull-right fa fa-cog"></i>
              </a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="index.php?action=logout">
                <span class="pull-left">退出</span>
                <i class="pull-right fa fa-sign-out"></i>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </header>
    <div id="wrapper">
      <div id="layout-static">
        <div class="static-sidebar-wrapper sidebar-midnightblue">
          <div class="static-sidebar">
            <div class="sidebar">
              <div class="widget stay-on-collapse" id="widget-welcomebox">
                <div class="widget-body welcome-box tabular">
                  <div class="tabular-row">
                    <div class="tabular-cell welcome-avatar">
                      <a href="#">
                        <img src="../admin/images/default_family.jpg" class="avatar"></a>
                    </div>
                    <div class="tabular-cell welcome-options">
                      <span class="welcome-text">Hi,</span>
                      <a href="#" class="name"><?=$_SESSION['dusername']?></a></div>
                  </div>
                </div>
              </div>
              <div class="widget stay-on-collapse" id="widget-sidebar">
                <nav role="navigation" class="widget-body">
                  <ul class="acc-menu">
                    <li class="nav-separator">Explore</li>
                    <li>
                      <a href="index.php?action=index">
                        <i class="fa fa-home"></i>
                        <span>后台主页</span></a>
                    </li>
                    <li>
                      <a href="javascript:;">
                        <i class="fa fa-cogs"></i>
                        <span>账号管理</span></a>
                      <ul class="acc-menu">
                        <li>
                          <a href="index.php?action=sub_user">子用户</a></li>
 <li>
                          <a href="index.php?action=sub_op_user">OpenVpn 账号</a></li>
						 <li>

                         <li>  <a href="index.php?action=sub_ss_user">ShadowSocks 账号</a></li>
						    
						  
                      </ul>
                
					
					 
					
					
					
                     <li>
                      <a href="index.php?action=onlinepay">
                        <i class="fa fa-cny"></i>
                        <span>在线充值</span>
                       </a>
                    </li>
					 
					  <li>
                      <a href="index.php?action=sub_bill">
                        <i class="fa fa-sitemap"></i>
                        <span>账单管理</span>
                        <span class="label label-alizarin">New ~</span></a>
                    </li>
					
                    <li class="nav-separator">MANAGE</li>
                               
					<li>
                      <a href="javascript:;">
                        <i class="fa fa-cloud"></i>
                        <span>系统设置</span></a>
                      <ul class="acc-menu"> 
					  <li>
                          <a href="index.php?action=agent_set">代理设置</a></li>
						   
					    
 
						   
                        
                      </ul>
                    </li>
					 
					 <li>
                      <a href="javascript:;">
                      <i class="fa fa-h-square"></i>
                        <span>邀请注册</span></a>
                      <ul class="acc-menu"> 
					  <li>
                          <a href="index.php?action=invite">注册链接</a></li>
			 
                      </ul>
                    </li>
					 
					 
                    
                         
                      </ul>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>