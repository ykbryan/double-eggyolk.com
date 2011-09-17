<?php
function sqlConnection(){
	$host = "182.50.131.219"; 
	$user ="tengdb";
	$password = "Bryan1986";
	
	$connection = mysql_connect($host, $user, $password) or die(mysql_error());
	return $connection;
}
function selectDB($connection){
	$database = "tengdb";
	mysql_select_db($database,$connection)  or die(mysql_error());
}
function createQuery($query, $connection){
	$res = mysql_query($query,$connection) or die(mysql_error());
	return $res;
}

$conn = sqlConnection();
selectDB($conn);
?>
