<?php
/* Connect to database */              /* Username*/  /* Passsword*/
$dbcon = mysqli_connect("localhost", "morganchongarke", "LtS3V56", "morganchongarke_assessment_v2");
	
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
$special_query = "SELECT week_number, new_price
					FROM specials_info
					WHERE week_number = '" . $id . "'";
$special_result = mysqli_query($dbcon, $special_query);
$special_record = mysqli_fetch_assoc($special_result);

/*Finding the food items in specials*/
$item_query = "SELECT items.item_name 
				FROM items, specials_info, specials_items 
				WHERE specials_info.week_number = '" . $id . "' 
				AND specials_info.week_number = specials_items.week_number 
				AND items.item_id = specials_items.item_id";
$item_result = mysqli_query($dbcon, $item_query);

/*Specials query - dropdown menu*/
$specials_menu_query = "SELECT week_number FROM specials_info ORDER BY week_number ASC";
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
	
	<main>
		<div id = "special_view">
			<h2>View Specials</h2>
			<?php
				echo "<h3>Week " . $special_record['week_number'] . " Specials</h3>";
				echo "<p> Week number: ". $special_record['week_number'] . "<br>";
				$num = 1;
				while ($row = mysqli_fetch_array($item_result)) {
					echo "<p>Item ". $num . ": " . $row['item_name'];
					$num += 1;
				}
				echo "<p> Price: $". $special_record['new_price'] . "<br>";
			?>
		</div>
		<div id="specials_options">
			<h3>Select Another Week</h3>
			<!-- Dropdown  from -->
			<form name="special" id="special_form" method="get" action="specials.php">
				<!-- Dropdown menu -->
				<select name="special" id="special">
					<!-- Options -->
					<?php
					while($special = mysqli_fetch_assoc($specials_menu_result)){
						echo "<option value = '".$special['week_number']."'>";
						echo "Week " . $special["week_number"];
						echo "</option>";
					}
					?>
				</select>
				
				<input type="submit" name = "specials_button" value="Search">
			</form>
			<br>
			<img id="menu_image" alt="a croissant and a cup of coffee" src="images/cafe_drawing.png">

			<p>Find out about our other food and drinks on our menu page:</p>
			<button onclick="location.href='menu.php'">Click here for the page!</button>
			<br>
		</div>
	</main>
	<footer>
		©2022 Morgan C-Arkell, WEGC logo by <a href="https://www.wegc.school.nz/" target="_blank">wegc.school.nz</a>
	</footer>
</body>

</html>