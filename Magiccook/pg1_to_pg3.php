<?php
	session_start();
	include_once 'includes/connection.php';
	
	$UID = $_POST['UID'];
	$_SESSION['u_id'] = $UID;
	
	$PWD = $_POST['PWD'];
	if(empty($UID) || empty($PWD))
	{
		header("Location: ./login.php?login=failure");
	}
		
	$sql_udt = "SELECT password FROM user_details WHERE id = '$UID';";
	$sql_udt_res =  mysqli_query($conn,$sql_udt);
	
	if($sql_udt_res)
	{
		//echo " <br> One record fetched successfully from Table user_details <br> ";
		//echo " <br> The id $UID exists in the database <br>";
		$row = mysqli_fetch_assoc($sql_udt_res);
	
		if($row["password"] == $PWD)
		{	
			//echo "<br> The Password matched $PWD with " . $row["password"] . " of User_id $UID <br>";
			echo "<br> You can now use services of MAGICCOOK <br>";
			//echo "<br> GOING TO INPUT PAGE <br>";
			//echo "<a href="pg3.html" > INGREDIENT INPUT PAGE </a>";
			header("Location: ./pg3.php?login=success");
		}
		else
		{
			echo "<br> The Password $PWD did not match with " . $row["password"] . " of User_id $UID <br>";
			//echo "<br> GOING BACK TO LOGIN PAGE <br>";
			//echo "<br> <a href="login.php" > LOGIN PAGE </a> <br>";
			header("Location: ./login.php?login=failure");
		}
	}
	else
	{
		//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);//connection closed
?>