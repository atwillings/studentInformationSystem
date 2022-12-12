<?php
   $connect=mysqli_connect("127.0.0.1:3307", "root", "", "student_information_system") or die("Connection Failed");
   if(isset($_POST['save']))
   {

      $adminID=$_POST['un'];
      $password=$_POST['pw'];
      $query="select * from admin where adminID='$adminID' and adminPass='$password'";


      $result=mysqli_query($connect,$query);
      $count=mysqli_num_rows($result);
      if($count>0)
         {

            $url = "adminOptions/adminOptions.php?adminID=" . $adminID;
            header('Location: ' . $url);

         }
      else
         {
            echo "Login Failed";
         }
   }
?>





<html lang="en">
   <head>
      <title>Admin Login</title>
   </head>
   <body>
      <h1>Login<h1>







<form method="post" action="adminLogin.php">
   Enter Admin ID <input type="text" name="un"/>
   <br/>
   Enter Password <input type="text" name="pw"/>
   <br/>
   <input type="submit" name="save" value="Login" />
</form>

