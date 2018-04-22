<?php
session_start();
$dbc = mysqli_connect('localhost', 'ticho', 'BOIPLOF' , '25030_wall') or die('error connecting');
$_SESSION['username'] = $_COOKIE['username'];
$username = $_SESSION['username'];
$_SESSION['userid'] = $_COOKIE['userid'];
$userid = $_SESSION['userid'];


$temp_location2 = explode( $username, $_FILES['userimage']['name']);


$newfilename = $username . end($temp_location2);

$target_location2 = 'avatar/' . $username . '.' . pathinfo($_FILES['userimage']['name'],PATHINFO_EXTENSION);

$username2 = '';

if ($_FILES['userimage']['size'] < 2500000)
{
    $result = move_uploaded_file($_FILES["userimage"]["tmp_name"], $target_location2);
} else {
    echo "doe ff normaal denk je het is gratis";
}
var_dump($result);
if ($result){

    $query = "SELECT username FROM avatar" or die('error conecting');

    $result = mysqli_query($dbc, $query) or die ('gaat niet goed');
    $row = mysqli_fetch_array($result);
    foreach ($row as $username2){

    }
    var_dump($username2);
    if ($username == $username2){
        $query = "UPDATE avatar SET username=$username WHERE locatie=$target_location2" or die('error query');
        $result = mysqli_query($dbc, $query) or die ('result');

        mysqli_close($dbc);
      header("Location: mainWall.php");
    }
}


