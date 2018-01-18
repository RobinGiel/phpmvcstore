<?php
	class Accounts extends Controller {

        public function __construct(){
            if(!isLoggedInAsClient() && !isLoggedInAsEmployee() && !isLoggedInAsAdmin()){
                redirect('users/login');
            }

          $this->userModel = $this->model('User');

        }

        public function index(){
  
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
  // Update user credentials

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                 $data = [
                    'id' => $_SESSION['user_id'],
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'name_err' => '',
                    'email_err' => ''
                ];


                // Validate User credentials
                // Validate Email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                } else {
                    // Check email
                    if($data['email'] == $_SESSION['user_email']){
                         $data['email_err'] = '';
                    }
                    elseif($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'Email is already taken';
                    }
                }

                // Validate Name

                if(empty($data['name'])){
                    $data['name_err'] = 'Please enter name';
                }


            // Make sure no errors

            if(empty($data['name_err']) && empty($data['email_err'])){

                // Validated
                if($this->userModel->update($data)){

 
                    flash('post_message', 'Your credentials has been updated');
                    redirect('accounts');

                } else{
                    die('something went wrong');
                }

            }  else {
                //Load view with errors
                $this->view('accounts/index', $data);
            }

        }else {
            $id = $_SESSION['user_id'];
            $user = $this->userModel->getUserById($id);

            $data = [
                'name' => $user->name,
                'email' => $user->email
            ];
            $this->view('accounts/index', $data);
        }

        // edit users credentails ended here
     }

}


