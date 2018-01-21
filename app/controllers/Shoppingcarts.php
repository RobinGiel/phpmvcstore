<?php
    class Shoppingcarts extends Controller {

        public function __construct(){
            if(!isLoggedInAsClient()){
                redirect('pages/index');
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
}