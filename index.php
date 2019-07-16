<?php

session_start();
//include database connection
    require_once('pages/connection.php');
if(!isset($_SESSION['id'])) {
    header('Location:login.php');
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
    <link href="bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="pages/shop-homepage.css" rel="stylesheet">

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
            
          </ul>

          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search Book" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Search</button>
          </form>

          <pre>  </pre>
            
            <button class="btn btn-outline-info my-2 my-sm-0" disabled="true"> Welcome <?php echo $ID = $_SESSION['id']; ?></button>

            <pre>  </pre>

            <button class="btn btn-outline-danger my-2 my-sm-0" onclick="location.href = 'pages/logout.php';" type="submit">  Logout </button>
          
        </div>
      </div>
    </nav>

    

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">





          <div class="list-group">
            <a href="#" class="list-group-item" id="elem-1">Book Catalog</a>
            

            <?php
                    
                    require('pages/config.php');
                    $query="select * from category ";
      
                    $res=mysqli_query($conn,$query);
                      
                    while($row=mysqli_fetch_assoc($res))
                      {
                        echo '<a href="pages/subcat.php?cat='.$row['cat_id'].'&catnm='.$row["cat_nm"].'" class="list-group-item">'.$row["cat_nm"]. '</a>';
                        //pass catid not catnm
                      }
      
                      mysqli_close($conn);
                ?>
          </div>

        
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">


              <img src="pages/upload_image/aaulogo.png" style="margin-left: 240px;">

              <h4 style="margin-left: 220px;"> <b> Welcome to AAU bookstore </b> </h4>

              <h5 style="margin-left: 250px;"> <b> use the left side category </b> </h5>

                  
          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="bootstrap/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
