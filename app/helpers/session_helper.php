<?php
    session_start();

    // FLash message helper
    // EXAMPLE - flash('register_succes', 'You are now registered');
    // DISPLAY IN VIEW - echo flash ('register_success');
    function flash($name = '', $message = '', $class = 'alert alert-success'){
        if(!empty($name)){
            if(!empty($message) && empty($_SESSION[$name])){
                if(!empty($_SESSION[$name])){
                    unset($SESSION[$name]);
                }
                if(!empty($_SESSION[$name. '_class'])){
                    unset($_SESSION[$name. '_class']);

                }
                $_SESSION[$name] = $message;
                $_SESSION[$name. '_class'] = $class;
            } elseif (empty($message) && !empty($_SESSION[$name])) {
               $class = !empty ($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
               echo '<div class="' .$class.'" id="msg-flash">'.$_SESSION[$name]. '</div>';
               unset($_SESSION[$name]);
               unset($_SESSION[$name. '_class']);
            }

        }
    }

    function isLoggedIn(){
        if(isset($_SESSION['user_id']) && $_SESSION['user_role'] === 'medewerker'){
            return true;
        } elseif(isset($_SESSION['user_id']) && $_SESSION['user_role'] === 'klant'){
            return true;
        }
        else {
           return false;
        }
    }

        function isLoggedInAsAdmin(){
        if( $_SESSION['user_role'] === 'admin'){
            return true;
        } else {
            return false;
        }
    }

        function isLoggedInAsClient(){
        if($_SESSION['user_role'] === 'klant'){
            return true;
        } else {
            return false;
        }
    }