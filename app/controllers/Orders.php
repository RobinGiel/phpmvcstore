<?php
    class Orders extends Controller {

        public function __construct(){
            if(!isLoggedInAsClient() && !isLoggedInAsEmployee() && !isLoggedInAsAdmin()){
                redirect('users/login');
            }

            $this->userModel = $this->model('User');
            $this->orderModel = $this->model('Order');
            $this->productModel = $this->model('Product');
        }

        public function index(){
            
            if(isLoggedInAsClient()){
            
            $id = $_SESSION['user_id'];

            $orders = $this->orderModel->getOrdersByUsersId($id);

            $data = [
                'orders' => $orders
            ];
            $this->view('orders/index', $data);
            } else {
                
            $orders = $this->orderModel->getOrders();

            $data = [
                'orders' => $orders
            ];
            $this->view('orders/index', $data);
        }
        }
       // Show Product Details
        public function details($id){
            if(isLoggedInAsClient()){
                    
                    $id = $_SESSION['user_id'];
 
                    $order = $this->orderModel->getOrderDetailsByUserId($id);
                    $product = $this->productModel->getProductById($id);
                    $data = [
                        'orders' =>  $order,
                        'products' => $product     
                    ];
                    $this->view('orders/details', $data);                        
                } elseif(isLoggedInAsEmployee() && !isLoggedInAsAdmin()){

                $order = $this->orderModel->getOrderDetailsById($id);
                $product = $this->productModel->getProductById($id);
                $data = [
                    'orders' =>  $order,
                    'products' => $product
    
                ];
                $this->view('orders/details', $data);
            } 
        }
    }