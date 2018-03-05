

<!DOCTYPE html>
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Micro-blog</title>
    
        <!-- Vendor CSS -->
        <link href="homes/vendors/bower_components/animate/animate.min.css" rel="stylesheet">
        <link href="homes/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="homes/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="homes/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
        <link href="homes/vendors/bower_components/lightgallery/light-gallery/css/lightGallery.css" rel="stylesheet">
            
        <!-- CSS -->
        <link href="homes/css/app.min.1.css" rel="stylesheet">
        <link href="homes/css/app.min.2.css" rel="stylesheet">
    </head>
    
    <body>
        <header id="header" class="clearfix" data-current-skin="blue">
            <ul class="header-inner">
                <li id="menu-trigger" data-trigger="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>

                <li class="logo hidden-xs">
                    <a href="index.html">Micro-blog</a>
                </li>

                <li class="pull-right">
                    <ul class="top-menu">
                        <li id="toggle-width">
                            <div class="toggle-switch">
                                <input id="tw-switch" type="checkbox" hidden="hidden">
                                <label for="tw-switch" class="ts-helper"></label>
                            </div>
                        </li>

                        <li id="top-search">
                            <a href=""><i class="tm-icon zmdi zmdi-search"></i></a>
                        </li>

                        
                        
                        
                        <li class="dropdown">
                            <a data-toggle="dropdown" href=""><i class="tm-icon zmdi zmdi-more-vert"></i></a>
                            <ul class="dropdown-menu dm-icon pull-right">
                                <li class="skin-switch hidden-xs">
                                    <span class="ss-skin bgm-lightblue" data-skin="lightblue"></span>
                                    <span class="ss-skin bgm-bluegray" data-skin="bluegray"></span>
                                    <span class="ss-skin bgm-cyan" data-skin="cyan"></span>
                                    <span class="ss-skin bgm-teal" data-skin="teal"></span>
                                    <span class="ss-skin bgm-orange" data-skin="orange"></span>
                                    <span class="ss-skin bgm-blue" data-skin="blue"></span>
                                </li>
                                <li class="divider hidden-xs"></li>
                                <li class="hidden-xs">
                                    <a data-action="fullscreen" href=""><i class="zmdi zmdi-fullscreen"></i> 全屏查看</a>
                                </li>
                                <li>
                                    <a data-action="clear-localstorage" href=""><i class="zmdi zmdi-delete"></i> 清除历史</a>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </li>
            </ul>


            <!-- Top Search Content -->
            <div id="top-search-wrap">
                <div class="tsw-inner">
                    <i id="top-search-close" class="zmdi zmdi-arrow-left"></i>
                    <input type="text">
                </div>
            </div>
        </header>
        
        <section id="main">
            <aside id="sidebar" class="sidebar c-overflow">
                <div class="profile-menu">
                    <a href="">
                        <div class="profile-pic">
                            <img src="homes/img/profile-pics/1.jpg" alt="">
                        </div>

                        <div class="profile-info">
                            用户

                            <i class="zmdi zmdi-caret-down"></i>
                        </div>
                    </a>

                    <ul class="main-menu">
                        <li>
                            <a href="{{ url('/myIndex') }}"><i class="zmdi zmdi-account"></i> 个人中心</a>
                        </li>
                        <li>
                            <a href=""><i class="zmdi zmdi-input-antenna"></i> 个人设置</a>
                        </li>
                        <li>
                            <a href=""><i class="zmdi zmdi-settings"></i> 系统设置</a>
                        </li>
                        <li>
                            <a href=""><i class="zmdi zmdi-time-restore"></i> 退出登录</a>
                        </li>
                    </ul>
                </div>

                <ul class="main-menu">
                    <li><a href="{{ url('/index') }}"><i class="zmdi zmdi-home"></i> 首页</a></li>
                    <li><a href="{{ url('/login') }}"><i class="zmdi zmdi-globe"></i> 登录</a></li>
                    <li><a href="{{ url('/reg') }}"><i class="zmdi zmdi-globe-alt"></i> 注册</a></li>
                    <li class="sub-menu">
                        <a href=""><i class="zmdi zmdi-widgets"></i> 分类</a>

                        <ul>
                            <li><a href="textual-menu.html">头条</a></li>
                            <li><a href="top-mainmenu.html">新鲜事</a></li>
                            <li><a href="top-mainmenu.html">榜单</a></li>
                            <li><a href="top-mainmenu.html">搞笑</a></li>
                            <li><a href="top-mainmenu.html">社会</a></li>
                            <li><a href="top-mainmenu.html">时尚</a></li>
                            <li><a href="top-mainmenu.html">军事</a></li>
                            <li><a href="top-mainmenu.html">体育</a></li>
                        </ul>
                    </li>
                    
            </aside>

            <aside id="chat" class="sidebar c-overflow">

                <div class="chat-search">
                    <div class="fg-line">
                        <input type="text" class="form-control" placeholder="Search People">
                    </div>
                </div>

                
            </aside>
@section('content')

@show

        </section>
        
        <footer id="footer">
            Copyright &copy; 2015 Material Admin
            
            <ul class="f-menu">
                <li><a href="">Home</a></li>
                <li><a href="">Dashboard</a></li>
                <li><a href="">Reports</a></li>
                <li><a href="">Support</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </footer>

        <!-- Page Loader -->
        <div class="page-loader">
            <div class="preloader pls-blue">
                <svg class="pl-circular" viewBox="25 25 50 50">
                    <circle class="plc-path" cx="50" cy="50" r="20" />
                </svg>

                <p>Please wait...</p>
            </div>
        </div>

        <!-- Older IE warning message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="home/img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="home/img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="home/img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="home/img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="home/img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>   
        <![endif]-->
    
    
        <!-- Javascript Libraries -->
        <script src="homes/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="homes/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        
                <script src="homes/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="homes/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="homes/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="homes/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="homes/vendors/bower_components/lightgallery/light-gallery/js/lightGallery.min.js"></script>
        <script src="homes/vendors/bower_components/autosize/dist/autosize.min.js"></script>
        
        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->
        
        <script src="homes/js/functions.js"></script>
        <script src="homes/js/demo.js"></script>
    
    
    </body>
</html>