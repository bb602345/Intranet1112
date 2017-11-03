<?php
class Pages extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('dept_model');
		$this->load->model('notice_model');
	}

	public function notice($deptID=0){

		$data['active'] = 'notice';
		$data['deptID'] = $deptID;
		$data['depts'] = $this->dept_model->getDept();
		$data['notices'] = $this->notice_model->getNotice($deptID);
		//print_r($data['notice']);
		//die();

		if($this->session->login_user){
			$this->load->view('templates/header', $data);
			$this->load->view('pages/notice', $data);
			$this->load->view('templates/footer', $data);
		}else{
			$this->session->set_userdata('URL_Redirect', 'notice');
			redirect('/login/b', 'location');
		}
	}
}
?>
