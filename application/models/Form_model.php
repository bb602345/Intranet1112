<?php
  class Form_model extends CI_Model {
    public function __construct(){
      $this->load->database();
    }

    public function getForm($deptID=0){
      $this->db->select('T0.int_id, T1.chr_name as dept_name, chr_title, chr_doc_path, DATE(date) as date');
      $this->db->from('tbl_form T0');
      $this->db->join('tbl_dept T1', 'T0.int_dept_id = T1.int_id', 'left');
      if($deptID != 0)
        $this->db->where('T1.int_id', $deptID);
      $this->db->where('status', 1);

      $query = $this->db->get();
      return $query->result_array();
    }

  }
 ?>
