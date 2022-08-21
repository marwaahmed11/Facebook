
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
			header("Location: register.php");
		}
		if (document.simple.pass.value=="")
		{
			alert ("check password");
			header("Location: register.php");
		}
		if (document.simple.cname.value=="")
		{
			alert ("check name");
            header("Location: register.php");
		}
		
	}
</script>
<body> 
    
    <div class="h1">
    <h1 class="h">facebook</h1>
    <p class="pr">Facebook helps you connect and share with the people in your life.</p>
    </div>
		<form name="simple" method="post" action="register.php"  class="main">
		<input type="text" id="cname" name="cname" placeholder="Name" class="txt"><br>
		<input type="text" id="mail" name="mail" placeholder="Email address" class="txt"><br>
		<input type="text" id="pass" name="pass" placeholder="Password" class="txt"><br>
		<input type="date" id="birthday" name="birthday" class="txt"><br>

		<input type="text" id="info" name="info" placeholder="info" class="txt"><br>
		<input type="text" id="skills" name="skills" placeholder="skills" class="txt"><br>
		<input type="text" id="bio" name="bio" placeholder="bio" class="txt"><br>
		<input type="text" id="img" name="img" placeholder="image" class="txt"><br>

		<input type="submit"  name ="save" value="Register" class="login-btn" onclick="clickfn()">
		   
		</form>
	</body>
	</html>





<?php


session_start();

$user_image= $_POST["img"];
$user_name= $_POST["cname"];
$user_email= $_POST["mail"];
$user_pass=$_POST["pass"];
$user_birth=$_POST["birthday"];
$user_info=$_POST["info"];
$user_skills=$_POST["skills"];
$user_bio=$_POST["bio"];

if ($user_image=='')
{
	$user_image="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/Facebook_icon_2013.svg/1024px-Facebook_icon_2013.svg.png";

}

$x=true;
$con=mysqli_connect("localhost","root","","facebook_db");
		if ($con)
		{
			 $q2=mysqli_query($con,"SELECT `Email` FROM `users` " );
					  if ($q2)
			           {
			              while($row2=mysqli_fetch_array($q2))
			              {
			              	if ($user_email==$row2['Email'])
			              	{
			              		$x=false;
			              		echo "invalid email";
			              		
			              	}
			              
			              }
			          }
		}
if ($x==true)
{

	$_SESSION["Name"] = $user_name;
	$_SESSION["Email"] = $user_email;

	//$_SESSION["Password"] = $user_pass;
	//$_SESSION["Birthday"] = $user_birth;


	if (isset($user_name) && isset($user_email) && isset($user_pass) && isset($user_birth) && isset($user_info) && isset($user_skills) && isset($user_bio) && isset($user_image))
	{

	                                                      
			$con=mysqli_connect("localhost","root","","facebook_db");
			if ($con)
			{

				$q=mysqli_query($con,"INSERT INTO `users` (`id`, `Name`, `Email`, `Password`, `Birthday`, `info`, `skills`, `bio`,`image`) VALUES (NULL, '$user_name','$user_email','$user_pass','$user_birth',
				'$user_info','$user_skills','$user_bio','$user_image')");
				

                $q3=mysqli_query($con,"SELECT id FROM `users` WHERE Email='$user_email' " );
                if ($q3)
                     {
                     $row2=mysqli_fetch_array($q3);
                       $_SESSION["id"]=$row2["id"];
                       echo $_SESSION["id"];
                          
                       }

				if ($q)
				{

					mysqli_close($con);
					header("Location: profilepage.php");
				}
				else
				{
					echo "not inserted";
				}
				mysqli_close($con);
			}
			else
			{
				die("not connected".mysqli_errno());
			}
			
	}
}

?>
