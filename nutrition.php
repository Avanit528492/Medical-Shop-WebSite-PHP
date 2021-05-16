
<?php
  include("header.php"); 
  include("DBConnection.php");
?>

<!DOCTYPE html>
<html>
<head>
<style>
    .Add{
    padding-top: 110px;
    border-radius: 30px;
    margin-right: 2.1%;
    margin-left: 2%;
}

.Add .add img{
    border-radius: 30px;
      height: 300px;
      width: 100%;
}
.footer{
    text-align: center;
  }
</style>
    <link rel="stylesheet" href="./css/style.css" media="all">
</head>
<body>
<div class="Add">
		<div class="add">
			<img src="./image/nutrition_advertisement_1.jpg"  >
		  </div>
		  <div class="add">
			<img src="./image/nutrition_advertisement_2.jpg" >
		  </div>
		  <div class="add">			
			<img src="./image/advertisement5.jpg" >
		  </div>
		
		
	</div>

	<script>
		var addslideIndex = 0;
		addshowSlides();
		
		function addshowSlides() {
		  var addi;
		  var addslides = document.getElementsByClassName("add");
		  for (addi = 0; addi < addslides.length; addi++) {
			addslides[addi].style.display = "none";  
		  }
		  addslideIndex++;
		  if (addslideIndex >= addslides.length) {
			  addslideIndex = 0;
		  }    
		  addslides[addslideIndex].style.display = "block";  
		  setTimeout(addshowSlides, 3000); // Change image every 2 seconds
		}
		</script>

        <div class="product_container">
	      <h2>Nutrition</h2>
		<?php 
		  $covidData = "SELECT * FROM product WHERE product_category='nutrition'";
		  $result = mysqli_query($con,$covidData);
		  while($row = mysqli_fetch_assoc($result)){
	     ?>

              <div class="product_wrapper">
			       <form method="POST" action='nutrition.php'>
			       <input type='hidden' name='name' value="<?php echo htmlspecialchars($row['product_name']); ?>"/>
				   <input type='hidden' name='price' value="<?php echo htmlspecialchars($row["product_price"]); ?>" />
				   <input type='hidden' name='quntity' value="<?php echo htmlspecialchars($row["product_quntity"]); ?>" />
			       <input type='hidden' name='code' value="<?php echo htmlspecialchars($row["product_code"]); ?>" />
				   <input type='hidden' name='pimage' value=<?php echo htmlspecialchars("DatabaseImages/".$row['product_category']."/".$row['product_image']); ?> />
				   <input type='hidden' name='category' value="<?php echo htmlspecialchars( $row["product_category"]); ?>" />
			       <input type='hidden' name='code' value=<?php echo $row["product_code"]; ?> />
			       <div class="imageclass"><img src=<?php echo "DatabaseImages/".$row['product_category']."/".$row['product_image'];?> /></div>
			       <div class="name"><?php echo $row["product_name"]; ?></div>
		   	       <div class="price"><?php echo "Rs. ".$row["product_price"]; ?></div>
			       <input type='submit' class = "buyButton" value='Buy Now' name="buynow">
			       </form>
		   	    </div>
		 <?php
		  }
		?>
      </div>
      <div class="footer">
	  <p>copyright@avanitdiyora(18se02it006)</p>
	  </div>
    
</body>
</html>