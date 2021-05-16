<?php
session_start();
include("DBConnection.php");
$result = mysqli_query($con,"SELECT * FROM product");
if(isset($_POST['update'])){ 
  if(isset($_POST['code'])){
    $_SESSION['product_code'] = $_POST["code"];
    header("Location: updateData.php");
   }
}


if(isset($_POST['delete'])){
  $code = "";
  if(isset($_POST['code'])){
    $code = $_POST['code'];
  }
  if(isset($_POST['image'])){
    $category = $_POST['category'];
    $location = "DatabaseImages/".$category."/".$_POST['image'];
    $status = unlink($location);
    if($status){
      $delete = "DELETE FROM product WHERE product_code='$code'";

      if($con->query($delete)){
        header("Location: Admin.php");
      }
      else{
        echo "Error: ".$con->error;
      }

    }
    else{
      echo "File Not delete";
    }
  }
}

?>
<!DOCTYPE html>
<html>
 <head>
 <title>Admin</title>
 <link rel="stylesheet" href="css/admin.css">
 </head>
<body>

<div class="header">
<h2>Welcome Care First</h2>
<div class="button">
    <a href="Adminadddata.php"><p>ADD DATA<p></a>
</div>
</div>

<?php
if (mysqli_num_rows($result) > 0) {
?>
<div class="Table">
  <table>
    <thead>
  <tr>
    <td>ID</td>
    <td>Product Id</td>
    <td>Product Category</td>
    <td>Product Name</td>
    <td>Product Price</td>
    <td>Product Image</td>
    <td></td>
  </tr>
  </thead>
  <tbody>
<?php
$i=1;
while($row = mysqli_fetch_array($result)) {
?>

<tr>
    <form action="Admin.php" method="POST">
    <td><?php echo $i;?></td>
    <td><?php echo $row["product_code"]; ?></td>
    <td><?php echo $row["product_category"]; ?></td>
    <td><?php echo $row["product_name"]; ?></td>
    <td><?php echo $row["product_price"]; ?></td>
    <td><img src=<?php echo "DatabaseImages/".$row['product_category']."/".$row['product_image'];?> alt=""></td>
    <input type="hidden" name="code" value=<?php echo $row['product_code']; ?>>
    <input type="hidden" name="image" value=<?php echo $row['product_image'];?>>
    <input type="hidden" name="category" value=<?php echo $row['product_category'];?>>
    <td>
    <input type="submit" value="Delete" class ="delete" name="delete"><br>
    <input type="submit" value="Update" class="update" name="update">
    </td>
    </form>
    
</tr>

<?php
$i++;
}
?>
</tbody>
</table>
</div>
 <?php
}
else{
    ?>

    <div class="result">
    <h3>Result Not Found</h3>
    </div>

<?php }
?>





 </body>
</html>