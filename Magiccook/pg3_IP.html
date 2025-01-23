<?php
	session_start();
	include_once 'includes/connection.php';
	
	echo " <br>  The Ingredients you have are : ";
	
	if(!empty($_POST['Ingredients']))
	{
		foreach($_POST['Ingredients'] as $selected)
		{
			$array_Ingredient[] = $selected; //array which stores the Ingredients the user has
			echo ", ".$selected;
		}
	}
	$count_Ingredient = count($array_Ingredient);// count no. of Ingredients the user has
	
	//establishing connection to the Table
	$sql_ui = "DELETE FROM user_ingredients;";
	$sql_ui_res = mysqli_query($conn,$sql_ui);
	
	if($sql_ui_res)
	{
		echo "<br><br>Query of clearing the user_ingredients table executed successfully <br>";
		echo "<br>".$sql_ui_res."<br>";// this statement is not needed
	
	/*	$row = mysqli_num_rows($sql_ui_res);
		
		if($row == 0)
		{
			echo "<br> All rows deleted <br>";
		}	
	*/
	}

	$i=0;
	for($i=0;$i<$count_Ingredient;$i++)
	{	
		$sql_ui = "INSERT INTO user_ingredients (ingredient) VALUES ('$array_Ingredient[$i]');";
		if(mysqli_query($conn,$sql_ui))
		{
			echo " <br> New record created successfully in Table user_ingredients <br> ";
		}
		else
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	
	$array_dish = array(1=>'d1',2=>'d2',3=>'d3');
	
	$i=0;
	for($i=1;$i<4;$i++)
	{	
		$sql_d[$i] = "select distinct dish from dishes where dish = '$array_dish[$i]' and not exists(select ingredient from dishes where (dish = '$array_dish[$i]' and ingredient not in (select ingredient from user_ingredients)));";
		$sql_dishes = mysqli_query($conn,$sql_d[$i]);
		$sql_dishesCheck = mysqli_num_rows($sql_dishes);
		if($sql_dishesCheck == 1)
		{
			echo "<br> You can prepare $array_dish[$i] <br>";
			$array_prepdish[$i] = 1;
			//echo "<br> The RECIPIE is : <br>";
			//$sql_recp = SELECT recipie FROM recipies WHERE dish = $array_dish[$i];
		}
		else
		{
			echo "<br> You can not prepare $array_dish[$i] <br>";
			$array_prepdish[$i] = 0;
		}
	}
	
	$UID = $_SESSION['u_id'];
	
	$sql_userdiseases = "SELECT disease FROM user_diseases WHERE id = $UID;";
	$sql_diseases = mysqli_query($conn,$sql_userdiseases);
	$diseasesCheck = mysqli_num_rows($sql_diseases);
	if($diseasesCheck != 0)
	{
		$row = mysqli_fetch_assoc($sql_diseases);
		$array_disease[] = $row["disease"];
	}
	$count_disease = count($array_disease);
	
	$array_prep_dis_dish = array(0,0,0,0);	//initializing array of dishes that can be prepared based on diseases
	
	for($i=1;$i<4;$i++)
	{
		if($array_prepdish[$i] == 1)
		{
			for($j=0;$j<$count_disease;$j++)
			{
				$sql = "SELECT * FROM diseases WHERE (disease = '$array_disease[$j]' and nut_avoid in (SELECT maj_nut FROM ingredients WHERE ingredient in (SELECT ingredient FROM dishes WHERE dish = '$array_dish[$i]')));";
				$result = mysqli_query($conn,$sql);
				$resultCheck = mysqli_num_rows($result);
				if($resultCheck == 0)
				{
					$array_prep_dis_dish[$i] = 1;
					
					echo "<br> $array_dish[$i] is safe to prepare <br>";
				}
				else
				{
					$array_prep_dis_dish[$i] = 0;
					
					$row = mysqli_fetch_assoc($result);
					$dis = $row["disease"];
					$nut = $row["nut_avoid"];
					echo "<br> $array_dish[$i] is not safe to prepare --- it will cause $dis as it contains $nut <br>";
				}
			}
		}
	}
	
	$sql_userlifestyle = "SELECT lifestyle FROM user_details WHERE id = $UID";
	$sql_lifestyle = mysqli_query($conn,$sql_userlifestyle);
	$lifestyleCheck = mysqli_num_rows($sql_lifestyle);
	if($lifestyleCheck != 0)
	{
		$row = mysqli_fetch_assoc($sql_lifestyle);
		$array_lifestyle[] = $row["lifestyle"];
	}
	$count_lifestyle = count($array_lifestyle);
	
	$array_prep_life_dish = array(0,0,0,0);	//initializing array of dishes that can be prepared based on lifestyle
	
	for($i=1;$i<4;$i++)
	{
		if($array_prepdish[$i] == 1)
		{
			for($j=0;$j<$count_lifestyle;$j++)
			{
				$sql = "SELECT * FROM lifestyles WHERE (lifestyle = '$array_lifestyle[$j]' and nut_reqd in (SELECT maj_nut FROM ingredients WHERE ingredient in (SELECT ingredient FROM dishes WHERE dish = '$array_dish[$i]')));";
				$result = mysqli_query($conn,$sql);
				$resultCheck = mysqli_num_rows($result);
				if($resultCheck == 0)
				{
					$array_prep_dis_dish[$i] = 0;
					
					echo "<br> $array_dish[$i] is not compatible with the lifestyle you are following <br>";
				}
				else
				{
					$array_prep_dis_dish[$i] = 1;
					
					$row = mysqli_fetch_assoc($result);
					$dis = $row["lifestyle"];
					$nut = $row["nut_reqd"];
					echo "<br> $array_dish[$i] is compatible with the lifestyle you are following --- it contains $nut <br>";
				}
			}
		}
	}
	
	
	mysqli_close($conn);//connection closed

?>