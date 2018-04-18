<?php

/*echo "<input type='radio' value='ABC' name='cr'>ABC<br>";
echo "<input type='radio' value='XYZ' name='cr'>XYZ<br>";
echo "<input type='radio' value='PQR' name='cr'>PQR<br>";
*/
include('con.php');
$q="select * from candi";
$r=mysqli_query($db,$q);
while ($res=mysqli_fetch_array($r)){
	echo "<input type='radio' value='".$res['name']."' name='cr'>". $res['vote']." ".$res['name']."</input><br>";
}

?>
