<!DOCTYPE html>

<html>
   <head>
      <meta charset = "utf-8">
      <title>Select Ingredients</title>
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
	<p>
	<table>
		<tr>
			<div id="list" class="ingList">
                
			</div>
		</tr>
	</table>
		
	
	<?php
	@ $db = mysql_pconnect("localhost","steph","secret");

	if (!$db)
	{
		echo "ERROR: Could not connect to database.  Please try again later.";
		exit;
	}

	mysql_select_db("webproj");	
	?>
	<form method = "post" action = "create_recipe.php">
    <h3>Select Ingredients to Create a Recipe With then: 
        <input type="submit" value="Click to Submit Ingredients"></h3>
        <br>
        
	<table border="1">
	
	
	
	
	
	
        <?php
		
			$query2 = "select * from ingredient_types";
            $result2 = mysql_query($query2);
            $num_result2 = mysql_num_rows($result2);
        
            
			
			
			for ($k=0; $k < $num_result2; $k++)//for each catergory
			{
                $row2 = mysql_fetch_array($result2);
                $type_id = htmlspecialchars( stripslashes($row2["type_id"]));
                $type_name = htmlspecialchars( stripslashes($row2["type_name"]));
                
                echo "<tr>";
				echo "<td rowspan=\"1\"><label>Select ".$type_name.":</label></td>";
                
                $query = "select ingredient_id, ingredient_name from ingredients where type_id =".$type_id."
                order by ingredient_name";
                $result = mysql_query($query);
                $num_result = mysql_num_rows($result);
                $x = 0;

                
				for ($j=0; $j < 4; $j++)//new columns
				{
					echo "<td>";
					
					for ($i=0; $i < $num_result/4;$i++)//new data in column
					{	
                        $x++;
                        if ($x <= $num_result){
						$row = mysql_fetch_array($result);
						$id = htmlspecialchars( stripslashes($row["ingredient_id"]));
					    $name = htmlspecialchars( stripslashes($row["ingredient_name"]));
						
						echo "<input type=\"checkbox\" id=".$id." name=\"ing[]\" value=\"".$name."\"";
                    	echo " onChange=\"addList(this.value,this.id);\"><label for=".$id.">" .$name."</label>";
						echo "<br>";
                        }
						
						
					}
					
					echo "</td>";
					
				}
				echo "</tr>";
			}//end each category
		  
			?>
        <script type="text/javascript">
			
			function addList(value,num){
				
                if (document.getElementById(num).checked == true){
                
                    
				var newElement = document.createElement('div');
				newElement.innerHTML = '<td><input id="ing' + num + '" class="bt" type="button" value="' + value + 
				'" onclick="removeList(' + num + ');"></td>';

				document.getElementById('list').appendChild(newElement);
                }else removeList(num);
                
				

			}
			function removeList(num){
				var myElement = document.getElementById('ing' + num + '');
				var myParent = myElement.parentNode;
				while (myParent.hasChildNodes())
				{
					myParent.removeChild(myParent.firstChild);
				}
				document.getElementById(num).checked = false;
			}
			
		</script>
      
        
        
    
	</table>
       </form>


     
   </body>
</html>

