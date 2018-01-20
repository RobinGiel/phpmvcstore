<?php

class Pages extends Controller {
    public function __construct(){
        $this->userModel = $this->model('User');

    }

    public function index(){
        if (isLoggedInAsEmployee()) {
            redirect('products');
        }elseif(isLoggedInAsClient()){
            redirect('products');
        }
        $data =  [
            'title' => 'Ultimate store',
            'description' => 'Products from people to people, login to enter store'

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