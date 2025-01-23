<html>
	<head>
		<title>
			MagicCook
		</title>	
		<link rel="stylesheet" href="style1.css">
	</head>
	<body style="background-color:Bisque;" >
		<center><h1>  ALL DISHES  </h1></center>

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
					echo "<br><br> ($i).  You can prepare $array_dish[$i]  <br>";
					//echo " <br> <p><img src=./pics/$array_dish[$i].jpg alt=PHOTO_OF_$array_dish[$i] style=float:right;width:250px;height:200px; > ($i).  You can prepare $array_dish[$i].</p><br> ";
					//echo "<img src = $array_dish[$i].jpg >";
					$array_prepdish[$i] = 1;
					echo "<br> The RECIPE is : <br>";
					$sql_pcdr = "SELECT pcdr FROM recipe WHERE dish = '$array_dish[$i]';";
					echo "<br> ---------$array_dish[$i]---------- <br><br>";
					$sql_recp = mysqli_query($conn,$sql_pcdr);
					$row = mysqli_fetch_assoc($sql_recp);
					$pcd = $row["pcdr"];
					echo "<br> $pcd <br><br>";
				}
				else
				{
					//echo "<br> ($i).  You can not prepare $array_dish[$i] <br>";
					$array_prepdish[$i] = 0;
				}
			}
			
			mysqli_close($conn);//connection closed
		?>

		<br><br><br><br>
		 
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
