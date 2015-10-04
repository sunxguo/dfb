<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <title>微信安全支付</title>

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
	<div style="text-align:center;padding:6px 0;">
		所需支付金额：
		<p>￥ <?php echo $fee;?></p>
	</div>
	</br></br></br></br>
	<div align="center">
		<button style="width:90%; height:40px;line-height:40px; background-color:#FE6714; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:18px;" type="button" onclick="callpay()" >立即支付</button>
	</div>
</body>
</html>