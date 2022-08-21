
<table border=2 >
<tr><th>Name</th><th>friend</th></tr>

<?php
session_start();
$email=$_SESSION["Email"];
echo $n . "<br>";
$con=mysqli_connect("localhost","root","","facebook_db");

if($con)
{
    $q=mysqli_query($con,"SELECT Name FROM `users`");
    if($q)
    {
        while($row=mysqli_fetch_array($q))
        {
            echo "<tr>";
            echo "<td>".$row["Name"]."</td>";
            echo "<td><button type='button'>Add Friend</button></td>";
            echo "</tr>";
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

echo "<a href='profilepage.php'> back to profile page </a>";