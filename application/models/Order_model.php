<?php
  class Order_model extends CI_Model{

    public function __construct(){
      $this->load->database();
    }

    public function getOrderDept(){
      $this->db->select('int_id, chr_dept_name');
      $this->db->from('tbl_order_dept');
      $query = $this->db->get();
      return $query->result_array();
    }

    public function getOrderCat($dept){
      $this->db->select('int_id, chr_cat_name, chr_cut_date, int_cut_time, chr_deli_date, int_phase');
      $this->db->from('tbl_order_cat');
      $this->db->where('int_dept_id', $dept);
      $this->db->where_in('status', array(1));
      $this->db->order_by('int_sort');
      $query = $this->db->get();
      return $query->result_array();
    }

    public function getOrderMenu($cat){
      $this->db->select('int_id, chr_name, int_base, chr_code, chr_unit');
      $this->db->from('tbl_order_menu');
      $this->db->where('int_cat_id', $cat);
      $this->db->where_in('status', array(1));
      $this->db->order_by('int_sort');
      $query = $this->db->get();
      return $query->result_array();
    }

  }
?>
