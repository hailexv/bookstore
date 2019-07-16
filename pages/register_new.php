<?php
    require_once('includes.php');
    $email = $_POST['email'];
    $username = $_POST['username'];
    $passwd = $_POST['passwd_1'];
    $passwd_2 = $_POST['passwd_2'];
    session_start();
    try {
        // check forms filled in
        if(!filled_out($_POST)) {
            throw new Exception('You have not filled the form correctly');
        }
        // email address not valid 
        if(!valid_email($email)) {
            throw new Exception('This is not a valid email address');
        }
        // passwords not the same
        if($passwd != $passwd_2) {
            throw new Exception('The passwords you entered do not match');
        }
        // check password length
        if(strlen($passwd) < 6 || strlen($passwd) > 16) {
            throw new Exception('Password must be between 6 and 16 characters');
        }
        // call the register function
        register($username, $email, $passwd);
        // register session variable
        $_SESSION['valid_user'] = $username;
    } catch(Exception $e) {

    }
?>