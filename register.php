<?php

include_once("connection.php");
include_once("header.php");

/********************************************** Ragistration Code ********************/
if(isset($_REQUEST['register_submit'])){
	$username = mysqli_real_escape_string($connection,$_POST['username']);
	$email = mysqli_real_escape_string($connection,$_POST['email']);
	$password = mysqli_real_escape_string($connection,$_POST['password']);

	$insert_query = "INSERT INTO `users`(`username`, `email`, `password`) VALUES ('$username','$email','$password')";
	$res_query = @mysqli_query($connection,$insert_query);

	//echo $insert_query;

	if($res_query){ 

		$msg2 = '<span style="color:green; font-size:16px; text-align: center;">Your registration has been completed successfully!</span>';
	 }
	else{ 
		
		$msg2 = '<span style="color:red; font-size:16px;margin-left: 14px;">Please Try Again.</span>';
	}

}
/********************************************** Ragistration Code ********************/
?>

<section>
<div class="container">
    <div id="loginpage" class="row">
	      <div class="col-md-12">
			<form method="POST" onsubmit="return register_validate()">
				<ul class="left-form">
					<h2>Sign Up</h2>
					<br/>
					<li>
						<input type="text" placeholder="Username" name="username" id="username" >
						<a href="#" class="icon ticker"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="email" placeholder="Email" name="email" id="email">
						<a href="#" class="icon ticker"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="password" placeholder="Password" name="password" id="password">
						<a href="#" class="icon into"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="password" placeholder="Repeat Password" name="repeat_password" id="repeat_password">
						<a href="#" class="icon into"> </a>
						<div class="clear"> </div>
					</li>
					<input type="submit" value="Create Account" name="register_submit">
					
					<div class="clear"> </div>
					<br/>
					<br/>	
						<?php
		          			if(!empty($msg2)){ echo $msg2;}
			        	?>
				</ul>
			</form>
		   </div>
		 
	</div>
</div>
</section>

<div class="row space50"></div>

<script type="text/javascript">
	function register_validate(){
		var flag = true;

		var username = $("#username");
		if( username.val() == '' || username.val() == null){
			username.addClass('errorClass');
			username.attr('placeholder','Please Fill Up Username')
			flag = false;			
		}
		else{
			username.removeClass('errorClass');
			username.attr('placeholder','Username')
		}

		var email = $("#email");
		if( email.val() == '' || email.val() == null){
			email.addClass('errorClass');
			email.attr('placeholder','Please Fill Up Email id')
			flag = false;
		}
		else{	
			email.removeClass('errorClass');
			email.attr('placeholder','Email')
		}

		var password1 = $("#password");
        var password2 = $("#repeat_password");
        if(password1.val()!='' || password2.val()!=''){
          if(password1.val()==null || password1.val()==''){
            password1.addClass('errorClass');
            password1.attr('placeholder','Please Fill Up Password');
            flag=false;
          }else{
            password1.removeClass("errorClass");
            password1.attr('placeholder','Password');
          }

          if(password2.val()==null || password2.val()==''){
            password2.addClass('errorClass');
            password2.attr('placeholder','Please Fill Up Password');
            flag=false;
          }else{
            password2.removeClass("errorClass");
            password2.attr('placeholder','Repeat Password');
          }

          /** we will compare two password */
          if(password2.val()!==password1.val()){
            flag=false;
            alert("Password Don't Match");
          }
          /** we will compare two password */
        }
        else{
          password1.addClass("errorClass");
            password1.attr('placeholder','please Fill Up Password');
          return false;
        }

		return flag;
	}

</script>

<?php
include_once("footer.php");
?>