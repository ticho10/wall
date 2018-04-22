<?php
require('../../private/connectvars.php');

$mail = $_GET['mail'];
$hash = $_GET['hash'];

// Checken of de mail klopt met de hash
$query = "SELECT userid FROM users WHERE mail = ? AND hash = ?";
$stmt = $mysqli->prepare($query) or die('Error preparing for SELECT.');
$stmt->bind_param('ss',$mail,$hash);
$stmt->execute();
$stmt->bind_result($userid);
$row = $stmt->fetch();
if (!$userid){
    echo 'Deze combinatie van mail en hash ken ik niet';
    exit();
}
$stmt->close();

// Account activeren
$query = "UPDATE users SET active = 1 WHERE userid = ?";
$stmt = $mysqli->prepare($query) or die('Error preparing for Update.');
$stmt->bind_param('i',$userid);
$stmt->execute() or die ('Error updating.');
echo 'Je account is geactiveerd.<br>';
echo  '<a href="index.php"> Klik hier om naar de inlog pagina te gaan.';
exit();