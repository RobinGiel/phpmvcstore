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

        public function pdf($id){
            if(isLoggedInAsClient()){
                    
                    $id = $_SESSION['user_id'];
 
                    $order = $this->orderModel->getOrderDetailsByUserId($id);
                    $product = $this->productModel->getProductById($id);
                    $data = [
                        'orders' =>  $order,
                        'products' => $product     
                    ];
                    $this->view('orders/pdf', $data);                        
                } elseif(isLoggedInAsEmployee() && !isLoggedInAsAdmin()){

                $order = $this->orderModel->getOrderDetailsById($id);
                $product = $this->productModel->getProductById($id);
                $data = [
                    'orders' =>  $order,
                    'products' => $product
    
                ];
                $this->view('orders/pdf', $data);
            }
        }


       // Show Product Details
        public function details($id){
            if(isLoggedInAsClient()){
                    
                    $product = $this->productModel->getProductById($_SESSION['user_id']);
                    $order = $this->orderModel->getOrderDetailsById($id);
                    $data = [
                        'orders' =>  $order  
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

                public function success(){
                    if(isLoggedInAsClient()){
                        foreach($_SESSION['cart'] as $row){
                            $id = $_SESSION['user_id'];
                            $maxUserOrderId = $this->orderModel->getMaxUserId($id);
    
                $products = $this->productModel->getProductById($row['order_productId']);
                            $data =[
                                'product_id' => $products->id,
                                'product_price' => $products->price,
                                'quantity' => $row['order_quantity'],
                                'completed_orders_id' => $maxUserOrderId->MaxID
                            ];

                            // var_dump($data);


                            if($this->orderModel->newOrderDetails($data)){
                                
                                unset($_SESSION['cart']);
                                redirect('orders');
                                flash('post_message', 'Thank you for your order!');
                                
                            }
                            else{
                                die('something went wrong');
                            }
                        }
                
            } 
        }
    }
