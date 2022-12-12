<?php
$adminID = $_GET['adminID'];
$teacherID = $_GET['teacherID'];
$teacherPass = $_GET['teacherPass'];
$teacherFirstName = $_GET['teacherFirstName'];
$teacherLastName = $_GET['teacherLastName'];

$url1 = "updateTeacherRecords.php?adminID=" . $adminID;


?>

<html>
<head>
</head>
<body>
<h1>Update Teacher Information</h1>

<form action="">
	Admin ID <input type="number" name="adminID" value="<?php echo $_GET['adminID'] ?>" readonly/>   		<br><br>
	Teacher ID <input type="number" name="teacherID" value="<?php echo $_GET['teacherID'] ?>" readonly/>   		<br><br>
	Teacher Password <input type="text" name="teacherPass" value="<?php echo $_GET['teacherPass'] ?>"/>   			<br><br>
	Teacher First Name <input type="text" name="teacherFirstName" value="<?php echo $_GET['teacherFirstName'] ?>"/>    <br><br>
	Teacher Last Name <input type="text" name="teacherLastName" value="<?php echo $_GET['teacherLastName'] ?>"/>      <br><br>

  <input type="submit" name="submit" value="submit">
</form>



<?php
if(isset($_GET['submit']))
	{

		$adminID = $_GET['adminID'];
		$teacherID = $_GET['teacherID'];
		$teacherPass = $_GET['teacherPass'];
		$teacherFirstName = $_GET['teacherFirstName'];
		$teacherLastName = $_GET['teacherLastName'];


		$servername = '127.0.0.1:3307';
		$user = 'root';
		$pass = '';
		$db = 'student_information_system';

		$db = new mysqli($servername, $user, $pass, $db);


		$query = "UPDATE teacher
		SET
		teacherPass = '$teacherPass',
		teacherFirstName = '$teacherFirstName',
		teacherLastName = '$teacherLastName'
		WHERE teacherID = '$teacherID'
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


<br>
<br>
<br>
<h2>   <?php echo "<a href='$url1'>Back</a>"; ?> </h2>



<body>
</html>