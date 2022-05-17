<?php

include_once("connection.php");
include_once("header.php");

if(!empty($_SESSION['username'])){
	 $login_username= $_SESSION['username'];
	 $get_data= "select * from users where username='$login_username'";
	 $res_data = @mysqli_query($conn,$get_data);
	 $count_data = @mysqli_num_rows($res_data);
	 if($count_data > 0){
			$fh_data = @mysqli_fetch_array($res_data);
			$id= $fh_data['users_id'];
	 		$email= $fh_data['email'];
	 		$username= $fh_data['username'];
	 		$phone = $fh_data['phone'];
			$address = $fh_data['address'];
	 	}
}

if(isset($_REQUEST['submit'])){
	print_r($_POST);
	$users_id=mysqli_real_escape_string($connection,$_POST['id']);
	$name = mysqli_real_escape_string($connection,$_POST['name']);
	$email = mysqli_real_escape_string($connection,$_POST['email']);
	$phone = mysqli_real_escape_string($connection,$_POST['phone']);
	$address = mysqli_real_escape_string($connection,$_POST['address']);

	$update_query = "UPDATE `users` set `username`='$name',`email`='$email',`phone`= '$phone',`address`='$address' where users_id='$users_id'";

	$res_query = @mysqli_query($connection,$update_query);

	if($res_query){ ?>
		<script type="text/javascript">
			alert("Profile has been updated successfully!");
			window.location.href = "profile.php";
		</script>
	<?php }
	else{ 


		?>
		<script type="text/javascript">
			alert("Error");
			window.location.href = "login.php";
		</script>
	<?php }

}

?>

<section>
<div class="container">
    <div id="profilepage" class="row">
	      <div class="col-md-12">
			<form method="POST" id="">
				<input type="hidden" name="id" value="<?php echo $id;?>" id="id">
				<ul class="left-form">
					<h2>Profile</h2>
					<br/>

					<li>
						<input type="text" placeholder="Name" name="name" id="name" value="<?php echo $username;?>">
						<a href="#" class="icon ticker"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="email" placeholder="Email" name="email" id="email" value="<?php echo $email;?>">
						<a href="#" class="icon ticker"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="text" placeholder="Phone" name="phone" id="phone" value="<?php echo $phone;?>">
						<a href="#" class="icon into"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="text" placeholder="Address" name="address" id="address" value="<?php echo $address;?>">
						<a href="#" class="icon into"> </a>
						<div class="clear"> </div>
					</li> 
					
					<input type="submit" value="Submit" name="submit">
					<div class="clear"> </div>
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