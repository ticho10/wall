<?php
session_start();
require('../../private/connectvars.php');

// Checken of de gebruiker verdwaald is
if (!isset($_POST['submit'])){
    header("Location: index.php");
}

// checken of de gebruiker alles heeft ingevuld
if (empty($_POST['username']) OR empty($_POST['password'])){
    echo 'Je bent iets vergeten in te vullen.<br>';
    echo '<a href="index.php"> Klik hier om terug te keren.';
    exit();
}

// Checken of de gebruiker bestaat + kloppend wachtwoord
$query = "SELECT userid, hash, active FROM users WHERE username = ? AND password = ?";
$stmt = $mysqli->prepare($query) or die ('error preparing');
$stmt->bind_param('ss', $username,$password) or die ('error binding params');
$stmt->bind_result($userid,$hash,$active) or die ('error binding results');
$username = $_POST['username'];
$password = $_POST['password'];
$password = hash('sha512',$password) or die ('error hashing');
$stmt->execute()or die ('error executing');
$fetch_succes = $stmt->fetch();

if (!$fetch_succes){
    echo 'Sorry, er is iets mis gegaan.<br>';
    echo '<a href="index.php"> Klik hier om terug te keren.';
    exit();
}else if ($active == 0){
    echo 'Sorry, je account is nog niet geactiveerd. Check je mailbox.<br>';
    echo '<a href="index.php"> Klik hier om terug te keren.';
    exit();
}

//alles in orde
setcookie('userid',$userid,time() + 3600 * 24 * 7);
$_SESSION['userid'] = $userid;
setcookie('hash',$hash,time() + 3600 * 24 * 7);
$_SESSION['hash'] = $hash;
setcookie('username',$username,time() + 3600 * 24 * 7);
$_SESSION['username'] = $username;
header('Location: mainWall.php');

