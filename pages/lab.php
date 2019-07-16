<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    try {
        $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    } catch(Exception $e) {
        die('Could not connect: '.mysql_error());    
    }
    echo 'Connected successfully'.'<br>';
    $db = mysql_select_db('AAiT_book_store');
    if(empty($db)) {
        $database_create = 'CREATE Database AAiT_Book_Store';
        $check = mysql_query($database_create);
        if(!$check) {
            echo 'Database Creation Error\n';
        }
        else {
            echo 'Database '.$database_create.' is successfully created\n';
        }
    }

    else {
        echo 'Database exists';
    }

    $table = 'select * from user_profile ';
    $checktable = mysql_query($table);
    if(!$checktable) {
        echo 'table is not created, please create the table user_profile'.'<br>';
        $table = 'CREATE TABLE user_profile ( 
                 user_id VARCHAR(20) NOT NULL PRIMARY KEY, 
                 user_fname VARCHAR(20) NOT NULL, 
                 user_lname VARCHAR(20) NOT NULL, 
                 user_typ VARCHAR(20) NOT NULL, 
                 email_address VARCHAR(20) NOT NULL, 
                 phone_number VARCHAR(20) NOT NULL, 
                 password VARCHAR(20) NOT NULL, 
                 join_table TIMESTAMP NOT NULL)';
                $checktable = mysql_query($table);
                if(!$checktable) {
                    die('Could not create table: '.'<br>'. mysql_error()).'<br>';
                }
                else {
                    echo('Table user_profile created successfully');
                }
    }

    $booktable = 'select * from book';
    if(!$booktable) {
        $booktable = 'CREATE TABLE book (
                    ISBN VARCHAR(50),
                    author_name VARCHAR(1000) NOT NULL,
                    book_title VARCHAR(100) NOT NULL,
                    category VARCHAR(100) NOT NULL,
                    publisher VARCHAR(100) NOT NULL,
                    book_image BLOB,
                    price DECIMAL NOT NULL,
                    quantity int NOT NULL,
                    book_description text)';
        $checktable = mysql_query($booktable);
        if(!$checktable)
            die('Could not create table: '.'<br>'.mysql_error()).'<br>';
        else
            echo('Table book created successfully');
    }
    else
        echo('Booktable exists');
    mysql_close($conn);
    ?>