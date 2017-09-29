<?php
  class User_model extends CI_Model
  {

    public function __construct()
    {
      $this->load->database();
    }

    public function Auth()
    {
      $this->load->helper('url');

      $this->db->select('int_id, chr_name, chr_login_name');
      $this->db->from('tbl_user');
      $this->db->where(array(
          'chr_login_name' => $this->input->post('name'),
          'chr_login_pwd'  => $this->input->post('password')
      ));
      $query = $this->db->get();

      if($query->num_rows() >= 1 )
      {
        $user = $query->row_array();
        return $user;
      }
      return FALSE;
    }

    public function Register()
    {

    }
  }
?>
