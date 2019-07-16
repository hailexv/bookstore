<?php

session_start();
//include database connection
    require_once('connection.php');
    require('config.php');

if(!isset($_SESSION['id'])) {
    header('Location: ../login.php');
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




      
    <div class="container mb-4" style="margin-top: 80px;">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> Number </th>
                            <th scope="col">Student ID </th>
                            <th scope="col">Book name</th>
                            <th scope="col">Delete</th>
                            <th> </th>

                        </tr>
                    </thead>
                    <tbody>

                    <?php

                          if (isset($_GET['delete'])) {

                              $sql = "delete from contact where con_id=".$_GET['delete'];
                              mysqli_query($conn,$sql);
                          }
                      
                    $q="select * from contact";
                    $res=mysqli_query($conn,$q) or die("Can't Execute Query...");
                    
                      $count=1;
                      while($row=mysqli_fetch_assoc($res))
                      {

                        echo '<tr>';
                            echo '<td>' . $count . '</td>';
                            echo '<td>'. $row["con_nm"] .'</td>';
                            echo '<td>'. $row["con_book"] .'</td>';
                            
                            echo '<td><a href="manage_rent.php?delete='.$row["con_id"].'"><button type="button" class="btn btn-danger" onclick="deletePrompt()">Delete</button></a></td>';
                            
                            
                        echo '</tr>';
                        $count++;

                      }

                      ?>
                        
                    </tbody>
                </table>
            </div>
        </div>


        

</body>

</html>
