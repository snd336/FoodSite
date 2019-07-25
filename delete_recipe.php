<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Verify Insert</title>
		<link rel="stylesheet" type="text/css" href="CSS/main.css">
   </head>
<body>


<p>
    <ul class = "topnav">
    <li><a href = "index.html">Home</a></li>
    <li class ="dropdown">
        <a href="javascript:void(0)" class="dropbtn">View Recipes</a>
        <div class="dropdown-content">
            <a href = "all_recipes.php">View All Recipes</a>
            <a href = "select_recipes_first.php">View Selected Recipe</a>
        </div>
    </li>
    <li class ="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Recipes</a>
        <div class="dropdown-content">
            <a href = "select_ingredients.php">Insert Recipe</a>
            <a href = "delete_select_recipe.php">Delete Recipe</a>
        </div>
    </li>
    <li>
    <li class ="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Ingredients</a>
        <div class="dropdown-content">
            <a href = "create_ingredients.html">Insert Ingredient</a>
            <a href = "delete_select_ingredients.php">Delete Ingredients</a>
        </div>
    </li>
    <li><a href = "about.html">About</a></li>
    <li><a href = "future.html">Upcoming</a></li>

</ul>
	<?php
	@ $db = mysql_pconnect("localhost","steph","secret");

	if (!$db)
	{
		echo "ERROR: Could not connect to database.  Please try again later.";
		exit;
	}

	mysql_select_db("webproj");	
		
	$recipeid = $_POST['recipe'];

	

	
	$query = "delete from recipe_ingredients where recipe_id = ".$recipeid."";
	$result = mysql_query($query);
	$query = "delete from recipes where recipe_id = ".$recipeid."";
	$result = mysql_query($query);
    if ($result) echo "<p> 1 recipe deleted</p>";

	

	?>
	



</body>
</html>


