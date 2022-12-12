<?php
$studentID = $_GET['studentID'];
$teacherID = $_GET['teacherID'];
$classID = $_GET['classID'];
$grade = $_GET['grade'];

$url1 = "enterFinalGrades.php?username=" . $teacherID;


?>

<html>
<head>
</head>
<body>


<form action="">
	Student ID <input type="text" name="studentID" value="<?php echo $_GET['studentID'] ?>" readonly/>    <br><br>
	Teacher ID <input type="text" name="teacherID" value="<?php echo $_GET['teacherID'] ?>" readonly/>    <br><br>
	Class ID <input type="text" name="classID" value="<?php echo $_GET['classID'] ?>" readonly/>        <br><br>

	<label for="grade">Enter Grade:</label>
  <select id="grade" name="grade">
    <option value="a">A</option>
    <option value="b">B</option>
    <option value="c">C</option>
    <option value="d">D</option>
    <option value="f">F</option>
    <option value="w">W</option>
    <option value="p">P</option>
    <option value="n">N</option>
    <option value="i">I</option>
    <option value="">null</option>
  </select>
  <input type="submit" name="submit" value="submit">
</form>



<?php
if(isset($_GET['submit']))
	{

		$studentID = $_GET['studentID'];
		$teacherID = $_GET['teacherID'];
		$classID = $_GET['classID'];
		$grade = $_GET['grade'];


		$servername = '127.0.0.1:3307';
		$user = 'root';
		$pass = '';
		$db = 'student_information_system';

		$db = new mysqli($servername, $user, $pass, $db);


		$query = "UPDATE class
		SET grade = '$grade'
		WHERE classID = '$classID';";
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