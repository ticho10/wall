<?php
require('../../private/connectvars.php');

//Hoort de bezoer er te zijn?
if(!isset($_POST['submit'])){
    header("Location: registreren.php");
}

//alles ingevuld?
if (empty($_POST['username']) OR empty($_POST['mail']) OR empty($_POST['password1']) OR empty($_POST['password2'])){
    echo 'Je bent vergeten iets in te vullen <br>';
    echo '<a href="registreren.php"> Klik hier om terug te keren.';
    exit();
}

// zijn alle wachtwoorden gelijk?
if ($_POST['password1'] != $_POST['password2']){
    echo 'Je hebt 2 verschillende wachtwoorden getypt.<br>';
    echo '<a href="registreren.php"> Klik hier om terug te keren.';
    exit();
}

// heeft de gebruiker een ma-adres?
$position = strpos($_POST['mail'],'@ma-web.nl');
if(!$position){
    echo 'Dit is geen Media College mail.<br>';
    echo '<a href="registreren.php"> Klik hier om terug te keren.';
    exit();
}

// Bestaat deze user al?
$query = "SELECT userid FROM users WHERE username = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('s',$username);
$username = $_POST['username'];
$result = $stmt->execute() or die ('Error querying username.');
$row = $stmt->fetch();
if ($row){
    echo 'Sorry, maar deze username is al in gebruik.<br>';
    echo '<a href="registreren.php"> Klik hier om terug te keren.';
    exit();
}

// Bestaat deze mail al?
$query = "SELECT userid FROM users WHERE mail = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('s',$mail);
$mail = $_POST['mail'];
$result = $stmt->execute() or die ('Error querying mail.');
$row = $stmt->fetch();
if ($row){
    echo 'Sorry, maar deze mail is al in gebruik.<br>';
    echo '<a href="registreren.php"> Klik hier om terug te keren.';
    exit();
}

// Gebruiker toevoegen aan de database
$query = "INSERT INTO users VALUES (0,?,?,?,?,0)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('ssss', $username,$mail,$hash,$password);
$username = $_POST['username'];
$mail = $_POST['mail'];
$random_number = rand(0,1000000);
$hash = hash('sha512',$random_number);
$password = hash('sha512',$_POST['password1']);
$result = $stmt->execute() or die('Error inserting');

// voor profiel foto
$query = "INSERT INTO avatar VALUES(0,?,?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('ss', $username,$locatie);
$locatie = 'avatar/' . $username . '.png';
$result = $stmt->execute() or die('Error inserting profiel foto');

//mail sturen naar user
echo 'Je hebt een mail gekregen.';
$to = $mail;
$subject = 'Verifieer je accout bij THE WALL';
$message = 'Klik op de volgende link om je account te activeren: ';
$message .= '25030.hosts.ma-cloud.nl/wall/verify.php?mail=' . $mail . '&hash=' . $hash;
$headers = 'From: 25030@THEWALL.nl';
mail($to,$subject,$message,$headers) or die ('Error mailing');






