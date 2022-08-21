

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
            Facebook
        </div>
       
        <div id="profilearea" class="header1"><a href="profilepage.php">Profile</a></div>
        <div id="profilearea1" class="header1">|</div>
        <div id="profilearea2" class="header1"><a href="message.php">Message</a></div>
       
    </div>


        
       
        

    
      
        <div class='post1'>
        <?php
         session_start();
         if (isset($_SESSION["id"]))
         {
             $user_home_id=$_SESSION["id"];
             echo "aaaaaaaaaaaaaaaa". $user_home_id;
         }
         $con=mysqli_connect("localhost","root","","facebook_db"); 
        if($con)
        {
            $q=mysqli_query($con,"SELECT * FROM `posts`");
            if($q)
            {

                while($row=mysqli_fetch_array($q))
                {
                    
                    $userid= $row['user_id'];
                    $q2=mysqli_query($con,"SELECT * FROM `users` WHERE id='$userid'  ");
                    $row2=mysqli_fetch_array($q2);
                    $q3=mysqli_query($con,"SELECT * FROM `users` WHERE id='$user_home_id'  ");
                    $row3=mysqli_fetch_array($q3);

                   // echo '<div id="post2text" class="post1">';
                    echo '<img src='.$row2["image"].'  height="40" width="40" />';
                    echo '  <p3>'.$row2["Name"].'</p3>';
                    echo ' <p2> shared a post</p2> ';
                    echo ' <p1>'.$row['hour'].":".$row['minute']." ".$row['day'] .",".$row['month']. "," . $row['year'].'</p1> <br><br> ';
                  
                    echo $row["post_desc"] . "<br><br>";
                    echo  '<p6>';
                    echo "<a href='homepage.php?new_id=".$row["id"]."'>Like</a>" ;
                     echo "<a href='comment.php?new_id=".$row["id"]."'>Comment</a> Share</p6><br>" ;

                    
                     echo "<form name='formName' method='post'>
                            <input type='text' id='likebtn' value='# of likes: ".$row["like"]. " ' > ". 
                            " </form>";

                    echo ' 
                            <img src='.$row3["image"].'
                                height="25" width="25" id="profpic" />
                        
                            <form method="post">
                            <input type="text" placeholder="comment" 
                                name="commentbox" id="commentbox" />
                            <input type="submit" name="combtn" id="combtn" value="comment" > </form>

                           <form method="post">
                            <input type="text" placeholder="message" 
                                name="message" id="message" />
                            <input type="submit" name="messagebtn" id="messagebtn" value="message" > </form>';
                    echo '<hr>';

                    $comm=$_POST["commentbox"];
                    $post_id=$row["id"];
                    $user_id=$row2["id"];
                    $user3=$row3["id"];

                    echo $comm;
                    if (isset($_POST["combtn"]) && isset($comm) )
                    {
                        
                         echo "inserted";
                         echo $comm ."<br>";
                         echo  $post_id."<br>";
                         echo "xxxx";

                         echo $user_id."<br>";
                         echo "yyyy";
                         echo  $user3;
                           
                        $q2=mysqli_query($con,"INSERT INTO `comment` (`id`, `Post_id`, `comment_des`, `user_id`, `user_com_id`) VALUES (NULL, '$post_id', '$comm', '$user_id', '$user3') ");
                        if ($q2)
                        {
                            echo "inserted";
                        }
                    }
                     $messbtn=$_POST["message"];

                     if (isset($_POST["messagebtn"]) && isset( $messbtn) )
                    {
                        
                         echo "inserted";
                         
                          
                        $q2=mysqli_query($con,"INSERT INTO `message` (`id`, `user_id`, `user_mess_id`, `mess_info`) VALUES (NULL, '$user_id', '$user3','$messbtn') ");
                        if ($q2)
                        {
                            echo "inserted";
                        }
                    }
                   
                    
                }
            }
            else
            {
                echo "error select".mysqli_errno();
            }
        }
        else
        {
            die("not connected".mysqli_errno());
        }
        mysqli_close($con);


//echo "hello";
$news_id=$_GET["new_id"]; 
echo $news_id;
$likes=-1;
if (isset($news_id) && is_numeric($news_id))
{
       
               $con=mysqli_connect("localhost","root","","facebook_db");
                if ($con)
                {

                   echo "connected  " . $news_id;
                   $q=mysqli_query($con,"SELECT * FROM `posts` WHERE `posts`.`id` = $news_id ");

                    if($q)
                    {
                        $row=mysqli_fetch_array($q);  
                     
                        $likes=$row["like"];
                        $likes=$likes+1; 
                        header("Location: checklogin.php");       
                    }
                    else
                    {
                        echo "error select".mysqli_errno();
                    }
                    echo $likes;
                    $q=mysqli_query($con,"UPDATE `posts` SET `like` = '$likes' WHERE `posts`.`id` = $news_id");
                    if ($q)
                    {
                        echo "update";
                        mysqli_close($con);
                        header("Location: checklogin.php");
                    }
                    else
                    {
                        echo "can't update your info";
                    }

                    mysqli_close($con);
                }
                else
                {
                    die ("can't connect to db". mysqli_errno());
                } 

}
else
{
    echo "hacking";
}

                                                                 


     ?>
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
    </div>


    
</body>
  
</html>



