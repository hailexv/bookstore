<?php
    function register($username, $email, $passwd) {
        // connect to db
        $conn = db_connect();
        $result = $conn->query("select * from user where username='".$username."'");
        if(!$result) {
            throw new Exception('Could not execute query');
        }
        if($result->num_rows > 0) {
            throw new Exception('The username is taken - go back and choose another one');
        }
        // if OK, put in DB
        $result = $conn->query("insert into user values('".$username."', '".$passwd."', '".$email."');");
        if(!$result) {
            throw new Exception('Could not register you in the database');
        }
        echo('User successfully registered in database');
        return true;
    }

    function login($username, $passwd) {
        // connect to db
        $conn = db_connect();
        //check if username is unique
        $result = $conn->query("select * from user where username='".$username."' and passwd = shal('".$passwd."')");
        if(!$result) {
            throw new Exception('Could not log you in');
        }

        if($result->num_rows() > 0)
            return true;
        else
            throw new Exception('Could not log you in'); 
    }

    function check_valid_user() {
        // see if somebody is logged in and notify them if not
        if(!isset($_SESSION['valid_user'])) {
            echo("Logged in as ".$_SESSION['valid_user'].".<br />");
        }
        else {
            // they are not logged in
            echo("You are not logged in");
        }
    }
?>