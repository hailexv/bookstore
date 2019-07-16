<?php

session_start();
//include database connection
    require_once('connection.php');
if(!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}



?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AAiT Bookstore</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/shop-homepage.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">AAiT Bookstore</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="manage_books.php">Manage Books</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="add_books.php">Add Books</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="manage_rent.php">Manage rent</a>
            </li>
           
          </ul>

          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search Book" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Search</button>
          </form>

          <pre>  </pre>
            
            <button class="btn btn-outline-info my-2 my-sm-0" disabled="true"> Welcome <?php echo $ID = $_SESSION['id']; ?></button>

            <pre>  </pre>

            <button class="btn btn-outline-danger my-2 my-sm-0" onclick="location.href = 'logout.php';" type="submit">  Logout </button>
          
        </div>
      </div>
    </nav>




    <main role="main" class="container" style="margin-top: 120px;">
      <div class="jumbotron">
        <h1>Welcome admin</h1>
        <p class="lead"></p>
        <a class="btn btn-lg btn-primary" href="manage_books.php" role="button">Manage books &raquo;</a>
      </div>
    </main>



</body>

</html>
