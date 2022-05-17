<?php
  include_once("connection.php");
  include_once("header.php");
  $id = intval($_GET['id']);
  //echo $id;
  $sql = 'SELECT * FROM product_category where id='.$id;
  //echo $sql;
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) 
    {
      $name= $row["category_name"];
    }
  }
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

<section id="que1">
  <div class="container">
    <div id="box_main_title" class="row">
      <div class="col-md-12">
        <div class="coffret">
          <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> <?php echo $name;?></font></font></h3>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="section group">

        <?php 
        
          $sql = 'SELECT * FROM products where cat_id='.$id;
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) 
            {
          //print_r($row);
        ?>
        <div class="col span_1_of_5">
          <div class="book_case">
            <img src="mobimg/<?php echo $row["picture"];?>" alt="..." class="img-responsive center-block">
            
            

            <h5>
              <a href="product_detail.php?id=<?php echo $row['id'];?>"><font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;"> <?php echo $row["name"];?> </font>
              </font></a>
            </h5>

            <hr>

            <div class="row">
              <div class="col-xs-4">
                <div class="price0">
                  <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> <?php echo $row["price"];?> $ </font></font></h5>
                </div>
              </div>

              <div class="col-xs-8">
                <?php if(!empty($_SESSION)){ ?>
                <a href="cartAction.php?action=addToCart&id=<?php echo $row['id']; ?>" class="plus_btn"> Add Cart </a>
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

<div class="row space50"></div>
<?php
include_once("footer.php");
?>


