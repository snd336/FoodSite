<html>
<head>
<title>Query All Recipes from Database</title>
		<link rel="stylesheet" type="text/css" href="CSS/main.css">
    <style type="text/css">
        
 
        
    </style>
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
<br>



<?php

@ $db = mysql_pconnect("localhost","steph","secret");

if (!$db)
{
	echo "ERROR: Could not connect to database.  Please try again later.";
	exit;
}

mysql_select_db("webproj");

?>

<table border="1">
    <thead>
  <tr>
      <th>Recipe Name</th>
    <th>Quantity</th> 
    <th>Unit</th>
	<th>Ingredient</th>
	<th>Special Notes</th>
  </tr>
</thead>        
  
  
<?php

$query1 = "select count(*), recipe_name from recipe_ingredients ri join recipes r
    where ri.recipe_id = r.recipe_id
    group by ri.recipe_id order by recipe_name";
$result = mysql_query($query1) or die($query1."<br/><br/>".mysql_error());
$num_results = mysql_num_rows($result);//number of recipes

$query2 = "select r.recipe_name, ri.quantity as q, ri.unit as u, i.ingredient_name as ing, ri.notes as notes 
from recipe_ingredients ri join ingredients i
on ri.ingredient_id = i.ingredient_id
join recipes r on r.recipe_id = ri.recipe_id
order by 1";
$result2 = mysql_query($query2) or die($query2."<br/><br/>".mysql_error());


for ($i=0; $i < $num_results; $i++)//for each recipes
{
$row = mysql_fetch_array($result);
$ingredientcount = htmlspecialchars( stripslashes($row["count(*)"]));
$recipename = htmlspecialchars( stripslashes($row["recipe_name"]));

echo "<tr>
		<td rowspan='".$ingredientcount."'>".$recipename."</td>";
		
	for ($j=0; $j < $ingredientcount; $j++)
	{	
	$row2 = mysql_fetch_array($result2);
	echo "<td>";
	echo htmlspecialchars( stripslashes($row2["q"]));
	echo "</td><td>";
	echo htmlspecialchars( stripslashes($row2["u"]));
	echo "</td><td>";
	echo htmlspecialchars( stripslashes($row2["ing"]));
	echo "</td><td>";
	echo htmlspecialchars( stripslashes($row2["notes"]));
	echo "</td></tr>";
	}
	
}  
?>

</table>
    

</body>
</html>


