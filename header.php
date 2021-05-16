<?php 
  session_start();
  include("DBConnection.php");

  

  if(isset($_SESSION['user'])){
    $table_name = $_SESSION['user'];
  }

  if(isset($_POST["logout"]) && $_POST["logout"]=="logout"){
      header("Location: index.php");
      session_destroy();
      session_unset();
  } 

  if(isset($_POST["buynow"])){
    if(!empty($_SESSION["user"])){
        $table_name = $_SESSION['user'];
        $name = $_POST['name'];
        $code = $_POST['code'];
        $quantity = $_POST['quntity'];
        $image = $_POST['pimage'];
        $price = $_POST['price'];
        $category = $_POST['category'];


        $insert_data = "INSERT INTO `$table_name` (product_code,product_name,product_category,product_price,product_quantity,product_image) VALUES ('$code','$name','$category','$price','$quantity','$image')";

      if(!mysqli_query($con,"SELECT 1 FROM `$table_name`")){
            $create_table = "CREATE TABLE `$table_name` (           
              id INT(6) AUTO_INCREMENT PRIMARY KEY,
              product_code VARCHAR(30) NOT NULL UNIQUE,
              product_name VARCHAR(50) NOT NULL,
              product_category VARCHAR(30) Not NULL,
              product_price INT(10) NOT NULL,
              product_quantity INT(10) NOT NULL,
              product_image VARCHAR(500) NOT NULL
          )";

        if(mysqli_query($con,$create_table)){
          if($con->query($insert_data) === TRUE){
              header("Refresh:0");
          }
          
        } 
         

      }
      else{
      
          $check_code = "SELECT * FROM `$table_name` WHERE product_code = '".$code."'";
          $check_code_result = mysqli_query($con,$check_code);
          $num_row_of_code = mysqli_num_rows($check_code_result);
          
          if($num_row_of_code == 0){
              if($con->query($insert_data) === TRUE){
                  header("Refresh:0");
              }
          }
          else{
            echo '<script>alert("This Product Already Buy, Please check your cart")</script>';
            header("Refresh:0");
          }
          
      }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .logoutIcon{
            float: right;
            margin-right: 5%;
            margin-top: 2%;
        }
        .logoutIcon form input{
            width: 50px;
            height: 50px;
        }
        
    </style>
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
     <div class="header" >
		<a href="home.php">
        <div class="logo" >
			<img src="./image/storelogo.PNG">
		</div>
        </a>
     
		<div class="logoutIcon">
            <form action="header.php" method="POST">
            <input type="hidden" name="logout" value="logout">
            <input type="image" src="image/logout.png" alt="">
            <input type="hidden">
            </form>
		</div>
        <?php 
        if(isset($_SESSION['user'])){
            $getData = "SELECT * FROM `$table_name`";
            $dataResult = mysqli_query($con,$getData);
            if($dataResult){
            $numCount = mysqli_num_rows($dataResult);
           

             if($numCount!=0){
        ?>
		<div class="cart" >
			<a href="Cart.php"><img src="./image/cart.png"><span><?php echo $numCount; ?></span></a>
		</div>
        <?php }}}?>
		<div class="title">
			<strong><p>Care First</p></strong>
		</div>
		<p class="title1">Medical Store</p>
    </div>
</body>
</html>