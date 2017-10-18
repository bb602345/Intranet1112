<?php
class Pages extends CI_Controller{
	public function notice($page='notice'){
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->library('session');

		$data['active'] = 'notice';
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
