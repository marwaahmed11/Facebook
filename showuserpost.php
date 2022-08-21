

<!DOCTYPE html>
<html>
<head>
   
    <style >
        p
        {
            padding: 20px;
            background-color: lightgrey;
            box-shadow: 0px 3px 3px #ddd;
        }

    </style>
</head>
<body>

</body>
</html>


<?php
session_start();
$email=$_SESSION["Email"];
echo $n . "<br>";
$counter=1;
$con=mysqli_connect("localhost","root","","facebook_db");
 if ($con)
        {
        
            $q=mysqli_query($con,"SELECT id FROM `users` WHERE Email='$email'  ");
            if($q)
            {
            
                while($row=mysqli_fetch_array($q))
                { 
                    //echo $row["id"]."<br>";
                    $userid = $row["id"];
                    $q2=mysqli_query($con,"SELECT post_desc FROM `posts` WHERE user_id='$userid' " );
                    if ($q2)
                    {
                    	 while($row2=mysqli_fetch_array($q2))
			                { 
                        
                                echo "<p>Post ".$counter++."<br>".$row2["post_desc"]."<br> </p>";
                                
			                   
			                }
                       
                    }
                    else
                    {     die ("can't insert post in db".mysqli_error($con));
                       
                    } 
                }           
            } 
        }
else
        {
            die("not connected".mysqli_errno());
        }

echo "<a href='profilepage.php'> back to profile page </a>";
?>