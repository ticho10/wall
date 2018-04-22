<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit data</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
    <link href="editStyle.css" rel="stylesheet">
</head>
<body>
<?php
$id = $_GET['id'];
$naam = $_GET['naam'];
$des = $_GET['descriptie'];

echo "<h2>You can now edit:<br>$naam </h2>"
?>
<div class="wrapper">
<form method="get" action="verwerk_edit.php">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <label class="input">Naam:
    <input name="naam" value="<?php echo $naam; ?>"></label><br>
    <label>Descriptie:
        <textarea name="descriptie" rows="4" cols="50"><?php echo $des; ?></textarea></label><br>

    <input type="submit" name="submit" value="go">
</form>
</div>
</body>
</html>
