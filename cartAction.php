<?php
// initialize shopping cart class
include 'cart.php';
$cart = new Cart;

// include database configuration file
include_once("connection.php");


    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        
    $productID = $_REQUEST['id'];
        // get product details
    $product="select * from products where id='$productID'";
    $query1=mysqli_query($conn,$product);
    while($row=mysqli_fetch_assoc($query1))
    {
        $itemData = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            //'pro_img' =>$row['product_img'],
            'qty' => 1
        );
        
       // print_r($itemData);
    
        $insertItem = $cart->insert($itemData);
    }
    //exit;
    $redirectLoc = $insertItem?'viewCart.php':'index.php';
    ?>
    <script>
        window.location.href="<?php echo $redirectLoc; ?>";
    </script>
       
    <?php 
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
       
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        
        $updateItem = $cart->update($itemData);
        
        
    }
    elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: viewCart.php");
    }else{
        header("Location: index.php");
    }
