<?php
  class Report extends CI_Controller{
    public function __construct()
    {
      parent::__construct();
      $this->load->library('session');
    }

    public function main()
    {
      $this->Loading(0, 'pages/report/report.main.php');
    }

    public function LawEnforcement()
    {
      $this->Loading(1, 'pages/report/report.LawEnforcement.php');
    }

    public function itservice()
    {
      $this->Loading(2, 'pages/report/report.itservice.php');
    }

    public function consign()
    {
      $this->Loading(3, 'pages/report/report.consign.php');
    }

    public function RepairProject()
    {
      $this->Loading(4, 'pages/report/report.RepairProject.php');
    }


    private function Loading($reportID, $mainpage)
    {
      $data['active'] = 'report';
      $data['reportID'] = $reportID;

      $this->load->view('templates/header', $data);
      $this->load->view('pages/report/templates/report.start.php', $data);
      $this->load->view( $mainpage, $data);
      $this->load->view('pages/report/templates/report.end.php', $data);
      $this->load->view('templates/footer', $data);
    }

  }


 ?>
