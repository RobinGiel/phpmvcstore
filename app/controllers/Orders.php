<?php
    class Orders extends Controller {

        public function __construct(){
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->userModel = $this->model('User');
            $this->orderModel = $this->model('Order');
        }

        public function index(){

            $orders = $this->orderModel->getOrders();

            $data = [
                'orders' => $orders

            ];
            $this->view('orders/index', $data);
        }
    }
