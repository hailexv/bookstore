<?php

session_start();
//include database connection
    require_once('connection.php');
    require('config.php');
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

    <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

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
              <a class="nav-link" href="admin_home.php">Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="manage_books.php">Manage Books</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Add Books</a>
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




    <section id="login" style="margin-top: 100px; margin-left: 300px; margin-right: 300px;">
    <div class="container">
      <div class="row">
          <div class="col-xs-12">
              <div class="form-wrap">
                <h1><pre>Add book         <pre></h1>
                    <form role="form" action='process_addbook.php' method='POST' enctype="multipart/form-data" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="email" class="sr-only">Book name</label>
                            Book name<input type="text" name="name" id="email" class="form-control" placeholder="Book name">
                        </div>

                       

                         <div class="form-group">
                            <label for="email" class="sr-only">Book name</label>
                            Publisher<input type="text" name='publisher' id="email" class="form-control" placeholder="publisher name">
                        </div>

                         <div class="form-group">
                            <label for="text" class="sr-only">Book name</label>
                            Edition<input type="text" name='edition' id="email" class="form-control" placeholder="book edition">
                        </div>
                       
                         <div class="form-group">
                            <label for="email" class="sr-only">Book name</label>
                             Pages<input type="text" name='pages' id="email" class="form-control" placeholder="number of pages">
                        </div>

                        <div class="form-group">
                            <label for="text" class="sr-only">Book name</label>
                             price<input type="text" name='price' id="email" class="form-control" placeholder="price">
                        

                        <div class="form-group">
                        <br>

                        Description:<br>
            <textarea cols="40" rows="6" name='description' ></textarea>
            <br><br>

                        </div>


                          <b>Category:</b><br>
            <select  name="cat" style="width: 50%;">
                <?php
                  
                    
      
                      $query="select * from category ";
      
                      $res=mysqli_query($conn,$query);
                      
                      while($row=mysqli_fetch_assoc($res))
                      {
                        echo "<option disabled>".$row['cat_nm'];
                        
                        $q2 = "select * from subcat where parent_id = ".$row['cat_id'];
                        
                        $res2 = mysqli_query($conn,$q2) or die("Can't Execute Query..");
                        while($row2 = mysqli_fetch_assoc($res2))
                        { 
                        
                    echo '<option value="'.$row2['subcat_id'].'"> ---> '.$row2['subcat_nm'];
                        
                          
                        }
                        
                      }
                      mysqli_close($link);
                ?>
            </select>
            <br><br>

            <b>Image:</b><br>
            <input type='file' name='img' size='35'>
            <br><br>
            
            
            <b>E-Book:</b><br>
            <input type='file' name='ebook'  size='35'>
            <br><br>


                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Add Book">
                    </form>
      
                    <hr>
              </div>
        </div> <!-- /.col-xs-12 -->
      </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title">Recovery password</h4>
      </div>
      <div class="modal-body">
        <p>Type your email account</p>
        <input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-custom">Recovery</button>
      </div>
    </div> <!-- /.modal-content -->
  </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->



</body>

</html>
