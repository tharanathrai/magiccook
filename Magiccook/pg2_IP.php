<html>
	<head>
		<title>
			Magic Cook
		</title>
		<link rel="stylesheet" href="style1.css">
	</head>
	
	<body>
	
	<?php
	$UserName = $_POST['var_Username'];
	
	$PWD = $_POST['var_password'];
	
	$Lifestyle = $_POST['LS'];
	
	echo "   The UserName is : $UserName <br><br>";
	echo "   The Password is : $PWD <br><br>";
	echo "   The Lifestyle is : $Lifestyle <br><br>";
	echo "   The Diseases are : ";
	
	if(!empty($_POST['Diseases']))
	{
		foreach($_POST['Diseases'] as $selected)
		{
			$array_Disease[] = $selected; //array which stores the diseases the user has
			echo $selected.", ";
		}
	}
	$count_Disease = count($array_Disease);// count no. of diseases the user has

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "magiccooknew";
	$last_id = 0;
	
	//establishing connection to the database
	$conn = mysqli_connect($servername,$username,$password,$dbname); 
	if(!$conn)
	{
		die(" <br> Connection failed: ".mysqli_connect_error());
	}
	//echo " <br> Connected to Database 'user_details' successfully  <br> ";
	
	//establishing connection to the Table
	$sql_udt = "INSERT INTO user_details (name,password,lifestyle) VALUES ('$UserName','$PWD','$Lifestyle');";
	if(mysqli_query($conn,$sql_udt))
	{
		$last_id = mysqli_insert_id($conn);
		echo " <br><br> New record created successfully in Table user_details with id : $last_id <br>";
	}
	else
	{	
		//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$i=0;
	for($i=0;$i<$count_Disease;$i++)
	{	
		$sql_udi = "INSERT INTO user_diseases (id,disease) VALUES ('$last_id','$array_Disease[$i]');";
		if(mysqli_query($conn,$sql_udi))
		{
			//echo " <br> New record created successfully in Table user_diseases <br> ";
		}
		else
		{
			//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

	mysqli_close($conn);//connection closed
	?>

	
		<br><br>
		You are a registered user of MAGICCOOK
		<br><br>	 
		<pre><h2>Go back to   <a href="login.php" > <button> LOGIN </button> </a>   Page</h2></pre>
		
		
	</body>
	
</html>
