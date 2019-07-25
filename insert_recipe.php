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
	@ $db = mysql_pconnect("localhost","recipebo_steph","secret");

	if (!$db)
	{
		echo "ERROR: Could not connect to database.  Please try again later.";
		exit;
	}

	mysql_select_db("recipebo_webproj");	
	

	
	if(isset($_POST['recipename'])) {
         $recipename = $_POST['recipename'];
	       $recipename = addslashes($recipename);
    }
        
       
	
	if(isset($_POST['quantityLg'])) $quantityLg = $_POST['quantityLg'];
	if(isset($_POST['quantitySm'])) $quantitySm = $_POST['quantitySm'];
	if(isset($_POST['unit'])) $unit = $_POST['unit'];
	if(isset($_POST['ing'])) $ing = $_POST['ing'];
	if(isset($_POST['notes'])) $notes = $_POST['notes'];
		
	
	

	$query = "insert into recipes values
	('".NULL."','".$recipename."')";
	$result = mysql_query($query);
	if($result) {
		$query = "select last_insert_id() as lastid";
		$result= mysql_query($query);
		$row = mysql_fetch_array($result);
		$id = htmlspecialchars( stripslashes($row["lastid"]));
		echo mysql_affected_rows()." recipe added to Database.<br>";

	}
	$k = 0;
	for ($i = 0; $i < sizeof($ing); $i++)
	{
        $ing[$i] = addslashes($ing[$i]);
        $query = "select ingredient_id,ingredient_name from ingredients where 
        ingredient_name =\"".$ing[$i]."\"";
        $result = mysql_query($query) or die($query."<br/><br/>".mysql_error());
        $row = mysql_fetch_array($result);
		$ingid = htmlspecialchars( stripslashes($row["ingredient_id"]));
        
		
		$quantityLg[$i] = addslashes($quantityLg[$i]);
		$quantitySm[$i] = addslashes($quantitySm[$i]);	
		
		$fraction = explode("|",$quantitySm[$i]);
		$array = array($quantityLg[$i],$fraction[0]);
		$storeQty = implode(" ", $array);	
		$total = $fraction[1] + $quantityLg[$i];
		
		$unit[$i] = addslashes($unit[$i]);
		$pieces = explode("|", $unit[$i]);
		
		$storeOz = $total*$pieces[1];
		$storeUnit = $pieces[0];		
		
	
		
		
		$ingid = addslashes($ingid);
		$notes[$i] = addslashes($notes[$i]);
		
		$query = "insert into recipe_ingredients values
		(".$id.",'".$ingid.
		"','".$storeQty.
		"','".$storeUnit.
		"','".$notes[$i].
		"','".$storeOz."')";
	
	$result = mysql_query($query);
	
	if($result) $k++;

	}
	echo $k." ingredient(s) added to Recipe.<br>";
	?>
	
<table border="1">
  <tr>
    <th>Recipe Name</th>
    <th>Quantity</th> 
    <th>Unit</th>
	<th>Ingredient</th>
	<th>Special Notes</th>
  </tr>

  
  
<?php 
    
$query2 = "select r.recipe_name as n, ri.quantity as q, ri.unit as u, i.ingredient_name as ing, ri.notes as note
            from recipes r join recipe_ingredients ri on r.recipe_id = ri.recipe_id
            join ingredients i on ri.ingredient_id = i.ingredient_id
            where r.recipe_id = ".$id."";

    
$result2 = mysql_query($query2) or die($query2."<br/><br/>".mysql_error());

$x = sizeof($ing);


echo "<tr>
		<td rowspan='".$x."'>".$recipename."</td>";
		
	for ($j=0; $j < sizeof($ing); $j++)
	{	
	$row2 = mysql_fetch_array($result2);
	echo "<td>";
	echo htmlspecialchars( stripslashes($row2["q"]));
	echo "</td><td>";
	echo htmlspecialchars( stripslashes($row2["u"]));
	echo "</td><td>";
	echo htmlspecialchars( stripslashes($row2["ing"]));
	echo "</td><td>";
	echo htmlspecialchars( stripslashes($row2["note"]));
	echo "</td></tr>";
	}
	

?>
</table>


</body>
</html>


