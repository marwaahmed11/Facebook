
<?php
session_start();


$email=$_SESSION["Email"];
$new_post=$_POST["post"];
if (isset($email))
{
        $con=mysqli_connect("localhost","root","","facebook_db");
        if ($con)
        {
       
           $q=mysqli_query($con,"SELECT * FROM `users` WHERE Email='$email'  ");
            if($q)
            {
            
                while($row=mysqli_fetch_array($q))
                { 
                    //echo $row["id"]."<br>";
                  //  echo "<h1>" . $row["Name"] . "</h1>";
                    $name=$row["Name"];

                    $userinfo= $row["info"];
                    $userskills = $row["skills"];
                    $userbio= $row["bio"];
                    $userimage= $row["image"];



                }
            }
        }
        mysqli_close($con);


}
  

?>

<!--


<br>
<form action="profilepage.php" method="post">

Write post <br>

<textarea name="post" id="post" rows=20 cols=40></textarea>
<br>

<input type="submit" name="btn" id="btn" value="post">
<br><br>
<a href="edit_info.php">Edit account info </a> <br><br>

<a href="showuserpost.php">show user post</a> <br> <br>

<a href="findfriends.php">Find Friends</a> <br> <br>

<a href="homepage.php">HomePage</a> <br> 
-->


<main>
        
        <header>
            <link rel="stylesheet" type="text/css" href="ppstyle.css" media="screen" />
            <div class="tb">
                <div class="td" id="logo">
                    <a href="#"><i class="fab fa-facebook-square"></i></a>
                </div>
                <div class="td" id="search-form">
                    <form action="profilepage.php" method="post">
                     
                      
                    </form>
                </div>
               
                <div class="td" id="i-links">
                    <div class="tb">
                        <div class="td" id="m-td">
                            <div class="tb">
                            	
                                <span class="td m-active"><i class="material-icons"><a href='homepage.php?new_id=".$email."'>Homepage</a></i></span>
                            </div>
                        </div>
                        <div class="td">
                           <!-- <a href="#" id="p-link">
                                <img src="https://imagizer.imageshack.com/img921/3072/rqkhIb.jpg">
                            </a>-->
                              <a href='logout.php'> logout <a>

                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div id="profile-upper">
            <div id="profile-banner-image">
                <img src="https://imagizer.imageshack.com/img921/9628/VIaL8H.jpg" alt="Banner image">
            </div>
            <div id="profile-d">
                <div id="profile-pic">
                    <img src= <?php echo $userimage; ?> >    
                </div>
                <div id="u-name"> <?php echo $name; ?></div>
            </div>
            <div id="black-grd"></div>
        </div>
        <div id="main-content">
            <div class="tb">
                <div class="td" id="l-col">                   
                    <div class="l-cnt">
                        <div class="cnt-label">
                            <i class="l-i" id="l-i-i"></i>
                            <span>Info</span>

                            <div class="lb-action"><i class="material-icons"><a href="edit_info.php">Edit account info </a></i></div>
                        </div>
                        <div id="i-box">
                            <div id="intro-line"><?php echo $userinfo; ?> </div>                                      
                        </div>
                    </div>
                     <div class="l-cnt l-mrg">
                        <div class="cnt-label">
                            <i class="l-i" id="l-i-p"></i>
                            <span>Skills</span>
                        </div>
                        <div id="i-box">
                            <div >
                               <?php echo $userskills; ?>
                            </div>
                        </div>
                    </div>
                    <div class="l-cnt l-mrg">
                        <div class="cnt-label">
                            <i class="l-i" id="l-i-p"></i>
                            <span>Bio</span>
                        </div>
                        <div id="i-box">
                            <div >
                               <div id="intro-line"><?php echo $userbio; ?></div>
                               
                            </div>

                        </div>
                    </div>      
                </div>
                <div class="td" id="m-col">
                  
                    <div class="m-mrg" id="composer">
                        
                        <div id="c-c-main">
                            <div class="tb">
                               
                                <div class="td" id="p-c-i"><img src= <?php echo $userimage; ?> ></div>
                                <div class="td" id="c-inp">
                                   <form action="profilepage.php" method="post">     
                                   <input type="text" name="post" id="post" placeholder="What's on your mind?" value=""> 
                                        <br><br>
                                    </div>
                                    <br><br><input type="submit" name="btn" id="btn" value="post">
                                 </form>
                            </div>
                            
                        </div>
                    </div>
                    <div>

                        <?php
                       
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


                                               $q2=mysqli_query($con,"SELECT * FROM `posts` WHERE user_id='$userid' " );
                                               if ($q2)
                                                {
                                                     while($row2=mysqli_fetch_array($q2))
                                                       { 

                                                          echo "<div class='post'>
                                                            <div class='tb'>
                                                              <a href='#' class='td p-p-pic'><img src=". $userimage."></a>
                                                                <div class='td p-r-hdr'>
                                                                    <div class='p-u-info'>
                                                                        <a href='#'><?php echo $name ?></a> shared a post
                                                                    </div>
                                                                    <div class='p-dt'>
                                                                   
                                                                  
                                                
                                                                         <i class='material-icons'>calendar_today</i>
                                                                        <span>". $row2['hour'].":".$row2['minute']." ".$row2['day'] .",".$row2['month']. "," . $row2['year']. "</span>
                                                                    </div>
                                                                </div>
                                                               
                                                              </div>
                                                              <a href='#' class='p-cnt-v'>
                                                              
                                                              <p>".$row2['post_desc']."<br> </p>
                                                              <p> ";    
                                                            echo "<a href='profilepage.php?new_id=".$row2["id"]."'>Like</a>"."      ";
                                                              echo "<a href='comment.php?new_id=".$row2["id"]."'>comment</a><br>";
                                                            echo "<form name='formName' method='post'>
                                                               <input type='text' id='likebtn' value='# of likes: ".$row2["like"]. " ' >  


                                                             
                                                              
                                                              </form>";
                                                              echo " </p> </a> </div>";   
                   
                                                        }                        
                                               }
                                               else
                                                {   
                                                  die ("can't insert post in db".mysqli_error($con));             
                                                } 
                                             
                                   }           
                               } 
                        }

                         
                        mysqli_close($con);

                         if (isset($new_post) && isset($_POST['btn']))
                            {
                                 
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
                                                $mydate=getdate(date("U"));
                                                $q2=mysqli_query($con,"INSERT INTO `posts` (`user_id`, `post_desc`,`like`,`share`,`year`,`month`,`day`,`hour`,`minute`)
                                                 VALUES ('$userid', '$new_post','0','0', '$mydate[year]','$mydate[mon]','$mydate[mday]','$mydate[hours]','$mydate[minutes]') ");

                                                if ($q2)
                                                {
                                                    echo "<div class='post'>
                                                            <div class='tb'>
                                                              <a href='#' class='td p-p-pic'><img src=".$userimage ."></a>
                                                                <div class='td p-r-hdr'>
                                                                    <div class='p-u-info'>
                                                                        <a href='#'><?php echo $name ?></a> shared a post
                                                                    </div>
                                                                    <div class='p-dt'>
                                                                        <i class='material-icons'>calendar_today</i>
                                                                        <span>".$mydate[hours] . ":" . $mydate[minutes] ." " . $mydate[mday] .",".$mydate[mon]. "," . $mydate[year] ."</span>
                                                                    </div>
                                                                </div>
                                                               
                                                              </div>
                                                              <a href='#' class='p-cnt-v'>
                                                              
                                                              <p>".$new_post ."<br> </p>
                                                              <p> <form method='post'>";

                                                              echo "<a href='profilepage.php?new_id=".$row2["id"]."'>Like</a><br>";
                                                               echo "<a href='comment.php?new_id=".$row2["id"]."'>comment</a><br>";
                                                              echo $row2["like"].
                                                              //echo "<input type='text' id='comm' value='' placeholder='comment'>
                                                              // <input type='button' id='combtn' value='comment' >;
                                                             " </form> 
                                                              </p>
                                                              
                                                              </a>
                                                           
                                                             </div>";   
                                                    
                                                    mysqli_close($con);

                                                  
                                                 
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
                                   
                            }
                        ?>


                    </div>
                 
                </div>

            </div>
        </div>
      





<?php

$news_id=$_GET["new_id"]; 
//echo $news_id;
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


<?php

$comment=$_POST['comm'];
if (isset($comment)&&isset($_POST['combtn']))
{
               $con=mysqli_connect("localhost","root","","facebook_db");
                if ($con)
                {
                
                    $q=mysqli_query($con,"SELECT id FROM `posts` WHERE post_desc='$new_post'  ");
                    if($q)
                    {
                    
                        while($row=mysqli_fetch_array($q))
                        { 
                            //echo $row["id"]."<br>";
                            $postid = $row["id"];
                            $counter++;
                            echo $counter;
                            $q2=mysqli_query($con,"INSERT INTO `comment` (`id`, `post_id`, `comment_des`) VALUES (NULL, '$postid', '$comment')" );

                            if ($q2)
                            {
                               // echo " the post is inserted to database";
                                mysqli_close($con);
                            }
                            else
                            {     die ("can't insert post in db".mysqli_error($con));
                               
                            } 
                        }           
                    } 
                }
}




?>