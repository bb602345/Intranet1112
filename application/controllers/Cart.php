<?php
  class Cart extends CI_Controller{
    var $Cart;

    public function __construct()
    {
      parent::__construct();
      $this->load->model('order_model');
      $this->load->helper('url_helper');
      $this->load->library('cart');
      $this->load->library('session');
      $this->Cart = $this->session->cart;
    }

    public function list(){
      $count = 1;
      $html = "";
      foreach($this->Cart as $data){
        $html .= $this->getRowCart($count, $data['info'], $data['qty']);
        $count++;
      }
      print $html;
    }
    public function add($item){
      if($this->Cart != null && array_key_exists($item, $this->Cart)){
        $this->Cart[$item]['qty'] += $this->Cart[$item]['info']['int_base'] * 1;
      }else{
        $menu = $this->order_model->getOrderItem($item);
        $data['info'] = $menu;
        $data['qty'] = 1 * $menu['int_base'];
        $this->Cart[$menu['int_id']] = $data;
      }
      $this->session->set_userdata('cart', $this->Cart);
      $this->list();
    }
    public function set($item, $qty=1){
      if($qty >= 0){
        $this->remove($item);
        exit();
      }

      if(($mod = $qty % $this->Cart[$item]['info']['int_base']) != 0)
        $qty -= $mod;
      $this->Cart[$item]['qty'] = $qty;
      $this->session->set_userdata('cart', $this->Cart);
      $this->list();
    }
    public function remove($item=NULL){
      unset($this->Cart[$item]);
      $this->session->set_userdata('cart', $this->Cart);
      $this->list();
    }
    private function getRowCart($count, $item, $qty){
      $bg = $count % 2 == 0 ? '#fff':'#eee';
      $html = <<< EOT
      <div class="row" style="background-color:{$bg};">
          <div class="col-1">{$count}</div>
          <div class="col-5">
            <span class="CartItem">{$item['chr_name']} - ({$item['int_base']}{$item['chr_unit']}起)</span>
          </div>
          <div class="col-5" align="center">
            <button class="CartBtn btn-custom-4 btn btn-danger btn-xs" data-type="sub" data-base="{$item['int_base']}" data-item="{$item['int_id']}">-</button>
            <input class="CartQty" id="CartQty-{$item['int_id']}" type="tel" data-base="{$item['int_base']}" data-item="{$item['int_id']}" value="{$qty}" size="3" style="text-align:right;"/>
            <span class="CartUnit">{$item['chr_unit']}</span>
            <button class="CartBtn btn-custom-4 btn btn-success btn-xs" data-type="add" data-base="{$item['int_base']}" data-item="{$item['int_id']}">+</button>
          </div>
          <div class="col-1" align="right">
          <button type="button" class="CartBtn close" aria-label="Close" style="margin-right:10px;" data-type="del" data-item="{$item['int_id']}">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>
      </div>
EOT;
      return $html;
    }
  }


 ?>
