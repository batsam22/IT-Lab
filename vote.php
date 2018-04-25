<?php
session_start();
if (!isset($_SESSION["id"]))
	header("location:signin.html");
?>

<html>
	<head>
		<title>ajax</title>

		<script>
		
			var ajaxRequest = new XMLHttpRequest();
			var ajaxobject = new XMLHttpRequest();
			var click=0;
			function ajaxResponse1()
			{
				if (ajaxRequest.readyState != 4)
					return;
				else {
					if (ajaxRequest.status == 200)
					{
						document.getElementById("op").innerHTML = ajaxRequest.responseText;
					}
					else {
						alert("Request failed: " + ajaxRequest.statusText);
					}
				}
			}
			function ajaxResponse()
			{
				if (ajaxobject.readyState != 4)
					return;
				else {
					if (ajaxobject.status == 200)
					{
						document.getElementById("res").innerHTML = ajaxobject.responseText;
					}
					else {
						alert("Request failed: " + ajaxobject.statusText);
					}
				}
			}
			function getList()
			{

				if (!ajaxRequest) {
					document.getElementById("op").innerHTML = "Request error!";
					return;
				}
				var myURL = "options.php";
				
				ajaxRequest.onreadystatechange = ajaxResponse1;
				ajaxRequest.open("GET", myURL);
				ajaxRequest.send(null);
			}
			function conf()
			{
				//var x = confirm("Are you sure about your candidate?");
				
				var oper = document.getElementById("op").elements["cr"].value;
				//document.getElementById("res").innerHTML="You just voted for "+oper;
				ajaxobject.onreadystatechange = ajaxResponse;
				ajaxobject.open("GET", "voting.php?vote="+oper);
				ajaxobject.send(null);
				
			}
			function change()
			{
				click++;				
//				document.getElementById("p").innerHTML=(click%2);				
				
				if ((click%2)==0){
					document.getElementById('op').style.backgroundColor= "#0000FF";
					document.getElementById('res').style.backgroundColor= "#FF0000";
					document.getElementById('bod').style.backgroundColor= "#00FF00";
					document.getElementById('op').style.color= "#FFFFFF";
					document.getElementById('res').style.color= "#000000";
				}
				else{
					document.getElementById('op').style.backgroundColor= "#FF0000";
					document.getElementById('res').style.backgroundColor= "#0000FF";
					document.getElementById('res').style.color= "#FFFFFF";
					document.getElementById('op').style.color= "#000000";
					document.getElementById('bod').style.backgroundColor= "rgb(234, 166, 255)";			
				}
			}	

		</script>
		<style>
			body{
			text-align:center;
			}
			div{
			padding:5%;
			margin-left: 30%;
			margin-right: 30%;
			}
			form{
			padding:5%;
			margin-left: 30%;
			margin-right: 30%;
			}
			a{
			color:#ffea00;
			text-decoration:none;
			}
		</style>
	</head>
	<body id="bod">

			<h1>List of Candidates for the post of CR</h1>
			<p><b>Getting the list from the server</b></p>
			<button onclick="getList()">List of candidates</button> <button onclick="change()">Change color</button>
			<form id="op">
				<div class="options" id="o">
				</div>
			
			</form>
			<button  onclick="conf()"> Confirm </button>
			<div class="result" id="res">
			</div>
			<p id ="p"></p>
			<h1>
<a href="logout.php">Log out</a></h1>
	</body>
</html>
