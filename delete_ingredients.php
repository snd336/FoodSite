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
    
    
    	<?php
        @ $db = mysql_pconnect("localhost","steph","secret");

        if (!$db)
        {
            echo "ERROR: Could not connect to database.  Please try again later.";
            exit;
        }

        mysql_select_db("webproj");	
    
        $k = 0;

                if(isset($_POST["ing"])) {$ing = $_POST["ing"];}
        else {
            echo "<br>You did not select any ingredients to delete.";
            die;
        }
                
            for ($i = 0; $i < sizeof($ing); $i++){
                    
            

	
                $query = "delete from ingredients where ingredient_name = \"".$ing[$i]."\"";
                $result = mysql_query($query)  or die("<br/><br/>This ingredient is in use by a recipe.".$ing[$i]."");
            }
        echo "<br>".sizeof($ing)." ingredients deleted.";
                  
                        
              
                          
                    
            


        ?>

            
      

</body>
</html>
