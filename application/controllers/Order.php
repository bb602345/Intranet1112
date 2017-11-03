<?php
class Order extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('order_model');
		$this->load->library('user_agent');
	}
	public function main($dept=NULL){
		$data['active'] = 'order';
		$data['dept'] = $this->order_model->getOrderDept();

		if($this->session->login_user){
			$this->load->view('templates/header', $data);
			$this->load->view('pages/order/order.main.php', $data);
			/*
			if($dept != NULL ){
				$deptID = $data['dept'][$dept]['int_id'];
				$data['picked_dept'] = $dept;
				$data['cat'] = $this->order_model->getOrderCat($deptID);
				$this->load->view('pages/order.dept.php', $data);
			}
			*/
			$this->load->view('templates/footer', $data);
		}else{
			$this->session->set_userdata('URL_Redirect', 'order');
			redirect('/login/b', 'location');
		}
	}

	public function dept($dept_index){
		$data['back'] = '/order';
		$data['active'] = 'order';
		$data['dept'] = $this->order_model->getOrderDept();

		$deptID = $data['dept'][$dept_index]['int_id'];
		$data['picked_dept'] = $dept_index;
		$data['cat'] = $this->order_model->getOrderCat($deptID);

		if($this->session->login_user){
			$this->load->view('templates/header', $data);
			$this->load->view('pages/order/order.dept.php', $data);
			$this->load->view('templates/footer', $data);
		}else{
			$this->session->set_userdata('URL_Redirect', 'order');
			redirect('/login/b', 'location');
		}

	}

	public function cat($dept_index, $cat_index){
		$data['active'] = 'order';
		$data['back'] = "/order/dept/$dept_index";

		$data['dept'] = $this->order_model->getOrderDept();
		$data['picked_dept'] = $dept_index;

		$deptID = $data['dept'][$dept_index]['int_id'];
		$data['cat'] = $this->order_model->getOrderCat($deptID);
		$data['picked_cat'] = $cat_index;

		$catID = $data['cat'][$cat_index]['int_id'];
		$data['menu'] = $this->order_model->getOrderMenu($catID);

		if($this->session->login_user){
			$this->load->view('templates/header', $data);
			$this->load->view('functional/cart/order.cart.php', $data);

			$this->load->view('pages/order/order.cat.php', $data);
			$this->load->view('templates/footer', $data);
		}else{
			$this->session->set_userdata('URL_Redirect', 'order');
			redirect('/login/b', 'location');
		}
	}
	public function list(){
		$data['active'] = 'order';
		if(substr($this->agent->referrer(), -5) == 'list2' ||
			 substr($this->agent->referrer(), -5) == 'list'){
			$data['back'] = $this->session->back;
		}else{
			$this->session->set_userdata('back', $this->agent->referrer());
			$data['back'] = $this->session->back;
		}

		$temp = $this->order_model
							->getTodayOrder($this->session->login_user['int_id'], 1);

		foreach($temp as $order){
			$orderKey = $order['int_id'] . "_" . $order['status'];
			if(isset($orders[$orderKey])){
					$orders[$orderKey]['int_qty'] += $order['int_qty'];
			}else{
				$orders[$orderKey] = $order;
				$orders[$orderKey]['int_qty'] += 0;
			}
		}
		if(isset($orders))
			$data['orders'] = $orders;

		if($this->session->login_user){
			$this->load->view('templates/header', $data);
			//echo $this->agent->referrer();
			$this->load->view('pages/order/order.list.php', $data);
			$this->load->view('templates/footer', $data);
		}else{
			$this->session->set_userdata('URL_Redirect', 'order');
			redirect('/login/b', 'location');
		}
	}

	public function list2(){
		$data['active'] = 'order';
		$data['back'] = $this->agent->referrer();

		$temp = $this->order_model
							->getTodayOrder($this->session->login_user['int_id'], 99);

		foreach($temp as $order){
			$orderKey = $order['int_id'] . "_" . $order['status'];
			if(isset($orders[$orderKey])){
					$orders[$orderKey]['int_qty'] += $order['int_qty'];
			}else{
				$orders[$orderKey] = $order;
				$orders[$orderKey]['int_qty'] += 0;
			}
		}
		if(isset($orders))
			$data['orders'] = $orders;

		if($this->session->login_user){
			$this->load->view('templates/header', $data);
			$this->load->view('pages/order/order.list2.php', $data);
			$this->load->view('templates/footer', $data);
		}else{
			$this->session->set_userdata('URL_Redirect', 'order');
			redirect('/login/b', 'location');
		}
	}

}
?>
