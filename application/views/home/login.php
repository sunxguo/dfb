<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>后生洗车-登录</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="/assets/css/template.css"/>
<link rel="stylesheet" href="/assets/css/base.css"/>
<link rel="stylesheet" href="/assets/css/washcar.css"/>
<script src="/assets/js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="/assets/js/common.js" type="text/javascript"></script>
</head>
<body>
	<div id="messageTip" class="layer message-tip">
		ssssssss
	</div>
	<div class="layer login-tip">
		多方变到家承诺严格保密车主隐私<br>
		多方变到家秉承全心全意为人民服务的宗旨
	</div>
	<div class="layer">
		<div class="login-phone-input">
			<img src="/assets/images/car/u78.png" width="16" height="24">
			<input id="phone" type="text" placeholder="请输入手机号">
		</div>
	</div>
	<div class="layer">
		<div class="getauth-btn" onclick="getAuthCode();">获取验证码</div>
	</div>
	<div class="layer login-auth">
		<input id="authcode" class="login-auth-code" type="text" placeholder="请输入验证码">
		<div class="login-btn" onclick="login();">登录</div>
	</div>
</body>
<script type="text/javascript">
function getAuthCode(){
	var getAuthCode = new Object();
	getAuthCode.infoType = 'authcode';
	getAuthCode.phone = $("#phone").val();
	dataHandler("/common/getInfo",getAuthCode,null,null,null,successGetAuthCode(),false,true);
}
function successGetAuthCode(){
	$("#messageTip").text('验证码发送成功！');
	$("#messageTip").slideDown();
	setTimeout(hideMessageTip,2000);
}
function hideMessageTip(){
	$("#messageTip").slideUp();
}
function login(){
	var login = new Object();
	login.infoType = 'login';
	login.phone = $("#phone").val();
	login.authcode = $("#authcode").val();
	dataHandler("/common/getInfo",login,null,null,null,successLogin,false,true);
}
function successLogin(){
	location.href="/home";
}
$(document).ready(function(){
	var regMobile = /^0?1[3|4|5|8][0-9]\d{8}$/;//手机
	var isMobile=false;
	$("#phone").bind('input propertychange', function(){
		if(regMobile.test($("#phone").val())){
			$(".getauth-btn").addClass("active");
			isMobile=true;
		}else{
			$(".getauth-btn").removeClass("active");
			isMobile=false;
		}
	});
	$("#authcode").bind('input propertychange', function(){
		if(isMobile && $("#authcode").val().length==6){
			$(".login-btn").addClass("active");
		}else{
			$(".login-btn").removeClass("active");
		}
	});
});
</script>
</html>