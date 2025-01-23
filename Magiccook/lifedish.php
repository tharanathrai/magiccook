<html>
	<head>
		<title>
			MagicCook
		</title>	
		<link rel="stylesheet" href="style1.css">
	</head>
	<body style="background-color:powderblue;" >
		<center><h1>  LIFESTYLE DISHES  </h1></center>
		
		<?php
			session_start();
			include 'includes/connection.php';
			
			
			$array_dish = array(1=>'Rasam',2=>'Greek Salad',3=>'Omlette',4=>'Dal',5=>'Veg Parantha',6=>'Berry Compote',7=>'Americano',8=>'Latte');
			$array_prepdish = array(0,0,0,0,0,0,0,0,0);
			$i=0;
			for($i=1;$i<9;$i++)
			{	
				$sql_d[$i] = "select distinct dish from dishes where dish = '$array_dish[$i]' and not exists(select ingredient from dishes where (dish = '$array_dish[$i]' and ingredient not in (select ingredient from user_ingredients)));";
				$sql_dishes = mysqli_query($conn,$sql_d[$i]);
				$sql_dishesCheck = mysqli_num_rows($sql_dishes);
				if($sql_dishesCheck == 1)
				{
					//echo "<br> You can prepare $array_dish[$i] <br>";
					$array_prepdish[$i] = 1;
					//echo "<br> The RECIPE is : <br>";
					//$sql_recp = "SELECT recipe FROM recipe WHERE dish = $array_dish[$i];";
					//$sql_recipe = mysqli_query($conn,$sql_recp);
					//$row = mysqli_fetch_assoc($sql_recipe);
					//echo "<br> $row["pcdr"] <br>";
				}
				else
				{
					//echo "<br> You can not prepare $array_dish[$i] <br>";
					$array_prepdish[$i] = 0;
				}
			}
			
			
			$UID = $_SESSION['u_id'];
			
			$array_lifestyle = array();
			$sql_userlifestyle = "SELECT lifestyle FROM user_details WHERE id = $UID";
			$sql_lifestyle = mysqli_query($conn,$sql_userlifestyle);
			$lifestyleCheck = mysqli_num_rows($sql_lifestyle);
			if($lifestyleCheck != 0)
			{
				$row = mysqli_fetch_assoc($sql_lifestyle);
				$array_lifestyle[] = $row["lifestyle"];
			}
			$count_lifestyle = count($array_lifestyle);
			
			$array_prep_life_dish = array(0,0,0,0,0,0,0,0,0);	//initializing array of dishes that can be prepared based on lifestyle
			
			for($i=1;$i<9;$i++)
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
							$array_prep_life_dish[$i] = 0;
							
							echo "<br><br> ($i).  $array_dish[$i] is not compatible with the lifestyle you are following <br>";
						}
						else
						{
							$array_prep_life_dish[$i] = 1;
							
							$row = mysqli_fetch_assoc($result);
							$dis = $row["lifestyle"];
							$nut = $row["nut_reqd"];
							echo "<br><br> ($i).  $array_dish[$i] is compatible with the lifestyle you are following --- it is rich in $nut <br>";
							//echo " <br> <img src=./pics/$array_dish[$i].jpg alt=PHOTO_OF_$array_dish[$i] style=float:right;width:250px;height:200px;> <p> ($i). $array_dish[$i] is compatible with the lifestyle you are following --- it is rich in $nut </p> <br> ";
							//echo "<img src = $array_dish[$i].jpg>";
							echo "<br> The RECIPE is : <br>";
							$sql_pcdr = "SELECT pcdr FROM recipe WHERE dish = '$array_dish[$i]';";
							echo "<br> ---------$array_dish[$i]---------- <br><br>";
							$sql_recp = mysqli_query($conn,$sql_pcdr);
							$row = mysqli_fetch_assoc($sql_recp);
							$pcd = $row["pcdr"];
							echo "<br> $pcd <br><br>";
						}
					}
				}
			}
			
			mysqli_close($conn);//connection closed
		?>
		<br><br>
		<!--<center>Click here to go back
		<a href="pg3.php" >
			<button type="submit" name="submit" align="center"> 
				BACK
			</button> 
		</a></center>-->
		<center>
		Click here to go Log Out
			<a href="login.php" >
			<br><br>
				<button type="submit" name="submit" align="center"> 
					LOGOUT
				</button> 
			</a>
		</center>
	</body>
</html>
