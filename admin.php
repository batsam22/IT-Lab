<?php
session_start();
if (!isset($_SESSION["id"]))
	header("location:signin.html");

include('con.php');
$q="select * from candi order by(vote) desc";
$res=mysqli_query($db,$q);
echo "<table>";
echo "<tr><th>Candidate</th><th>Votes</th></tr>";
while ($r=mysqli_fetch_array($res))
{
	echo "<tr>";
	echo "<td>".$r['name']."</td><td>".$r['vote']."</td>";
	echo "</tr>";
}
echo "</table>";
?>
