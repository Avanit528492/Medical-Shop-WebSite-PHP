
<?php 
  include("DBConnection.php");
  $product_nameerror = $product_codeerror = $product_priceerror = $product_categoryerror = $product_imageerror = "";
  
  if(isset($_POST['add_product'])){
    
    $name = $_POST['product_name'];
    $code = $_POST['product_code'];
    $price = $_POST['product_price'];
    if(isset($_POST['Category'])){
        $category = $_POST['Category'];
    }
    $image = $_FILES['image']['name'];

    if(!empty($name) && !empty($code) && !empty($price) && !empty($category) && !empty($image))
    {
        $table_name = "product";
        $qunitity = 1;
        $price = (int)$price;

        //check image
        $target_dir = "DatabaseImages/$category/";
        $imagefile_name = $code.".jpg";
        $target_file = $target_dir . basename($code.".jpg");
        $check = getimagesize($_FILES['image']['tmp_name']);

        if($check!== false){
            $insert_data = "INSERT INTO $table_name (product_code,product_name,product_category,product_price,product_quntity,product_image) VALUES ('$code','$name','$category','$price','$qunitity','$imagefile_name')";

                if(!mysqli_query($con,"SELECT 1 FROM $table_name")){
                    $create_table = "CREATE TABLE $table_name (           
                        id INT(6) AUTO_INCREMENT PRIMARY KEY,
                        product_code VARCHAR(30) NOT NULL UNIQUE,
                        product_name VARCHAR(30) NOT NULL,
                        product_category VARCHAR(50) Not NULL,
                        product_price INT(10) NOT NULL,
                        product_quntity INT(10) NOT NULL,
                        product_image VARCHAR(200) NOT NULL
                    )";
                    if(mysqli_query($con,$create_table)){
                        if($con->query($insert_data) === TRUE){
                            if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file)){ 
                                echo "Insert Successful";
                            }
                        }
                        else{
                            echo "Error".$con->error;
                        }
                    }             
        
                }
                else{
                    $check_code = "SELECT * FROM $table_name WHERE product_code = '".$code."'";
                    $check_code_result = mysqli_query($con,$check_code);
                    $num_row_of_code = mysqli_num_rows($check_code_result);
                    if($num_row_of_code == 0){

                        if($con->query($insert_data) === TRUE){
                            if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file)){ 
                                header("Location: Admin.php");
                            }
                        }
                        else{
                            echo "Error".$con->error;
                        }

                    }else{
                        $product_codeerror = "Already This Id Registered";
                    }
                }
            
        }
        else{
            $product_imageerror = " * Please Choose Image";
        }
        
    }
    else{
        if(empty($name)){
            $product_nameerror = "* Name Required";
        }
        if(empty($code)){
            $product_codeerror = "* Code Required";
        }
        if(empty($price)){
            $product_priceerror = "* Price Required";
        }
        if(empty($category)){
            $product_categoryerror = "* Category Required";
        }
        if(empty($image)){
            $product_imageerror = "* Image Required";
        }
    }

    

  }

?>






<!DOCTYPE html>
<html>
<head>
    <title>Add Data</title>
    <link rel="stylesheet" href="css/addData.css">
</head>
<body>    

   
<div class="container">
          <form action="Adminadddata.php" method="POST" enctype="multipart/form-data">
               <h1>ADD PRODUCT</h1>
               <input type="text" name="product_name" placeholder="Enter Product Name">
               <p class="error"><?php echo $product_nameerror;?></p>
               <input type="text" name="product_code" placeholder="Enter Product Code">
               <p class="error"><?php echo $product_codeerror;?></p>
               <input type="number" name="product_price" placeholder="Enter Product Price(in Rs)">
               <p class="error"><?php echo $product_priceerror;?></p>
        
               <select name="Category" >
                   <option value="" disabled selected>Choose a Category</option>
                   <option value="baby_needs">Baby Needs</option>
                   <option value="personal_care">Personal Care</option>
                   <option value="nutrition">Nutrition</option>
                   <option value="health_needs">Health Needs</option>
                   <option value="vitamins">Vitamins</option>
                   <option value="diabetic">Diabetic</option>
               </select>
               <p class="error"><?php echo $product_categoryerror;?></p>
               <input type="file" name="image">
               <p class="error"><?php echo $product_imageerror;?></p>
               <input type="submit" value="Add Product" class = "button" name="add_product">
               <a href="Admin.php"><p>&larr; &nbsp; Back</p></a>
          </form>
          
      </div>

</body>
</html>