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
if ($sort == 'vege') {
	$menu_query = "SELECT * FROM items WHERE vegetarian LIKE 'vegetarian' AND type = 'food' ORDER BY item_name";
	$menu_result = mysqli_query($dbcon, $menu_query);
	
} else if ($sort == 'vegan') {
	$menu_query = "SELECT * FROM items WHERE vegetarian LIKE 'vegan' AND type = 'food' ORDER BY item_name";
	$menu_result = mysqli_query($dbcon, $menu_query);
	
} else if ($sort == 'dairy') {
	$menu_query = "SELECT * FROM items WHERE dairy_free LIKE 'true' AND type = 'food' ORDER BY item_name";
	$menu_result = mysqli_query($dbcon, $menu_query);
	
}  else if ($sort == 'gluten') {
	$menu_query = "SELECT * FROM items WHERE gluten_free LIKE 'true' AND type = 'food' ORDER BY item_name";
	$menu_result = mysqli_query($dbcon, $menu_query);
	
} else if ($sort == 'all') {
	$menu_query = "SELECT * FROM items WHERE type = 'food' ORDER BY item_name";
	$menu_result = mysqli_query($dbcon, $menu_query);
}

/*Drinks display query*/
if ($sort == 'vege') {
	$drink_menu_query = "SELECT * FROM items WHERE vegetarian LIKE 'vegetarian' AND type = 'drink' ORDER BY item_name";
	$drink_menu_result = mysqli_query($dbcon, $drink_menu_query);
	
} else if ($sort == 'vegan') {
	$drink_menu_query = "SELECT * FROM items WHERE vegetarian LIKE 'vegan' AND type = 'drink' ORDER BY item_name";
	$drink_menu_result = mysqli_query($dbcon, $drink_menu_query);
	
} else if ($sort == 'dairy') {
	$drink_menu_query = "SELECT * FROM items WHERE dairy_free LIKE 'true' AND type = 'drink' ORDER BY item_name";
	$drink_menu_result = mysqli_query($dbcon, $drink_menu_query);
	
}  else if ($sort == 'gluten') {
	$drink_menu_query = "SELECT * FROM items WHERE gluten_free LIKE 'true' AND type = 'drink' ORDER BY item_name";
	$drink_menu_result = mysqli_query($dbcon, $drink_menu_query);
	
} else if ($sort == 'all') {
	$drink_menu_query = "SELECT * FROM items WHERE type = 'drink' ORDER BY item_name";
	$drink_menu_result = mysqli_query($dbcon, $drink_menu_query);
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
				<h1>Wellington East Girl's College</h1>
				<h1>Cafe Website</h1>
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
			<aside id="grid_box_long">
				<h2>Sort Menu</h2>
				<p>Sort the menu grid by dietary requirements</p>
				<!-- Dropdown  from -->
				<form name="menu_form" id="menu_form" method="get" action="menu.php">
					<!-- Dropdown menu -->
					<select name="menu_sel" id="menu_sel">
						<!-- Options -->
						<option value = "all">
							<p>Show All</p>
						</option>
						
						<option value = "dairy">
							<p>Only Dairy-free</p>
						</option>
						
						<option value = "gluten">
							<p>Only Gluten-free</p>
						</option>
						
						<option value = "vege">
							<p>Only Vegetarian</p>
						</option>
						
						<option value = "vegan">
							<p>Only Vegan</p>
						</option>
						
						
					</select>
					<input type="submit" name = "sorting_button" value="Sort the menu">
				</form>
				<h3>Search a Food or Drink</h3>
				<p>Input the name of one of the items on the menu to see its details</p>
				
				<!--Form to search for an item by name-->
				<form action = "" method = "post">
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
									if ($count < 4) {

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
											echo "This food is not vegetarian";
										}
										echo "<br><br>";
									}else{
										if ($repeat < 8) {
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
				<div class = "small_grid_a">
					<?php
						while($food = mysqli_fetch_assoc($menu_result)) {
							echo "<div class='grid_box'>";
							echo "<div class = 'item_info'>" . $food['item_name'] . "   $" . $food['price'] . "</div>";
							echo "</div>";	
						}
					?>
				</div>
				
				<br><br><br><br>
				
				<h2>All Drink items</h2>
				<div class = "small_grid_b">
					<?php
					    while($drink = mysqli_fetch_assoc($drink_menu_result)) {
						    echo "<div class='grid_box'>";
							echo "<div class = 'item_info'>" . $drink['item_name'] . "   $" . $drink['price'] . "</div>";
							echo "</div>";
						}
					?>
				</div>
			</div>
		</main>
	</body>
	<footer>
		<p> Morgan C-Arkell 2022 </p>
	</footer>
</html>