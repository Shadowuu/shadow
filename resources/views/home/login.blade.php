<!DOCTYPE HTML>
<html>
<head>


<title>Micro-blog</title>

<meta http-equiv="pragma" content="no-cache">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
<meta http-equiv="description" content="This is my page">
<link rel="stylesheet" href="homes/css/login.css" />
<link rel="stylesheet" href="homes/css/base.css" />
<link rel="stylesheet" href="homes/css/login-css3.css" />
<link rel="stylesheet" href="homes/css/login-black.css" />



<meta property="wb:webmaster" content="a401d3d93dade9f0" />
<meta name="renderer" content="webkit">
<script type="text/javascript">
	if (window.parent != window) {
		window.top.location.href = window.location.href;
	}
</script>

<script type="text/javascript" src="homes/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="homes/js/modernizr-min.js"></script>
<script type="text/javascript" src="homes/js/prefixfree-min.js"></script>
<script type="text/javascript" src="homes/js/jquery.base64.js"></script>

</head>

<body>
	<div id="bodybg">
		<img class="loginbg" src="homes/img/headers/2.png"  />
		<div class="xuan-login" id="xuan-login">
			
			<!--  -->
			<div class="login-r" id="login-r" style="margin-top: 100px;">
				<div class="bg"></div>
				<div class="login-rcon">
					<div class="login-head">
						<p style="text-align: center;font-size: 37px">登 录</p>
						
					</div>
					
					<form name="login-form" id="login-form" method="post" action='/a/dologin'>
					{{ csrf_field() }}
						<!--隐藏域-->
						<input type="hidden" name="select" value="userName" id="selectOpt" /> 
						<input type='hidden' name='coSessionId' value='' id="coSessionId"> 
						<input type='hidden' name='coAppName' value='' id="coAppName"> 
						<input type='hidden' name='surl' value='' id="surl"> 
						<input type='hidden' name='cookieTime' value='1' />
						<!--cookie-->
						<!--隐藏域-->

						<div class="login-rcon-h"></div>
						<div class="login-rcon-m" style="z-index: 2;">
							<span class="title name">账号</span> <input name="tel" type="text" class="detail account"  id="user_name" tabIndex="9" placeholder="用户名/手机号/邮箱/炫ID" value="" />
						</div>
						<div class="login-rcon-m">
							<span class="title pwd">密码</span> <input name="pass" type="password" placeholder="请输入您的密码" class="detail"  id="pass" tabIndex="10" />
						</div>
						<!-- 验证码 -->
						<div id="xianshiyanzhegnam" style="display: none;">
							<div class="login-rcon-m">
								<span class="title code">验证码</span> <input type="text" class="detail identify-code" name="vefifycode" id="code" tabIndex="11" /> <img class="identify-img" src="" id="identify" /> <a class="identify-change" href="javascript:void(0);">换一张</a>
							</div>
							<div class="login-rcon-text">您已连续3次登录错误，为确保安全，请输入验证码</div>
						</div>
						<!-- 验证码 end -->
						<div class="login-rcon-m">
							<span class="title none"></span> <span class="auto-panel"> <input class="auto-input" type="checkbox" id="auto-input" name="al" value="checkbox" /><label for="auto-input">自动登录</label> <input class="auto-input" type="checkbox" name="ishidden" id="ishidden" value="checkbox" /><label for="ishidden">隐身登录</label>
							</span> <a class="find-password" href="./getPwd.do" target="_blank">忘记密码?</a>
						</div>
						<!-- getPwd.jsp#phone -->
						<div class="login-rcon-m">
							<span class="title none"></span>
							
							<input class="btn login-btn" type="submit" id="login-submit" value="登录" />
							<a class="passer" id="passer" href="{{ url('/reg') }}">注册通行证</a>
							<!-- 体验账号 -->
						</div>
						<div class="cooperate">
							<div class="bg"></div>
							
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>

	<footer id="footer">
	<p>Copyright © 2000-2100, All Rights Reserved</p>
	
	</footer>
	<script src="homes/js/valid.js"></script>
	<script src="homes/js/script.js"></script>
	<script type="text/javascript" src="homes/js/login-black.js"></script>
</body>

@if(session('msg'))
<script>
	alert("{{ session('msg') }}");
	$('#user_name').val("{{ session('uinfo')['tel'] }}")
</script>
@endif
						


</html>
