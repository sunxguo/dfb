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
}
