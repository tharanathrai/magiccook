<html>
	<head>
		<title>
			DISHES
		</title>
		<link rel="stylesheet" href="style1.css">
	</head>	
	<body style="background-color:powderblue;"  >
		<center><h1>  CHOOSE PRIORITY  </h1></center>
		<?php
			session_start();
			include 'includes/connection.php';
			
			//echo " <br>  The Ingredients you have are :  ";
			$array_Ingredient = array();
			if(!empty($_POST['Ingredients']))
			{
				foreach($_POST['Ingredients'] as $selected)
				{
					$array_Ingredient[] = $selected; //array which stores the Ingredients the user has
					//echo " , ".$selected;
				}
			}
			$count_Ingredient = count($array_Ingredient);// count no. of Ingredients the user has
			
			//establishing connection to the Table
	
			$sql_proc = "CALL `clearingredients`();";
			$sql_proc_res = mysqli_query($conn,$sql_proc);
			//$sql_proc_count = mysqli_num_rows($sql_proc_res);
	
			if($sql_proc_res)
			{
				//echo "<br><br>Query of clearing the user_ingredients table executed successfully <br>";
			}

			$i=0;
			for($i=0;$i<$count_Ingredient;$i++)
			{	
				$sql_ui = "INSERT INTO user_ingredients (ingredient) VALUES ('$array_Ingredient[$i]');";
				if(mysqli_query($conn,$sql_ui))
				{
					//echo " <br> New record created successfully in Table user_ingredients <br> ";
				}
				else
				{
					//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
			//mysqli_close($conn);//connection closed
		?>
		<br>
		<br>
		<br><br>
		<center>Click here to see all the dishes you can prepare<br>
		<a href="dish.php" >
			<button type="submit" name="submit"> 
				DISHES
			</button> 
		</a></center>
		
		<br>
		<br>
		
		<center>Click here to see all the dishes that can be prepared keeping your health in mind<br>
		<a href="disdish.php" >
			<button type="submit" name="submit"> 
				DISHES
			</button> 
		</a></center>
		
		<br>
		<br>
		
		<center>Click here to see all the dishes that can be prepared keeping your lifestyle in mind<br>
		<a href="lifedish.php" >
			<button type="submit" name="submit"> 
				DISHES
			</button> 
		</a></center>
		
		<!--<br><br><br><br>
		<DIV ALIGN=RIGHT>
			Click here to go Log Out
			<a href="login.php" >
			<br><br>
				<button type="submit" name="submit" align="center"> 
					LOGOUT
				</button> 
			</a>
		</DIV>-->
	</body>
</html>
