<?php

include('con.php');
$q="select * from candi";
$r=mysqli_query($db,$q);
while ($res=mysqli_fetch_array($r)){
	echo "<a href='files/".$res['manifesto']."' target='_blank'>".$res['name']."</a><br>";
}

?>
