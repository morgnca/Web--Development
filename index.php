<?php 
/* Connect to database */              /* Username*/  /* Passsword*/
$dbcon = mysqli_connect("localhost", "morganchongarke", "LtS3V56", "morganchongarke_assessment_v2");
	

/*Specials query - dropdown menu*/
$specials_form_query = "SELECT week_number FROM specials_info ORDER BY week_number ASC";
$specials_form_result = mysqli_query($dbcon, $specials_form_query);
?>

<!doctype html>
<html lang="en" dir="ltr">
<head>
		<title>Menu Homepage</title>
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
	
	<main id="non_grid_main">
		<div class="index_navbox">
			<h2>View the menu</h2>
			<p>View the menu page of the Wellington East Girl's College cafe</p>
			<p>The menu page can also sort depending on your dietary requirements, and can find the details of a food item just by writing in its name.</p>
			<br>
			<button onclick="location.href='menu.php'">Click here for the page!</button>
		</div>
		<div class="index_navbox">
			<h2>View the cafe's specials</h2>
			<p>Our cafe has a new special each week of the term, causing a food item and a drink item to have a reduced price if they are bought together</p>
			<button onclick="location.href='specials.php'">Click here for the page!</button>
			
			<h3>View the information for this week</h3>
			<!-- Dropdown  from -->
			<form name="special" id="special_form" method="get" action="specials.php">
				<!-- Dropdown menu -->
				<select name="special" id="special">
					<!-- Options -->
					<?php
						while($special = mysqli_fetch_assoc($specials_form_result)){
							echo "<option value = '".$special['week_number']."'>";
							echo "Week " . $special["week_number"];
							echo "</option>";
						}
					?>
				</select>
				<input type="submit" name = "specials_button" value="Search for this week's special!">
			</form>
		</div>
	</main>
	
	<br><br>
	
	<footer>
		<p>©2022 Morgan C-Arkell, WEGC logo by <a href="https://www.wegc.school.nz/" target="_blank">wegc.school.nz</a></p>
	</footer>
</body>
	
</html>