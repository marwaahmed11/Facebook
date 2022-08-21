 <!DOCTYPE html>
<html>
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=
        "width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" 
        href="new.css" media="screen" />
</head>
  
<body>
    <div class=" header1">
        <div id="name" class="header1">
            Messages
        </div>
       
        <div id="profilearea" class="header1"><a href="profilepage.php">Profile</a></div>
        <div id="profilearea1" class="header1">|</div>
        <div id="profilearea2" class="header1"><a href="homepage.php">Homepage</a></div>
       
    </div>


  
<div class='post1'>
    <?php 

      session_start();
      $user_home_id=$_SESSION["id"];
         if (isset($_SESSION["id"]))
         {
             $user_home_id=$_SESSION["id"];
             echo "aaaaaaaaaaaaaaaa". $user_home_id;
         }
         $con=mysqli_connect("localhost","root","","facebook_db"); 
        if($con)
        {
            $q=mysqli_query($con,"SELECT * FROM `message` where user_id='$user_home_id' ");
            if($q)
            {


                while($row=mysqli_fetch_array($q))
                {
                     echo "xxxxxxxxxx";
                    $com=$row['user_mess_id'];
                    $user=$row['user_id'];
                    $q2=mysqli_query($con,"SELECT * FROM `users` where id='$com'");
                    $row_user_comm=mysqli_fetch_array($q2);
                    $image=$row_user_comm['image'];
                    $name= $row_user_comm['Name'];
                    $q3=mysqli_query($con,"SELECT Name FROM `users` where id='$user'");
                    $row_user=mysqli_fetch_array($q3);
                    $name2= $row_user['Name'];

                    echo '<img src='. $image.' alt="image is here"  height="40" width="40" />';
                    
                    echo '  <p3>'.$name.' </p3> <br> ';
                          
                    echo $row['mess_info'];
                    echo "<hr>";
                
                }
            }
        }

?>

</div>