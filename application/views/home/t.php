<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/> 
    <title>微信安全支付</title>
	<style type="text/css">
		*{
			font-family: Microsoft Yahei;
		}
	</style>
	<script type="text/javascript">

		//调用微信JS api 支付
		function jsApiCall()
		{
			WeixinJSBridge.invoke(
				'getBrandWCPayRequest',
				<?php echo $jsApiParameters; ?>,
				function(res){
					WeixinJSBridge.log(res.err_msg);
					alert(res.err_msg);
					//alert(res.err_code+res.err_desc+res.err_msg);
				}
			);
		}

		function callpay()
		{
			if (typeof WeixinJSBridge == "undefined"){
			    if( document.addEventListener ){
			        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
			    }else if (document.attachEvent){
			        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
			        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
			    }
			}else{
			    jsApiCall();
			}
		}
	</script>
</head>
<body>
	<div style="text-align:center;padding:50px 0 20px 0;">
		<p style="color:#777;">所需支付金额:</p>
		<p style="font-weight:600;">￥ <?php echo ($fee/100).'.00';?></p>
	</div>
	<div align="center">
		<button style="width:90%; height:40px;line-height:40px; background-color:#FE6714; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:18px;" type="button" onclick="callpay()" >立即支付</button>
	</div>
</body>
</html>