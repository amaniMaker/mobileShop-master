<?php
include_once("connection.php");
include_once("header.php");
include 'cart.php';
$cart = new Cart;
?>

<?php
if(isset($_REQUEST['checkout_place_order_hipay']))
{
 //$wsdl = 'https://ws.hipay.com/soap/subscription?wsdl'; //for live
  $wsdl = 'https://test-ws.hipay.com/soap/subscription?wsdl';//for testing
  $item_name=($_POST['item_name_1']!='')?$_POST['item_name_1']:"";
  $item_number=($_POST['item_number_1']!='')?$_POST['item_number_1']:"";
  $amount=($_POST['amount_1']!='')?$_POST['amount_1']:"";
  $item_name2=($_POST['item_name_2']!='')?$_POST['item_name_2']:"";
  $item_number2=($_POST['item_number_2']!='')?$_POST['item_number_2']:"";
  $amount2=($_POST['amount_2']!='')?$_POST['amount_2']:"";
 $item_name3=($_POST['item_name_3']!='')?$_POST['item_name_3']:"";
  $item_number3=($_POST['item_number_3']!='')?$_POST['item_number_3']:"";
  $amount3=($_POST['amount_3']!='')?$_POST['amount_3']:"";
 $order_total=($_POST['order_total']!='')?$_POST['order_total']:"";

 $billing_email=($_POST['billing_email']!='')?$_POST['billing_email']:"";
 
  $options = array(
'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP,
'cache_wsdl' => WSDL_CACHE_NONE,
'soap_version' => SOAP_1_1,
'encoding' => 'UTF-8'
);
// STEP 2 : Soap client initialization 
$client = new SoapClient('https://ws.hipay.com/soap/payment-v2?wsdl', $options);

// STEP 3 : Soap call on confirm method of manual-capture webservice
$result = $client->generate(array('parameters'=>array(
'wsLogin' => '150cee31116c37361da395a3a976925f',
'wsPassword' => '8152088343228a5c0f62f3109ce5aa68',
'websiteId' => '405119',
'categoryId' => $item_number,
'description' => $item_name,
'currency' => 'EUR',
'amount' => $order_total,
'rating' => 'ALL',
'locale' => 'fr_BE',
'customerIpAddress' =>  $_SERVER["REMOTE_ADDR"],
'manualCapture' => '0',
'executionDate' => date('Y-m-d'), 
'customerEmail' => $billing_email,
'urlCallback' => 'http://imdhrup.com/php/dhdec2017_039/cancel.php',
'urlAccept' => 'http://imdhrup.com/php/dhdec2017_039/success.php'
)));
;
//var_dump($result);
foreach($result as $res)
{
    
    
    $redirectUrl=$res->redirectUrl;
    if(!empty($redirectUrl))
    {
       
        ?>
        <script>window.location.href="<?php echo $redirectUrl?>";</script>
        <?php
    }
}

// STEP 4 : Response

 //
 //echo $_POST['redirectUrl'];
}

// if(isset($_REQUEST['checkout_place_order']))
// {
//     $billing_first_nm=($_POST['billing_first_nm']!='')?$_POST['billing_first_nm']:"";
//     $billing_last_nm=($_POST['billing_last_nm']!='')?$_POST['billing_last_nm']:"";
//     $billing_company=($_POST['billing_company']!='')?$_POST['billing_company']:"";
//     $billing_email=($_POST['billing_email']!='')?$_POST['billing_email']:"";
//     $billing_phone=($_POST['billing_phone']!='')?$_POST['billing_phone']:"";
//     $billing_address=($_POST['billing_address']!='')?$_POST['billing_address']:"";
//     $billing_postal=($_POST['billing_postal']!='')?$_POST['billing_postal']:"";
//     $billing_ville=($_POST['billing_ville']!='')?$_POST['billing_ville']:"";
//     $shipping_first_nm=($_POST['shipping_first_nm']!='')?$_POST['shipping_first_nm']:"";
//     $shipping_last_nm=($_POST['shipping_last_nm']!='')?$_POST['shipping_last_nm']:"";
//     $shipping_company=($_POST['shipping_company']!='')?$_POST['shipping_company']:"";
//     $shipping_address=($_POST['shipping_address']!='')?$_POST['shipping_address']:"";
//     $shipping_postal=($_POST['shipping_postal']!='')?$_POST['shipping_postal']:"";
//     $shipping_ville=($_POST['shipping_ville']!='')?$_POST['shipping_ville']:"";
//     $shipping_notes=($_POST['shipping_notes']!='')?$_POST['shipping_notes']:"";

//      $insert ="insert into order_details(billing_first_nm,billing_last_nm,billing_company,email_id,billing_phone,billing_address,
//       billing_postal,billing_ville  ,shipping_first_nm,shipping_last_nm,shipping_company,shipping_address,shipping_postal,shipping_ville,shipping_notes
//       ) values ('$billing_first_nm','$billing_last_nm','$billing_company','$billing_email','$billing_phone','$billing_address','$billing_postal'
//       ,'$billing_ville','$shipping_first_nm','$shipping_last_nm','$shipping_company','$shipping_address','$shipping_postal','$shipping_ville','$shipping_notes')";
      
//       print_r($insert);
//  if (mysql_query($insert) or die(mysql_error()))
//   {
      
//     
   
  

//   }
  
// }
?>
<style>
    table.shop_table thead th {
    border: medium none;
    color: #ffffff;
    font-weight: normal;
    line-height: 18px;
    padding: 20px;
    text-transform: none;
    background: #252525;
    font-family: 'Montserrat';
    font-size: 10px;
    letter-spacing: 2px;
    text-transform: uppercase;
}
 .shop_table tfoot th {
    border: 1px solid #ddd;
    text-align: center;
}
.shop_table tfoot td {
    border: 1px solid #ddd;
    text-align: center;
}
ul.payment_methods.methods {
    border: 1px solid rgba(0,0,0,0.08);
    list-style: outside none none;
    margin: 0;
    padding: 20px;
    text-align: left;
}
.form-row.place-order {
    display: inline-block;
    padding: 35px 0 0;
    width: 100%;
}
.checkbox {
    position: relative;
    display: initial !important;
    }
    .paypal_img {
    width: 230px;
}
li.payment_method_hipay {
    display: inline-block;
    float: left;
}
input#payment_method_paypal {
    margin-left: 91px;
}
    @media(max-width:767px)
    {
        .hipay_img{
            width:230px;
        }
        .paypal_img {
    width: 230px;
}
         input#place_order {
    margin-bottom: 10px;
}
input#payment_method_paypal {
    margin-left: 0px;
}
    }

</style>

<link rel="stylesheet" type="text/css" href="css/style2.css">
<section id="details">
  <div class="container">
    <?php
      
      $setting="select * from paypal_setting order by id desc limit 1";
      $sql_setting=mysqli_query($conn,$setting);
      $querry=mysqli_fetch_assoc($sql_setting);
      $business=($querry['business_email']!='')?$querry['business_email']:"";
      $url=($querry['paypal_url']!='')?$querry['paypal_url']:"";
      //$url='https://www.sandbox.paypal.com/cgi-bin/webscr';
      // $business='dhrup.prakashsuthar-facilitator@gmail.com';
    ?>
           
        <form class="details_form"  id="paypal_form" method="post" action="<?php echo $url?>">
            
          <input type="hidden" name="business" id="business" value="<?php echo $business?>">
          <input type="hidden" name="cmd" id="cmd" value="_cart">
            <?php
              //select items for table
              $cartItems = $cart->contents();
              if($cartItems > 0) {
              $cnt=1;
          
              foreach($cartItems as $item){
            ?> 
          <input type="hidden" name="item_name_<?php echo $cnt ?>" value="<?php echo  $item['name']; ?>">
          <input type="hidden" name="item_number_<?php echo $cnt ?>" id="item_number" value="<?php echo $item['id']?>">
          <input type="hidden" name="quantity_<?php echo $cnt ?>" value="<?php echo $item['qty']; ?>">
          <input type="hidden" name="amount_<?php echo $cnt ?>" value="<?php echo $item['price']; ?>">
             
            <?php
                  $cnt++;
                }
              }
            ?>
          <input type="hidden" name="upload" value="1" />
          <input type="hidden" name="rm" id="rm" value="2">
          <input type="hidden" name="currency_code"  id="currency_code" value="EUR">
          <input type="hidden" name="cancel_return" id="cancel_return"  value="http://localhost/emobile/cancel.php">
          <input type="hidden" name="return" id="return"  value="http://localhost/emobile/success.php">  

          <div class="row">
            <div class="col--6 col-sm-6 col-xs-12">
              <h4 class="detail_txt">PERSONAL INFORMATION</h4>
              <div class="row">
                <div class="col-md-6">
                     <div class="form-group">
                        <label for="first_nm">First Name*</label>
                        <input type="text" class="form-control" id="first_nm" name="billing_first_nm" placeholder="">
                      </div>
                </div>
                <div class="col-md-6">
                     <div class="form-group">
                        <label for="nom">Last Name*</label>
                        <input type="text" class="form-control"  name="billing_last_nm" id="nom" placeholder="">
                      </div>
                </div>
              </div>
             
              <div class="form-group">
                <label for="company">Company Name</label>
                <input type="text" class="form-control" name="billing_company" id="company" placeholder="">
              </div>
              <div class="row">
                  <div class="col-md-6">
                       <div class="form-group">
                          <label for="email">E-mail adress*</label>
                          <input type="email" class="form-control" name="billing_email" id="email" placeholder="">
                        </div>
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                          <label for="telephone">Phone*</label>
                          <input type="text" class="form-control"   name="billing_phone"  id="telephone" placeholder="">
                        </div>
                  </div>
              </div>
              <div class="form-group">
              <label for="country">Country</label>
                <input type="text" class="form-control"  name="billing_country"  id="billing_country" placeholder="">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="billing_address" placeholder="Adresse">
              </div>
              <div class="form-group">
               <input type="text" class="form-control" id="sub_address" name="billing_confirm_address" placeholder="Appartment,bureau,etc.(optional)">  
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="postal">Postal code</label>
                    <input type="text" class="form-control" name="billing_postal" id="postal" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>City</label>
                        <input type="text" class="form-control"  name="billing_ville" id="ville" placeholder="">
                    </div>
                </div>
              </div> 
              
            </div>    
            <div class="col-6 col-sm-6 col-xs-12">
              <h4 class="detail_txt">SHIP TO A DIFFERENT ADDRESS?</h4> 
                <div class="checkbox checkbox-primary">
                    <label>
                        <input id="checkbox2"  name="diff_address"  class="diff_address" value="yes"  type="checkbox" checked="">
                    </label>
                </div>
                <div class="shipping_det">
                  <div class="row">
                      <div class="col-md-6">
                           <div class="form-group">
                              <label for="prenom_2">First Name</label>
                              <input type="text" name="shipping_first_nm" class="form-control" id="prenom_2" placeholder="">
                            </div>
                      </div>
                      <div class="col-md-6">
                           <div class="form-group">
                              <label for="nom_2">Last Name</label>
                              <input type="text" class="form-control" id="nom_2" name="shipping_last_nm" placeholder="">
                            </div>
                      </div>
                  </div> 
                  <div class="form-group">
                    <label for="company_shipping">Company Name</label>
                    <input type="text" class="form-control" id="company_shipping" name="shipping_company"  placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="shipping_company">Country</label>
                      <input type="text" class="form-control"  name="shipping_country"  id="shipping_country" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="address1">Address</label>
                    <input type="text" class="form-control" id="address1"  name="shipping_address" placeholder="Adresse">
                  </div>
                  <div class="form-group">
                   <input type="text" class="form-control" id="confirm_address"  name="shipping_confirm_address" placeholder="Appartment,bureau,etc.(optionnel)">  
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="shipping_postal">Postal code</label>
                        <input type="postal_code" class="form-control" id="shipping_postal"  name="shipping_postal" placeholder="">
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="shipping_ville">City</label>
                          <input type="text" class="form-control" id="shipping_ville" name="shipping_ville" placeholder="">
                        </div>
                    </div>
                  </div> 
                </div>
                <div class="form-group">
                    <label for="comment">Comments</label>
                    <textarea class="form-control" name="shipping_notes" rows="3" placeholder="Commentaires concernant votre commande,ex:consignes de livraison."></textarea>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
               <h4 class="detail_txt">YOUR ORDER</h4>
              <table class="shop_table table table-responsive">
                <thead>
                  <tr>
                    <th class="product-name">PRODUCT</th>
                    <th class="product-total">TOTAL</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if($cart->total_items() > 0){
                    //get cart items from session
                      $cartItems = $cart->contents();
                      foreach($cartItems as $item){
                        $id=$item['id'];
                        $product="select * from products where id='$id'";
                        $query1=mysqli_query($conn,$product);
                        while($val1=mysqli_fetch_assoc($query1))
                        {
                          $name = $val1['name'];
                  ?>
                  <tr class="cart_item">
                    <td class="product-name">
                      <?php echo $name; ?>&nbsp;               <strong class="product-quantity">× <?php echo $item['qty']; ?></strong>
                    </td>
                    <td class="product-total"> <?php echo $item['subtotal']; ?>$</td>
                  </tr>
                  
                  <?php
                        }
                      }
                    }
                  ?>
                </tbody>
                <tfoot>
                  <tr class="cart-subtotal">
                    <th><?php echo $lang['order_total']?></th>
                    <td>
                      <span class="Price-amount amount"><?php echo $cart->total(); ?><span class="Price-currencySymbol">$</span></span>
                    </td>
                  </tr>
                  <tr class="order-total">
                    <th><?php echo $lang['final_total']?></th>
                    <td><strong><span class="Price-amount amount"><?php echo $cart->total(); ?><span class="Price-currencySymbol">$</span></span></strong> </td>
                  </tr>
                </tfoot>
              </table>

              <div id="payment" class="checkout-payment">
                <ul class="payment_methods methods">
                  <li class="payment_method_paypal">
                    <input id="paypal_rd" type="radio" class="input-radio" name="payment_method" value="paypal" checked="checked" >
                    <label for="payment_method_paypal"> Paypal <img src="img/paypal.png"  class="img-responsive paypal_img" alt="Paypal"> </label>
                    <div class="payment_box payment_method_hipay"></div>
                  </li>
                </ul>
                <div class="form-row place-order">
                  <p class="form-row terms wc-terms-and-conditions">
                    <input type="checkbox" class="input-checkbox" name="terms" id="terms">
                    <label for="terms" class="checkbox"><a href="#" target="_blank">Terms & Conditions</a> <span class="required">*</span></label>
                    <input type="hidden" name="terms-field" value="1">
                  </p>
                
                  <input type="submit" class="btn_pour btn" name="checkout_place_order" id="place_order" value="Commander">
                </div>
              </div>
               
           </div>
          </div>
        </form>  
   
</section>
<div class="space50"></div>
<?php

include_once("footer.php");
?>

<!-- javascript libraries -->

<script type="text/javascript">
    $('.plus-minus-btn').click(function(e){
      var $button = $(this);
      var oldValue = $button.closest('.counter-widget').find('input').val();
                      
      if ($button.text() == "+") {
          var newVal = parseFloat(oldValue) + 1;
      } else {
          // Don't allow decrementing below zero
          if (oldValue > 0) {
              var newVal = parseFloat(oldValue) - 1;
          } else {
              newVal = 0;
          }
      }
                      
      $button.closest('.counter-widget').find('input').val(newVal);
    
      e.preventDefault();
  });

    // $( document ).ready(function() {
    //     $('#paypal_form').hide();
    // });
    // $('#paypal_rd').click(function () {
       
    //        $('#paypal_form').show();
    //        $('#hipay_form').hide();
    // });
    // $('.hipay_rd').click(function () {
        
    //       $('#hipay_form').show();
    //       $('#paypal_form').hide();
    //  });
    $(".shipping_det").show();
    $(".diff_address").click(function() {
      if($(this).is(":checked")) {
          $(".shipping_det").show();
      } else {
          $(".shipping_det").hide();
      }
    });


</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.0/jquery.validate.min.js"></script>
 <style>
.error
{
  color:red;
}
</style>
       
 <script>
     
    (function ($, W, D)
      {
        var JQUERY4U = {};
        JQUERY4U.UTIL =
          {
            setupFormValidation: function ()
            {
              $("#paypal_form").validate({
                rules: {
                    billing_first_nm: {
                       required : true
                    },
                    billing_last_nm:{
                      required:true
                    },
                    billing_email:{
                      required:true
                    },
                    billing_phone:{
                      required:true
                    }
                },
                messages: {
                    billing_first_nm:{
                      required : "Please enter first name"
                    },
                    billing_last_nm:{
                      required : "Please enter last name"
                    },
                    billing_email:{
                      required:"Please enter email"
                    },
                    billing_phone:{
                      required:"Please enter phone number"
                    }
                },
                  
                submitHandler: function (form) {
                    form.submit();
                }
              });
            }
          }

        //when the dom has loaded setup form validation rules
        $(D).ready(function ($) {
            JQUERY4U.UTIL.setupFormValidation();
        });
      })(jQuery, window, document);
</script>