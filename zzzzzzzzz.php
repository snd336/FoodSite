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

	if(isset($_POST['quantityLg'])) $quantityLg = $_POST['quantityLg'];
	if(isset($_POST['quantitySm'])) $quantitySm = $_POST['quantitySm'];
	
	if(isset($_POST['unit'])) $unit = $_POST['unit'];
	if(isset($_POST['ing'])) $ing = $_POST['ing'];
	if(isset($_POST['notes'])) $notes = $_POST['notes'];
		

	
	for ($i = 0; $i < sizeof($ing); $i++)
	{
        $ing[$i] = addslashes($ing[$i]);
		
		
        
		$quantityLg[$i] = addslashes($quantityLg[$i]);
		$quantitySm[$i] = addslashes($quantitySm[$i]);	
		
		$fraction = explode("|",$quantitySm[$i]);
		$array = array($quantityLg[$i],$fraction[0]);
		$storeString = implode(" ", $array);	
		$total = $fraction[1] + $quantityLg[$i];
		
		$unit[$i] = addslashes($unit[$i]);
		$pieces = explode("|", $unit[$i]);
		
		$storeOz = $total*$pieces[1];
		$storeUnit = $pieces[0];
	
		
	}

	
	
	
	
	
?>
	



</body>
</html>


