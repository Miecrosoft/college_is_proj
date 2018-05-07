<?php
session_start();
include_once "../along.php";

$LinkID = $_GET['LinkID'];
$LinkID = stripslashes($LinkID);
$LinkID = mysql_real_escape_string($LinkID);

if(empty($_SESSION['username'])){
	header('location: /login');
}

$query = mysql_query("SELECT * FROM proposal WHERE id = '$LinkID'");
$getdat = mysql_fetch_assoc($query);
$dir = '../proposal/';
$filepro = $getdat['filepro'];

$hapus = unlink($dir.$filepro);

if($hapus){
	mysql_query("DELETE FROM proposal WHERE id = '$LinkID'");
	header('location: /listproposal');
}
?>