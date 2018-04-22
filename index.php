<?php

session_start();

if (isset($_COOKIE['userid'])OR isset($_SESSION['userid'])){
    header('Location: mainWall.php');
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inloggen</title>
    <link rel="stylesheet" href="styleLogin.css">
      <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
  <img class="logoAbove" src="img/logo.png" alt="Logo THE WALL Rick en Ticho">
    <div class="wrapper">
      <h1 style="text-align: center">Inloggen</h1>
      <form class="login" action="inlogpoort.php" method="post">
        <div class="middle">
          <h3>
          <label id="username">
          Username:
          <input class="input" type="text" name="username" value="" autofocus maxlength="20" placeholder="Username">
        </label>
          <label id="password">
          Password:
          <input class="input" type="password" name="password" value="" maxlength="50" placeholder="Password">
          </label>
          </h3>
          <input class="loginButton" type="submit" name="submit" value="Login">
        </div>
        <div id="other">
        <b><a id="forgot" href="">Forgot password</a></b>
        <b><a id="create" href="registreren.php">Create account</a></b>
      </div>
      </form>
    </div>

  </body>
</html>
