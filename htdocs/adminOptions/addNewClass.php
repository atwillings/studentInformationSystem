<?php
$adminID = $_GET['adminID'];


$url1 = "adminOptions.php?adminID=$adminID";


?>

<html>
<head>
</head>
<body>

<h1>Add New Class</h1>
<br><br>


<form action="" method="submit">
	Admin ID <input type="text" name="adminID" value="<?php echo $_GET['adminID'] ?>" readonly/>    <br><br>
	Class Name <input type="text" name="className" value="" />  				 <br><br>
	Student ID <input type="number" name="studentID" value="" />    				 <br><br>
	Teacher ID <input type="number" name="teacherID" value="" />       	  		 <br><br>
	Semester <input type="number" name="semester" value="" />					<br><br>
	Credits <input type="number" name="credits" value="" />					<br><br>
  <input type="submit" name="submit" value="submit">
</form>



<?php
if(isset($_GET['submit']))
	{

		$adminID = $_GET['adminID'];
		$className = $_GET['className'];
		$studentID = $_GET['studentID'];
		$teacherID = $_GET['teacherID'];
		$semester = $_GET['semester'];
		$credits = $_GET['credits'];


		$servername = '127.0.0.1:3307';
		$user = 'root';
		$pass = '';
		$db = 'student_information_system';

		$db = new mysqli($servername, $user, $pass, $db);


		$query = "INSERT INTO
		class(className, studentID, teacherID, semester, credits)
		VALUES ('$className', '$studentID', '$teacherID','$semester', '$credits')
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