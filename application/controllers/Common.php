<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();
class Common extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("base");
		$this->load->helper("upload");
		$this->load->library('GetData');
//		$this->load->library('PHPExcel');
		$this->load->model("dbHandler");
	}
	public function addInfo(){
		$table="";
		$data=json_decode($_POST['data']);
		$info=array();
		switch($data->infoType){
			case "essay":
				$table="essay";
				$info=array(
					"column"=>$data->column,
					"title"=>$data->title,
					"summary"=>$data->summary,
					"content"=>$data->content,
					"thumbnail"=>$data->thumbnail,
					"author"=>1,
					"time"=>date("Y-m-d H:i:s")
				);
			break;
			case "order":
				$table="order";
				$info=array(
					"user"=>$data->userid,
					"name"=>$data->name,
					"licensenumber"=>$data->licensenumber,
					"type"=>$data->type,
					"color"=>$data->color,
					"position"=>$data->position,
					"trim"=>$data->trim?1:0,
					"note"=>$data->note,
					"time"=>date("Y-m-d H:i:s")
				);
				$result=$this->dbHandler->updateData(array('table'=>'user','where'=>array('id'=>$data->userid),'data'=>array('name'=>$data->name)));
			break;
		}
		$result=$this->dbHandler->insertData($table,$info);
		if($result==1)echo json_encode(array("result"=>"success","message"=>"信息写入成功"));
		else echo json_encode(array("result"=>"failed","message"=>"信息写入失败"));
	}
	public function wxpay(){
		$this->load->library('WxPayApi');
		$this->load->library('WxPayJsApiPay');
		//①、获取用户openid
		//$tools = $this->WxPayJsApiPay;
		$openId = $this->wxpayssapipay->GetOpenid();

		//②、统一下单
		$input = new WxPayUnifiedOrder();
		$input->SetBody("test");
		$input->SetAttach("test");
		$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
		$input->SetTotal_fee("1");
		$input->SetTime_start(date("YmdHis"));
		$input->SetTime_expire(date("YmdHis", time() + 600));
		$input->SetGoods_tag("test");
		$input->SetNotify_url("http://paysdk.weixin.qq.com/example/notify.php");
		$input->SetTrade_type("JSAPI");
		$input->SetOpenid($openId);
		$order = WxPayApi::unifiedOrder($input);
		echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
		printf_info($order);
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
	}
	public function modifyInfo(){
		$table="";
		$data=json_decode($_POST['data']);
		$info=array();
		$where=array();
		switch($data->infoType){
			case "essay":
				$table="essay";
				$where=array('id'=>$data->id);
				$info=array(
					"column"=>$data->column,
					"title"=>$data->title,
					"summary"=>$data->summary,
					"content"=>$data->content,
					"thumbnail"=>$data->thumbnail,
					"time"=>date("Y-m-d H:i:s")
				);
			break;
		}
		$result=$this->dbHandler->updateData(array('table'=>$table,'where'=>$where,'data'=>$info));
		if($result==1) echo json_encode(array("result"=>"success","message"=>"信息修改成功"));
		else echo json_encode(array("result"=>"failed","message"=>"信息修改失败"));
	}
	public function deleteInfo(){
		$condition=array();
		$data=json_decode($_POST['data']);
		switch($data->infoType){
			case 'essay':
				$condition['table']="essay";
				$condition['where']=array("id"=>$data->id);
			break;
		}
		$result=$this->dbHandler->deleteData($condition);
		if($result==1) echo json_encode(array("result"=>"success","message"=>"信息删除成功"));
		else echo json_encode(array("result"=>"failed","message"=>"信息删除失败"));
	}
	public function getInfo(){
		$condition=array();
		$data=json_decode($_POST['data']);
		$result=array();
		switch($data->infoType){
			case 'essay':
				$result=$this->getdata->getContent('essay',$data->id);
			break;
			case 'authcode':
				//生成验证码
				$authcode=mobileCode();
				//发送验证码
				$url='http://utf8.sms.webchinese.cn/?Uid=MonkeyKing&Key=916befe64d458c759a3a&smsMob='.($data->phone).'&smsText=欢迎使用后生上门洗车服务，本次登录验证码:'.$authcode;
				httpGet($url, array(), array());
				$result='发送成功！';
			break;
			case 'checkauthcode':
				$_SESSION["mobilecode"];
			break;
			case 'login':
				if($data->authcode!=$_SESSION["mobilecode"]){
					echo json_encode(array("result"=>"failed","message"=>'验证码输入错误！'));
					return false;
				}
				$result=$this->getdata->getContentAdvance('user',array('phone'=>$data->phone));
				if(!property_exists($result, 'phone')){
					//插入用户信息
					$userid=$this->dbHandler->insertDataReturnId('user',array(
						'phone'=>$data->phone
					));
					$_SESSION["userid"]=$userid;
				}else{
					$_SESSION["userid"]=$result->id;
				}
				$_SESSION["phone"]=$data->phone;
				if(property_exists($result, 'name')){
					$_SESSION["name"]=$data->name;
				}else{
					$_SESSION["name"]='';
				}
				$result='登录成功！';
			break;
		}
		echo json_encode(array("result"=>"success","message"=>$result));
	}
	public function uploadImage(){
		$result=upload("image");
		echo json_encode($result);
	}
	public function setLanguage(){
		$_SESSION['language']=$_POST['language'];
	}
	public function createVeriCode(){
		veri_code();
	}
	public function checkCode(){
		if(isset($_POST['code']) && strcasecmp($_POST['code'],$_SESSION['authcode'])==0){
			echo json_encode(array("result"=>"success","message"=>"Right Security code!"));
		}else{
			echo json_encode(array("result"=>"failed","message"=>"Wrong Security code!"));
		}
	}
	public function getWeather(){
		$url="http://www.weather.com.cn/adat/cityinfo/101100101.html";
		echo $result=httpGet($url);
	}
	/*
	public function checkMobileCode(){
		if(isset($_POST['code']) && strcasecmp($_POST['code'],$_SESSION['mobilecode'])==0){
			echo json_encode(array("result"=>"success","message"=>"Right Security code!"));
		}else{
			echo json_encode(array("result"=>"failed","message"=>"Wrong Security code!"));
		}
	}
	public function checkEmail(){
		if(!$this->commongetdata->checkUniqueAdvance("user",array("user_email"=>$_POST['email']))){
			echo json_encode(array("result"=>"notunique","message"=>"The email already exists!"));
			return false;
		}else{
			echo json_encode(array("result"=>"failed","message"=>"验证码输入错误！"));
		}
	}
	public function checkUsername(){
		if(!$this->commongetdata->checkUniqueAdvance("user",array("user_username"=>$_POST['username']))){
			echo json_encode(array("result"=>"notunique","message"=>"The username already exists!"));
			return false;
		}else{
			echo json_encode(array("result"=>"success","message"=>"Success!"));
		}
	}
	public function checkEmailExist(){
		if(!$this->commongetdata->checkUniqueAdvance("user",array("user_email"=>$_POST['email']))){
			echo json_encode(array("result"=>"notunique","message"=>"The email already exists!"));
			return false;
		}else{
			echo json_encode(array("result"=>"failed","message"=>"验证码输入错误！"));
		}
	}
	public function exportExcel($title,$subject,$description,$header,$data){
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("AiiMai");
		$objPHPExcel->getProperties()->setLastModifiedBy("AiiMai");
		$objPHPExcel->getProperties()->setTitle($title);
		$objPHPExcel->getProperties()->setSubject($subject);
		$objPHPExcel->getProperties()->setDescription($description);
		$objPHPExcel->setActiveSheetIndex(0);
		//设值
		$letterArray=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		foreach($header as $index=>$field){
			$objPHPExcel->getActiveSheet()->setCellValue($letterArray[$index].'1',$field);
		}
		foreach($data as $key=>$value){
			foreach($value as $k=>$v){
				$objPHPExcel->getActiveSheet()->setCellValue($letterArray[$k].($key+2),$v);
			}
		}
		// Save Excel 2007 file
		//$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);

		$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
		$fileName='uploads/'.$title.date("Ymd").'.xls';
		$objWriter->save($fileName);
//		$this->load->view('redirect',array("url"=>"/uploads/".$title.date("Ymd").".xls"));
		return '/'.$fileName;
	}*/
}