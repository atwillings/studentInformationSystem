<?php
$adminID = $_GET['adminID'];
$studentID = $_GET['studentID'];
$studentFisrtName = $_GET['studentFirstName'];
$studentLastName = $_GET['studentLastName'];
$studentPass = $_GET['studentPass'];
$classID = $_GET['classID'];
$className = $_GET['className'];
$grade = $_GET['grade'];

$url1 = "updateSelectedStudent.php?adminID=$adminID&studentID=$studentID&studentFirstName=$studentFisrtName&studentLastName=$studentLastName&studentPass=$studentPass";


?>

<html>
<head>
</head>
<body>




<form action="" method="submit">
	Admin ID <input type="text" name="adminID" value="<?php echo $_GET['adminID'] ?>" readonly/>      												   <br><br>
	Student ID <input type="text" name="studentID" value="<?php echo $_GET['studentID'] ?>" readonly/>                    			 <br><br>
	Student First Name <input type="text" name="studentFirstName" value="<?php echo $_GET['studentFirstName'] ?>" readonly/>     <br><br>
	Student Last Name <input type="text" name="studentLastName" value="<?php echo $_GET['studentLastName'] ?>" readonly/>        <br><br>
	Student Password <input type="text" name="studentPass" value="<?php echo $_GET['studentPass'] ?>" readonly/>        				 <br><br>
	Class ID <input type="text" name="classID" value="<?php echo $_GET['classID'] ?>" readonly/>      												   <br><br>
	Class Name <input type="text" name="className" value="<?php echo $_GET['className'] ?>" readonly/>      										 <br><br>


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

		$adminID = $_GET['adminID'];
		$studentID = $_GET['studentID'];
		$studentFisrtName = $_GET['studentFirstName'];
		$studentLastName = $_GET['studentLastName'];
		$studentPass = $_GET['studentPass'];
		$classID = $_GET['classID'];
		$className = $_GET['className'];
		$grade = $_GET['grade'];


		$servername = '127.0.0.1:3307';
		$user = 'root';
		$pass = '';
		$db = 'student_information_system';

		$db = new mysqli($servername, $user, $pass, $db);


		$query = "UPDATE class
		SET grade = '$grade'
		WHERE classID = '$classID'";
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