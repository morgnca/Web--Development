<?php
/* Connect to database */              /* Username*/  /* Passsword*/
$dbcon = mysqli_connect("localhost", "morganchongarke", "LtS3V56", "morganchongarke_assessment");
	
if ($dbcon == NULL) {
	echo "Cound not connect to database";
	exit();
}

if(isset($_GET['special'])){
	$id = $_GET ['special'];
}else{
	$id = 1;
}

/*Finding Specials Query*/
$special_query = "SELECT specials.week, foods.food_name, drinks.drink_name, specials.new_price 
					FROM specials, foods, drinks
					WHERE specials.food_id = foods.food_id
					AND specials.drink_id = drinks.drink_id
					AND specials.week = '" . $id . "'";
$special_result = mysqli_query($dbcon, $special_query);
$special_record = mysqli_fetch_assoc($special_result);

/*Specials query - dropdown menu*/
$specials_menu_query = "SELECT week FROM specials ORDER BY week ASC";
$specials_menu_result = mysqli_query($dbcon, $specials_menu_query);	

?>

<!doctype html>
<html lang="en" dir="ltr">
<head>
		<title>Specials Viewpage</title>
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
		<h2>View Specials</h2>
		<div id = "special_view">
			<?php
				echo "<h3>Week " . $special_record['week'] . " Specials</h3>";
				echo "<p> Week number: ". $special_record['week'] . "<br>";
				echo "<p> Food special: ". $special_record['food_name'] . "<br>";
				echo "<p> Drink special: ". $special_record['drink_name'] . "<br>";
				echo "<p> Price: $". $special_record['new_price'] . "<br>";
			?>
			<h3>Select Another Week</h3>
			<!-- Dropdown  from -->
			<form name="special" id="special" method="get" action="specials.php">
				<!-- Dropdown menu -->
				<select name="special" id="special">
					<!-- Options -->
					<?php
					while($special = mysqli_fetch_assoc($specials_menu_result)){
						echo "<option value = '".$special['week']."'>";
						echo "Week " . $special["week"];
						echo "</option>";
					}
					?>
				</select>
				<input type="submit" name = "specials_button" value="Search">
			</form>
		</div>
	</main>
</body>
	
<footer>
	<p> Morgan C-Arkell 2022
</footer>

</html>