<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="styleRegister.css">
      <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
  </head>
  <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
  <body>
  <img class="logoAbove" src="img/logo.png" alt="Logo THE WALL Rick en Ticho">
  <div class="wrapper">
    <h1 style="text-align: center;">Register</h1>
    <form method="post" action="process_reg.php">
      <div id="middle">
    <h3>
        <label class="username">Username:<input type="text" name="username" maxlength="20" placeholder="Username" required /></label><br>
        <label class="mail">E-mail:<input type="email" name="mail" maxlength="30" placeholder="JohnDoe@ma-web.nl" required /></label><br>
        <label class="password">Password:<input type="password" name="password1" maxlength="50" placeholder="Password" required /></label><br>
        <label class="password">password:<input type="password" name="password2" maxlength="50" placeholder="Repeat password" required /></label><br>
    </h3>
      <input id="loginButton" type="submit" name="submit" value="Register"/><br>
    </div>
      <div style="text-align: right">
      <b><a id="login" href="index.php">Login</a></b><br>
    </div>
    </form>
  </div>
  </body>
</html>
