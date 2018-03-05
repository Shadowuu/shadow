String.prototype.trim = function(){ return Trim(this);};
function LTrim(str)
{
    var i;
    for(i=0;i<str.length;i++)
    {
        if(str.charAt(i)!=" "&&str.charAt(i)!=" ")break;
    }
    str=str.substring(i,str.length);
    return str;
}
function RTrim(str)
{
    var i;
    for(i=str.length-1;i>=0;i--)
    {
        if(str.charAt(i)!=" "&&str.charAt(i)!=" ")break;
    }
    str=str.substring(0,i+1);
    return str;
}
function Trim(str)
{
    return LTrim(RTrim(str));
}
//页面事件绑定。
(function($){
	//命名空间
	window.RegObj=window.RegObj?window.RegObj:{};
	var _obj=window.RegObj;
	_obj.url={
			getID:'./profile/xuanid.do',
			getPhoneNum:'./profile/getMobileCode.do',
			getBackPhoneNum:'./profile/getMobileCode.do',
			checkBackPhone:'./profile/verifyMobilePhone.do',
			checkPhone:'./profile/verifyMobilePhone.do',
			checkPhoneNum:'./profile/verifyMobileCode.do',
			checkBackEmail:'./profile/passportCheckNew.do',
			checkEmail:'./profile/passportCheckNew.do',
			checkName:'./profile/passportCheckNew.do',
			checkNick:'./profile/passportCheckNew.do'
	};
	_obj.phoneNumTime=60;
	_obj.checkResult=function(_json,_key)
	{
		var _r='';
		_key=_key?_key:'desc';
		if(_json && _json.code!=200)
		{
			_r=_json[_key]?_json[_key]:'输入有误';
		}
		return _r;
	};
	_obj.lowcase=function(_input){
		var _v=_input.val();
        _v = _v.trim().toLowerCase();
		_input.val(_v);
		return _v;
	};
	//点选系统推荐的昵称：
	$(".recommendList").delegate(":radio","click",function(e){
		$(this).parents('.recommendList').prev('.item').find('.textBox').val(this.value).blur();
	});
	//当填写完验证码之后，解除手机验证码的限制
	$("#phoneRegVCode").on("focus",function(){
		$('#getPhoneNum').removeAttr('disabled').show();
	});
	
	
	//获取手机注册动态码
	$("#getPhoneNum").on("click",function(){
		var _phone=$("#phoneRegPhone");
		var _num=$('#phoneRegPhoneNum');
        var _vcode=$('#phoneRegVCode');
		var _but=$(this);
		if( _vcode.val())
		{
			_phone.attr('readonly','readonly');
			_but.attr('disabled','disabled');
			$.ajax({
				url:_obj.url.getPhoneNum,
				data: {phone:_phone.val(),vcode:_vcode.val(),t:new Date().getTime()},
				dataType:"json",
				success:function(_data){
					var _result=_obj.checkResult(_data);
					if(_result){
						alert(_result);
						_phone.removeAttr('readonly');
						_but.removeAttr('disabled');
					}else{
						_num.removeAttr('disabled').focus();
						var _time=_obj.phoneNumTime;
						function changeHtml(){
							if(_time>0)
							{
								_but.html((_time--)+'秒后点击重新发送');
								setTimeout(changeHtml,1000);
							}
							else
							{
								_but.html('再次获取手机动态码').removeAttr('disabled');
								_phone.removeAttr('readonly');
							}
						}
						changeHtml();
					}
				}
			});
		} else {
            alert('请正确填写验证码');
        }
	});
	//获取手机找回动态码
	$("#getBackPhoneNum").on("click",function(){
		var _phone=$("#phoneBackPhone");
		var _num=$('#phoneBackPhoneNum');
        var _vcode=$('#phonePBVCode');
		var _but=$(this);
		if(_phone.val() && _vcode.val() && !_but.attr('disabled'))
		{
			_phone.attr('readonly','readonly');
			_but.attr('disabled','disabled');
			$.ajax({
				url:_obj.url.getBackPhoneNum,
				data: {phone:_phone.val(),vcode:_vcode.val(),t:new Date().getTime()},
				dataType:"json",
				success:function(_data){
					var _result=_obj.checkResult(_data);
					if(_result){
						alert(_result);
						_phone.removeAttr('readonly');
						_but.removeAttr('disabled');
					}else{
						_num.removeAttr('disabled').focus();
						var _time=_obj.phoneNumTime;
						function changeHtml(){
							if(_time>0)
							{
								_but.html((_time--)+'秒后点击重新发送');
								setTimeout(changeHtml,1000);
							}
							else
							{
								_but.html('再次获取手机动态码').removeAttr('disabled');
								_phone.removeAttr('readonly');
							}
						}
						changeHtml();
					}
				}
			});
		} else {
            alert('请正确填写手机号和验证码');
        }
	});
	//获取炫ID
	$("#idRegIDText a").on("click",function(){
		$.ajax({
			url:_obj.url.getID,
			data: {o:$("#idRegIDHash").val(),t:new Date().getTime()},
			dataType:"json",
			success:function(_data){
				if(200==_data.code){
					$("#idRegID").val(_data.desc).trigger("blur");
					$("#idRegIDText").html(_data.desc);
                    var tmpEl=$("#idRegName");
                    if(!tmpEl.val())
                    {
                        tmpEl.val(_data.desc).blur();
                    }
                    tmpEl=$("#idRegNick");
                    if(!tmpEl.val())
                    {
                        tmpEl.val(_data.desc).blur();
                    }
				}else{
					alert(_data.desc);
				}
			}
		});
	});
    _obj.pageType=$('.tab').hasClass('unite')?'unite':'default';
    _obj.hashType=document.location.hash?document.location.hash.substring(1):_obj.pageType=='unite'?'old':'phone';
    _obj.tabs=$('.tab ul li');
    _obj.tabBlocks=$('.tabBlock');
    //设置注册选项卡
    if(_obj.pageType=='unite')
    {
        if(_obj.hashType!='old' && _obj.hashType!='new')
        {
            _obj.hashType='old';
        }
    }
    else
    {
        if(_obj.hashType!='id' && _obj.hashType!='email' && _obj.hashType!='phone')
        {
            _obj.hashType='id';
        }
    }
    _obj.tabs.on('click',function(){
        _obj.tabBlocks.hide();
        _obj.tabs.removeClass('selected');
        $('#'+$(this).addClass('selected').attr('data-tab')+'Reg').show();
        $('#backBlock').show();
    }).each(function(){
            var _tab=$(this);
            if(_tab.attr('data-tab')==_obj.hashType)
            {
                _tab.click();
                if(_obj.hashType=='id')
                {
                    $("#idRegIDText a").click();
                }
            }
        });

	//统一的表单提示
	$.form.settings = {
		initTip: function(input, defaultTip) {
			input.next(".msg")
				.html(defaultTip || "&nbsp;");
		},
		validTip: function(input, errorInfo, defaultTip) {
			if (errorInfo) {
				input.parent().find(".msg")
					.removeClass('success')
					.addClass("error")
					.html(errorInfo);
			} else {
				input.parent().find(".msg")
					.removeClass('error')
					.addClass("success")
					.html(defaultTip || "&nbsp;");
			}
		}
	};
	$.form.render({
	//手机
		"#phoneRegPhone":{
			errorTip:"请填写正确的手机号",
			regexp:/^1\d{10}$/,
			validFun:function(_v){
				var _vR = {errorInfo:""};
				$.ajax({
					url:_obj.url.checkPhone,
					data:{name:"phone",value:_v,type:"json",t:new Date().getTime()},
					dataType:"json",
					success:function(_data){
						_vR.errorInfo=_obj.checkResult(_data);
						if(_vR.errorInfo)
						{
							$('#getPhoneNum').attr('disabled','disabled').hide();
						}
						else
						{
							$('#getPhoneNum').removeAttr('disabled').show();
						}
					},
					async:false
				});
				return _vR;
			}
		},
		"#phoneRegPhoneNum":{
			errorTip:"手机动态码是由6位纯数字组成",
			regexp:/^\d{6}$/,
			validFun:function(_v){
				var _vR = {errorInfo:""};
				$.ajax({
					url:_obj.url.checkPhoneNum,
					data:{name:"num",value:_v,type:"json",t:new Date().getTime()},
					dataType:"json",
					success:function(_data){
						_vR.errorInfo=_obj.checkResult(_data);
						if(_vR.errorInfo)
						{
							$('#phoneRegPhone').removeAttr('readonly');
						}
						else
						{
							$('#phoneRegPhone').attr('readonly','readonly');
							$('#getPhoneNum').attr('disabled','disabled').hide();
						}
					},
					async:false
				});
				return _vR;
			}
		},
		"#phoneRegNick":{
			errorTip:"请输入昵称",
			validFun:function(_v){
				var _vR = {errorInfo:""};
				$.ajax({
					url:_obj.url.checkNick,
					data:{name:"nickName",value:_v,type:"json",t:new Date().getTime()},
					dataType:"json",
					success:function(_data){
						_vR.errorInfo=_obj.checkResult(_data);
						$("#phoneRegNickList").html("");
						if(_vR.errorInfo && _data.nnList)
						{
							_vR.nnList = _data.nnList;
							var _html = '<li>推荐您选用以下昵称</li>';
							for (var _i = 0; _i < _data.nnList.length-1; _i++) {
								_html += '<li><label><input type="radio" class="radioBox" value="'+_v+_data.nnList[_i]+'">'+_v+_data.nnList[_i]+'</label></li>';
							}
							_html += '<li><label><input type="radio" class="radioBox" value="'+_data.nnList[_i]+'">'+_data.nnList[_data.nnList.length-1]+'(以此炫ID作为昵称)</label></li>';
							$("#phoneRegNickList").html(_html);
						}
					},
					async:false
				});
				return _vR;
			},
			end:function(_input,_vR)
			{
				if(!_vR.nnList)
				{
					$("#phoneRegNickList").html("");
				}
			}
		},
		"#phoneRegPwd":{
			lenTip:"需要6到16个字符。",
			errorTip:"密码不能全为数字。",
			minlen:6,
			maxlen:16,
			regexp:/[^0-9]+/,
			option:"keyup blur"
		},
		"#phoneRegPwd1":{
			minlen:6,
			maxlen:16,
			regexp:/[^0-9]+/,
			errorTip:"密码不能全为数字。",
			validFun:function(_v){
				var _vR = {errorInfo:""};
				if( _v != $("#phoneRegPwd").val() ){
					_vR.errorInfo = "两次密码输入不一致!";
				}
				return _vR;
			}
		},
		"#phoneRegAgree":{
			option:"click",
			end:function(input){
				if( !input.is(":checked") ){
					input.vReturn = "需要同意新华网协议才能注册。"
					alert("需要同意新华网协议才能注册。");
				}
			}
		},
	//邮箱
		"#emailRegEmail":{
			errorTip:"邮箱格式不正确",
			type:"email",
			validFun:function(_v){
				var _vR = {errorInfo:""};
				$.ajax({
					url:_obj.url.checkEmail,
					data:{name:"email",value:_v,type:"json",t:new Date().getTime()},
					dataType:"json",
					success:function(_data){
						_vR.errorInfo=_obj.checkResult(_data);
					},
					async:false
				});
				return _vR;
			}
		},
		"#emailRegNick":{
			errorTip:"请输入昵称",
			validFun:function(_v){
				var _vR = {errorInfo:""};
				$.ajax({
					url:_obj.url.checkNick,
					data:{name:"nickName",value:_v,type:"json",t:new Date().getTime()},
					dataType:"json",
					success:function(_data){
						_vR.errorInfo=_obj.checkResult(_data);
						$("#emailRegNickList").html("");
						if(_vR.errorInfo && _data.nnList)
						{
							_vR.nnList = _data.nnList;
							var _html = '<li>推荐您选用以下昵称</li>';
							for (var _i = 0; _i < _data.nnList.length-1; _i++) {
								_html += '<li><label><input type="radio" class="radioBox" value="'+_v+_data.nnList[_i]+'">'+_v+_data.nnList[_i]+'</label></li>';
							}
							_html += '<li><label><input type="radio" class="radioBox" value="'+_data.nnList[_i]+'">'+_data.nnList[_data.nnList.length-1]+'(以此炫ID作为昵称)</label></li>';
							$("#emailRegNickList").html(_html);
						}
					},
					async:false
				});
				return _vR;
			},
			end:function(_input,_vR)
			{
				if(!_vR.nnList)
				{
					$("#emailRegNickList").html("");
				}
			}
		},
		"#emailRegPwd":{
			lenTip:"需要6到16个字符。",
			errorTip:"密码不能全为数字。",
			minlen:6,
			maxlen:16,
			regexp:/[^0-9]+/,
			option:"keyup blur"
		},
		"#emailRegPwd1":{
			minlen:6,
			maxlen:16,
			regexp:/[^0-9]+/,
			errorTip:"密码不能全为数字。",
			validFun:function(_v){
				var _vR = {errorInfo:""};
				if( _v != $("#emailRegPwd").val() ){
					_vR.errorInfo = "两次密码输入不一致!";
				}
				return _vR;
			}
		},
		"#emailRegAgree":{
			option:"click",
			end:function(input){
				if( !input.is(":checked") ){
					input.vReturn = "需要同意新华网协议才能注册。"
					alert("需要同意新华网协议才能注册。");
				}
			}
		},
	//ID
		"#idRegID":{
			errorTip:"请点击快速获取炫ID",
			regexp:/^\d+$/
		},
		"#idRegName":{
			before:_obj.lowcase,
			errorTip:"用户名由英文和数字组成6-26位。",
			regexp:/^\w{6,26}$/,
			validFun:function(_v){
				var _vR = {errorInfo:""};
				$.ajax({
					url:_obj.url.checkName,
					data:{name:"userName",value:_v,type:"json",t:new Date().getTime()},
					dataType:"json",
					success:function(_data){
						_vR.errorInfo=_obj.checkResult(_data);
						$("#idRegNameList").html("");
						if(_vR.errorInfo && _data.nnList)
						{
							_vR.nnList = _data.nnList;
							var _html = '<li>推荐您选用以下用户名</li>';
							for (var _i = 0; _i < _data.nnList.length-1; _i++) {
								_html += '<li><label><input type="radio" class="radioBox" value="'+_v+_data.nnList[_i]+'">'+_v+_data.nnList[_i]+'</label></li>';
							}
							_html += '<li><label><input type="radio" class="radioBox" value="'+_data.nnList[_i]+'">'+_data.nnList[_data.nnList.length-1]+'(以此炫ID作为用户名)</label></li>';
							$("#idRegNameList").html(_html);
						}
					},
					async:false
				});
				return _vR;
			},
			end:function(_input,_vR)
			{
				if(!_vR.nnList)
				{
					$("#idRegNameList").html("");
				}
			}
		},
		"#idRegNick":{
			errorTip:"请输入昵称",
			validFun:function(_v){
				var _vR = {errorInfo:""};
				$.ajax({
					url:_obj.url.checkNick,
					data:{name:"nickName",value:_v,type:"json",t:new Date().getTime()},
					dataType:"json",
					success:function(_data){
						_vR.errorInfo=_obj.checkResult(_data);
						$("#idRegNickList").html("");
						if(_vR.errorInfo && _data.nnList)
						{
							_vR.nnList = _data.nnList;
							var _html = '<li>推荐您选用以下昵称</li>';
							for (var _i = 0; _i < _data.nnList.length-1; _i++) {
								_html += '<li><label><input type="radio" class="radioBox" value="'+_v+_data.nnList[_i]+'">'+_v+_data.nnList[_i]+'</label></li>';
							}
							_html += '<li><label><input type="radio" class="radioBox" value="'+_data.nnList[_i]+'">'+_data.nnList[_data.nnList.length-1]+'(以此炫ID作为昵称)</label></li>';
							$("#idRegNickList").html(_html);
						}
					},
					async:false
				});
				return _vR;
			},
			end:function(_input,_vR)
			{
				if(!_vR.nnList)
				{
					$("#idRegNickList").html("");
				}
			}
		},
		"#idRegPwd":{
			lenTip:"需要6到16个字符。",
			errorTip:"密码不能全为数字。",
			minlen:6,
			maxlen:16,
			regexp:/[^0-9]+/,
			option:"keyup blur"
		},
		"#idRegPwd1":{
			minlen:6,
			maxlen:16,
			regexp:/[^0-9]+/,
			errorTip:"密码不能全为数字。",
			validFun:function(_v){
				var _vR = {errorInfo:""};
				if( _v != $("#idRegPwd").val() ){
					_vR.errorInfo = "两次密码输入不一致!";
				}
				return _vR;
			}
		},
		"#idRegAgree":{
			option:"click",
			end:function(input){
				if( !input.is(":checked") ){
					input.vReturn = "需要同意新华网协议才能注册。"
					alert("需要同意新华网协议才能注册。");
				}
			}
		},
	//老用户
		"#oldRegName":{ 
			before:_obj.lowcase,
			option:"keyup blur",
			requiredTip:"用户名需要填写!",
			regexp:/^\S{4,50}$/,
			errorTip:"账号长度为4-50位"
		},
		"#oldRegPwd":{ 
			option:"keyup blur",
			requiredTip:"密码需要填写!"
		},
	//新用户
		"#newRegNick":{
			errorTip:"请输入昵称",
			validFun:function(_v){
				var _vR = {errorInfo:""};
				$.ajax({
					url:_obj.url.checkNick,
					data:{name:"nickName",value:_v,type:"json",t:new Date().getTime()},
					dataType:"json",
					success:function(_data){
						_vR.errorInfo=_obj.checkResult(_data);
						$("#newRegNickList").html("");
						if(_vR.errorInfo && _data.nnList)
						{
							_vR.nnList = _data.nnList;
							var _html = '<li>推荐您选用以下昵称</li>';
							for (var _i = 0; _i < _data.nnList.length-1; _i++) {
								_html += '<li><label><input type="radio" class="radioBox" value="'+_v+_data.nnList[_i]+'">'+_v+_data.nnList[_i]+'</label></li>';
							}
							_html += '<li><label><input type="radio" class="radioBox" value="'+_data.nnList[_i]+'">'+_data.nnList[_data.nnList.length-1]+'(以此炫ID作为昵称)</label></li>';
							$("#newRegNickList").html(_html);
						}
					},
					async:false
				});
				return _vR;
			},
			end:function(_input,_vR)
			{
				if(!_vR.nnList)
				{
					$("#newRegNickList").html("");
				}
			}
		},
		"#newRegPwd":{
			lenTip:"需要6到16个字符。",
			errorTip:"密码不能全为数字。",
			minlen:6,
			maxlen:16,
			regexp:/[^0-9]+/,
			option:"keyup blur"
		},
		"#newRegPwd1":{
			minlen:6,
			maxlen:16,
			regexp:/[^0-9]+/,
			errorTip:"密码不能全为数字。",
			validFun:function(_v){
				var _vR = {errorInfo:""};
				if( _v != $("#newRegPwd").val() ){
					_vR.errorInfo = "两次密码输入不一致!";
				}
				return _vR;
			}
		},
		"#newRegAgree":{
			option:"click",
			end:function(input){
				if( !input.is(":checked") ){
					input.vReturn = "需要同意新华网协议才能注册。"
					alert("需要同意新华网协议才能注册。");
				}
			}
		},
	//纯手机注册
		"#phoneNickNick":{
			errorTip:"请输入昵称",
			validFun:function(_v){
				var _vR = {errorInfo:""};
				$.ajax({
					url:_obj.url.checkNick,
					data:{name:"nickName",value:_v,type:"json",t:new Date().getTime()},
					dataType:"json",
					success:function(_data){
						_vR.errorInfo=_obj.checkResult(_data);
						$("#phoneNickNickList").html("");
						if(_vR.errorInfo && _data.nnList)
						{
							_vR.nnList = _data.nnList;
							var _html = '<li>推荐您选用以下昵称</li>';
							for (var _i = 0; _i < _data.nnList.length-1; _i++) {
								_html += '<li><label><input type="radio" class="radioBox" value="'+_v+_data.nnList[_i]+'">'+_v+_data.nnList[_i]+'</label></li>';
							}
							//_html += '<li><label><input type="radio" class="radioBox" value="'+_data.nnList[_i]+'">'+_data.nnList[_data.nnList.length-1]+'(以此炫ID作为昵称)</label></li>';
							$("#phoneNickNickList").html(_html);
						}
					},
					async:false
				});
				return _vR;
			},
			end:function(_input,_vR)
			{
				if(!_vR.nnList)
				{
					$("#phoneNickNickList").html("");
				}
			}
		},
		"#phoneNickAgree":{
			option:"click",
			end:function(input){
				if( !input.is(":checked") ){
					input.vReturn = "需要同意新华网协议才能注册。"
					alert("需要同意新华网协议才能注册。");
				}
			}
		},
	//手机找回
		"#phoneBackPhone":{
			errorTip:"请填写正确的手机号",
			regexp:/^1\d{10}$/,
			validFun:function(_v){
				var _vR = {errorInfo:""};
				//此方法会返回注册页面，需要判断是平台还是项目
				var parameter ={
						name:"phone",
						value:_v,
						type:"json",
						t:new Date().getTime(),
						isback:true//区别是找回密码还是注册
				};
				$.ajax({
					url:_obj.url.checkBackPhone,
					data:parameter,
					dataType:"json",
					success:function(_data){
						_vR.errorInfo=_obj.checkResult(_data);
						if(_vR.errorInfo)
						{
							$('#getBackPhoneNum').attr('disabled','disabled').hide();
						}
						else
						{
							$('#getBackPhoneNum').removeAttr('disabled').show();
						}
					},
					async:false
				});
				return _vR;
			}
		},
		"#phoneBackPhoneNum":{
			errorTip:"手机动态码是由6位纯数字组成",
			regexp:/^\d{6}$/,
			validFun:function(_v){
				var _vR = {errorInfo:""};
				$.ajax({
					url:_obj.url.checkPhoneNum,
					data:{name:"num",value:_v,type:"json",t:new Date().getTime()},
					dataType:"json",
					success:function(_data){
						_vR.errorInfo=_obj.checkResult(_data);
						if(_vR.errorInfo)
						{
							$('#phoneBackPhone').removeAttr('readonly');
						}
						else
						{
							$('#phoneBackPhone').attr('readonly','readonly');
							$('#getPhoneNum').attr('disabled','disabled').hide();
						}
					},
					async:false
				});
				return _vR;
			}
		},
	//邮箱找回
		"#emailBackEmail":{
			errorTip:"邮箱格式不正确",
			type:"email",
			validFun:function(_v){
				var _vR = {errorInfo:""};
				$.ajax({
					url:_obj.url.checkBackEmail,
					data:{name:"email",value:_v,type:"json",t:new Date().getTime(),isback:true},//区别是找回密码还是注册
					dataType:"json",
					success:function(_data){
						_vR.errorInfo=_obj.checkResult(_data);
					},
					async:false
				});
				return _vR;
			}
		},
	//找回重设密码
		"#BackPwd":{
			lenTip:"需要6到16个字符。",
			errorTip:"密码不能全为数字。",
			minlen:6,
			maxlen:16,
			regexp:/[^0-9]+/,
			option:"keyup blur"
		},
		"#BackPwd1":{
			minlen:6,
			maxlen:16,
			regexp:/[^0-9]+/,
			errorTip:"密码不能全为数字。",
			validFun:function(_v){
				var _vR = {errorInfo:""};
				if( _v != $("#BackPwd").val() ){
					_vR.errorInfo = "两次密码输入不一致!";
				}
				return _vR;
			}
		}
	},{
		required:true,
		option:"blur"
	});

	//绑定注册表单的批量验证
	$("#phoneRegForm, #emailRegForm, #idRegForm, #oldRegForm, #newRegForm, #phoneNickForm, #phoneBackForm, #emailBackForm, #backForm").on("submit",function(){
		if( $(this).formValid("input")){
	        $("input[name='register_pass']").each(function(i,o){
	            $(o).val($.base64.encode($(o).val(),true));
	        });
	        $("input[name='pass_word']").val($.base64.encode($("input[name='pass_word']").val(), true));
	        $("input[name='newRegPwd1']").val($.base64.encode($("input[name='newRegPwd1']").val(), true));
	        $("input[name='idRegPwd1']").val($.base64.encode($("input[name='idRegPwd1']").val(), true));
	        $("input[name='emailRegPwd1']").val($.base64.encode($("input[name='emailRegPwd1']").val(), true));
	        $("input[name='phoneRegPwd1']").val($.base64.encode($("input[name='phoneRegPwd1']").val(), true));
	        return true;
		}
		return false;
	});

    $("#refreshVCode").click(function(){
        $("#verifyCodeId").attr("src","/rcaptcha.do?_t="+Math.random());
    });
    $(function(){
        $("#refreshVCode").click();
    });
})(jQuery);
