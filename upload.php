<?php
session_start();
if (!isset($_SESSION["id"]))
	header("location:signin.html");
include('con.php');

$name=$_POST['name'];
$section=$_POST['section'];
$file=$_FILES['manifesto']['name'];

$q="insert into candi(name,section,manifesto) values ('$name',$section,'$file')";
$res=mysqli_query($db,$q);

$dest="files/".$file;
move_uploaded_file($_FILES['manifesto']['tmp_name'],$dest);

header("location:admin.php");


?>
