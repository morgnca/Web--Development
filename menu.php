<?php
/* Connect to database */              /* Username*/  /* Passsword*/
$dbcon = mysqli_connect("localhost", "morganchongarke", "LtS3V56", "morganchongarke_assessment_v2");
	
if ($dbcon == NULL) {
	echo "Cound not connect to database";
	exit();
}

if(isset($_GET['menu_sel'])){
	$sort = $_GET ['menu_sel'];
}else{
	$sort = 'all';
}

/*Foods display query*/
if ($sort == 'available') {
	$menu_query = "SELECT * FROM items WHERE available = 'true' AND type = 'food' ORDER BY item_name";
	$menu_result = mysqli_query($dbcon, $menu_query);
	
} else if ($sort == 'price asc') {
	$menu_query = "SELECT * FROM items WHERE type = 'food' ORDER BY price ASC";
	$menu_result = mysqli_query($dbcon, $menu_query);

} else if ($sort == 'vege') {
	$menu_query = "SELECT * FROM items WHERE vegetarian = 'vegetarian' AND type = 'food' ORDER BY item_name";
	$menu_result = mysqli_query($dbcon, $menu_query);
	
} else if ($sort == 'vegan') {
	$menu_query = "SELECT * FROM items WHERE vegetarian = 'vegan' AND type = 'food' ORDER BY item_name";
	$menu_result = mysqli_query($dbcon, $menu_query);
	
} else if ($sort == 'dairy') {
	$menu_query = "SELECT * FROM items WHERE dairy_free = 'true' AND type = 'food' ORDER BY item_name";
	$menu_result = mysqli_query($dbcon, $menu_query);
	
}  else if ($sort == 'gluten') {
	$menu_query = "SELECT * FROM items WHERE gluten_free = 'true' AND type = 'food' ORDER BY item_name";
	$menu_result = mysqli_query($dbcon, $menu_query);
	
} else if ($sort == 'all') {
	$menu_query = "SELECT * FROM items WHERE type = 'food' ORDER BY item_name";
	$menu_result = mysqli_query($dbcon, $menu_query);
} else {
	echo "Invalid sorting query";
}

/*Drinks display query*/
if ($sort == 'available') {
	$drink_menu_query = "SELECT * FROM items WHERE available = 'true' AND type = 'drink' ORDER BY item_name";
	$drink_menu_result = mysqli_query($dbcon, $drink_menu_query);

} else if ($sort == 'price asc') {
	$drink_menu_query = "SELECT * FROM items WHERE type = 'drink' ORDER BY price";
	$drink_menu_result = mysqli_query($dbcon, $drink_menu_query);

} else if ($sort == 'vege') {
	$drink_menu_query = "SELECT * FROM items WHERE vegetarian = 'vegetarian' AND type = 'drink' ORDER BY item_name";
	$drink_menu_result = mysqli_query($dbcon, $drink_menu_query);
	
} else if ($sort == 'vegan') {
	$drink_menu_query = "SELECT * FROM items WHERE vegetarian = 'vegan' AND type = 'drink' ORDER BY item_name";
	$drink_menu_result = mysqli_query($dbcon, $drink_menu_query);
	
} else if ($sort == 'dairy') {
	$drink_menu_query = "SELECT * FROM items WHERE dairy_free = 'true' AND type = 'drink' ORDER BY item_name";
	$drink_menu_result = mysqli_query($dbcon, $drink_menu_query);
	
}  else if ($sort == 'gluten') {
	$drink_menu_query = "SELECT * FROM items WHERE gluten_free = 'true' AND type = 'drink' ORDER BY item_name";
	$drink_menu_result = mysqli_query($dbcon, $drink_menu_query);
	
} else if ($sort == 'all') {
	$drink_menu_query = "SELECT * FROM items WHERE type = 'drink' ORDER BY item_name";
	$drink_menu_result = mysqli_query($dbcon, $drink_menu_query);
} else {
	echo "Invalid sorting query";
}

?>

<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<title>Menu Viewpage</title>
		<meta name="description" content="This site gives allows the user to view the menu for Wellington East Girls College."/>
		<meta name="robots" content= "noindex, nofollow" />
		<meta name="author" content="M C-Arkell 2022" />
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assessment.css">
	</head>

		<body>
			<header>
				<div id="header_content">
					<img id="header_image" src="images/wegc_logo.png" alt="The logo for Wellington East Girls' College">
					<br>
					<div id="header_text">
						<h1>Wellington East Girl's College</h1>
						<h1>Cafe Website</h1>
					</div>
				</div>
			</header>

			<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="menu.php">Menu</a></li>
					<li><a href="specials.php">Specials</a></li>
				</ul>
			</nav>
	        
		<main id = "grid_container">
			<br>
			<aside>
				<h2>Sort Menu</h2>
				<p>Sort the menu grid by dietary requirements</p>
				<!-- Dropdown  from -->
				<form name="menu_form" id="menu_form" method="get" action="menu.php">
					<!-- Dropdown menu -->
					<select name="menu_sel" id="menu_sel">
						<!-- Options -->
						<option value = "all">
							Show All
						</option>
						
						<option value = "available">
							All Available Items
						</option>
						
						<option value = "price asc">
							Lowest prices first
						</option>
						
						<option value = "dairy">
							Only Dairy-free
						</option>
						
						<option value = "gluten">
							Only Gluten-free
						</option>
						
						<option value = "vege">
							Only Vegetarian
						</option>
						
						<option value = "vegan">
							Only Vegan
						</option>
						
						
					</select>
					<input type="submit" name = "sorting_button" value="Sort the menu">
				</form>
				<h3>Search a Food or Drink</h3>
				<p>Input the name of one of the items on the menu to see its details</p>
				<p>Key for dietary requirements:</p>
				<p>Dairy-free = (df)<br>Gluten-free = (gf)<br>Vegetarian = (v)<br>Vegan = (ve)</p>
				
				<!--Form to search for an item by name-->
				<form method = "post">
					<input type = "text" name = 'search'>
					<input type = "submit" name = "submit" value = "Search">
					<br>
					<?php
						if(isset($_POST['search'])) {
							$search = $_POST['search'];

							$query1 = "SELECT * FROM items WHERE item_name LIKE '%$search%' ORDER BY item_name";
							$query = mysqli_query($dbcon, $query1);
							$count = mysqli_num_rows($query);
							
							//In case the search wasn't like any of the database items
							if($count == 0){
								echo "No search results";

							}else{
								$repeat = 0;
								echo "<br> Items Found <br><br>";
								while ($row = mysqli_fetch_array($query)) {
									if ($count < 6) {

										echo "Name: " . $row ['item_name'] . "<br>";
										echo "Price: $" . $row ['price'] . "<br>";
										if ($row['available'] == 'true') {
											echo "Availability: in stock" . "<br>";
										}else{
											echo "Availability: out of stock" . "<br>";
										}
										
										//Checks the "enum" keys that store the dietary info
										if ($row['dairy_free'] == 'false') {
											echo "This food contains dairy" . "<br>";
										}else{
											echo "This food is dairy free" . "<br>";
										}
										if ($row['gluten_free'] == 'false') {
											echo "This food contains gluten" . "<br>";
										}else{
											echo "This food is gluten free" . "<br>";
										}
										if ($row['vegetarian'] == 'vegetarian') {
											echo "This food is vegetarian" . "<br><br>";
										}else if ($row['vegetarian'] == 'vegan') {
											echo "This food is vegan" . "<br><br>";
										} else {
											echo "This food is not vegetarian<br><br>";
										}
									}else{
										if ($repeat < 16) {
												echo $row ['item_name'];
												echo "   $" . $row ['price'];
												if ($row['available'] == 'true') {
													echo "   in stock";
												}else{
													echo "   out of stock";
												}
												//Checks the "enum" keys that store the dietary info
												if ($row['dairy_free'] == 'true') {
													echo " (df)";
												}
												if ($row['gluten_free'] == 'true') {
													echo "  (gf)";
												}
												if ($row['vegetarian'] == 'vegetarian') {
													echo " (v)";
												}else if ($row['vegetarian'] == 'vegan') {
													echo " (ve)";
												}
												$repeat += 1;
												echo "<br><br>";
											}
										}
								}
							}
						}
					?>
				</form>
			</aside>
			
			<div id = "main_menu">
				<div id="descripton">
					<h3>About the WEGC cafe</h3>
				<p>The cafe sells both food and drinks that cater to dietary requiments, including vegetarian, dairy-free, as well as all of the meat served being Halal.</p>
				</div>
				<h2>All Food items</h2>
				<div class = "small_grid_food">
					<?php
						while($food = mysqli_fetch_assoc($menu_result)) {
							if ($food['available'] == 'true') {
								$stock = "In stock";
							} else {
								$stock = "Out of Stock";
							}
							echo "<div class='grid_box'>";
							echo "<div class = 'item_info'>" . $food['item_name'] . "   $" . $food['price'];
							echo "<br>" . $stock . "</div>";
							echo "<br></div>";	
						}
					?>
				</div>
				
				<br>
				
				<h2>All Drink items</h2>
				<div class = "small_grid_drink">
					<?php
					    while($drink = mysqli_fetch_assoc($drink_menu_result)) {
							if ($drink['available'] == 'true') {
								$stock_drink = "In stock";
							} else {
								$stock_drink = "Out of Stock";
							}
						    echo "<div class='grid_box_drink'>";
							echo "<div class = 'item_info'>" . $drink['item_name'] . "   $" . $drink['price'];
							echo "<br>" . $stock_drink . "</div>";
							echo "</div>";
						}
					?>
				</div>
			</div>
		</main>
		<footer>
		??2022 Morgan C-Arkell, WEGC logo by <a href="https://www.wegc.school.nz/" target="_blank">wegc.school.nz</a>
		</footer>
	</body>
</html>