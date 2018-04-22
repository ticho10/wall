<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Avatar upload</title>
    <link href="avatarEdit.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
</head>
<body><div class="wrapper">
<form action="processAvatar.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="2500000">
    <input type="file" name="userimage" accept="image/*" onchange="preview_image(event)"><br>
    <img class="preview" src="" id="output_image"/><br>
    <input type="submit" name="submit" value="upload image">
</form>
<br>
<a href="mainWall.php">klik hier voor THE WALL</a>
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