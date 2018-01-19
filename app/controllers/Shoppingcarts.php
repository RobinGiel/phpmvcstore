<?php
    class Shoppingcarts extends Controller {

        public function __construct(){
            if(!isLoggedInAsClient()){
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
            $this->view('shoppingcarts/index', $data);
        }
       // Show Product Details
        public function details($id){

            $order = $this->orderModel->getOrderDetailsById($id);
            $product = $this->productModel->getProductById($id);
            $data = [
                'orders' =>  $order,
                'products' => $product

            ];
            $this->view('shoppingcarts/details', $data);
        }
    }