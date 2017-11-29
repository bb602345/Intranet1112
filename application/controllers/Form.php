<?php
class Form extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('dept_model');
		$this->load->model('form_model');
	}

	public function main($deptID=0){

		$data['active'] = 'form';
		$data['deptID'] = $deptID;
		$data['depts'] = $this->dept_model->getDept();
		$data['forms'] = $this->form_model->getForm($deptID);
		//print_r($data['notice']);
		//die();

		if($this->session->login_user){
			$this->load->view('templates/header', $data);
			$this->load->view('pages/form.main.php', $data);
			$this->load->view('templates/footer', $data);
		}else{
			$this->session->set_userdata('URL_Redirect', 'notice');
			redirect('/login/b', 'location');
		}
	}
}
?>
