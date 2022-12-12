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
	Student First Name <input type="text" name="studentFirstName" value="" />    				 <br><br>
	Student Last Name <input type="text" name="studentLastName" value="" />       	  		 <br><br>
	Student Password <input type="text" name="studentPass" value="" />        				 				 <br><br>
  <input type="submit" name="submit" value="submit">
</form>



<?php
if(isset($_GET['submit']))
	{

		$adminID = $_GET['adminID'];
		$studentFirstName = $_GET['studentFirstName'];
		$studentLastName = $_GET['studentLastName'];
		$studentPass = $_GET['studentPass'];


		$servername = '127.0.0.1:3307';
		$user = 'root';
		$pass = '';
		$db = 'student_information_system';

		$db = new mysqli($servername, $user, $pass, $db);


		$query = "INSERT INTO
		student(studentPass, studentFirstName, studentLastName)
		VALUES ('$studentPass', '$studentFirstName', '$studentLastName')
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