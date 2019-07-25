<!DOCTYPE html>

<html>
<head>
<title>Insert Recipe Form</title>
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
		<br>
    	<?php
        @ $db = mysql_pconnect("localhost","recipebo_steph","secret");

        if (!$db)
        {
            echo "ERROR: Could not connect to database.  Please try again later.";
            exit;
        }

        mysql_select_db("recipebo_webproj");	
    
        ?>
    
        <script type="text/javascript">
			
			function confirmName(form){
				var recipeName = "";
                recipeName = document.getElementById('recipename').value;
                if (recipeName.length == 0){
                    alert ("Please Enter a Recipe Name" + recipeName);
                   return false;
                }
				return true;

			}
			
		</script>

        <form action="insert_recipe.php" method="post" onSubmit="return confirmName(this);">
        <table>
            <tr><th>
                <label>Recipe Name </label>
                <input type="text" name="recipename" id="recipename">
                <input type="submit" value="Create Recipe" >
            </th></tr>
        </table>
        <table>    
            
            <?php
            

                if(isset($_POST["ing"])) {
                  $ing = $_POST["ing"];   
                } else {
            echo "<br> Please make sure that you <a href =\"select_ingredients.php\">selected inngredients</a> on the previous page."; die;}
                
                for ($k = 0; $k < sizeof($ing); $k++){
                    
                
                          echo "<tr><td><select name=\"ing[]\">";
                            echo "<option value=\"\">Select Ingredient</option>";

                    for ($i = 0; $i < sizeof($ing); $i++){//create select list
                        echo "<option value=\"".$ing[$i]."\">".$ing[$i]."</option>";
                    }
                    echo "</select></td>";
                        echo "<td>Quantity</td>";
						echo "<td>";
						echo "<select name=\"quantityLg[]\">";
							echo "<option value=\"\">Select Unit</option>";
							echo "<option value=\"0\">0</option>";
							echo "<option value=\"1\">1</option>";
							echo "<option value=\"2\">2</option>";
							echo "<option value=\"3\">3</option>";
							echo "<option value=\"4\">4</option>";
							echo "<option value=\"5\">5</option>";
							echo "<option value=\"6\">6</option>";
							echo "<option value=\"7\">7</option>";
							echo "<option value=\"8\">8</option>";
							echo "<option value=\"9\">9</option>";
							echo "<option value=\"10\">10</option>";
						echo "</select>";
						echo "<select name=\"quantitySm[]\">";
							echo "<option value=\"\">Select Unit</option>";
							echo "<option value=\"1/16|0.0625\">1/16</option>";
							echo "<option value=\"1/8|0.125\">1/8</option>";
							echo "<option value=\"1/4|0.25\">1/4</option>";
							echo "<option value=\"1/3|0.33\">1/3</option>";
							echo "<option value=\"1/2|0.5\">1/2</option>";
							echo "<option value=\"2/3|0.66\">2/3</option>";
							echo "<option value=\"3/4|0.75\">3/4</option>";
						echo "</select>";
						echo "</td>";			
						echo "<td>Unit</td>";
                        echo "<td>";
                            echo "<select name=\"unit[]\">";
                                echo "<option value=\"\">Select Unit</option>";
                                echo "<optgroup label=\"Volume\">";
                                    echo "<option value=\"tsp|0.16\">tsp</option>";
                                    echo "<option value=\"tbl|0.5\">Tbsp</option>";
                                    echo "<option value=\"fl oz|1\">fl oz</option>";
                                    echo "<option value=\"cup|8\">cup</option>";
                                    echo "<option value=\"pt|16\">pt</option>";
                                    echo "<option value=\"gal|128\">gal</option>";
                                echo "</optgroup>";
                                echo "<optgroup label=\"Mass and Weight\">";
                                    echo "<option value=\"lb\">lb|16</option>";
                                    echo "<option value=\"oz\">oz|1</option>";
                                echo "</optgroup>";
                                echo "<optgroup label=\"Misc.\">";
                                    echo "<option value=\"tt\">TT|null</option>";
                                    echo "<option value=\"an\">AN|null</option>";
                                    echo "<option value=\"notes\">See Notes</option>";
                                echo "</optgroup>";
                            echo "</select>";   
                        echo "</td>";		
                        echo "<td>Notes</td>";
                        echo "<td><input type=\"text\" name=\"notes[]\" maxlength=\"20\" size=\"20\"></td></tr>";; 
                    }
            


            ?>

            
        </table>
</form>
</body>
</html>
