<?php

class Pages extends Controller {
    public function __construct(){
        $this->userModel = $this->model('User');
        $this->productModel = $this->model('Product');

    }

    public function index(){
        if (isLoggedInAsEmployee()) {
            redirect('products');
        }elseif(isLoggedInAsClient()){
            redirect('products');
        }

        $products = $this->productModel->getProducts();
        $data =  [
            'title' => 'Ultimate store',
            'description' => 'Products from people to people, login to enter store',
             'products' => $products

        ];

        $this->view('pages/index', $data);

}

    public function about(){

         $data =  [
            'title' => 'About us',
            'description' => 'App to sell and buy Products'
        ];
        $this->view('pages/about', $data);
    }

}