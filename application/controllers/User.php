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
      redirect('/home', 'refresh');
    }else
    {
      show_404();
    }
	}

  public function logout()
  {
    $this->session->unset_userdata('login_user');
    redirect('/home', 'refresh');
  }


}
?>
