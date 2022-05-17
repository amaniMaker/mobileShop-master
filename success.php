<?php
include_once("connection.php");
include_once("header.php");
include 'cart.php';
$cart = new Cart;
?>
<style>

.choosing-plan {
    padding: 200px 0;
}
</style>
<?php



if(!empty($_REQUEST))
{
    
 
$itemTransaction   = $_REQUEST['txn_id']; // Paypal transaction ID

 $first_name =$_REQUEST['first_name'];
 $last_name =$_REQUEST['last_name'];

$payer_email = $_REQUEST['payer_email']; 
$billing_address=$_REQUEST['address_street'];
$billing_ville=$_REQUEST['address_city'];
$billing_state=$_REQUEST['address_state'];
$billing_postal=$_REQUEST['address_zip'];
$product_total=$_REQUEST['mc_gross'];
$product_nm1=$_REQUEST['item_name1'];
$product_qty_1=$_REQUEST['quantity1'];
$product_price_1=$_REQUEST['mc_gross_1'];
$product_nm2=$_REQUEST['item_name2'];
$product_qty_2=$_REQUEST['quantity2'];
$product_price_2=$_REQUEST['mc_gross_2'];
$product_nm3=($_REQUEST['item_name3']!='')?$_REQUEST['item_name3']:"";
$product_qty_3=($_REQUEST['quantity3']!='')?$_REQUEST['quantity3']:"";
$product_price_3=($_REQUEST['mc_gross_3']!='')?$_REQUEST['mc_gross_3']:"";
$payment_status = $_REQUEST['payment_status'];
$payment_date= date('Y-m-d');
$mc_currency= $_REQUEST['mc_currency']; 
$insert ="insert into order_details(billing_first_nm,billing_last_nm,email_id,billing_address,billing_postal,billing_ville,product_nm1,product_price_1,product_qty_1,product_nm_2, product_qty_2,product_price_2,pro_nm_3,pro_qty_3,product_price_3,trans_no,payment_status,product_total,currency,payment_date)values
('$first_name','$last_name','$payer_email','$billing_address','$billing_postal','$billing_ville','$product_nm1','$product_qty_1','$product_price_1','$product_nm2','$product_qty_2','$product_price_2','$product_nm3','$product_qty_3','$product_price_3','$itemTransaction','$payment_status','$product_total','$mc_currency','$payment_date')";
  
  if (mysql_query($insert) or die(mysql_error()))
  {
      
    
$to2='niralikanani04@gmail.com';


$subject2 = 'Order Details From Mobileshop';

$messages2 = '
   <html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
  <title>Order Details From Mobileshop</title>
  </head>
  <body>
   <div style="">
    <table width="503" style="background-color:#89cbe3;border: 1px dashed #00adef;font-size: 21px;    border-radius: 1px;">
      <tbody>
        <tr style="background:#89cbe3;color:#ffffff;border-bottom:5px solid #00adef;word-break:break-word;border-collapse:collapse!important;vertical-align:top;padding:0;padding-top:10px;text-align:center;margin-bottom:0px" valign="top">
        </tr>
        <tr style="color: white;">
          <td align="right" colspan="2">Order Details From Mobileshop </td>
        </tr>
      </tbody>
    </table>
    <table width="503" style="background-color: white;    border: 1px dashed;    font-size: 21px;    border-radius: 1px;">
    <tbody> 
      <tr>
        <td><b>Billing First Name :</b></td>
        <td>'.$first_nm.'</td>
      </tr>
      <tr>
        <td><b>Billing Last Name:</b></td>
        <td>'.$last_nm.'</td>
      </tr> 
      <tr>
        <td><b>Billing Email:</b></td>
        <td>'.$payer_email.'</td>
      </tr> 
      <tr>
        <td><b>Billing Address:</b></td>
        <td>'.$billing_address.'</td>
      </tr> 
      <tr>
        <td><b>Billing ville:</b></td>
        <td>'.$billing_ville.'</td>
      </tr> 
      <tr>
        <td><b>Product List :</b></td>
        <td>'.$product_nm1.' x '.$product_qty_1.'</td>
        <td>'.$product_nm2.' x '.$product_qty_2.'</td>
        <td>'.$product_nm3.' x  '.$product_qty_3.'</td>
      </tr>
      <tr>
        <td><b>Total:</b></td>
        <td>'.$product_total.' '.$mc_currency.'</td>
      </tr> 
      <tr>
        <td><b>Payment Date:</b></td>
        <td>'.$payment_date.'</td>
      </tr> 
      <tr>
        <td><b>Payment Status:</b></td>
        <td>'.$payment_status.'</td>
      </tr> 
     </tbody>
    </table>
  </div>
  </body>
  </html>
';
$headers3 = "MIME-Version: 1.0" . "\r\n";
$headers3 .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers3 .= 'From: <'.$to2.'>' . "\r\n";



if(mail($to2,$subject2,$messages2,$headers3))
{
$msg2 = '<span style="color:#32CD32; font-size:16px;margin-left: 14px;">Thank you...Your message has been submitted to us. We will be in touch shortly.</span>';
  // send mail end ======================================================
}
if($insert){
  $cart->destroy();
}
?>
   <script>window.location = "success.php"  </script> 
  
 <?php
  }
  
}
?>
<section class="choosing-plan">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-3"></div>
      <div class="col-md-6 col-sm-6">
        <div class="alert alert-success">
          <strong>Success!</strong> You have made successfully your payment.
        </div>
      </div>
     <div class="col-md-3 col-sm-3"></div>
    </div>
  </div>
</section>

<?php
include_once("footer.php");
?>