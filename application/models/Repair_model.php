<?php
  class Repair_model extends CI_Model {
    public function __construct(){
      $this->load->database();
    }

    public function getDept(){
      $this->db->select('int_id, chr_name');
      $this->db->from('tbl_dept');
      $query = $this->db->get();
      return $query->result_array();
    }

  }
 ?>
