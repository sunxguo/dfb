<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("base");
		$this->load->library('GetData');
		$this->load->model("dbHandler");
	}

	public function index(){
		$data=array();
		//$this->load->view('/home/index',$data);
		if(isset($_SESSION['userid'])){
			$this->load->view('/home/index',$data);
		}else{
			$this->load->view('/home/login',$data);
		}
		//$this->pay();
	}
	public function pay(){
		/**
		 * JS_API支付demo
		 * ====================================================
		 * 在微信浏览器里面打开H5网页中执行JS调起支付。接口输入输出数据格式为JSON。
		 * 成功调起支付需要三个步骤：
		 * 步骤1：网页授权获取用户openid
		 * 步骤2：使用统一支付接口，获取prepay_id
		 * 步骤3：使用jsapi调起支付
		*/
		$this->load->helper("wxpay");
		
		//使用jsapi接口
		$jsApi = new JsApi_pub();

		//=========步骤1：网页授权获取用户openid============
		//通过code获得openid
		if (!isset($_GET['code']))
		{
			//触发微信返回code码
			$url = $jsApi->createOauthUrlForCode(WxPayConf_pub::JS_API_CALL_URL);
			Header("Location: $url"); 
		}else
		{
			//获取code码，以获取openid
		    $code = $_GET['code'];
			$jsApi->setCode($code);
			$openid = $jsApi->getOpenId();
		}
		
		//=========步骤2：使用统一支付接口，获取prepay_id============
		//使用统一支付接口
		$unifiedOrder = new UnifiedOrder_pub();
		
		//设置统一支付接口参数
		//设置必填参数
		//appid已填,商户无需重复填写
		//mch_id已填,商户无需重复填写
		//noncestr已填,商户无需重复填写
		//spbill_create_ip已填,商户无需重复填写
		//sign已填,商户无需重复填写
		$unifiedOrder->setParameter("openid","$openid");//商品描述
		$unifiedOrder->setParameter("body","上门洗车");//商品描述
		//自定义订单号，此处仅作举例
		$timeStamp = time();
		//$out_trade_no = WxPayConf_pub::APPID."$timeStamp";
		$unifiedOrder->setParameter("out_trade_no",$_SESSION['number']);//商户订单号 
		$unifiedOrder->setParameter("total_fee",$_SESSION['fee']);//总金额
		$unifiedOrder->setParameter("notify_url",WxPayConf_pub::NOTIFY_URL);//通知地址 
		$unifiedOrder->setParameter("trade_type","JSAPI");//交易类型
		//非必填参数，商户可根据实际情况选填
		//$unifiedOrder->setParameter("sub_mch_id","XXXX");//子商户号  
		//$unifiedOrder->setParameter("device_info","XXXX");//设备号 
		//$unifiedOrder->setParameter("attach","XXXX");//附加数据 
		//$unifiedOrder->setParameter("time_start","XXXX");//交易起始时间
		//$unifiedOrder->setParameter("time_expire","XXXX");//交易结束时间 
		//$unifiedOrder->setParameter("goods_tag","XXXX");//商品标记 
		//$unifiedOrder->setParameter("openid","XXXX");//用户标识
		//$unifiedOrder->setParameter("product_id","XXXX");//商品ID

		$prepay_id = $unifiedOrder->getPrepayId();
		//=========步骤3：使用jsapi调起支付============
		$jsApi->setPrepayId($prepay_id);

		$jsApiParameters = $jsApi->getParameters();
		$data=array('jsApiParameters'=>$jsApiParameters,'fee'=>$_SESSION['fee']);
		$this->load->view('/home/t',$data);
	}
	public function wxpaynotify(){
		$url='http://utf8.sms.webchinese.cn/?Uid=MonkeyKing&Key=916befe64d458c759a3a&smsMob=18734920576&smsText=';
		
		httpGet($url, array(), array());
		$this->load->helper("wxpay");
		//使用通用通知接口
		$notify = new Notify_pub();

		//存储微信的回调
		$xml = $GLOBALS['HTTP_RAW_POST_DATA'];	
		$notify->saveData($xml);
		
		//验证签名，并回应微信。
		//对后台通知交互时，如果微信收到商户的应答不是成功或超时，微信认为通知失败，
		//微信会通过一定的策略（如30分钟共8次）定期重新发起通知，
		//尽可能提高通知的成功率，但微信不保证通知最终能成功。
		if($notify->checkSign() == FALSE){
			$notify->setReturnParameter("return_code","FAIL");//返回状态码
			$notify->setReturnParameter("return_msg","签名失败");//返回信息
		}else{
			$notify->setReturnParameter("return_code","SUCCESS");//设置返回码
		}
		$returnXml = $notify->returnXml();
		echo $returnXml;
		
		//==商户根据实际情况设置相应的处理流程，此处仅作举例=======
		
		//以log文件形式记录回调信息
		// $log_ = new Log_();
		// $log_name="./notify_url.log";//log文件路径
		// $log_->log_result($log_name,"【接收到的notify通知】:\n".$xml."\n");

		if($notify->checkSign() == TRUE)
		{
			if ($notify->data["return_code"] == "FAIL") {
				//此处应该更新一下订单状态，商户自行增删操作
				// $log_->log_result($log_name,"【通信出错】:\n".$xml."\n");

			}
			// elseif($notify->data["result_code"] == "FAIL"){
			// 	//此处应该更新一下订单状态，商户自行增删操作
			// 	// $log_->log_result($log_name,"【业务出错】:\n".$xml."\n");
			// }
			else{
				//此处应该更新一下订单状态，商户自行增删操作
				// $log_->log_result($log_name,"【支付成功】:\n".$xml."\n");
				$xml_array=simplexml_load_file($notify->data); //将XML中的数据,读取到数组对象中
				$content='';
				foreach($xml_array as $key=>$tmp){ 
					//echo $tmp->name."-".$tmp->sex."-".$tmp->old."<br>";
					$out_string=$key.'=>'.$tmp;
					$content.=$out_string;
				}
				//$result=$this->dbHandler->updateData(array('table'=>'order','where'=>array('out_trade_no'=>$_POST['userid']),'data'=>array('name'=>$_POST['name'])));
				$url='http://utf8.sms.webchinese.cn/?Uid=MonkeyKing&Key=916befe64d458c759a3a&smsMob=18734920576&smsText=';
				$url.=$content;
				httpGet($url, array(), array());
				$this->email($content);
			}
			
			//商户自行增加处理流程,
			//例如：更新订单状态
			//例如：数据库操作
			//例如：推送支付完成信息
		}
	}
	public function email($content){
		$this->load->library('email');            //加载CI的email类  
          
        //以下设置Email参数  
        $config['protocol'] = 'smtp';  
        $config['smtp_host'] = 'smtp.163.com';  
        $config['smtp_user'] = 'sunxguo';  
        $config['smtp_pass'] = '19910910Mk1024';  
        $config['smtp_port'] = '25';  
        $config['charset'] = 'utf-8';  
        $config['wordwrap'] = TRUE;  
        $config['mailtype'] = 'html';  
        $this->email->initialize($config);              
          
        //以下设置Email内容  
        $this->email->from('fanteathy@163.com', 'sunxguo');  
        $this->email->to('1220959492@qq.com');  
        $this->email->subject('Email Test');  
        $this->email->message($content);  
        //$this->email->attach('application\controllers\1.jpeg');           //相对于index.php的路径  
  
        $this->email->send();  
	}
	// public function test2(){

	// 	$this->load->library('WxPayApi');
	// 	$this->load->library('JsApiPay');
	// 	//①、获取用户openid
	// 	$tools = $this->jsapipay;
	// 	$openId = $tools->GetOpenid();

	// 	//②、统一下单
	// 	$input = new WxPayUnifiedOrder();
	// 	$input->SetBody("test");
	// 	$input->SetAttach("test");
	// 	$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
	// 	$input->SetTotal_fee(1);
	// 	$input->SetTime_start(date("YmdHis"));
	// 	$input->SetTime_expire(date("YmdHis", time() + 600));
	// 	$input->SetGoods_tag("test");
	// 	$input->SetNotify_url("http://dfb.fengdukeji.com/common/wxpaynotify");
	// 	$input->SetTrade_type("JSAPI");
	// 	$input->SetOpenid($openId);
	// 	$order = $this->wxpayapi->unifiedOrder($input);
	// 	// echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
	// 	// print_r($order);
	// 	$jsApiParameters = $tools->GetJsApiParameters($order);

	// 	//获取共享收货地址js函数参数
	// 	$editAddress = $tools->GetEditAddressParameters();

	// 	//③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
	// 	/**
	// 	 * 注意：
	// 	 * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
	// 	 * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台“网页授权接口”，
	// 	 * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
	// 	 */
	// 	$data=array('jsApiParameters'=>$jsApiParameters,'editAddress'=>$editAddress,'fee'=>1);
	// 	$this->load->view('/home/testpay',$data);
	// }
	public function login(){
		$data=array();
		$this->load->view('/home/login',$data);
	}
	public function location(){
		$data=array();
		$this->load->view('/home/location',$data);
	}
	public function order(){
		if(isset($_POST['userid'])){
			// $_SESSION['user']=$_POST['userid'];
			// $_SESSION['name']=$_POST['name'];
			// $_SESSION['licensenumber']=$_POST['licensenumber'];
			// $_SESSION['type']=$_POST['type'];
			// $_SESSION['color']=$_POST['color'];
			// $_SESSION['position']=$_POST['position'];
			// $_SESSION['note']=$_POST['note'];
			$fee=15;
			$washType=$this->getdata->getWashType($_POST['washtype']);
			$_SESSION['fee']=$washType['fee'];
			$_SESSION['number']=$this->createOrderNumber();
			// $_SESSION['time']=date("Y-m-d H:i:s");
			$table="order";
			$info=array(
				"user"=>$_POST['userid'],
				"name"=>$_POST['name'],
				"licensenumber"=>$_POST['licensenumber'],
				"type"=>$_POST['type'],
				"color"=>$_POST['color'],
				"position"=>$_POST['position'],
				// "trim"=>$_POST['trim']?1:0,
				"note"=>$_POST['note'],
				"fee"=>$fee,
				"washtype"=>$_POST['washtype'],
				"number"=>$_SESSION['number'],
				"time"=>date("Y-m-d H:i:s")
			);
			$this->dbHandler->insertData($table,$info);
			$result=$this->dbHandler->updateData(array('table'=>'user','where'=>array('id'=>$_POST['userid']),'data'=>array('name'=>$_POST['name'])));
			
		}
		$this->pay();
		//$this->wxpay($info['number']);
	// }
	// public function testpay(){

	// }
	// public function wxpay($number,$fee){
	// 	$this->load->library('WxPayApi');
	// 	$this->load->library('JsApiPay');
	// 	//①、获取用户openid
	// 	$tools = $this->jsapipay;
	// 	$openId = $tools->GetOpenid();

	// 	//②、统一下单
	// 	$input = new WxPayUnifiedOrder();
	// 	$input->SetBody("test");
	// 	$input->SetAttach("test");
	// 	$input->SetOut_trade_no($number);
	// 	$input->SetTotal_fee($fee);
	// 	$input->SetTime_start(date("YmdHis"));
	// 	$input->SetTime_expire(date("YmdHis", time() + 600));
	// 	$input->SetGoods_tag("test");
	// 	$input->SetNotify_url("http://dfb.fengdukeji.com/common/wxpaynotify");
	// 	$input->SetTrade_type("JSAPI");
	// 	$input->SetOpenid($openId);
	// 	$order = $this->wxpayapi->unifiedOrder($input);
	// 	// echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
	// 	// print_r($order);
	// 	$jsApiParameters = $tools->GetJsApiParameters($order);

	// 	//获取共享收货地址js函数参数
	// 	$editAddress = $tools->GetEditAddressParameters();

	// 	//③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
	// 	/**
	// 	 * 注意：
	// 	 * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
	// 	 * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台“网页授权接口”，
	// 	 * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
	// 	 */
	// 	$data=array('jsApiParameters'=>$jsApiParameters,'fee'=>$fee);
	// 	$this->load->view('/home/wxpay',$data);
	// }
	// public function wxpay2(){
	// 	if(isset($_POST['userid'])){
	// 		$_SESSION['fee']=$_POST['fee'];
	// 		$_SESSION['number']=$this->createOrderNumber();
	// 		// $_SESSION['time']=date("Y-m-d H:i:s");
	// 		$table="order";
	// 		$info=array(
	// 			"user"=>$_POST['userid'],
	// 			"name"=>$_POST['name'],
	// 			"licensenumber"=>$_POST['licensenumber'],
	// 			"type"=>$_POST['type'],
	// 			"color"=>$_POST['color'],
	// 			"position"=>$_POST['position'],
	// 			// "trim"=>$_POST['trim']?1:0,
	// 			"note"=>$_POST['note'],
	// 			"fee"=>$_POST['fee'],
	// 			"number"=>$_SESSION['number'],
	// 			"time"=>date("Y-m-d H:i:s")
	// 		);
	// 		$this->dbHandler->insertData($table,$info);
	// 		$result=$this->dbHandler->updateData(array('table'=>'user','where'=>array('id'=>$_POST['userid']),'data'=>array('name'=>$_POST['name'])));
			
	// 	}
	// 	$this->wxpay($_SESSION['number'],$_SESSION['fee']);
	// 	$this->load->library('WxPayApi');
	// 	$this->load->library('JsApiPay');
	// 	//①、获取用户openid
	// 	$tools = $this->jsapipay;
	// 	$openId = $tools->GetOpenid();

	// 	//②、统一下单
	// 	$input = new WxPayUnifiedOrder();
	// 	$input->SetBody("test");
	// 	$input->SetAttach("test");
	// 	$input->SetOut_trade_no($number);
	// 	$input->SetTotal_fee($fee);
	// 	$input->SetTime_start(date("YmdHis"));
	// 	$input->SetTime_expire(date("YmdHis", time() + 600));
	// 	$input->SetGoods_tag("test");
	// 	$input->SetNotify_url("http://dfb.fengdukeji.com/common/wxpaynotify");
	// 	$input->SetTrade_type("JSAPI");
	// 	$input->SetOpenid($openId);
	// 	$order = $this->wxpayapi->unifiedOrder($input);
	// 	// echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
	// 	// print_r($order);
	// 	$jsApiParameters = $tools->GetJsApiParameters($order);

	// 	//获取共享收货地址js函数参数
	// 	$editAddress = $tools->GetEditAddressParameters();

	// 	//③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
	// 	/**
	// 	 * 注意：
	// 	 * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
	// 	 * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台“网页授权接口”，
	// 	 * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
	// 	 */
	// 	$data=array('jsApiParameters'=>$jsApiParameters,'fee'=>$fee);
	// 	$this->load->view('/home/wxpay',$data);
	}
	public function createOrderNumber(){
		//生成24位唯一订单号码，格式：YYYY-MMDD-HHII-SS-NNNN,NNNN-CC，其中：YYYY=年份，MM=月份，DD=日期，HH=24格式小时，II=分，SS=秒，NNNNNNNN=随机数，CC=检查码
 
		 while(true){
		  //订购日期
		  $order_date = date('Y-m-d');
		  //订单号码主体（YYYYMMDDHHIISSNNNNNNNN）
		  $order_id_main = date('YmdHis') . rand(1000000000000000,9999999999999999);
		  //订单号码主体长度
		  $order_id_len = strlen($order_id_main);
		  $order_id_sum = 0;
		  for($i=0; $i<$order_id_len; $i++){
			$order_id_sum += (int)(substr($order_id_main,$i,1));
		  }
		  //唯一订单号码（YYYYMMDDHHIISSNNNNNNNNCC）
		  $order_id = $order_id_main . str_pad((100 - $order_id_sum % 100) % 100,2,'0',STR_PAD_LEFT);
		  return $order_id;
		}
	}
}
