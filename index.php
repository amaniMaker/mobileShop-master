<?php

include_once("connection.php");
include_once("header.php");

?>

<section id="que">
  <div class="container">
    <div class="row">
      <div class="col-md-12" id="domicile">
        <div class="nous_title">
          
          <div class="gallery">
            <img src="mobimg/cover.jpg" alt="..." class="img-responsive" width="100%">

          </div>
        </div>
      </div>
     </div>
  </div>
</section>


<section id="banner">
  <div class="container">
    
    <div id="box_main_title" class="row">
      <div class="col-md-12">
        <div class="coffret1">
          <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Featured Products</font></font></h3>
        </div>
      </div>
    </div>

    <div class="row"> 
      <div class="col-md-12">
        <div class="slider">
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <img src="mobimg/banner1.jpg" alt="Los Angeles" style="width:100%;">
                </div>

                <div class="item">
                  <img src="mobimg/banner2.jpg" alt="Chicago" style="width:100%;">
                </div>
              
                <div class="item">
                  <img src="mobimg/banner3.jpg" alt="New york" style="width:100%;">
                </div>
                
                <div class="item">
                  <img src="mobimg/banner4.jpg" alt="New york" style="width:100%;">
                </div>
              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
  </div>
</section>

<!-- END HEADER SECTION -->   

<!-- START QUE SECTION -->



<section id="brands">
  <div class="container">
    <div id="box_main_title" class="row">
      <div class="col-md-12">
        <div class="coffret1">
          <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Product Brands</font></font></h3>
        </div>
      </div>
    </div>
    
    <div class="row space50">
       <?php 
        $sql = 'SELECT * FROM product_category order by id';
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) 
          {
          //print_r($row);
      ?>
      <div class="col-md-3">
        <a href="Product.php?id=<?php echo $row['id'];?>" class="brandcls"><?php echo $row["category_name"];?></a>
      </div>
      <?php 
        } 
      }
      ?>

    </div>


  </div>
</section>

<section id="que">
  <div class="container">
    <div id="box_main_title" class="row">
      <div class="col-md-12">
        <div class="coffret">
          <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Featured Products</font></font></h3>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="section group">
      <?php 
        
        $sql = 'SELECT * FROM products order by id DESC LIMIT 5';
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) 
          {
          //print_r($row);
      ?>
        
        <div class="col span_1_of_5">
          <div class="book_case">
            <img src="mobimg/<?php echo $row["name"];?>" alt="..." class="img-responsive center-block">
            
            <h5>
              <a href="product_detail.php?id=<?php echo $row['id'];?>"><?php echo $row["name"];?></a>
            </h5>

            <hr>

            <div class="row">
              <div class="col-xs-4">
                <div class="price0">
                  <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> <?php echo $row["price"];?> $ </font></font></h5>
                </div>
              </div>

              <div class="col-xs-8">
              <?php if(isset($_SESSION['username'])){ ?>
                <a href="cartAction.php?action=addToCart&id=<?php echo $row['id']; ?>" class="plus_btn "> Add Cart </a>
              <?php } else{ ?>
                <a href="login.php" class="plus_btn"> Add Cart </a>
              <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <?php
          }
        }
        ?>
        
      </div>
    </div>
  </div>
</section>

<!-- END QUE SECTION -->


<!-- START brands SECTION -->



<!-- END brands SECTION -->

<div class="row space50"></div>
<?php
include_once("footer.php");
?>


