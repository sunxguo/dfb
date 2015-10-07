<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();
class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("base");
		$this->load->library('GetData');
		$this->load->model("Dbhandler");
	}
	public function checkAdminLogin(){
		if (!checkLogin() || strcmp($_SESSION["usertype"], "admin")) {
			$this->load->view('redirect',array("url"=>"/admin/login","info"=>"请先登录管理员账号"));
			return false;
		}else return true;
	}
	public function login(){
		$this->load->view('admin/login',array('title'=>"管理员登录"));
	}
	/*
	public function adminBaseHandler($title,$slider,$view,$data){
		$this->checkAdminLogin();
		$websiteName=$this->commongetdata->getWebsiteConfig("website_name");
		$this->load->view('admin/header',
			array(
				'title' => $title."-".$websiteName,
				'showSlider' => true,
				$slider => true,
				'websiteName'=>$websiteName
			)
		);
		$this->load->view('admin/'.$view,$data);
		$this->load->view('admin/footer');
	}*/
	public function loginhandler(){
		if(isset($_POST['username']) && isset($_POST['password'])){
			$username=$_POST['username'];
			$password=$_POST['password'];
			$info=$this->getdata->getContentAdvance('dfbadmin',array('username'=>$username));
			if(property_exists($info,'username')){
				$post_pwd=MD5("MonkeyKing".$password);
				$db_pwd=$info->password;
				if($post_pwd==$db_pwd){
					$_SESSION['username']=$info->username;
					$_SESSION['userid']=$info->id;
					$_SESSION['usertype']="admin";
					//echo json_encode(array("result"=>"success","message"=>"登录成功!"));
					$this->load->view('redirect',array('url'=>'/admin/index'));
				}
				else{
					echo json_encode(array("result"=>"failed","message"=>"密码错误!"));
				}
			}
			else{
				echo json_encode(array("result"=>"failed","message"=>"用户名不存在!"));
			}
		}else{
			echo json_encode(array("result"=>"failed","message"=>"请输入用户名和密码!"));
		}
	}
	public function adminBaseHandler($title,$sider,$view,$data){
		if(!$this->checkAdminLogin()) return false;
//		$websiteConfig=$this->commongetdata->getWebsiteConfig("ALLINFO");
//		$websiteName=$websiteConfig['website_name_'.$_SESSION['language']];
		$this->load->view('admin/header',
			array(
				'title' => $title." - 多方变",
				'showSider' => true,
				'sider' => $sider,
				'websiteName'=>"多方变"
			)
		);
		$this->load->view('admin/'.$view,$data);
		$this->load->view('admin/footer');
	}
	public function index(){
		// $parameters=array(
		// 	'result'=>'count'
		// );
		// $amount=$this->getdata->getEssays($parameters);//总量
		// $parameters['time']=array('begin'=>date("Y-m-d 00:00:00"),'end'=>date("Y-m-d H:i:s"));
		// $todayAmount=$this->getdata->getEssays($parameters);//今天添加数量
		// $parameters=array(
		// 	'result'=>'data',
		// 	'orderBy'=>array('time'=>'DESC'),
		// 	'limit'=>array('limit'=>10,'offset'=>0)
		// );
		// $recentEssays=$this->getdata->getEssays($parameters);//获取近期添加
		// $data=array(
		// 	'amount'=>$amount,
		// 	'todayAmount'=>$todayAmount,
		// 	'recentEssays'=>$recentEssays
		// );
		$data=array();
		$this->adminBaseHandler('首页',array('index'=>true),'index',$data);
	}
	public function adminCommon($english,$chinese){
		$baseUrl='/admin/'.$english.'?placeholder=true';
		$selectUrl='/admin/'.$english.'?placeholder=true';
		$currentPage=isset($_GET['page'])?$_GET['page']:1;
		$amountPerPage=20;
		$subColumns=$this->getdata->getColumns($english,true);
		$parameters=array();
		if(isset($_GET['column'])){
			$parameters['column']=$_GET['column'];
		}else{
			$parameters['columns']=$subColumns;
		}
		if(isset($_GET['keywords'])) $parameters['keywords']=$_GET['keywords'];

		$parameters['result']='count';
		$amount=$this->getdata->getEssays($parameters);
		$pageInfo=$this->getdata->getPageLink($baseUrl,$selectUrl,$currentPage,$amountPerPage,$amount);

		$parameters['result']='data';
		$parameters['limit']=$pageInfo['limit'];
		$parameters['orderBy']=array('time'=>'DESC');

		$essays=$this->getdata->getEssays($parameters);
		$data=array(
			'columnName'=>$chinese,
			'essays'=>$essays,
			'pageInfo'=>$pageInfo,
			'subColumns'=>$this->getdata->getColumns($english,false)
		);
		$this->adminBaseHandler($chinese.'管理',array('content'=>true,$english=>true),'essaylist',$data);
	}
	public function user(){
		
	}
	public function order(){
		$baseUrl='/admin/order?placeholder=true';
		$selectUrl=$baseUrl;
		$currentPage=isset($_GET['page'])?$_GET['page']:1;
		$amountPerPage=45;
		$amount=$this->getdata->getOrders(array('result'=>'count'));
		$pageInfo=$this->getdata->getPageLink($baseUrl,$selectUrl,$currentPage,$amountPerPage,$amount);
		$parameters=array(
			'result'=>'data',
			'limit'=>$pageInfo['limit'],
			'orderBy'=>array('time'=>'DESC')
		);
		$orders=array('orders'=>$this->getdata->getOrders($parameters));
		$data=array_merge($pageInfo,$orders);
		$this->adminBaseHandler('订单管理',array('data'=>true,'order'=>true),'orders',$data);
	}
	public function home(){
		$this->adminCommon('home','首页内容');
	}
	public function news(){
		$this->adminCommon('news','新闻内容');
	}
	public function edu(){
		$this->adminCommon('edu','教育内容');
	}
	public function area(){
		$this->adminCommon('area','市县内容');
	}
	public function enrol(){
		$this->adminCommon('enrol','招考内容');
	}
	public function school(){
		$this->adminCommon('school','学校内容');
	}
	public function policy(){
		$this->adminCommon('policy','政策内容');
	}
	public function activity(){
		$this->adminCommon('activity','活动内容');
	}
	public function about(){
		$this->adminCommon('about','关于内容');
	}
	public function columnList(){
		$data=array();
		$this->load->view('admin/columnList',$data);
	}
	public function backup(){
		$this->checkAdminLogin();
		// 加载数据库工具类
		$this->load->dbutil();
		$fileName=$_GET['filename'];
		$prefs = array(
			'tables'      => array(),  // 包含了需备份的表名的数组.
			'ignore'      => array('column'),           // 备份时需要被忽略的表
			'format'      => 'txt',             // gzip, zip, txt
			'filename'    => $fileName,    // 文件名 - 如果选择了ZIP压缩,此项就是必需的
			'add_drop'    => TRUE,              // 是否要在备份文件中添加 DROP TABLE 语句
			'add_insert'  => TRUE,              // 是否要在备份文件中添加 INSERT 语句
			'newline'     => "\n"               // 备份文件中的换行符
		);
		// 备份整个数据库并将其赋值给一个变量
		$backup =& $this->dbutil->backup($prefs);
		// 加载文件辅助函数并将文件写入你的服务器
		$this->load->helper('file');
		write_file($fileName, $backup);
		$condition=array(
			"table"=>'websiteconfig',
			"where"=>array('key_websiteconfig'=>'last_backup_time'),
			"data"=>array('value_websiteconfig'=>date("Y-m-d H:i:s"))
		);
		$this->dbHandler->updateData($condition);
		// 加载下载辅助函数并将文件发送到你的桌面
		$this->load->helper('download');
		force_download($fileName, $backup);
	}
}