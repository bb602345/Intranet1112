<?php
class User extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
    $this->load->helper('url_helper');
    $this->load->helper('url');
    $this->load->library('session');
  }

	public function login(){
    $user = $this->user_model->Auth();
    if($user !== FALSE)
    {
      $this->session->set_userdata('login_user', $user);
      $url = $this->session->URL_Redirect ? $this->session->URL_Redirect : 'notice';
      redirect('/'. $this->session->URL_Redirect, 'refresh');
    }else{
      redirect('/login/a', 'refresh');
    }
	}

  public function logout()
  {
    session_destroy();
    redirect('/login', 'refresh');
  }


}
?>
