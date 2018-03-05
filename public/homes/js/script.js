
//页面事件绑定。
(function($){

	$(window).on("scroll resize",function(){
		$("#footer").css({
			top: $(window).height() + $(document).scrollTop() - 88
		});
	}).trigger("scroll");

	//随机背景图：
	//$("#loginbg").attr({"src":"http://tmisc.home.news.cn/login/images/loginbg" + ( parseInt(Math.random()*7) + 1 )+".png"});
	$("#loginbg").attr({"src":"http://login.home.news.cn/global/images/loginbg2.jpg"});

	//刷新验证码：
	$("#change_register_identify,.identify-change").on("click",function(){
		$("#identify").attr({ "src":"http://login.home.news.cn/rcaptcha.do?random=" + Math.random() }); //验证码保持动态刷新
		$("#register_identify").attr({ "src":"http://login.home.news.cn/rcaptcha.do?random=" + Math.random() }); //验证码保持动态刷新
	}).first().trigger("click");

})(jQuery);


//表单相关
(function($){

	//统一的表单提示
	$.form.settings = {
		initTip: function(input, defaultTip) {
			input.next(".tips")
				.html(defaultTip || "&nbsp;");
		},
		validTip: function(input, errorInfo, defaultTip) {
			if (errorInfo) {
				input.next(".tips")
					.removeClass('ok')
					.addClass("err")
					.html(errorInfo);
			} else {
				input.next(".tips")
					.removeClass('err')
					.addClass("ok")
					.html(defaultTip || "&nbsp;");
			}
		}
	};

	var lowcase = function(input){
		var val = input.val().toLowerCase();
		input.val( val );
		return val;
	};

	//验证参数绑定
	$.form.render({
		//登录字段校验
		"#user_name":{
			before:lowcase,
			option:"valid",
			requiredTip:"用户名需要填写!",
			regexp:/^\S{4,50}$/,
			errorTip:"账号长度为4-50位"
		},
		"#pass":{
			option:"valid",
			requiredTip:"密码需要填写!"
		},
		"#code":{
			option:"valid",
			requiredTip:"验证码需要填写!",
			regexp: /^[A-Za-z0-9]{4,5}$/,
			errorTip:"请输入正确的验证码"
		}
	},{
		required:true,
		option:"blur"
	});


	//绑定登录表单的批量验证
	$("#login-form").on("submit",function(){
		return $(this).formValid(":visible",{
			interrupt:true 	//遇到第一个错误即停止继续
		},{
			validTip:function(input,vReturn){
				if(vReturn){
					alert(vReturn);
				}
			}
		});
	});

	$(function(){
		if(location.hash=="#register"){
			window.top.document.location.href="/reg.jsp";
		} else {
			$("#user_name").focus();
		}

		$.base64.utf8encode = true;
	})

	//$("#login-submit").click(function() {
	//    $("#pass").val($.base64.encode($("#pass").val(), true));
	//});
	$("#pass").keydown(function(e) {
		if(e.keyCode==13){
			$("#login-submit").click();
		}
	});
	$("#login-submit").click(function() {

		var mark= $("#login-form").formValid(":visible",{
			interrupt:true 	//遇到第一个错误即停止继续
		},{
			validTip:function(input,vReturn){
				if(vReturn){
					alert(vReturn);
				}
			}
		});
		var url=window.loginUrl;
		if(mark){
			var tempData={};
			tempData.loginID=$.base64.encode($("#user_name").val(), true);
			tempData.password=$.base64.encode($("#pass").val(), true);
			tempData.vefifycode=$('#code').val();
			tempData.al=$('#auto-input').is(':checked');
			tempData.ishidden=$('#ishidden').is(':checked');
			$.ajax({
				url : url,
				type : "POST",
				dataType : "json",
				data:tempData,
				success : function(res) {
					if (res && null != res) {
						console.log("res  res:"+res);
						switch(res.code){
							case 400:
								alert(res.message);
								break;
							case 401:
								alert(res.message);
								$('#xianshiyanzhegnam').show();
								break;
							case 402:
								alert('验证码填写错误');
								break;
							case 200:
								var urlArr = res.url.split(',');
								for(var i=0; i < urlArr.length; i++)
								{
									$.ajax({
										url : urlArr[i],
										type : "get",
										dataType : "jsonp",
										jsonp: "callback",
										//data:tempData,
										success : function(data) {
										},
										error : function() {
										}
									});
								}
								setTimeout(function(){
									window.location.href=window.targetUrl;
									return;
								}, 1000 );
								/*
								$.ajax({
									url : res.url,
									type : "get",
									dataType : "jsonp",
									jsonp: "callback",
									//data:tempData,
									success : function(data) {
										console.log("cd  data:"+data);
										data=eval("("+data+")");
										if (data && null != data) {
											if(data.code==200){
												window.location.href=window.targetUrl;
												return;
											}
										}
									},
									error : function() {
										//alert("error");
									}
								});
								*/
								break;

						}
					}
				},
				error : function() {
					//alert("error");
				}
			});
		}
	});

})(jQuery);







	function isWeixin(){
		var ua = navigator.userAgent.toLowerCase();
		if(ua.match(/MicroMessenger/i)=="micromessenger") {
			return true;
		} else {
			return false;
		}
	}



// 		var base64Url = base64encode(document.referrer);
// 		document.getElementById("targeturl").value = base64Url;
// 		document.getElementById("surl").value = base64Url;
