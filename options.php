<?php

include('con.php');
$q="select * from candi";
$r=mysqli_query($db,$q);
	echo "<h2>Click on the canditate name to see their manifesto </h2>";
while ($res=mysqli_fetch_array($r)){
	echo "<input type='radio' value='".$res['name']."' name='cr'><a href='files/".$res['manifesto']."' target='_blank'>".$res['name']."</a></input><br>";
}

?>
