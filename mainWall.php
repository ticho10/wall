<?php
session_start();
//Checken of de gebruiker verdwaald is
    if (!isset($_SESSION['userid'])){
        if (!isset($_COOKIE['userid'])){
            header('Location: uitlogpoort.php');
        }else{
            require ('cookieCheck.php');
            $_SESSION['userid'] = $_COOKIE['userid'];
            $_SESSION['hash'] = $_COOKIE['hash'];
            $_SESSION['username'] = $_COOKIE['username'];
        }
    }


?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>plaatjes</title>
    <link rel="stylesheet" href="styleWall.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
</head>
<body>
<?php
include('navbar.php');
$username = $_SESSION['username'];


$dbc = mysqli_connect('localhost', 'ticho', 'BOIPLOF' , '25030_wall');
$query = "SELECT * FROM plaatjes";

$result = mysqli_query($dbc, $query) or die ('gaat niet goed');
echo '<div class="wrapper">';

//Hier komen de images met een modal
echo '<div class="row">';
if (mysqli_num_rows($result) > 0){
$first = 0;
while ($row = mysqli_fetch_array($result)){

    $id = $row['id'];
    $locatie = $row['locatie'];
    $naam = $row['naam'];
    $naam = htmlentities($naam,ENT_QUOTES,'utf-8');
    $des = $row['descriptie'];
    $des = htmlentities($des,ENT_QUOTES,'utf-8');
    if ($first++<1){

    }
    echo '<div class="column">';
    echo '<img class="myImg" src="' . $locatie . '" alt="Title: ' . $naam . '<br>Description:<br>' . $des . '<br> <a href=delete.php?id=' . $id . '&locatie=' . $locatie . '>DELETE</a> --- <a href=edit.php?id=' . $id . '&naam=' . $naam .'&descriptie=' . $des .'>EDIT  </a>"/>';
    echo '</div>';
}}
echo '</div>';
echo '</div>';
?>
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
</div>
<script src="scriptModalWall.js"></script>
</body>
</html>