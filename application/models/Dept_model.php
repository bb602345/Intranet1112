<?php
  class Dept_model extends CI_Model {
    public function __construct(){
      $this->load->database();
    }

    public function getDept(){
      $this->db->select('int_id, chr_name');
      $this->db->from('tbl_dept');
      $this->db->where('int_show', '1');
      $query = $this->db->get();
      return $query->result_array();
    }


  }
 ?>
