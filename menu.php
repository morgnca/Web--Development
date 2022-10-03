<?php
/* Connect to database */              /* Username*/  /* Passsword*/
$dbcon = mysqli_connect("localhost", "morganchongarke", "LtS3V56", "morganchongarke_assessment");
	
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
	$menu_query = "SELECT * FROM foods WHERE vegetarian LIKE 'true' ORDER BY food_name";
	$menu_result = mysqli_query($dbcon, $menu_query);
} else if ($sort == 'dairy') {
	$menu_query = "SELECT * FROM foods WHERE dairy LIKE 'false' ORDER BY food_name";
	$menu_result = mysqli_query($dbcon, $menu_query);
} else if ($sort == 'all') {
	$menu_query = "SELECT * FROM foods ORDER BY food_name";
	$menu_result = mysqli_query($dbcon, $menu_query);
} else {
	echo "result not found";
}

/*Drinks display query*/
if ($sort == 'dairy') {
	$drink_menu_query = "SELECT * FROM drinks WHERE dairy LIKE 'false' ORDER BY drink_name";
	$drink_menu_result = mysqli_query($dbcon, $drink_menu_query);
} else {
	$drink_menu_query = "SELECT * FROM drinks ORDER BY drink_name";
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
			<!--<link rel="icon" href="images/favicon.ico" type="image/x-icon"/>-->
	</head>

	<body>
		<header>
			<h1>Wellington East Girl's College</h1>
			<br>
			<h1>Cafe Website</h1>
		</header>

		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="menu.php">Menu</a></li>
				<li><a href="specials.php">Specials</a></li>
			</ul>
		</nav>

		<main>
			<aside id="aside">
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
						
						<option value = "vege">
							<p>Only Vegetarian</p>
						</option>
					</select>
					<input type="submit" name = "sorting_button" value="Sort the menu">
				</form>
				<h3>Search a Food or Drink</h3>
				<p>Input the name of one of the items on the menu to see its details</p>

				<form action = "" method = "post">
					<input type = "text" name = 'search'>
					<input type = "submit" name = "submit" value = "Search">
					<br>
					<?php
						if(isset($_POST['search'])) {
							$search = $_POST['search'];

							$query1 = "SELECT * FROM foods WHERE food_name LIKE '%$search%' ORDER BY food_name";
							$query = mysqli_query($dbcon, $query1);
							$count = mysqli_num_rows($query);
							
							$fails = "0";

							if($count == 0){
								$fails = "1";

							}else{
								$repeat = 0;
								echo "<br> Foods Found <br><br>";
								while ($row = mysqli_fetch_array($query)) {
									if ($count < 4) {

										echo "Name: " . $row ['food_name'] . "<br>";
										echo "Price: $" . $row ['price'] . "<br>";
										if ($row['available'] == 'true') {
											echo "Availability: in stock" . "<br>";
										}else{
											echo "Availability: out of stock" . "<br>";
										}
										if ($row['dairy'] == 'true') {
											echo "This food contains dairy" . "<br>";
										}else{
											echo "This food is dairy free" . "<br>";
										}
										if ($row['vegetarian'] == 'true') {
											echo "This food is vegetarian" . "<br><br>";
										}else{
											echo "This food is not vegetarian" . "<br><br>";
										}
									}else{
										if ($repeat < 4) {
											echo $row ['food_name'];
											echo "   $" . $row ['price'];
											if ($row['available'] == 'true') {
												echo "   in stock";
											}else{
												echo "   out of stock";
											}
											echo "<br>";
											if ($row['dairy'] == 'true') {
												echo "(df)  " . "";
											}
											if ($row['vegetarian'] == 'true') {
												echo "(v)";
											}
											echo "<br><br>";
											$repeat += 1;
										}
									}
								}
							}
							
							echo "<br>";
							
							$query1 = "SELECT * FROM drinks WHERE drink_name LIKE '%$search%' ORDER BY drink_name";
							$query = mysqli_query($dbcon, $query1);
							$count = mysqli_num_rows($query);

							if($count == 0 ) {
								if($fails == "1") {
									echo "There was no result to your search.";
								}

							}else{
								$repeat = 0;
								echo "<br> Drinks Found <br><br>";
								while ($row = mysqli_fetch_array($query)) {
									if ($count < 4) {
										echo "Name: " . $row ['drink_name'] . "<br>";
										echo "Price: $" . $row ['price'] . "<br>";
										if ($row['available'] == 'true') {
											echo "Availability: in stock" . "<br>";
										}else{
											echo "Availability: out of stock" . "<br>";
										}
										if ($row['dairy'] == 'true') {
											echo "This drink is contains dairy" . "<br>";
										}else{
											echo "This drink is dairy free" . "<br>";
										}
										if ($row['vegetarian'] == 'true') {
											echo "This drink is vegetarian" . "<br><br>";
										}else{
											echo "This drink is not vegetarian" . "<br><br>";
									
										 }
									} else {
										if ($repeat < 4) {
											echo $row ['drink_name'];
											echo "   $" . $row ['price'];
											if ($row['available'] == 'true') {
												echo "   in stock";
											}else{
												echo "   out of stock";
											}
											echo "<br>";
											if ($row['dairy'] == 'true') {
												echo "(df)  " . "";
											}
											if ($row['vegetarian'] == 'true') {
												echo "(v)";
											}
											echo "<br><br>";
											$repeat += 1;
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
				<div class = "grid_container">
					<?php
						$repeat_id = 1;
						while($food = mysqli_fetch_assoc($menu_result)) {
							echo "<div class='grid_box'>" . $food['food_name'] . "   $" . $food['price'] . "</div>";
							echo "<br>";
						}
					?>
				</div>
				
				<br><br>
				
				<h2>All Drink items</h2>
				<div class = "grid_container">
					<?php
						$repeat_id = 1;
						while($drink = mysqli_fetch_assoc($drink_menu_result)) {
							echo "<div class='grid_box'>" . $drink['drink_name'] . "   $" . $drink['price'] . "</div>";
							echo "<br>";
						}	
					?>
				</div>
			</div>
		</main>
	</body>
	<footer>
		<p> Morgan C-Arkell 2022
	</footer>
</html>