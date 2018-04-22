<?php
//    Checkkenb of de userid en de hash een match zijn in de DB
require ('../../private/connectvars.php');
$query = "SELECT userid FROM users WHERE userid = ? AND hash = ?";
$stmt = $mysqli->prepare($query) or die ('error preparing');
$stmt->bind_param('is', $userid,$hash) or die ('error binding params');
$stmt->bind_result($userid) or die ('error binding results');
$userid = $_COOKIE['userid'];
$hash = $_COOKIE['hash'];
$stmt->execute()or die ('error executing');
$fetch_succes = $stmt->fetch();

if (!$fetch_succes){
header('Location: uitlogpoort.php');
}