<?php
session_start();
if (!isset($_SESSION["id"]))
	header("location:signin.html");
include('con.php');

$q1="select * from login";
$res1=mysqli_query($db,$q1);
while($r1=mysqli_fetch_array($res1)){
	if ($r1['voted']==0){
		echo "All students havent voted yet";
		break;
	}
}
$q2="select * from candi order by(vote) desc";
$res2=mysqli_query($db,$q2);
echo "<table>";
echo "<tr><th>Name</th><th>Votes</th></tr>";
while($r2=mysqli_fetch_array($res2)){
	
	echo "<tr>";
	echo "<td>".$r2['name']."</td>";
	echo "<td>".$r2['vote']."</td>";
	echo "</tr>";

}
	echo "</table>";
	
?>
