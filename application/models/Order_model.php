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

    public function getOrderItem($menuID){
      $this->db->select('int_id, chr_name, int_base, chr_code, chr_unit');
      $this->db->from('tbl_order_menu');
      $this->db->where('int_id', $menuID);
      $query = $this->db->get();
      return $query->row_array();
    }

    public function addOrder($order){
      $this->db->set($order);
      $this->db->set('order_date', 'NOW()', FALSE);
      $this->db->insert('tbl_order');
    }

    public function getTodayOrder($userID, $status){
      $this->db->select('T1.int_id, T0.int_qty, T0.status, T1.chr_name,
        T1.int_base, T1.chr_code, T1.chr_unit, T2.chr_cut_date,
        T2.int_cut_time, T2.chr_deli_date, T2.int_phase');
      $this->db->from('tbl_order T0');
      $this->db->join('tbl_order_menu T1', 'T0.int_item_id = T1.int_id', 'left');
      $this->db->join('tbl_order_cat T2', 'T1.int_cat_id = T2.int_id', 'left');
      $this->db->where('DATE(order_date) = CURDATE()');
      $this->db->where('T0.int_user_id', $userID);
      $this->db->where('T0.status', $status);
      $this->db->order_by('T2.int_cut_time, T2.int_phase, T2.chr_deli_date, T2.int_sort, T2.int_id, T1.int_sort, T1.int_id');
      $query = $this->db->get();
      return $query->result_array();
    }

    public function updateOrder($userID, $itemID, $qty){
      $this->fetchOrderItem($userID, $itemID);
      $this->db->from('tbl_order');
      if($this->db->count_all_results() > 1){
        $this->fetchOrderItem($userID, $itemID);
        $this->db->delete('tbl_order');

        $order = Array(
            "int_user_id" => $userID,
            "int_item_id" => $itemID,
            "int_qty" => $qty
        );
        $this->addOrder($order);
      }else{
        $order = Array(
          "int_qty" => $qty
        );
        $this->fetchOrderItem($userID, $itemID);
        $this->db->update('tbl_order', $order);
      }

    }
    public function deleteOrder($userID, $itemID){
      $this->fetchOrderItem($userID, $itemID);
      $this->db->delete('tbl_order');
    }

    private function fetchOrderItem($userID, $itemID){
      $this->db->where('DATE(order_date) = CURDATE()');
      $this->db->where('int_item_id', $itemID);
      $this->db->where('int_user_id', $userID);
    }
  }
?>
