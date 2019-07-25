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
    <table border="1">
  <tr>
    <th>Ingredient Name</th>
    <th>Category</th> 
    <th>Cost</th>
	<th>Quantity</th>
	<th>Unit</th>
	<th>Yeild</th>
  </tr>
    
	<?php
	@ $db = mysql_pconnect("localhost","recipebo_steph","secret");

	if (!$db)
	{
		echo "ERROR: Could not connect to database.  Please try again later.";
		exit;
	}

	mysql_select_db("recipebo_webproj");	



	
	if(isset($_POST['ingredient'])) $ingredient = $_POST['ingredient'];
	if(isset($_POST['cost'])) $cost = $_POST['cost'];

	if(isset($_POST['quantityLg'])) $quantityLg = $_POST['quantityLg'];
	if(isset($_POST['quantitySm'])) $quantitySm = $_POST['quantitySm'];
	if(isset($_POST['unit'])) $unit = $_POST['unit'];
	if(isset($_POST['yield'])) $yield = $_POST['yield'];
    if(isset($_POST['category'])) $category = $_POST['category'];
	
    $k = 0;
	

	for ($i = 0; $i < sizeof($ingredient); $i++)
	{
        
		$ingredient[$i] = addslashes($ingredient[$i]);
		$cost[$i] = addslashes($cost[$i]);
		
		$quantityLg[$i] = addslashes($quantityLg[$i]);
		$quantitySm[$i] = addslashes($quantitySm[$i]);	
		
		$fraction = explode("|",$quantitySm[$i]);
		$array = array($quantityLg[$i],$fraction[0]);
		$storeQty = implode(" ", $array);	
		$total = $fraction[1] + $quantityLg[$i];
		
		$unit[$i] = addslashes($unit[$i]);
		$pieces = explode("|", $unit[$i]);
		
		$totalOz = $total*$pieces[1];
		$storeCostPerOz = $cost[$i]/$totalOz;
		$storeUnit = $pieces[0];		
		
		
        $yield[$i] = addslashes($yield[$i]);
        $category[$i] = addslashes($category[$i]);
		
		$query = "insert into ingredients values
		(null," .$category[$i]. " ,'".$ingredient[$i].
		"','".$cost[$i].
		"','".$storeQty.
		"','".$storeUnit.
		"','".$yield[$i].
		"','".$storeCostPerOz."')";
		
		
		
	
	$result = mysql_query($query);
	if($result) {
        $query = "select last_insert_id() as lastid";
		$result= mysql_query($query);
		$row = mysql_fetch_array($result);
		$id = htmlspecialchars( stripslashes($row["lastid"]));
        $k++;
        $query1 = "select ingredient_name, type_name, cost, quantity, unit, yield
            from ingredients i join ingredient_types it
            on i.type_id = it.type_id
            where ingredient_id =".$id."";
            
        $result1 = mysql_query($query1)  or die($query1."<br/><br/>".mysql_error());
        $num_results = mysql_num_rows($result1);

        $row2 = mysql_fetch_array($result1);



		

	
	echo "<tr><td>";
	echo htmlspecialchars( stripslashes($row2["ingredient_name"]));
	echo "</td><td>";
	echo htmlspecialchars( stripslashes($row2["type_name"]));
	echo "</td><td>";
	echo htmlspecialchars( stripslashes($row2["cost"]));
	echo "</td><td>";
	echo htmlspecialchars( stripslashes($row2["quantity"]));
	echo "</td><td>";
	echo htmlspecialchars( stripslashes($row2["unit"]));
	echo "</td><td>";
    echo htmlspecialchars( stripslashes($row2["yield"]));
	echo "</td></tr>";
        
    }
	
	}
    echo $k." ingredient(s) added to Database.<br>";
	?>
	

  


    </table>

</body>
</html>


