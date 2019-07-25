<!DOCTYPE html>

<html>
   <head>
      <meta charset = "utf-8">
      <title>Select Page</title>
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
	?>
	
	<table>
	<form method = "post" action = "select_recipes.php">
	<tr>
	<td>
	<label>Select Recipe:</label>
	</td>
	<td>
		<select name="recipe">
			<?php
		
			$query = "select * from recipes order by  recipe_name";
			$result = mysql_query($query);
			$num_result = mysql_num_rows($result);
			
			for ($i=0; $i < $num_result;$i++)
			{
				$row = mysql_fetch_array($result);
				$recipeid = htmlspecialchars( stripslashes($row["recipe_id"]));
				$recipename = htmlspecialchars( stripslashes($row["recipe_name"]));
				echo "<option value='".$recipeid."'>".$recipename."</option>";
			}
		  
		  
			?>
		</select>
	</td>
	</tr>
	<tr>
	<td rowspan="4">
	<label>Select Columns:</label>
	</td>
	<td>
		<input id="unit" type="checkbox" name="unit" value="unit" />
		<label for="unit">Units</label>
		<br>
		<input id="quantity" type="checkbox" name="quantity" value="quantity" />
		<label for="quantity">Quantity</label>
		<br>
		<input id="ingredient" type="checkbox" name="ingredient" value="ingredient" />
		<label for="ingredient">Ingredients</label>
		<br>
		<input id="notes" type="checkbox" name="notes" value="notes" />
		<label for="notes">Special Notes</label>
	</td>
	</tr>
	<tr>
	<td>
	<input type="submit">
	</td>
	</tr>
	</form>
	</table>


     
   </body>
</html>
