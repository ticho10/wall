<?php
$id = $_GET['id'];
$locatie = $_GET['locatie'];

$host = 'localhost';
$username = 'ticho';
$password = 'BOIPLOF';
$dbname = '25030_wall';

$dbc = mysqli_connect($host,$username,$password,$dbname) or die ('error connecting.');

$query = "DELETE FROM plaatjes WHERE id = '$id'";
$result = mysqli_query($dbc,$query) or die ('Error querryng');
unlink($locatie);
header("Location: mainWall.php");
