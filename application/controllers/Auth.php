<?php
class Auth extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
    $this->load->helper('url_helper');
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->library('session');
  }

	public function login($msg=''){

    $data['active'] = $this->session->URL_Redirect;
    switch($msg){
      case 'a':
        $data['message'] = 'LOGIN_FAIL';
        break;
      case 'b':
        $data['message'] = 'LOGIN_FIRST';
        break;
    }
    $this->load->view('templates/header', $data);
    $this->load->view('pages/login.php', $data);
    $this->load->view('templates/footer', $data);
	}


}
?>
