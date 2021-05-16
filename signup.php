
<?php 
  session_start();
  include("DBConnection.php");
  $nameError = $emailError = $passwordError = $signupError = "";


  if(isset($_POST['signup'])){
      $name = $_POST['username'];
      $email = $_POST['useremail'];
      $pasword = $_POST['userpassword'];

      if(!empty($name) && !empty($email) && !empty($pasword)){

    

            $checkEmail = "SELECT * FROM user_account WHERE Useremail= '".$email."'";
            $checkresult = mysqli_query($con,$checkEmail);
            $num_of_row = mysqli_num_rows($checkresult);

            if($num_of_row == 0){

               $dataStore = "INSERT INTO user_account (Username,Useremail,Userpassword) VALUES ('$name','$email','$pasword')";

               if($con->query($dataStore) === TRUE){
                  header("Location: home.php");
                  $_SESSION['user'] = $email;
               }
            }
            else{
                $signupError = "* Already This Email is Registered";
            }

            

       

      }
      else{
          if(empty($name)){
              $nameError = "* Name required";
          }
          if(empty($email)){
              $emailError ="* Email required";
          }
          if(empty($pasword)){
              $passwordError = "* Password required";
          }
      }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/signup.css">
    <title>Document</title>
</head>
<body>

<div class="container">	
<div class="form-container">
		<form action="signup.php" method="POST">
			<h1>Create Account</h1>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" name="username"/>

            <p class="nameError"><?php echo $nameError;?></p>

			<input type="email" placeholder="Email" name = "useremail"/>

            <p class="emailError"><?php echo $emailError;?></p>

			<input type="password" placeholder="Password" name="userpassword"/>

            <p class="passwordError"><?php echo $passwordError;?></p>

			<input type="submit" value="SignUp" class="button" name="signup">
            <a href="index.php">Already have an Account? <span>Login<span></a>

            <p class="massagerror"><?php echo $signupError;?></p>
		</form>
	</div>
    <div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<img src="image/storelogo.PNG" alt="">
                <p>Please Wear Mask and Maintain Social Distancing</p>
			</div>
		</div>
	</div>
</div>


</body>
</html>