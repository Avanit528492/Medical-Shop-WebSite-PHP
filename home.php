

<?php 
  include("DBConnection.php");
   include("header.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<style>
	  .false{
         padding-top: 120px;
         height: 100%;
         width: 100%;
         background-color: #0F2D49;
	     text-align:center;
		 padding-bottom:275px;
        }
     .false p{
		 color: #fff;
		 font-size: 30px;
         letter-spacing: 1px;
		 padding-top: 120px;
		 height: 100%;
		 width: 100%;
		 background-color: #0F2D49;
     }
	</style>
    <title>Document</title>
    <link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php
	   if(!empty($_SESSION["user"]))
	   { 
	?>
	
	<div class="slideshow-container">
		<div class="mySlides ">
 
			<img src="./image/sildeshow1.jpg" >
			
		   
		  </div>
		  
		  <div class="mySlides ">
			
			<img src="./image/slideshow2.jpg" >
		
			
		  </div>
		  
		  <div class="mySlides ">
			
			<img src="./image/slideshow4.jpg" >
		
		  </div>
		
	</div>
    





	<script>
		var slideIndex = 0;
		showSlides();
		
		function showSlides() {
		  var i;
		  var slides = document.getElementsByClassName("mySlides");
		  for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";  
		  }
		  slideIndex++;
		  if (slideIndex > slides.length) {slideIndex = 1}    
		  slides[slideIndex-1].style.display = "block";  
		  setTimeout(showSlides, 2000); // Change image every 2 seconds
		}
		</script>

		<div class="shop-by-category">
			<h2>Shop By Category</h2>
			<a href="baby_needs.php" style="text-decoration: none">
			<div class="babyneeds">
				<img src="./image/babyneeds.jpg" alt="Avatar" class="image">
				<div class="text">Baby Needs</div>
			  </div>
			</a>
			<a href="personal_care.php" style="text-decoration: none">
			  <div class="personalcare">
				<img src="./image/personalcare.jpg" alt="Avatar" class="image">
				<div class="text">Product</div>
			  </div>
	         </a>
			 <a href="nutrition.php" style="text-decoration: none">
			  <div class="nutrition">
				<img src="./image/health.jpg" alt="Avatar" class="image">
				<div class="text"> Nutrition</div>
			  </div>
	         </a>
			  <a href="health_needs.php" style="text-decoration: none">
			  <div class="health-needs">
				<img src="./image/otchelth.jpg" alt="Avatar" class="image">
				<div class="text"> Health Needs</div>
			  </div>
	          </a>
			  <a href="vitamins.php" style="text-decoration: none">
			  <div class="vitamins">
				<img src="./image/vitamins.jpg" alt="Avatar" class="image">
				<div class="text"> Vitamins</div>
			  </div>
	         </a>
			  <a href="diabetic_needs.php" style="text-decoration: none">
			  <div class="diabetic-needs">
				<img src="./image/diabetic.jpg" alt="Avatar" class="image">
				<div class="text">Diabetic</div>
			  </div>
	        </a>
		</div>

		<div class="Popular-Brands">
			<h2>Popular Brands</h2>
			<div class="containerbarands">
				<div class="p1">
					<a href="#">
						<img src="./image/vicks.jpg" alt="">
					</a>
				</div>
				<div class="p2">
					<a href="#">
						<img src="./image/oralb.png" alt="">
					</a>
				</div>
				<div class="p3">
					<a href="#">
						<img src="./image/sensodyne.png" alt="">
					</a>
				</div>
				<div class="p4">
					<a href="#">
						<img src="./image/horlicks.png" alt="">
					</a>
				</div>
				<div class="p5">
					<a href="#">
						<img src="./image/lifeboy.png" alt="">
					</a>
				</div>
				<div class="p6">
					<a href="#">
						<img src="./image/dabur.jpg" alt="">
					</a>
				</div>
			</div>

		</div>
		<div class="imageadvertisement">
			<img src="./image/oximeteradvertisement.jpg" >
		</div>


		<div class="product_container">
	      <h2>Covid Essentials</h2>
		<?php 
		  $covidData = "SELECT * FROM covid_essentials";
		  $result = mysqli_query($con,$covidData);
		  while($row = mysqli_fetch_assoc($result)){
	     ?>

              <div class="product_wrapper">
			       <form method="POST" action='home.php'>
				   <input type='hidden' name='name' value="<?php echo htmlspecialchars($row['product_name']); ?>"/>
				   <input type='hidden' name='price' value="<?php echo htmlspecialchars($row["product_price"]); ?>" />
				   <input type='hidden' name='quntity' value="<?php echo htmlspecialchars($row["product_quantity"]); ?>" />
			       <input type='hidden' name='code' value="<?php echo htmlspecialchars($row["product_id"]); ?>" />
				   <input type='hidden' name='pimage' value="<?php echo htmlspecialchars( $row["product_image"]); ?>" />
				   <input type='hidden' name='category' value="covid_essentials" />
			       <div class="imageclass"><img src=<?php echo $row["product_image"]; ?> /></div>
			       <div class="name"><?php echo $row["product_name"]; ?></div>
		   	       <div class="price"><?php echo "Rs. ".$row["product_price"]; ?></div>
			       <input type='submit' class = "buyButton" value='Buy Now' name="buynow">
			       </form>
		   	    </div>
		 <?php
		  }
		?>
      </div>

	  <div class="advertisement">
		<div class="add">
			<img src="./image/advertisement.jpg" >
		  </div>
		  <div class="add">
			<img src="./image/advertisement2.jpg" >
		  </div>
		  <div class="add">			
			<img src="./image/advertisement3.jpg" >
		  </div>
		  <div class="add">			
			<img src="./image/advertisement4.jpg" >
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
			  addslideIndex = 1;
		  }    
		  addslides[addslideIndex].style.display = "block";  
		  setTimeout(addshowSlides, 3000); // Change image every 2 seconds
		}
		</script>

   <div class="product_container">
	      <h2>Top Offers</h2>
		<?php 
		  $topofferData = "SELECT * FROM top_offers";
		  $result = mysqli_query($con,$topofferData);
		  while($row = mysqli_fetch_assoc($result)){  
	     ?>

              <div class="product_wrapper">
			       <form method="POST" action='home.php'>
				   <input type='hidden' name='name' value="<?php echo htmlspecialchars($row['product_name']); ?>"/>
				   <input type='hidden' name='price' value="<?php echo htmlspecialchars($row["product_price"]); ?>" />
				   <input type='hidden' name='quntity' value="<?php echo htmlspecialchars($row["product_quantity"]); ?>" />
			       <input type='hidden' name='code' value="<?php echo htmlspecialchars($row["product_id"]); ?>" />
				   <input type='hidden' name='pimage' value="<?php echo htmlspecialchars( $row["product_image"]); ?>" />
				   <input type='hidden' name='category' value="top_offers" />
			       <div class="imageclass"><img src=<?php echo $row["product_image"];?> /></div>
			       <div class="name"><?php echo $row["product_name"]; ?></div>
		   	       <div class="price"><?php echo "Rs. ".$row["product_price"]; ?></div>
			       <input type='submit' class = "buyButton" value='Buy Now' name = "buynow">
			       </form>
		   	    </div>
		 <?php
		  }
		  mysqli_close($con);
		?>
      </div>
	  
	  
	  <div class="footer">
	  <p>copyright@avanitdiyora(18se02it006)</p>
	  </div>
	  
	  <?php 
	   }
	   else{
		   echo "<div class='false'>
		    <p>Login Required</p>
		   </div>";
	   }
	  ?>

    
</body>
</html>