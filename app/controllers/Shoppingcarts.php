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
           
            $product = $this->productModel->getProductById($_SESSION['order_productId']);
            $data  = [
                'order_productId' => $_SESSION['order_productId'],
                'order_quantity' => $_SESSION['order_quantity'],
                'order_name' => $product->name,
                'order_img' =>$product->img,
                'order_price' => $product->price
            ];

            

            $this->view('shoppingcarts/index', $data);
        }
}