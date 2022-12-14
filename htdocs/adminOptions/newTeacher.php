<?php
$adminID = $_GET['adminID'];


$url1 = "createNewUser.php?adminID=$adminID";


?>

<html>
<head>
</head>
<body>




<form action="" method="submit">
	Admin ID <input type="text" name="adminID" value="<?php echo $_GET['adminID'] ?>" readonly/>      												   <br><br>
	Teacher First Name <input type="text" name="teacherFirstName" value="" />    				 <br><br>
	Teacher Last Name <input type="text" name="teacherLastName" value="" />       	  		 <br><br>
	Teacher Password <input type="text" name="teacherPass" value="" />        				 				 <br><br>
  <input type="submit" name="submit" value="submit">
</form>



<?php
if(isset($_GET['submit']))
	{

		$adminID = $_GET['adminID'];
		$teacherFirstName = $_GET['teacherFirstName'];
		$teacherLastName = $_GET['teacherLastName'];
		$teacherPass = $_GET['teacherPass'];


		$servername = '127.0.0.1:3307';
		$user = 'root';
		$pass = '';
		$db = 'student_information_system';

		$db = new mysqli($servername, $user, $pass, $db);


		$query = "INSERT INTO
		teacher(teacherPass, teacherFirstName, teacherLastName)
		VALUES ('$teacherPass', '$teacherFirstName', '$teacherLastName')
		";
		$data = mysqli_query($db, $query);
		if($data)
		{
			echo "Updated!!!";
		}
		else
		{
			echo "Failed...";
		}

	}

?>





<h2>   <?php echo "<a href='$url1'>Back</a>"; ?> </h2>



<body>
</html>