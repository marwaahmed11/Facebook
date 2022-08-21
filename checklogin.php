<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook</title>
    <link rel="stylesheet" href="style.css">
</head>
<script type="text/javascript">
	function clickfn()
	{
		if (document.simple.mail.value=="")
		{
			alert ("check email");
		}
		if (document.simple.pass.value=="")
		{
			alert ("check password");
		}
		
	}
</script>
<body> 
    
    <div class="h1">
    <h1 class="h">facebook</h1>
    <p class="pr">Facebook helps you connect and share with the people in your life.</p>
    </div>
		<form name="simple" method="post" action="checklogin.php"  class="main">
		<input type="text" id="mail" name="mail" placeholder="Email address" class="txt"><br>
		<input type="text" id="pass" name="pass" placeholder="Password" class="txt"><br>
		<input type="submit"  name ="save" value="Log In" class="login-btn" onclick="clickfn()">
		    <div class="ca">
                <a href="register.php" class="pca">Create New Account</a>
            </div>
		</form>
	</body>
	</html>

<?php

session_start();

$email=$_POST["mail"];
$password=$_POST["pass"];



if (isset($email) && isset($password) )
{
		$con=mysqli_connect("localhost","root","","facebook_db");
		if ($con)
		{
			$q=mysqli_query($con,"SELECT  `Email`, `Password`,`id` FROM `users` WHERE Email='$email' and Password='$password'");
			$row=mysqli_fetch_array($q);
			if($row["Email"]==$email&&$row["Password"]==$password)
			{
				//$row=mysqli_fetch_array($q);
				//echo  $row["Email"];
				//echo  $row["Password"];
				$_SESSION["Email"]=$row["Email"];
				$_SESSION["id"]=$row["id"];

				header("Location: profilepage.php"); ////////// home page
				//echo 	$_SESSION["id"] ;		
			}
			else
			{
				echo "Error please enter email and password correct ";
			}
			mysqli_close($con);
		
		}
		else
		{
			die("not connected".mysqli_errno());
		}
		//mysqli_close($con);
}
else
{
	echo "hacking";
}


?>
