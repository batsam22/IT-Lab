<?php
session_start();
if (!isset($_SESSION["id"]))
	header("location:signin.html");
include('con.php');
?>
<html>
<head>
<title> Admin</title>
<script>
var ajaxRequest = new XMLHttpRequest();
var ajaxobject = new XMLHttpRequest();
function ajaxResponse()
{
	if (ajaxRequest.readyState != 4)
		return;
	else {
		if (ajaxRequest.status == 200)
		{
			document.getElementById("result").innerHTML = ajaxRequest.responseText;
		}
		else {
			alert("Request failed: " + ajaxRequest.statusText);
		}
	}
}
function results()
{
	if (!ajaxRequest) {
		document.getElementById("op").innerHTML = "Request error!";
		return;
	}
	var myURL = "result.php";
				
	ajaxRequest.onreadystatechange = ajaxResponse;
	ajaxRequest.open("GET", myURL);
	ajaxRequest.send(null);
}
function ajaxResponse1()
			{
	if (ajaxobject.readyState != 4)
		return;
	else {
		if (ajaxobject.status == 200)
		{
			document.getElementById("op").innerHTML = ajaxobject.responseText;
		}
		else {
			alert("Request failed: " + ajaxobject.statusText);
		}
	}
}
function options()
{
	if (!ajaxRequest) {
		document.getElementById("op").innerHTML = "Request error!";
		return;
	}
	var myURL = "o.php";
			
	ajaxobject.onreadystatechange = ajaxResponse1;
	ajaxobject.open("GET", myURL);
	ajaxobject.send(null);
}

</script>
</head>

<body>
<?php

echo "<form action='upload.php' method='post' enctype='multipart/form-data'>";
echo "<p><input type='text' name='name' placeholder='name' required /></p>";
echo "<p><input type='number' name='section' placeholder='section' required /></p>";
echo "<p><input type='file' name='manifesto' placeholder='Attach the Candidates manifesto' required /></p>";
echo "<p><input type='submit' value='Confirm' /></p>";
echo "</form>";

echo "<button onclick='options()'>Show candidates</button>";
echo "<div id='op'>";
echo "</div>";

echo "<button onclick='results()'>Get Results</button>";
echo "<div id='result'>";
echo "</div>";

?>
</body>
</html>
