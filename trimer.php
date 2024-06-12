<?php 
session_start();
include("includes/db.php");  
include("functions/functions.php");
$per_page = 6;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abens</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- owl carousel css file cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css"> 
  </head>
  <body>

  <!-- header -->
  <?php include 'includes/header.php'; ?>

  <section class="content" id="content">
    <div class="container">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><span>OUR SERVICES</span></li>
        </ul>
      </div>
    </div>
  </section>  
  <div class="col-m-9">
    <?php
    if(!isset($_GET['p_cat'])){
      if(!isset($_GET['cat_id'])){
        echo 
        "<div class='boxi'>
        <h1></h1>
        <p> </p>
        </div>";
      }
    }
    ?>
  </div>
  <div class="content1" id="content1">
    <div class="container1">
      <div class="col-md-3">
        <?php
        include("includes/sidebar.php");  
        ?>
      </div>
    </div>
  </div>
  
  <div class="contt" id="contar">
    <div class="ro">
      <?php
      if(!isset($_GET['p_cat'])){
        if(!isset($_GET['cat_id'])){
          $per_page=6;
          if(isset($_GET['page'])){
            $page=$_GET['page'];
          }else{
            $page=1;
          }
          $start_from=($page-1) * $per_page;
          $get_product="select * from products order by 1 DESC LIMIT $start_from, $per_page";
          $run_pro=mysqli_query($con,$get_product);
          while ($row=mysqli_fetch_array($run_pro)) {
            $pro_id=$row['product_id'];
            $pro_title=$row['product_title'];
            $pro_price=$row['product_price'];
            $pro_img1=$row['product_img1'];
            echo 
              "<div class='col-md-4 col-sm-6 sing'>
                <div class='prod'>
                  <a href='details.php?pro_id=$pro_id'>
                  <img src='admin_area/product_images/$pro_img1' class='img-responsive' width='300' height='300'>
                  </a>
                  <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                  <p class='pric'>  Rp$pro_price </p>
                  <p class='buttons'>
                    <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                    <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>
                      Add to Cart
                    </a>
                  </p>
                </div>
              </div>";
          }
        }
      }
      ?>

      <!--Page Session Start-->
      <ul class="pagination">
        <?php
        $query="select * from products";
        $result=mysqli_query($con,$query);
        $total_record=mysqli_num_rows($result);
        $total_pages=ceil($total_record / $per_page);
        echo "<li> <a  href='trimer.php?page=1' >".'First Page'." </a> </li>";
        for($i=1; $i<=$total_pages; $i++){
          echo "<li> <a href='trimer.php?page=".$i."'> ".$i." </a> </li>";
        };
        echo "<li> <a href='trimer.php?page=$total_pages'>".'Last Page'." </a> </li>";
        ?>
      </ul>

      <div class="products">
        <?php
        echo getPcatPro();
        echo getCatPro(); 
        ?>
      </div>
      </div>
    </div>
  <!--Page Session End-->

  </body>
</html>