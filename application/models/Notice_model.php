<?php
  class Notice_model extends CI_Model {
    public function __construct(){
      $this->load->database();
    }

    public function getNotice($deptID=0){
      $this->db->select('T0.int_id, T1.chr_name as dept_name, chr_title, chr_doc_path, DATE(start_date) as start_date
        , DATEDIFF(CURDATE(), add_DATE) as date_diff');
      $this->db->from('tbl_notice T0');
      $this->db->join('tbl_dept T1', 'T0.int_dept_id = T1.int_id', 'left');
      if($deptID != 0)
        $this->db->where('T1.int_id', $deptID);
      $this->db->where('CURDATE() BETWEEN T0.start_date AND T0.end_date');

      $query = $this->db->get();
      return $query->result_array();
    }

  }
 ?>
