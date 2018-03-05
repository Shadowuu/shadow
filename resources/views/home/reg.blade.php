


<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="renderer" content="webkit" />
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
<meta http-equiv="description" content="This is my page">
<title>Micro-blog</title>

<script type="text/javascript" src="homes/js/jquery-1.10.2.min.js"></script>
<script src="homes/js/valid.js"></script>

</head>
<body>
	@if(session('msg'))
	
		<h1>{{ session('msg') }}</h1>
		
	@endif
	<div class="regBody">
			<div class="regBox">
			<div class="head">
				<p style="text-align: center;font-size: 37px">注 册</p>
				<div class="bg"></div>
			</div>
			<!-- tab 注册div -->
			<div class="body" id="" style="display: block;">
				<div class="tab" id="zhuceOrBangding" style="display: none">
					<!-- unite -->
					<ul>
						
						<li id="phoneTab" data-tab="phone"><a href="javascript:void(0);">手机注册</a><span class="bg"></span></li>
						
					</ul>
					<div class="bg"></div>
				</div>
				
				<div class="tabBox">
					<div id="phoneReg" class="tabBlock">
                                   <!-- 手机注册第-部 -->
        				<form id="phoneRegForm" method="post" action="{{ url('/doReg') }}" >
        				    <input type="hidden" name="t" value="1" /> 
                                {{ csrf_field() }}
        							<div class="text">
        								* 便于登录、且忘记密码后可使用手机号码取回密码<br />* 昵称设定后，不可修改
										<a class="bindphone" style="cursor:pointer;padding: 4px 4px;display: none;
										position: absolute;right: 15px;top:145px;background: #6cafe2;color: #fff;
										border-radius: 3px;font-size: 12px;">绑定手机</a>

									</div>
                                   <input type="hidden" name="p_step" value="1"/>
          							<label class="item" >
                                          <span class="name">手机号码</span>
                                          <span class="input">
             							       <input type="text" class="textBox long" name="tel" id="phoneRegPhone" maxlength="11" autocomplete="off" placeholder="可用于登录、密码召回等服务" /><br />
             							       
             							       <a href="javascript:void(0);" onclick="sendcode()" id = "sendcode">发送验证码</a>
                                             <span class="msg"></span>
                                             

                                          </span>
                                     </label> 
                                     
                                     <label class="item">
                                        <span class="name">验证码</span>
                                        <span class="input">
                                            <input type = "text" name="code" id="writecode" placeholder="请输入验证码" class = "textBox long" oncontextmenu="return false" onpaste="return false" value="" />
                                            <span class="msg"></span>
                                        </label>
                                     <label class="item">
                                        <span class="name">昵称</span>
                                        <span class="input">
                                            <input type="text" class="textBox long" name="nickName" id="phoneRegNick" autocomplete="off" placeholder="可由中文、英文、字母和数字组成" />
                                            <span class="msg"></span>
                                        </span>
                                     </label> 
           							<ul class="recommendList" id="phoneRegNickList"></ul>
                                    <label class="item">
                                         <span class="name">设定密码</span>
                                         <span class="input">
                                             <input type="password" class="textBox" name="pass" id="phoneRegPwd"  autocomplete="off" placeholder="6-16位字符" />
                                             <span class="msg"></span>
                                         </span>
                                    </label>
                                    <label class="item">
                                         <span class="name">确定密码</span>
                                         <span class="input">
                                             <input type="password" class="textBox" name="rpass" id="phoneRegPwd1"  autocomplete="off" placeholder="请再次输入您设置的密码" />
                                             <span class="msg"></span>
                                         </span>
                                    </label>
        							<div class="item other">
        								<input type="submit" class="buttonBox" id="Submit" value="下一步" />
                                        <input type="reset" class="buttonBox" id="phoneRegReset" value="重置" />
        							</div>
        				
                                  
        				</form>
					</div>
                    
				</div>
			</div>
			<!-- tab 注册div end -->
			<div class="bg"></div>
		</div>
		<div class="bodyBg">
			<img id="bgImg" class="bgImg" src="homes/img/body-bg.jpg" />
		</div>
		<div class="footer">
			<p>Copyright © 2000-2100, All Rights Reserved</p>
			
		</div>
	</div>
	
	<script type="text/javascript">
		(function() {


			function getQueryString(name) {
				var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
				var r = window.location.search.substr(1).match(reg);
				if (r != null) 
					return unescape(r[2]); 
				return null;
			}
			var href = window.location.href;
			var hrefs = href.split("?");
			var par = "";
			if (hrefs.length > 1) {
				par = hrefs[1];
			}
			$.ajax({
				url : "./initRegister.do?" + par,
				type : "POST",
				dataType : "json",
				async : false,
				success : function(res) {
					if (null != res) {
						jQuery.each(res, function(name, value) {
							setValues(name,value);
						});
					}
				},
				error : function() {
					console("err");
				}
			});
		})();
		function setValues(name,value){
			if (name == "tabunite") {
				if (value == "tabunite") {
					$("#zhuceOrBangding").attr("class", "tab unite");
				} else if (value == "tab") {
					$("#zhuceOrBangding").attr("class", "tab");
				}
			} else if (name == "siteName") {
				$("#oldSiteName").html(value);
				$("#newSiteName").html(value);
			} else if (name == "nick") {
				$("#newRegNick").val(value);
			} else if (name == "autoXuanId") {
				$("#xuanID_").html(value);

			} else if(name=="login"){
				$("#goLogin").val(value);
			} else if(name=="redirect"){
				window.location = value;
			}
		}
		//添加手机绑定按钮
		$('.bindphone').on('click',function(){
			$('.tabBlock').hide();
			$('#zhuceOrBangding').find('li').removeClass('selected');
			$('#phoneTab').addClass('selected').show();
			$('#phoneReg').show();
		});




		//验证码
		if ($('#sendcode').html() == '发送验证码')
		  {
		      var zhuce = $("#submit");
		      zhuce.attr("disabled",true).html("您未发送验证码");
		  }else {
		      zhuce.html('注册');
		  }
		    //获取用户输入的手机号
		    function sendcode() {
		        var phone_number = $("#phoneRegPhone").val();
		        if (true == this.stop) return false;//防止重复点击
		        this.stop = true;
		       // alert(phone_number);

		        var btn = $('#sendcode');
		        btn.attr("disabled", true).html("正在发送");
		        var _no = 60;
		        var time = setInterval(function () {
		            _no--;
		            btn.html(_no + "秒后重发");
		            if (_no == 0) {
		                //btn.attr("disabled", false).html("获取验证码");
		                btn.removeAttr('disabled').html("重新获取验证码");
		                this.stop = false;
		                _no = 60;
		                clearInterval(time);
		            }
		        }, 1000);

		        if ($('#sendcode').html() == '发送验证码')
		        {
		            var zhuce = $("#Submit");
		            zhuce.attr("disabled",true).html("您未发送验证码");
		        }else {
		            $('#Submit').removeAttr('disabled').html('注册');
		        }
		       
		        $.post('{{url("/reg/SMS")}}',{'phone':phone_number,'_token':'{{csrf_token()}}'},function(data){
	            console.log(data);
	            var data = JSON.parse(data);
	            if(data.status == 0){
	                alert(data.message);
	            }else{
	                alert('发送失败，请重新发送');
	            }
	        })
	    }


	</script>
	
	<link rel="stylesheet" type="text/css" href="homes/css/default.css" />
	<script src="homes/js/default.js"></script>
	<script type="text/javascript" src="homes/js/jquery.base64.js"></script>
</body>
</html>
