<?php
$id=$_POST['id'];
$pass=$_POST['password'];
$db=mysqli_connect("localhost","root","tiger","it");
$q="select * from login where id='$id'";
$res=mysqli_query($db,$q);
while ($r=mysqli_fetch_array($res)){
	if ($pass==$r['password']){
		session_start();
		$_SESSION['id']=$id;
		header("location:vote.php");
	}
	else{
		echo "incorrect password";
	}
}
?>
