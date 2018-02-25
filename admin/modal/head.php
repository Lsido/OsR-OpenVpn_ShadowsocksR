
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
 
    <link type="text/css" href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link type="text/css" href="css/styles.css" rel="stylesheet">
    <!-- Core CSS with all styles -<link type="text/css" href="css/xemon.css" rel="stylesheet">->
	 
	
    <!-- jsTree -->
 
    <!-- iCheck -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
    <!--[if lt IE 9]>
      <link type="text/css" href="assets/css/ie8.css" rel="stylesheet">
      <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
      <script type="text/javascript" src="assets/plugins/charts-flot/excanvas.min.js"></script>
      <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- The following CSS are included as <link rel="stylesheet" href="css/loading.css"> plugins and can be removed if unused-->
		<link type="text/css" href="css/xemon.css" rel="stylesheet">
		<link type="text/css" href="css/site.css" rel="stylesheet">
		<link type="text/css" href="css/my.css" rel="stylesheet">
		<script src="css/jquery-1.10.2.min.js"></script>
		<script src="css/jquery-ui-1.10.4.custom.min.js"></script>
		<script src="css/jquery.zclip.min.js"></script>
		<script src="css/zun.js?2.8.7"></script>
		<script src="css/codemirror.js"></script>
		<script src="css/matchbrackets.js"></script>
		<script src="css/matchtags.js"></script>
		<script src="css/css.js"></script>
		
		<script type="text/javascript" src="/static/assets/layer/layer.js"></script>
		<script type="text/javascript" src="css/bootstrap.min.js"></script> 							 
		<style type="text/css">body { font-family:"微软雅黑","Microsoft YaHei";background: #eee; cursor: url('images/mouse.png'), default; }</style>
		<link type="text/css" href="css/labalert.css" rel="stylesheet">
		<link rel="stylesheet" href="css/nanoscroller.css">
		<script type="text/javascript" src="css/my.js"></script> 

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
      <a class="navbar-brand" href="#"><span style="font-weight: lighter;">HTML<span style="color: #FF6C60;font-weight: normal;">OS</span></span></a>
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
              <a onclick="checkUpdate();">
                <span class="pull-left">检查更新</span>
                <i class="pull-right fa fa-cog"></i>
              </a>
            </li>
			
			
			<li>
              <a onclick="openLog();">
                <span class="pull-left">更新日志</span>
                <i class="pull-right fa fa-cog"></i>
              </a>
            </li>
			
			
            <li>
              <a href="index.php?action=sys">
                <span class="pull-left">系统设置</span>
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
                        <img src="images/default_family.jpg" class="avatar"></a>
                    </div>
                    <div class="tabular-cell welcome-options">
                      <span class="welcome-text">Hi,</span>
                      <a href="#" class="name"><?=$_SESSION['ausername']?></a></div>
                  </div>
                </div>
              </div>
              <div class="widget stay-on-collapse" id="widget-sidebar">
                <nav role="navigation" class="widget-body">
                  <ul class="acc-menu">
                    <li class="nav-separator">Explore</li>
                    <li>
                      <a href="index.php?action=admin_index">
                        <i class="fa fa-home"></i>
                        <span>后台主页</span></a>
                    </li>
                    <li>
                      <a href="javascript:;">
                        <i class="fa fa-cogs"></i>
                        <span>账号管理</span></a>
                      <ul class="acc-menu">
                        <li>
                          <a href="index.php?action=web_user">网站用户</a></li>
						  <li>
                          <a href="index.php?action=web_agent_user">代理用户</a></li>
 <li>
                          <a href="index.php?action=web_op_user">OpenVpn</a></li>
						 <li>

                         <li>  <a href="index.php?action=web_ss_user">ShadowSocks</a></li>
						    
						  
                      </ul>
                
					
					 
					
					
					
                     <li>
                      <a href="index.php?action=work">
                        <i class="fa fa-sitemap"></i>
                        <span>工单管理</span>
                       </a>
                    </li>
					 
					  <li>
                      <a href="index.php?action=web_bill">
                        <i class="fa fa-cny"></i>
                        <span>账单管理</span>
                        <span class="label label-alizarin">New ~</span></a>
                    </li>
					
                    <li class="nav-separator">MANAGE</li>
                               
					<li>
                      <a href="javascript:;">
                        <i class="fa fa-cloud"></i>
                        <span>节点管理</span></a>
                      <ul class="acc-menu"> 
					  <li>
                          <a href="index.php?action=op_node">OpenVPN节点</a></li>
						  <li>
                          <a href="index.php?action=ss_node">ShadowSocks节点</a></li>
					    
 
						   
                        
                      </ul>
                    </li>
					 
					 <li>
                      <a href="javascript:;">
                        <i class="fa fa-shopping-cart"></i>
                        <span>商店管理</span></a>
                      <ul class="acc-menu"> 
					  <li>
                          <a href="index.php?action=shop">商品列表</a></li>
			 
                      </ul>
                    </li>
					 
					 
					 					 <li>
                      <a href="javascript:;">
                        <i class="fa fa-send"></i>
                        <span>常规设置</span></a>
                      <ul class="acc-menu"> 
					  
						<li>
                          <a href="index.php?action=announcements">用户公告</a></li>
						  					<li>
                          <a href="index.php?action=agent_aoment">代理公告</a></li>
						  
						  <li>
                          <a href="index.php?action=Surge">Surge规则</a></li>
						  
                      </ul>
                    </li>
					 
                    <li>
                      <a href="javascript:;">
                        <i class="fa fa-h-square"></i>
                        <span>管理员选项</span></a>
                      <ul class="acc-menu">
					     <li>
                          <a onclick="checkUpdate();">检查更新</a></li>
						  <li>
                          <a href="/app_api" target="_blank">安卓APP后台</a></li>
						    <li>
                          <a href="index.php?action=sys">后台系统设置</a></li>
						  
						    <li>
                         
                      </ul>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>