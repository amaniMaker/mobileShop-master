<?php
  include_once("connection.php");
  include_once("header.php");
  $id = intval($_GET['id']);
  $sql = 'SELECT * FROM products where id='.$id;
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) 
    {
      $id= $row["id"];
      $name= $row["name"];
      $price= $row["price"];
	  
    }
  }
?>

<section id="que">
  <div class="container">
    <div class="row">
      
    </div>
  </div>
</section>

<section id="prodetail">
  <div class="container">
   
    <div class="row">
      <div class="col-md-3">
        <div class="dog_slider" style="margin-bottom:15px;">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          
            <div class="carousel-inner" role="listbox">
              <div class="item">
                <img src="mobimg/<?php echo $picture;?>" alt="..." class="img-responsive big_image">
              </div>
              <div class="item ">
                <img src="mobimg/<?php echo $picture;?>" alt="..." class="img-responsive big_image">
              </div>
              <div class="item">
                <img src="mobimg/<?php echo $picture;?>" alt="..." class="img-responsive big_image">
              </div>
              <div class="item  active">
                <img src="mobimg/<?php echo $picture;?>" alt="..." class="img-responsive big_image">
              </div>
              <div class="item ">
                <img src="mobimg/<?php echo $picture;?>" alt="..." class="img-responsive big_image">
              </div>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <img src="img/left_arw.png">
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <img src="img/right_arw.png">
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="coffret">
          <h3 style="text-align: left;"><?php echo $name;?></h3>
        </div>
        <h3>Description: </h3>
        <div class="logofoot"> 
          <p>Beautiful love stories make you dream?You too live a real fairy tale.Surprise your other half by offering a romantic photo shoot.Engagement, a wedding anniversary:Photointhebox is the perfect gift to celebrate love.</p>
        </div>

        <h3>Specification: </h3>
        <ul>
          <li>Moving everywhere in Belgium</li>
          <li>Setting up a mobile studio at your home</li>
          <li>Photo session by a professional photographer</li>
          <li>Selection and post-production of the best photos</li>
          <li>Gallery with access code</li>
          <li>1 triptych of 3 photos 13x19 or 13x13 of your choice</li>
        </ul>

        <div>
          <a class="price_btn "><?php echo $price; ?> $</a>
          <?php if(isset($_SESSION['username'])){ ?>
            <a href="cartAction.php?action=addToCart&id=<?php echo $id; ?>" class="plus_btn"> Add Cart </a>
             <?php } else{ ?>
            <a href="login.php" class="plus_btn"> Add Cart </a>
            <?php } ?>
        </div>
      </div>
    </div>
    
    <section id="prodetail">
    <div class="container">
    	<div class="row">
        	<div class="col-md-3 col-xs-12">
            </div>
            
            <div class="col-md-3 xs-hidden">
            </div>
            
            <div class="col-md-6">
            </div>
        </div>
        </div>
   </section>
    
    
  </div>
</section>

<!-- END QUE SECTION -->


<div class="row space50"></div>
<?php
include_once("footer.php");
?>


