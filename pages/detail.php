<?php session_start();
	require('config.php');
	
	$id=$_GET['id'];
	
	$q="select * from book where b_id=$id";
	
	$res=mysqli_query($conn,$q) or die("Can't Execute Query..");
	$row=mysqli_fetch_assoc($res);
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="lightbox.css" type="text/css" media="screen" />
	<script src="js/prototype.js" type="text/javascript"></script>
	<script src="js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="js/lightbox.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/java.js"></script>

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
        <a class="navbar-brand" href="../index.php">AAiT Bookstore</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../index.php">Home
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

            <button class="btn btn-outline-danger my-2 my-sm-0" onclick="location.href = 'logout.php';" type="submit">  Logout </button>
          
        </div>
      </div>
    </nav>













<div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav m-auto">
                <li class="nav-item m-auto">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category.html">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product.html">Product</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="contact.html">Cart <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search...">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary btn-number">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <a class="btn btn-success btn-sm ml-3" href="cart.html">
                    <i class="fa fa-shopping-cart"></i> Cart
                    <span class="badge badge-light">3</span>
                </a>
            </form>
        </div>
    </div>
</nav>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading"><?php echo $row['b_nm'];?></h1>
     </div>
</section>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">NAME</th>
                            <th scope="col">Publisher</th>
                            <th scope="col" class="text-center">Edition</th>
                            <th scope="col" class="text-right">Pages</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                            <td><?php echo $row['b_nm']; ?></td>
                            <td><?php echo $row['b_publisher']; ?></td>
                            <td><?php echo $row['b_edition']; ?></td>
                            <td class="text-right"><?php echo $row['b_page']; ?></td>
                            <td class="text-right"><?php echo $row['b_price']; ?></td>
                            
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>



        



<main role="main" class="container">
      <div class="jumbotron">
        <h1>DESCRIPTION</h1>
        <p class="lead"><?php echo $row['b_desc']; ?></p>
        <a class="btn btn-lg btn-primary" href="<?php echo $row['b_pdf']; ?>" role="button">Download softcopy &raquo;</a>
        <a class="btn btn-lg btn-primary" href="process_contact.php?id=<?php echo $id; ?>" role="button">Rent hardcopy &raquo;</a>
      </div>
    </main>





        
    </div>
</div>












		
			
						<!-- end content -->
							<!-- start sidebar -->
							
							<!-- end sidebar -->
								<div style="clear: both;">&nbsp;</div>
				
				</div> 
			<!-- end page -->
						<!-- start footer -->
						
						<!-- end footer -->
</body>
</html>
