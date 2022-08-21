<!-- <form action="edit_info.php" method="post">
Name<br>
<input type="text" name="name" id="name">
<br>

Email<br>
<input type="text" name="email" id="email">
<br>

password<br>
<input type="password" name="password" id="password">
<br> <br>

<input type="submit" name="btn" id="btn" value="Save Changes">

</form>

-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook</title>
    <link rel="stylesheet" href="style.css">
</head>
<body> 
    
    <div class="h1">
    <h1 class="h">facebook</h1>
    <p class="pr">Edit your account info.</p>
    </div>
		<form method="post" action="edit_info.php"  class="main">
		<input type="text" id="name" name="name" placeholder="Name" class="txt"><br>
		<input type="text" id="email" name="email" placeholder="Email address" class="txt"><br>
		<input type="text" id="password" name="password" placeholder="Password" class="txt"><br>
		<input type="text" id="image" name="image" placeholder="image" class="txt"><br>
		
		<input type="submit"  name ="btn" value="Save Changes" class="login-btn">
		   
		</form>
	</body>
	</html>


<?php 
//$new_id=$_GET["new_id"];
$new_name=$_POST["name"];
$new_password=$_POST["password"];
$email=$_POST["email"];
$new_image=$_POST["image"];
if (isset($new_name) && isset($new_password) && isset($email) && isset($new_image)  )
{
		$con=mysqli_connect("localhost","root","","facebook_db");
		if ($con)
		{ 
			$q=mysqli_query($con,"update users set Name='$new_name' , Password='$new_password' , image='$new_image' where Email='$email' ");
			if ($q)
			{
				
				mysqli_close($con);
				header("Location: profilepage.php");
			}
			else
			{
				echo "can't update your info";
			}
			mysqli_close($con);
		}
		else
		{
			die("not connected".mysqli_errno());
		}
}
else
{
	echo "hacking";
}




?>