<html>
	<head>
		<title>
			Magic Cook
		</title>
	</head>
	
	<body>
	
		Enter Name : <input type="text" name="var_Username" size=30 maxlength=10 value="User_name" />
		<br />
		
		Choose Lifestyle : <br>		
		Following are some of the Lifestyles you can choose from (only one can be selected) : <br>
		<input type="radio" name="LS" value="l1" checked="checked"> Athlete : <br>
		<input type="radio" name="LS" value="l2"> Sumo_Wrestlers : <br>
		<input type="radio" name="LS" value="l3"> House_Wife : <br>
		<input type="radio" name="LS" value="l4"> Body_builder : <br>
		<input type="radio" name="LS" value="l5"> Salesman : <br>
		
		Tick the Diseases you have : <br />
		<input type="checkbox" name="Disease" value="di1" /> Diabetic <br />
		<input type="checkbox" name="Disease" value="di2" /> High B.P. <br />
		<input type="checkbox" name="Disease" value="di3" /> Low B.P. <br />
		
		Enter Password: <input type="password" name="password" />
		<br />
				
		<?php
			if($_POST['UID'] == "UserID")
				echo "Enter Vaild user name";
			else
			{
				$UID = $_POST['UID'];
				$PWD = $_POST['PWD'];
				echo "User name is $UID and Password is $PWD";	
			}
		?>
	  
	</body>
	
</html>