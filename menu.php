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
$menu_query = "SELECT * FROM foods ORDER BY food_name";
$menu_result = mysqli_query($dbcon, $menu_query);

/*Drinks display query*/
$drink_menu_query = "SELECT * FROM drinks ORDER BY drink_name";
$drink_menu_result = mysqli_query($dbcon, $drink_menu_query);
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