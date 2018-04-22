<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="styleUpload.css" rel="stylesheet">
    <title>image upload</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />

</head>
<body>
<div class="wrapper">
<form action="processImageUpload.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="500000">
    <input type="file" name="userimage" accept="image/*" onchange="preview_image(event)"><br>
    <img class="preview" src="" id="output_image"/>
    <input name="naam" placeholder="Titel"><br>
    <label><textarea name="descriptie" rows="4" cols="50"></textarea></label><br>

    <input type="submit" name="submit" value="upload image">
</form>
<br>
<a href="mainWall.php">Klik hier om terug te gaan naar de WALL</a>
</div>
<script>
    function preview_image(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('output_image');
            output.src = reader.result;
            output.style.display="block";
        };
        reader.readAsDataURL(event.target.files[0]);
    }



</script>
</body>
</html>