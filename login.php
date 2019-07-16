<?php
session_start();
  
require_once('pages/connection.php');
  
if(isset($_POST['submit'])){
    $errMsg = '';
    //id and password sent from Form
    $id = trim($_POST['id']);
    $password = trim($_POST['password']);

    if($id == '')
        $errMsg = 'You must enter your id<br>';
    
    if($password == '')
        $errMsg = 'You must enter your Password<br>';
    
    if($errMsg == ''){
        $records = $db->prepare("SELECT id, password FROM student WHERE id=:id");
        $records->bindParam(':id', $id);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
//    if(count($results) > 0 && password_verify($password, $results['password'])){
        if(count($results) > 0 && ($password) === $results['password']){
            if ($id!="admin") {
                $_SESSION['id'] = $results['id'];
                header('location:index.php');
            }
            else {
                
                $_SESSION['id'] = $results['id'];
                header('location:pages/admin_home.php');
            }
            
            exit;
      } else {
                $errMsg = 'Username or Password  not found<br>';
      }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="background-color: yellow;">



  <div class="container" style="background-color: white; width: 50%; margin-top: 13%; padding: 40px; ">

 

    <div class="container" style="width: 70%; ">

      <form class="form-signin" action="login.php" method="POST" >
        <h2 class="form-signin-heading">login to your account</h2>

         <?php
        if(isset($errMsg)){
          echo $errMsg ;
        }
        ?>
        
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" id="inputEmail" name="id" class="form-control" placeholder="Username"  autofocus>
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <br>
       
        <button class="btn btn-lg btn-primary " type="submit" name="submit" >Sign in</button>
        <button class="btn btn-lg btn-primary " > Clear </button>
        
      </form>

    </div>  

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>