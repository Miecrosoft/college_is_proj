<?php
session_start();
include_once "../along.php";

$LinkID = $_GET['LinkID'];
$LinkID = stripslashes($LinkID);
$LinkID = mysql_real_escape_string($LinkID);

if(empty($_SESSION['username'])){
	header('location: /login');
}

$query = mysql_query("SELECT * FROM komentar WHERE id = '$LinkID' ");
$getdat = mysql_fetch_assoc($query);

if($_SESSION['admin'] == 1 OR $_SESSION['kordas'] == 1){
	mysql_query("DELETE FROM komentar WHERE id = '$LinkID'");
	header('location: /viewberita/'.$getdat['id_news']);
}
?>