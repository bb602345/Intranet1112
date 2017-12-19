<?php
class Phonebook extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url_helper');
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('dept_model');
  }

	public function main($deptID=0){
    $data['active'] = 'phonebook';
    $data['deptID'] = $deptID;
    $data['depts'] = $this->dept_model->getDept();

    $this->load->view('templates/header', $data);
    $this->load->view('pages/phonebook.main.php', $data);
    $this->load->view('templates/footer', $data);
	}


}
?>
