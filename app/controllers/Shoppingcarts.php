<?php
    class Shoppingcarts extends Controller {

        public function __construct(){
            if(!isLoggedInAsClient()){
                redirect('users/login');
            }
            $this->productModel = $this->model('Product');
            $this->userModel = $this->model('User');
            
            $this->shoppingCartModel = $this->model('ShoppingCart');
        }

        public function index(){
            if(!isset($_SESSION['cart'])){
                
                $data = [
                    'description' => 'Your Shopping cart is empty' 
                ];
                $this->view('shoppingcarts/index', $data);    
            } else {
                 $this->view('shoppingcarts/index'); 
            }
    }

        public function remove(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $id = $_POST['id'];
            unset($_SESSION['cart'][$id]);
            flash('post_message', '1 order removed');
            redirect('shoppingcarts');
        }
    }
            public function emptycart(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            unset($_SESSION['cart']);
            flash('post_message', 'Shopping Cart is now empty');
            redirect('shoppingcarts');
        }
    }
        public function ordernow(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            unset($_SESSION['cart']);
            flash('post_message', 'Thank you for ordering! see here all');
            redirect('orders/details');
        }
    }
}