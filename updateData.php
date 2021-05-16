
<?php 
  
   session_start();
   include("DBConnection.php");

   $code = $_SESSION['product_code'];

   $getData = "SELECT * FROM product WHERE product_code = '$code'";
   $result = mysqli_query($con,$getData);
   $row = mysqli_fetch_assoc($result);

   $name = $row['product_name'];

   $price = $row['product_price'];
   $category = $row['product_category'];
   $image = $row['product_image'];

   $product_nameerror  = $product_priceerror = $product_categoryerror = $product_imageerror = "";

   if(isset($_POST['add_product'])){
    
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    if(isset($_POST['Category'])){
        $category = $_POST['Category'];
    }
    $image = $_FILES['image']['name'];

    if(!empty($name)  && !empty($price) && !empty($category) && !empty($image))
    {
        $table_name = "product";
        $price = (int)$price;

        //check image
        $target_dir = "DatabaseImages/$category/";
        $imagefile_name = $code.".jpg";
        $target_file = $target_dir . basename($code.".jpg");
        $check = getimagesize($_FILES['image']['tmp_name']);

        $update_data = "UPDATE product SET product_name='$name',product_price='$price',product_category='$category',product_image='$imagefile_name' WHERE product_code='$code'";

        if($check!== false){
                
            if($con->query($update_data) === TRUE){
                if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file)){ 
                    echo "Update Successful";
                }
            }
            else{
                echo "Error".$con->error;
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
    <title>Update Data</title>
    <link rel="stylesheet" href="css/updateData.css">
</head>
<body>    

   
<div class="container">
          <form action="" method="POST" enctype="multipart/form-data">
               <h1>Update PRODUCT</h1>
               <input type="text" name="product_name" placeholder="Enter Product Name" value='<?php echo $name?>'>
               <p class="error"><?php echo $product_nameerror;?></p>
               <input type="number" name="product_price" placeholder="Enter Product Price(in Rs)" value='<?php echo $price;?>'>
               <p class="error"><?php echo $product_priceerror;?></p>
               <select name="Category" value='<?php echo $category;?>'>
                   <option value="" disabled selected><?php echo $category;?></option>
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
               <input type="submit" value="Update Product" class = "button" name="add_product">
               <a href="Admin.php"><p>&larr; &nbsp; Backk</p></a>
          </form>
      </div>

</body>
</html>