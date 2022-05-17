<?php

include_once("connection.php");
include_once("header.php");

if(isset($_POST['btn_submit']))
{	

    $email=isset($_POST['email'])?$_POST['email']:'';
   
    $sql = 'SELECT * FROM users where email ="'.$email.'" ';
   
    $result = mysqli_query($conn, $sql);
   

   	if (mysqli_num_rows($result) > 0) {
	 while($row = mysqli_fetch_assoc($result)) 
      {
      	$password = $row['password'];
      	//echo $password;
      }
      $to2=$email;

	  $subject2 = 'Forgot Mail From MOBILESHOP';

	 $messages2 = '
	  <html>
        <body style="margin:0px; font-family:Helvetica; font-size:16px;">
            <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="background-color:#F5F5F5;margin:0px;">
                      <tr>
                <td align="center" valign="top">
                  <table border="0" cellpadding="20" cellspacing="0" width="600" id="emailContainer">
                  <tr>
	                  <td align="center" valign="top">
	                      <table border="0" cellpadding="20" cellspacing="0" width="100%" id="emailHeader">
	                          <tr>
	                             
	                          </tr>
	                      </table>
	                  </td>
	              </tr>
                  </table>
                  <table border="0" cellpadding="20" cellspacing="0" width="600" id="emailContainer" style="background:#FFF">
                  <tr>
                    <td style="background:#8080805e">
                       <center><a class="navbar-brand" href="index.php">MobileShop</a></center>
                    </td>
                  </tr>
                  <tr>
                    <td align="center" valign="top">
                       <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailBody">
                         <tr>
	                         <td>
	                         <table border="0" cellpadding="0" cellspacing="0" width="100%">   <tr> <td valign="top" class="textContent" style="text-align:center;font-size:16px;color:#6B688F;line-height: 125%;padding-bottom: 20px;" > Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>'.$password.'</b> </td> </tr>
	                          </table>
	                         </td>
                         </tr>               
                  </table>
                  </td>
              </tr>
              <tr style="background-color:#393939;">
                  <td align="center" valign="top">
                      <table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr> <td valign="top" class="textContent" style="font-size:12px;text-align:center;color:#FFFFFF;"> 
                      Copyright 2018 | <a style="color:#fff;" href="index.php" target="_blank">MobileShop</a>.</td> </tr> </table>
                  </td>
              </tr>
          </table>
      </td>
      </tr>
	  </table>
	  </body>
	  </html>';
	$headers3 = "MIME-Version: 1.0" . "\r\n";
	$headers3 .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers3 .= 'From:niralikanani04@gmail.com' . "\r\n";
	if(mail($to2,$subject2,$messages2,$headers3))
		{
		$msg2 = '<span style="color:#32CD32; font-size:16px;margin-left: 14px;">Please check your email account.</span>';
		  // send mail end ======================================================
		}


	}else{
	
		$msg2 = '<span style="color:red; font-size:16px;margin-left: 14px;">Email ID is not found in Database!Please Try Again.</span>';
	}
    
}
?>

<section>
<div class="container">
    <div id="forgotpage" class="row">
	      <div class="col-md-3">
	      </div>
	      	<div class="col-md-6">
			<form method="POST" name="frm_forgot" onsubmit="return forgot_validate();">
				<ul class="right-form">
					<h3>Forgot Password</h3>
					<div>
						<li><input type="email" placeholder="Register Email" name="email" id="email"></li>
						<input type="submit" value="Submit" name="btn_submit">
					</div>
					<div class="clear"> </div>
					
					<?php
	          			if(!empty($msg2))
			              {
			                  echo $msg2;
			              }
			        ?>
				</ul>
				<div class="clear"> </div>
				<h4><a href="login.php" style="top: 20px; position: relative;">Login</a></h4>
			</form>
		  </div>
		  <div class="col-md-3">
	      </div>
	</div>
</div>
</section>

<div class="row space50"></div>

<script type="text/javascript">
	function forgot_validate() {
		var flag = true;

		var email = $("#email");
		if( email.val() == '' || email.val() == null){
			email.addClass('errorClass');
			email.attr('placeholder','Please Enter Your Register Email');
			flag = false;
		}
		else{	
			email.removeClass('errorClass');
			email.attr('placeholder','Email');
		}

		return flag;
	}
</script>
<?php
include_once("footer.php");
?>