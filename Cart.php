<?php 
  session_start();
  include("DBConnection.php");
  if(!empty($_SESSION['user'])){
      $table_name = $_SESSION['user'];
  }

  if(isset($_POST['action']) && $_POST['action']=="change"){
      $quantity =(int)$_POST['quantity'];
      $code = $_POST['code'];

      $update_data = "UPDATE `$table_name` SET product_quantity=$quantity WHERE product_code='$code'";
      if($con->query($update_data)){
          header("Refresh:0");
      }
      else{
          echo "Error: ".$con->error;
      }
  }

  if(isset($_POST['remove'])){
      $delete_code = $_POST['delete_code'];

      $delet = "DELETE FROM `$table_name` WHERE product_code='$delete_code'";
      if($con->query($delet)){
          header("Refresh:0");
      }
      else{
          echo "Error: ".$con->error;
      }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Document</title>
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>
    
    <a href="home.php">&larr; Back</a>
    <h2 style=" text-align: center">Care First</h2>
    <div class="cart">
       
        <table>
            <thead>
                <tr>
                    <td></td>
                    <td>Product Name</td>
                    <td>Quantity</td>
                    <td>Price</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
    <?php 
      if(!empty($_SESSION['user'])){
          $total_price = 0;
          $table_name = $_SESSION['user'];
          $query = "SELECT * FROM `$table_name`";
          
          if($value=$con->query($query)){
          while($row=mysqli_fetch_array($value)){ 
    ?>
     
         <tr>
             <td><img src=<?php echo $row['product_image'] ?> alt=""></td>
             <td><?php echo $row['product_name'];?><br>
                 <form action="Cart.php" method="POST">
                     <input type="hidden" name="delete_code" value="<?php echo htmlspecialchars($row['product_code']);?>" >
                     <input type="submit" value="Remove" name="remove" class="delete">
                 </form>
             </td>
             <td>
             <form action="Cart.php" method="POST">
                 <input type="hidden" name="code" value="<?php echo htmlspecialchars($row['product_code']);?>">
                 <input type="hidden" name="action" value="change">
                 <select name="quantity" class="quantity" onchange="this.form.submit()">
                     <option value="1" <?php if($row["product_quantity"]==1) echo "selected";?>>1</option>
                     <option value="2" <?php if($row["product_quantity"]==2) echo "selected";?>>2</option>
                     <option value="3" <?php if($row["product_quantity"]==3) echo "selected";?>>3</option>
                     <option value="4" <?php if($row["product_quantity"]==4) echo "selected";?>>4</option>
                     <option value="5" <?php if($row["product_quantity"]==5) echo "selected";?>>5</option>
                 </select>
             </form>
             </td>
             <td><?php echo "₹ ".$row['product_price']; ?></td>
             <td><?php echo "₹ ".$row['product_price']*$row['product_quantity']; ?></td>
         </tr>
          <?php 
            $total_price += ($row['product_price']*$row['product_quantity']);
          }
          ?>
          <tr>
              <td colspan="5" class="total">
                  <strong>TOTAL: <?php echo "₹ ".$total_price; ?></strong>
              </td>
          </tr>
     </tbody>
    <?php 
          }
    }
    ?>
    </table>

    </div>
    
</body>
</html>