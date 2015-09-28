<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("base");
		$this->load->library('GetData');
	}

	public function index(){
		$data=array();
		if(isset($_SESSION['userid'])){
			$this->load->view('/home/index',$data);
		}else{
			$this->load->view('/home/login',$data);
		}
	}
	public function login(){
		$data=array();
		$this->load->view('/home/login',$data);
	}
	public function wxpay(){
		$this->load->library('WxPayApi');
		$this->load->library('JsApiPay');
		
		//①、获取用户openid
		$tools = $this->jsapipay;
		$openId = $tools->GetOpenid();

		//②、统一下单
		$input = new WxPayUnifiedOrder();
		$input->SetBody("test");
		$input->SetAttach("test");
		$input->SetOut_trade_no($_GET['ordernumber']);
		$input->SetTotal_fee($_GET['fee']);
		$input->SetTime_start(date("YmdHis"));
		$input->SetTime_expire(date("YmdHis", time() + 600));
		$input->SetGoods_tag("test");
		$input->SetNotify_url("http://dfb.fengdukeji.com/common/wxpaynotify");
		$input->SetTrade_type("JSAPI");
		$input->SetOpenid($openId);
		$order = $this->wxpayapi->unifiedOrder($input);
		echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
		print_r($order);
		$jsApiParameters = $tools->GetJsApiParameters($order);

		//获取共享收货地址js函数参数
		$editAddress = $tools->GetEditAddressParameters();

		//③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
		/**
		 * 注意：
		 * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
		 * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台“网页授权接口”，
		 * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
		 */
		$data=array('editAddress'=>$editAddress);
		$this->load->view('/home/wxpay',$data);
	}
}
