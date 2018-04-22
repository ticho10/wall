
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>navbar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      ul{
        width: 100%;
      }
      .navbar {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #00FFFF;
      }
      .navbarLeft {
        float: left;
      }
      .navbarRight{
        float: right;
      }
      .navbar .hover{
        display: inline-block;
        float: left;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
          transition: 2s;
      }
      .navbar .hover:hover {
        background-color: #111;
      }
      .navbar .kip{
          display: inline-block;
          float: left;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
      }
      body{
        padding: 0;
        margin: 0;
      }
      .avatar{
        float: right;
        border-radius: 100px;
        border-style: solid;
        width: 125px;
        height: 125px;
      }
      .logo{
        display: inline-block;
        margin-right: auto;
        margin-left: 30%;
        width: 125px;
        height: auto;
        transition: 100s;
        text-align: center;
      }
      .logo:hover{
        transform: rotate(18000deg);
      }
      header{
        background-image: url("img/wall1.jpg");
      }

      .naam{
          font-size:50px;
          margin-top:10em;
          margin-left: 5px;
          display: inline;
          color: snow;
          transition: 5s;
      }
      .naam:hover{
          color: #00FFFF;
          cursor: default;
      }
    </style>
  </head>
  <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
  <body>
  <?php
  $username = $_SESSION['username'];
  $username = htmlentities($username,ENT_QUOTES,'utf-8');
  $dbc = mysqli_connect('localhost', 'ticho', 'BOIPLOF' , '25030_wall');
  $query = "SELECT * FROM avatar";

  $result = mysqli_query($dbc, $query) or die ('gaat niet goed');
  while ($row = mysqli_fetch_array($result)){
  $id = $row['userid'];
  $usernamedb = $row['username'];
  $locati = $row['locatie'];}
  ?>
    <header>
        <?php
      echo '<h1 class="naam">' . $username . '</h1>'
      ?>
        <img class="logo" src="img/logo.png" alt="Logo THE WALL Rick en Ticho">
      <?php
      if ($usernamedb == $username) {
          echo '<a href="avatarEdit.php"> <img class="avatar" src="' . $locati . '?>" alt=""/></a>';
      }else {
          echo '<a href="avatarEdit.php"> <img class="avatar" src="avatar/avatar.png" alt=""/></a>';
      }
      ?>
    </header>
    <form>
    <ul class="navbar">
      <li class="navbarleft"><a class="kip">
        <label>
        <select name="catogorie">
        <option disabled selected value="catogorie">Catogorie</option>
        <option value="games">Games</option>
        <option value="sport">Sport</option>
        <option value="cars">Cars</option>
        <option value="animals">Animals</option>
        </select></label>
      </a></li>
      <li class="navbarleft"><a class="kip">
        <label>
        <select name="extra">
          <option value="new">Newest</option>
          <option value="old">Oldest</option>
        </select></label>
      </a></li>
      <li class="navbarLeft"><a class="kip"><input type="text" name="search" placeholder="Search" /></a></li>
      <li class="navbarRight"><a class="hover" href="imageUpload.php">Upload</a></li>
      <li class="navbarRight"><a class="hover" href="uitlogpoort.php">Logout</a></li>
    </ul>
  </form>

  </body>
</html>
