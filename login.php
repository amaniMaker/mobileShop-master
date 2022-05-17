<?php

include_once("connection.php");
include_once("header.php");


/********************************************** Login Code ********************/
if(isset($_REQUEST['btn_login'])){
	$login_username = mysqli_real_escape_string($connection,$_POST['login_username']);
	$login_password = mysqli_real_escape_string($connection,$_POST['login_password']);

	$get_data = "SELECT * FROM `users` WHERE `username`='$login_username' AND `password`='$login_password'";
	$res_data = @mysqli_query($connection,$get_data);
	$count_data = @mysqli_num_rows($res_data);
	if($count_data > 0){
		$fh_data = @mysqli_fetch_array($res_data);
		$email = $fh_data['email'];
		$_SESSION['username'] = $login_username;
		$_SESSION['email'] = $email;

		header("location: index.php");
	}
	else{ 

		$msg = '<span style="color:red; font-size:16px;margin-left: 14px;">Incorrect Username And Password!Please Try Again.</span>';

	?>
		<!-- <script type="text/javascript">
			alert("Incorrect Username And Password");
			window.location.href = "login.php";
		</script> -->
	<?php }
}
/********************************************** Login Code ********************/
?>

<section>
<div class="container">
    <div id="loginpage" class="row">
	       <div class="col-md-3">
	       </div>
		   <div class="col-md-6">
			<form method="POST" name="frm_login" onsubmit="return login_validate();">
				<ul class="right-form">
					<h3>Sign In</h3>
					<div>
						<li><input type="text" placeholder="Username" name="login_username" id="login_username"></li>
						<li> <input type="password" placeholder="Password" name="login_password" id="login_password"></li>
						
						<input type="submit" name="btn_login" value="Login">

						
					</div>

					<div class="clear"> </div>
				</ul>
				<div>
					<?php
	          			if(!empty($msg)){ echo $msg;}
		        	?>
			    </div>
				<div class="clear"> </div>
			</form>
			<div class="col-md-5"><h4><a href="Forgot.php">Forgot Password?</a></h4></div>
			<div class="col-md-2"></div>
			<div class="col-md-5"><h4><a href="register.php">Sign Up</a></h4></div>
		  </div>
		  <div class="col-md-3">
	      </div>
	      
		  
	</div>
	
</div>
</section>

<div class="row space50"></div>

<script type="text/javascript">
	
	function login_validate(){
		var flag = true;

		var login_username = $("#login_username");
		if( login_username.val() == '' || login_username.val() == null){
			login_username.addClass('errorClass');
			login_username.attr('placeholder','Please Enter Username');
			flag = false;
		}
		else{	
			login_username.removeClass('errorClass');
			login_username.attr('placeholder','Username');
		}

		var login_password = $("#login_password");
		if( login_password.val() == '' || login_password.val() == null){
			login_password.addClass('errorClass');
			login_password.attr('placeholder','Please Enter Password');
			flag = false;
		}
		else{	
			login_password.removeClass('errorClass');
			login_password.attr('placeholder','Password');
		}

		return falg;
	}
</script>

<?php
include_once("footer.php");
?>