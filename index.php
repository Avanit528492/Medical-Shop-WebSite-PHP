
<?php

  session_start();
  include("DBConnection.php");
  $emailError = "";
  $passwordError = "";
  $loginError = "";
  

  if(isset($_POST['signin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password)){

       $getData = "SELECT * FROM user_account WHERE Useremail= '".$email."'AND Userpassword='".$password."'";
       $result = mysqli_query($con,$getData);
       $num_of_row = mysqli_num_rows($result);

       if($num_of_row!=0){
        while($row=mysqli_fetch_assoc($result)){
            $db_user_email = $row['Useremail'];
            $db_user_password = $row['Userpassword'];
        }
        if($email == $db_user_email && $password == $db_user_password){
            $loginError = "";
            $_SESSION["user"] = $email;
            header("Location: home.php");
        }
       }else{
           $loginError = "* Invaild Email and Password";
       }

    }
    else{
        if(empty($email)){
            $emailError = "* Email required";
        }
        if(empty($password)){
            $passwordError = "* Passaword required";
        }
    }
  }

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <title>Care First</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<h2>Welcome</h2>
<div class="container" id="container">
	
	<div class="form-container sign-in-container">
		<form action="index.php" method="POST">
			<h1>Sign in</h1>
			<p>or use your account</p>
			<input type="email" name="email" placeholder="Email" />
            
            <p class="emailError"><?php echo $emailError;?></p>
             
			<input type="password" name="password" placeholder="Password" />

            <p class="passwordError"><?php echo $passwordError;?></p>

			
			 <input type="submit" value="Sign In" class="signInbutton" name = "signin">

             <p class="massagerror"><?php echo $loginError;?></p>

		</form>
        
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<a href="signup.php"><button class="ghost" id="signUp">Sign Up</button></a>
			</div>
		</div>
	</div>
</div>






</body>
</html>