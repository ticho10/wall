<?php
$id = $_GET['id'];
$naam = $_GET['naam'];
$des = $_GET['descriptie'];

$host = 'localhost';
$username = 'ticho';
$password = 'BOIPLOF';
$dbname = '25030_wall';

$dbc = mysqli_connect($host,$username,$password,$dbname) or die ('error connecting.');
$query = "UPDATE plaatjes ";
$query .= "SET naam = '$naam', descriptie = '$des' ";
$query .= "WHERE id = '$id'";
$result = mysqli_query($dbc,$query) or die ('Error Updating');
header("Location: mainWall.php");
