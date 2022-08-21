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
            Comments
        </div>
       
        <div id="profilearea" class="header1"><a href="profilepage.php">Profile</a></div>
        <div id="profilearea1" class="header1">|</div>
        <div id="profilearea2" class="header1"><a href="homepage.php">Homepage</a></div>
       
    </div>


  
<div class='post1'>

  <?php
  $news_id=$_GET["new_id"]; 
  session_start();
        
         $con=mysqli_connect("localhost","root","","facebook_db"); 
        if($con)
        {
            
            
            $q=mysqli_query($con,"SELECT * FROM `comment` where post_id='$news_id'");
            
            if($q)
            {

                while($row=mysqli_fetch_array($q))
                {
                    $com=$row['user_com_id'];
                    $user=$row['user_id'];
                    $q2=mysqli_query($con,"SELECT * FROM `users` where id='$com'");
                    $row_user_comm=mysqli_fetch_array($q2);
                    $image=$row_user_comm['image'];
                    $name= $row_user_comm['Name'];
                    $q3=mysqli_query($con,"SELECT Name FROM `users` where id='$user'");
                    $row_user=mysqli_fetch_array($q3);
                    $name2= $row_user['Name'];

                    echo '<img src='. $image.' alt="image is here"  height="40" width="40" />';
                    
                    echo '  <p3>'.$name.' </p3>
                            <p2>commented to </p2>
                            <p1> '.$name2 .'</p1> <br>';
                    echo $row['comment_des'];
                    echo "<hr>";
                }

            }
        }

 ?>

</div>

   <!--  <img src="mini1.jpg" alt="image is here"  height="40" width="40" /><br>
       
        <img src="sun.jfif" alt="image is here"  height="400" width="575" /><br><br>
        <p6>Like Comment Share</p6><br>
        <hr>
        <p1>Amit Deb</p1>
        <p2> and</p2>
        <p1> 5 others</p1>
        <p2> like this</p2>
        <div id="post2text" class="post1">
            <p3>Rani Mukharji </p3>
            <p2>with </p2>
            <p1> Arup Pegu</p1>
            <p2> and</p2>
            <p1> 15 others.</p1><br>
            <p4>4 hrs.</p4>
        </div>
        <div id="commentprof2" class="post1">
            <img src="mini1.jpg" alt="image is here" 
                height="25" width="25" id="profpic" />
        </div>
        <div id="commentboxpos2" class="post1">
            <input type="text" placeholder="comment" 
                id="commentbox" />
        </div>-->