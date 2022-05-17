<?php
include_once("connection.php");
include_once("header.php");

if($_GET['product_id']!='')
{
$product_id = $_GET['product_id'];

  $query1="select * from product where id='$product_id'";
                $sql=mysql_query($query1);
    $query2=mysql_fetch_array($sql);
    
     $product_img=($query2['product_img']!='')?$query2['product_img']:"";
      $price=($query2['price']!='')?$query2['price']:"";
      $cat_id=($query2['cat_id']!='')?$query2['cat_id']:"";
    $product_nm=($query2['product_nm']!='')?$query2['product_nm']:"";
    
    $cat_det="select * from product_category where id='$cat_id'";
                $sql1=mysql_query($cat_det);
    $cat=mysql_fetch_array($sql1);
    $cat_name=($cat['cat_name']!='')?$cat['cat_name']:"";
    
    
    if($cat_name=='couple')
    {
        $class='';
        $class1='0';
    }
    else if($cat_name=='famille')
    {
        $class='purplebg';
           $class1='1';
    }
    else if($cat_name=='animaux')
    {
         $class='goldbg';
            $class1='2';
    }
    else if($cat_name=='bébé')
    {
         $class='pinkbg';
            $class1='3';
    }
    else if($cat_name=='cheval')
    {
         $class='goldbg';
            $class1='4';
    }
    else if($cat_name=='models')
    {
         $class='greenbg';
            $class1='5';
    }
}

?>
<style>
.grey-box {
    background-color: #fafafa;
    border: 1px solid #d9d8ea;
    padding: 60px 40px;
    border-radius: 4px;
}

.plan-heading {
    font-size: 20px;
    font-family: 'proximanova-semibold';
    margin: 0;
}
.choosing-plan {
    padding: 50px 0;
}
.span_1_of_5 {
    width: 51.72%;
}
</style>

<?php
                  $setting="select * from front_setting order by setting_id desc limit 1";
  
                $sql_setting=mysql_query($setting);
    $querry=mysql_fetch_array($sql_setting);

    
    $uploadd= "admin/upload";
   $baby_banner_img=($querry['baby_banner_img']!='')?$querry['baby_banner_img']:"";
    
     $email=($querry['email']!='')?$querry['email']:"";
     $phone_no=($querry['phone_no']!='')?$querry['phone_no']:"";
                ?>
 <div class="animal_banner">
        <img src="<?php echo $uploadd .'/'.$baby_banner_img?>" alt="..." class="img-responsive" width="100%">
      </div>

    </section>
<section class="choosing-plan">
  <div class="container">
    <div class="row">
        <div class="col-md-2 col-xs-2"></div>
      <div class="col-md-9 col-sm-9">
        <div class="grey-box">
          <h4 class="plan-heading">1.Your Order</h4>
          
         
          <div class="space20"></div>
          <div class="row">
            <div class="col-md-6">
             
            </div>
            <div class="col-md-6">
            <div class="col span_1_of_5">
              <div class="book_case">
                  <?php
                   if(!empty($product_img))
                   {
                  ?>
                                <img src="<?php echo $uploadd .'/'.$product_img?>" alt="..." class="img-responsive center-block">
                                <?php
                   }
                   ?>
                
               
              </div>
            </div>
            </div>
          </div>
          <hr class="horizontal-line">
          <div class="row row-flex">
            <div class="col-md-7 col-sm-7">
              <h4 class="plan-heading">2. Tell us about yourself</h4>
            </div>
            <div class="space10 visible-xs"></div>
           
          </div>
          <div class="space50 hidden-sm hidden-xs"></div>
          <div class="space20 visible-sm visible-xs"></div>
          
          <?php
          $url='https://www.sandbox.paypal.com/cgi-bin/webscr';
          
          $business='dhrup.prakashsuthar-facilitator@gmail.com';
          
          ?>
                    <form class="data-form" id="payment_form" action="#" method="post">
            <div class="form-group">
                <input type="hidden" name="business" id="business" value="<?php echo $business?>">
                <input type="hidden" name="cmd"   id="cmd" value="_xclick">
                <input type="hidden" name="item_name" id="item_name"  value="<?php echo $product_nm?> ">
                <input type="hidden" name="item_number"   id="item_number" value="<?php echo $product_id?>">
                
                <input type="hidden" name="amount" id="amount" value="<?php echo $price?>">
                <input type="hidden" name="rm" id="rm" value="2">
               <input type="hidden" name="no_shipping" id="no_shipping" value="1">
                <input type="hidden" name="currency_code"  id="currency_code" value="EUR">
                <input type="hidden" name="cancel_return" id="cancel_return"  value="http://imdhrup.com/php/dhdec2017_039/cancel.php">
                <input type="hidden" name="redirect_url" id="redirect_url" value="<?php echo $url?>"
                <input type="hidden" name="return" id="return"  value="http://imdhrup.com/php/dhdec2017_039/success.php">  
 
              <div class="row">
                <div class="col-md-6">
                  <label class="form-label">First Name</label>
                  <input type="text" class="form-control txt-box" name="first_nm" placeholder="Your Name">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Last Name</label>
                  <input type="text" class="form-control txt-box" name="last_nm"  placeholder="Last Name">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label class="form-label">Email</label>
                  <input type="text" class="form-control txt-box" name="email"  placeholder="your email">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Contact Telephone</label>
                  <input type="text" class="form-control txt-box" name="phone"  placeholder="Your number">
                </div>
              </div>
            </div>
            
            <div class="form-group">
              <div class="row">
                <div class="col-md-12">
                  <label class="form-label">Address</label>
                 <textarea class="form-control" name="address" placeholder="Enter address" col="4" rows="3"></textarea>
                </div>
              
              </div>
            </div>

             <div class="form-group">
           
                 
               <div class="row"> 
               <div class="col-md-6">
                   <input type="radio" id="paypal_rd" name="payment_option" value="paypal">
               <img src="img/paypal.png" class="img-responsive" style="width: 250px;"></div>
               
               
               
               <div class="col-md-6">
                   <input type="radio"  id="hipay_rd" checked="true" name="payment_option" value="hipay">
               <img src="img/hipay_logo_be.png" class="img-responsive" ></div>
               </div>
            
                </div>
              
          <button class="btn btn-learn btn-block btn-success" id="paypal_btn" type="button" name="pay_form">Proceed with Paypal</button>
           
             <button class="btn btn-learn btn-block btn-success" id="hipay_btn" type="submit" name="pay_form">Proceed with Hipay</button>
          </form>
         
     
        </div>
      </div>
    
    </div>
  </div>
</section>

<?php

include_once("footer.php");
?>

<script>
    $( document ).ready(function() {
   $('#paypal_btn').hide();
  
                    $('#paypal_rd').click(function () {
                       $('#paypal_btn').show();
                       $('#hipay_btn').hide();
                });
                $('#hipay_rd').click(function () {
                      $('#hipay_btn').show();
                      $('#paypal_btn').hide();
                 });
    });
    
    $('#paypal_btn').click(function () {
        
        var business=$('#business').val();
         var cmd=$('#cmd').val();
           var item_name=$('#item_name').val();
             var item_number=$('#item_number').val();
               var amount=$('#amount').val();
                     var currency_code=$('#currency_code').val();
                      var cancel_return=$('#cancel_return').val();
                       var return_url=$('#return').val();
                       
                         $.ajax({
        url: "https://www.sandbox.paypal.com/cgi-bin/webscr",
        data: {'business' : business,'cmd':cmd,'item_name':item_name,'item_number' :item_number,'amount':amount,'currency_code':currency_code,'return_url':return_url,'cancel_return':cancel_return},
        
        type: 'POST',
        crossDomain : true,
        success: function (data) {
      
         document.form['payment_form'].submit();
         

          
    }
    });
            
                 });
                 $('#hipay_btn').click(function () {
                     
                     $.ajax({
        url: "hipay_payment,php",
        data: {'item_name':item_name,'item_number' :item_number,'amount':amount,'currency_code':currency_code},
        
        type: 'POST',
        success: function (data) {
      
        
         console.log(data);

          
    }
    });
                 });
               

</script>