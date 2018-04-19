<?php
session_start();
if (!isset($_SESSION["id"]))
	header("location:signin.html");
include('con.php');


echo "<form action='upload.php' method='post' enctype='multipart/form-data'>";
echo "<p><input type='text' name='name' placeholder='Enter the Candidates name' required /></p>";
echo "<p><input type='number' name='section' placeholder='Enter the Candidates section' required /></p>";
echo "<p><input type='file' name='manifesto' placeholder='Attach the Candidates manifesto' required /></p>";
echo "<p><input type='submit' value='Confirm' /></p>";
echo "</form>";




//$q="select * from candi order by(vote) desc";
//$res=mysqli_query($db,$q);
//echo "<table>";
//echo "<tr><th>Candidate</th><th>Votes</th></tr>";
//while ($r=mysqli_fetch_array($res))
//{
//	echo "<tr>";
//	echo "<td>".$r['name']."</td><td>".$r['vote']."</td>";
//	echo "</tr>";
//}

//echo "</table>";
?>
