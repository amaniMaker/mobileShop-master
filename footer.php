 <!-- START FOOTER SECTION -->
<?php
if(isset($_REQUEST['contact_form']))
{
    $email=isset($_REQUEST['email'])?$_REQUEST['email']:'';
    $message=isset($_REQUEST['message'])?$_REQUEST['message']:'';
  
    
$to2='niralikanani04@gmail.com';

$subject2 = 'Contact Mail from Emobile';

$messages2 = '
   <html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
  <title>Contact from Emobile</title>
  </head>
  <body>
 <div style="">
<table width="503" style="background-color:#89cbe3;border: 1px dashed #00adef;font-size: 21px;    border-radius: 1px;">
<tbody>
<tr style="background:#89cbe3;color:#ffffff;border-bottom:5px solid #00adef;word-break:break-word;border-collapse:collapse!important;vertical-align:top;padding:0;padding-top:10px;text-align:center;margin-bottom:0px" valign="top">
  
</tr>
<tr style="color: white;">

<td align="right" colspan="2">CONTACT DETAIL FROM EMOBILE </td>
</tr>
</tbody>
</table>
<table width="503" style="background-color: white;    border: 1px dashed;    font-size: 21px;    border-radius: 1px;">
<tbody> 
    <tr>
      <td><b>Email :</b></td>
      <td>'. $email.'</td>
    </tr>
 <tr>
      <td><b>Message:</b></td>
      <td>'.$message.'</td>
    </tr> 
   
  
    
     
   
     
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
}

?>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div class="logo_foot">
              <a class="navbar-brand" href="index.php">MobileShop</a>

              <div class="border_grey"></div>

              <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Photointhebox was created by Amani Hassen . </font><font style="vertical-align: inherit;">The company has been producing photo reports for nearly 7 years all over Belgium. </font><font style="vertical-align: inherit;">Mara production offers photo reports to talent companies and individuals. </font><font style="vertical-align: inherit;">She collaborates with talented photographers to offer quality work.  </font></font></p>
            </div>
          </div>

        
          <div class="col-md-3 col-md-offset-1">
            <div class="logo_menu">
              <h4> Contact </h4>
                <div class="border_grey"></div>
                <h6 class="media-heading"> Telephone: </h6> <p> +216 29 092 399   </p>

                <h6 class="media-heading"> Email: </h6> <p>mobileshop@gmail.com   </p>
            </div>
          </div>

          <div class="col-md-2 col-md-offset-1">
            <div class="logo_menu">
              <h4> Social Share </h4>
                <div class="border_grey"></div>
                <h6 class="media-heading"> <a href=""> Facebook</a></h6>
                <h6 class="media-heading"> <a href=""> Twitter</a></h6>
                <h6 class="media-heading"> <a href=""> Instagram</a></h6>
            </div>
          </div>


        </div>
      </div>
    </footer>

  <!-- END FOOTER SECTION -->



  <!-- START COPYRIGHT SECTION -->

    <section id="copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copy_links">
              <ul>
                <!-- <li> <a href="#"> <?php echo $lang['footer_sub_menu_1']?> </a> </li>
                <li> <a href="#"><?php echo $lang['footer_sub_menu_2']?> </a> </li>
                <li> <a href="#"> <?php echo $lang['footer_sub_menu_3']?> </a> </li>
                <li> <a href="#"> Crédits </a> </li> -->
                <li> <a href="#"> @Copyright 2019 | Emobile. </a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

  <!-- END COPYRIGHT SECTION -->




<!-- javascript libraries -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>


  <script>
    $(function() {
      $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
      $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top -20
      }, 1500, 'easeInOutExpo');
        event.preventDefault();
      });
    });
  </script>
 
<script type="text/javascript">
	$('.carousel').carousel({
	  interval: 3000,
	  pause: false
	})
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#owl-demo").owlCarousel({
       autoPlay: 3000, //Set AutoPlay to 3 seconds
       items : 3,   
       itemsCustom : [
     [0, 1],
     [320, 2],
     [480, 2],
     [768, 4],
     [1200, 4],
     [1400, 4],
     [1600, 4],
     [1920, 4]
    ],
     navigation : false, // Show next and prev buttons
     slideSpeed : 300,
     paginationSpeed : 400,

       navigationText: [
       "<img src='img/left.png'>",
       "<img src='img/right.png'>"
       ], 
       pagination:false,
     });
  });
</script>

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
                                //form validation rules
                                $("#contact_form").validate({
                                    rules: {
                                         
                                              email: {
                                                  required : true
                                                  
                                                        },
                                              message:{
                                                required:true
                                              }
                                              
                                     
                                        
                                          
                                           
                                         
                                      },
 

                                            messages: {

                                               
                                         

                                          email: 
                                          {

                                          required : "Please enter email"
                                         
                                          },
                                          message:{
                                            required : "Please enter message"
                                          },
                                      

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
</body>
</html>