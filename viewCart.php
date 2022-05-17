<?php
  include_once("connection.php");
  include_once("header.php");
  include 'cart.php';
  $cart = new Cart;

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
<style>
  .btn_check{
      z-index:999;
      position:relative;
  }
  @media(max-width: 767px){
    .anim #banner {
        background: transparent!important ;
    }
  }
</style>
 <link rel="stylesheet" type="text/css" href="css/style2.css">
 <div class="space50"></div>
<section id="details">
    <div class="container">
        
        
            <div class="table-responsive">          
              <table class="table">
                <thead class="black">
                  <tr>
                    <th>PRODUCT</th>
                    <th>PRICE</th>
                    <th>AMOUNT</th>
                    <th>TOTAL</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if($cart->total_items() > 0){
                    //get cart items from session
                    $cartItems = $cart->contents();
                      foreach($cartItems as $item){
                 
                      $uploadd= "mobimg";
                      $id=$item['id'];
                      $product="select * from products where id='$id'";
                      $query1=mysqli_query($conn,$product);
                      while($val1=mysqli_fetch_assoc($query1))
                      {
                          $name=$val1['name'];
                          $price=$val1['price'];
                          $picture = $val1["picture"];
                      }
                  ?>
                  <tr>
                    <td>
                      <ul class="list-inline list_book">
                       <li> <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>"><i class="fa fa-times" aria-hidden="true"></i></a></li>
                        <!-- <li class="bdr_lft hidden-xs"><img src="<?php echo $uploadd .'/'.$item['pro_img']?>" class="img-responsive center-block book_img"></li> --> 
                        <li class="bdr_lft hidden-xs"><img src="mobimg/<?php echo $picture;?>" class="img-responsive center-block book_img"></li>
                        <li class="bdr_lft"><?php echo $name;?></li>
                      </ul>  
                    </td>
                    <input type="hidden" class="row_id" value="<?php echo $item["rowid"]; ?>">
                    <td class="bdr_lft" ><input type="hidden" class="price_<?php echo $item["rowid"]; ?>" value="<?php echo $item["price"]; ?>"><i class="fa fa-eur" aria-hidden="true"></i><?php echo $item["price"]; ?></td>
                    <td> 
                      <div class="counter-widget">
                        <ul class="list-inline delist">
                          <li>
                              <a href="#" class="plus-minus-btn plus" id="plus" onclick="add('<?php echo $item["rowid"] ?>')">+</a>
                          </li>
                          <li> <input type="text"  class="input_value quantity_<?php echo $item["rowid"] ?>"   id="quantity"   value="<?php echo $item["qty"]; ?>"></li>
                          <li>
                              <a href="#" class="plus-minus-btn minus" id="minus" onclick="minus('<?php echo $item["rowid"] ?>')">-</a>
                          </li>                               
                        </ul>
                      </div>
                    </td>
                    <td class="total-price_<?php echo $item["rowid"]; ?>"><i class="fa fa-eur" aria-hidden="true"></i><?php echo $item["subtotal"]; ?></td>
                  </tr>
                  
                  <?php
                        }
                      }
                    else{ 
                  ?>
                  
                  <tr>
                    <td ><p>Your cart is empty.....</p></td>
                  </tr>
                  
                  <?php } ?>
                    
                </tbody>
              </table>
            </div>
            
            <div class="btns">
              
                <ul class="list-inline pad0">
                 
                    <li style="float: right;"><a href="checkout.php"><div class="btn btn_pour btn_check">ORDER NOW</div></a></li>
                    
                   
                </ul>
            </div>
            
           
            <div class="row">
                <div class="col-sm-12">
                     <?php if($cart->total_items() > 0){ ?>
                    <h4 class="detail_txt">TOTAL BASKET</h4>
                    <table class="table table-bordered">
                        <tbody>
                          <tr>
                            <td>Subtotal of the basket</td>
                            <td><i class="fa fa-eur" aria-hidden="true"></i><?php echo $cart->total(); ?></td>
                          </tr>
                          <tr>
                            <td>Amount</td>
                            <td><i class="fa fa-eur" aria-hidden="true"></i><?php echo $cart->total(); ?></td>
                          </tr>
                        </tbody>
                    </table>
                    <?php
                     }
                     ?>
                </div>

            </div>
           
           
         
    </div>
</section>

<?php

include_once("footer.php");
?>

<!-- javascript libraries -->

<script>
function add(row_id)
{
    var product_id = row_id;
    var new_id = ".quantity_"+product_id;
    var price = $(".price_"+product_id).val();
    $qtde = $(".quantity_"+product_id);
    var a = $qtde.val();

    a++;
    $(".minus").attr("disabled", !a);
    $qtde.val(a);
 
    var total = (a) * price;
  
    $(".total-price_"+product_id).html(total);
      var action = 'updateCartItem';
      $.ajax({
        url: "cartAction.php",
        data: {'action' : action,'id' :product_id,'qty':a},
        type: 'POST',
        success: function (data) {
        location.reload();
      }
    });
}

function minus(row_id){
    
    var product_id = row_id; 
    $qtde = $(".quantity_"+product_id);
    var price = $(".price_"+product_id).val();
    var b = $qtde.val();
    if (b >= 1) {
      b--;
      var total = (b) * price;
   
      $(".total-price_"+product_id).html(total);
      $qtde.val(b);
      var action = 'updateCartItem';
      
      $.ajax({
        url: "cartAction.php",
        data: {'action' : action,'id' :product_id,'qty':b},
        
        type: 'POST',
        success: function (data) {
          location.reload();
        }
      });
    } 
    else {
    }
}


</script>
