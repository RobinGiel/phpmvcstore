<?php
    class Orders extends Controller {

        public function __construct(){
            if(!isLoggedInAsEmployee()){
                redirect('pages/index');
            }

            $this->userModel = $this->model('User');
            $this->orderModel = $this->model('Order');
            $this->productModel = $this->model('Product');
        }

        public function index(){
            $orders = $this->orderModel->getOrders();

            $data = [
                'orders' => $orders
            ];
            $this->view('orders/index', $data);
        }
       // Show Product Details
        public function details($id){

            $order = $this->orderModel->getOrderDetailsById($id);
            $product = $this->productModel->getProductById($id);
            $data = [
                'orders' =>  $order,
                'products' => $product

            ];
            $this->view('orders/details', $data);
        }
    }