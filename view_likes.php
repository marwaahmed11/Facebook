
<?php
$news_id=$_GET["new_id"]; 


if (isset($news_id) && is_numeric($news_id))
{
        $con=mysqli_connect("localhost","root","","facebook_db");
        if ($con)
        {
            $q=mysqli_query($con,"SELECT * FROM `posts` WHERE `id` =$news_id");
            if ($q)
            {
                
                $row=mysqli_fetch_array($q);
                
                echo $row["like"]."<br><br>";
                mysqli_close($con);
                echo "<br><br><br><a href='profilepage.php'>back</a>";
                        
            }
            else
            {
                echo "not selected";
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