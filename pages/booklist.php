	<?php
require('config.php');
 session_start();

	
	
	
	$cat=$_GET['subcatid'];
	
	$totalq="select count(*) \"total\" from book where b_subcat='$cat'";
	
	$totalres=mysqli_query($conn,$totalq) or die("Can't Execute Query...");
	$totalrow=mysqli_fetch_assoc($totalres);
	
	
	$page_per_page=6;
	
	$page_total_rec=$totalrow['total'];
	
	$page_total_page=ceil($page_total_rec/$page_per_page);
	
	
	if(!isset($_GET['page']))
	{
		$page_current_page=1;
	}
	else
	{
		$page_current_page=$_GET['page'];
	}
	
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

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


     <!-- Page Content -->
    <div class="container">

    	<h1 class="title" align="center"><?php echo $_GET['subcatnm'];?></h1>

      <div class="row">

        <div class="col-lg-3">





          <div class="list-group" style="margin-top: 20px;">
            <a href="#" class="list-group-item" id="elem-1" style="background-color: black; color: white;">Book Catalog</a>
            

            <?php
                    
                    require('config.php');
                    $query="select * from category ";
      
                    $res=mysqli_query($conn,$query);
                      
                    while($row=mysqli_fetch_assoc($res))
                      {
                        echo '<a href="subcat.php?cat='.$row['cat_id'].'&catnm='.$row["cat_nm"].'" class="list-group-item">'.$row["cat_nm"]. '</a>';
                        //pass catid not catnm
                      }
      
                      
                ?>
          </div>

		</div>
			
			<!-- start page -->


				<!-- /.col-lg-3 -->


        <div class="col-lg-9" style="margin-top: 20px;">




        	<?php   

					$k=($page_current_page-1)*$page_per_page;
											
												$query="select *from book where b_subcat='$cat' LIMIT ".$k .",".$page_per_page;
	
												$res=mysqli_query($conn,$query) or die("Can't Execute Query...");
	
												$count=0;



					while($row=mysqli_fetch_assoc($res))
												{
													if($count==0)
													{
														echo '<tr>';
													}

												

													//echo "<div class='row'>";

													

										            echo "<div class='col-lg-4 col-md-6 mb-4'>";
										            echo "<div class='card h-100'>";
										            

										            //src="Book-Images/img-6.png"
										            //src="'.$row['b_img'].'

										            echo '<a href="detail.php?id='.$row['b_id'].'&cat='.$_GET['subcatnm'].'"><img class="card-img-top" src="'.$row['b_img'].'" </a>';
									                echo "<div class='card-body'>";
									                echo "<h4 class='card-title'>";
									                echo "<a href='#''>".$row['b_nm']."</a>";
									                echo "<br>";
									                echo "<br>";
									                echo "<br>";
									              
									                echo "</h4>";

									                echo "<h5>".$row['b_price']."</h5>";
									                
									                echo "</div>";
									                echo "<div class='card-footer'>";
									                  echo "<small class='text-muted'>&#9733; &#9733; &#9733; &#9733; &#9734;</small>";
									                echo "</div>";
									              echo "</div>";
									              echo "</div>";

													
													$count++;							
													
													if($count==2)
													{
														echo '</tr>';
														$count=0;
													}
												}

				?>




          

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->



			<!--    -->

				<div id="page">
					<!-- start content -->
							<div id="content">
								<div class="post">
									
									<div class="entry">
										
										
										
										
										<br><br><br>
										<center>
										<?php
											
											if($page_total_page>$page_current_page)
											{
												echo '<a href="booklist.php?subcatid='.$_GET['subcatid'].'&subcatnm='.$_GET['subcatnm'].'&page='.($page_current_page+1).'">Next</a>';
											}
											
											for($i=1;$i<=$page_total_page;$i++)
											{
												echo '&nbsp;&nbsp;<a href="booklist.php?subcatid='.$_GET['subcatid'].'&subcatnm='.$_GET['subcatnm'].'&page='.$i.'">'.$i.'</a>&nbsp;&nbsp;';
											}
											
											if($page_current_page>1)
											{	
												echo '<a href="booklist.php?subcatid='.$_GET['subcatid'].'&subcatnm='.$_GET['subcatnm'].'&page='.($page_current_page-1).'">Previous</a>';
											}
											
										?>
										</center>
									</div>
									
								</div>
								
							</div>
					<!-- end content -->
					
					
					<div style="clear: both;">&nbsp;</div>
				</div>
			<!-- end page -->
			
				
			<!-- start footer -->
				
			<!-- end footer -->
</body>
</html>
