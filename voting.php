<?php
session_start();
if (!isset($_SESSION["id"]))
	header("location:signin.html");

include('con.php');

$id=$_SESSION["id"];
$name=$_GET['vote'];
$q="select * from login where id = '$id'";
$res=mysqli_query($db,$q);
while ($r=mysqli_fetch_array($res)){
	if($r['voted']==0){
		$q1="select * from candi where name = '$name'";
		$res1=mysqli_query($db,$q1);
		$r1=mysqli_fetch_array($res1);
		$vote=$r1['vote']+1;
		$q2="update candi set vote = $vote where name ='$name'";
		$res2=mysqli_query($db,$q2);
		$q3="update login set voted = 1 where id = '$id'";
		$res2=mysqli_query($db,$q3);
		echo "You have voted for ".$name;
	}
	else
		echo "You have already voted";
}
?>
