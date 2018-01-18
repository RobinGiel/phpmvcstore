<?php
    class Products extends Controller {
        public function __construct(){
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->productModel = $this->model('Product');
            $this->userModel = $this->model('User');
        }
        public function index(){
            if(!isLoggedIn()){
                redirect('users/login');
            }
            // Get Products
            $products = $this->productModel->getProducts();

            $data = [
                'products' => $products
            ];
            $this->view('products/index', $data);
        }
        // SHOW PRODUCTS

        public function show($id){
            $product = $this->productModel->getProductById($id);
            $user = $this->userModel->getUserById($product->user_id);
            $data = [
                'product' => $product,
                'user' => $user
            ];

            $this->view('products/show', $data);
        }

        //ADD Product
        public function add(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanatize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $target = "img/";
                $target = $target . basename($_FILES['img']['name']);

            // Writes the photo to the server
             if(move_uploaded_file($_FILES['img']['tmp_name'], $target))
             {

                echo "succes";
             }
             else {

             //Gives an error if it is not ok
             die('Sorry, there was a problem uploading your file.');
             }

            // Make sure no errors

            $data = [
                'name' => trim($_POST['name']),
                'description' => trim($_POST['description']),
                'category' => trim($_POST['category']),
                'price' => trim($_POST['price']),
                'img' => $_FILES['img']['name'],
                'user_id' => $_SESSION['user_id'],
                'name_err' => '',
                'description_err' => '',
                'category_err' => '',
                'price_err' => '',
                'img_error' => ''
            ];

            // Validate Products detials
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter product name';
            }
            if(empty($data['category'])){
                $data['category_err'] = 'Please choose category';
            }
            if(empty($data['description'])){
                $data['description_err'] = 'Please enter description text';
            }
            if(empty($data['price'])){
                $data['price_err'] = 'Please enter price';
            }
            if(empty($data['img'])){
                $data['img_error'] = 'Please upload an image';
            }


            if(empty($data['name_err']) && empty($data['category_err']) && empty($data['description_err']) && empty($data['price_err'])){
                // Validated&& empty($data['description_err']
                if($this->productModel->addProduct($data)){
                    flash('post_message', 'Product Added');
                    redirect('products');

                } else{
                    die('something went wrong');
                }

            }  else {
                //Load view with errors
                $this->view('products/add', $data);
            }

            } else {
            $data = [
                'name' => '',
                'description' => '',
                'category' => '',
                'price' => '',
                'img' => ''

            ];
            }

            $this->view('products/add', $data);
        }




            //EDIT POSTS
            public function edit($id){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanatize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'name' => trim($_POST['name']),
                'description' => trim($_POST['description']),
                'category' => trim($_POST['category']),
                'price' => trim($_POST['price']),
                'img' => $_FILES['img']['name'],
                'user_id' => $_SESSION['user_id'],
                'name_err' => '',
                'description_err' => '',
                'category_err' => '',
                'price_err' => '',
                'img_error' => ''
            ];


            // Validate title
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter product name';
            }
            if(empty($data['category'])){
                $data['category_err'] = 'Please choose category';
            }
            if(empty($data['description'])){
                $data['description_err'] = 'Please enter description text';
            }
            if(empty($data['price'])){
                $data['price_err'] = 'Please enter price';
            }
            if(empty($data['img'])){
                $data['img_error'] = 'Please upload an image';
            }


            // Make sure no errors

            if(empty($data['name_err']) && empty($data['category_err']) && empty($data['description_err']) && empty($data['price_err'])){
                // Validated
                if($this->productModel->updateProduct($data)){
                    flash('post_message', 'Product Updated');
                    redirect('products');

                } else{
                    die('something went wrong');
                }

            }  else {
                //Load view with errors
                $this->view('products/edit', $data);
            }

            } else {
                // Get Exesting product from model

                $product = $this->productModel->getProductById($id);

                // Check for owner
                if($product->user_id != $_SESSION['user_id']){
                    redirect('products');
                }
            $data = [
                'id' => $id,
                'name' => $product->name,
                'description' => $product->description,
                'category' => $product->category,
                'price' => $product->price
            ];
            }

            $this->view('products/edit', $data);
        }

        // DELETE POST
        public function delete($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $product = $this->productModel->getProductById($id);
                // Check for owner
                if($product->user_id != $_SESSION['user_id']){
                    redirect('products');
                }
                if($this->productModel->deleteProduct($id)){
                    flash('post_message' , 'Product Removed');
                    redirect('products');
                } else {
                    die('Something went wrong');
                }
            } else{
                redirect('products');
            }
        }
    }