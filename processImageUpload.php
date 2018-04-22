<?php
$temp_location = $_FILES['userimage']['tmp_name'];
$target_location = 'images/' . time() . $_FILES['userimage']['name'] ;
$naam = $_POST['naam'];
$descriptie = $_POST['descriptie'];

if ($_FILES['userimage']['size'] < 500000)
{
    $result = move_uploaded_file($temp_location, $target_location);


} else {
    echo "doe ff normaal denk je het is gratis";
}

if ($result){
    $dbc = mysqli_connect('localhost', 'ticho', 'BOIPLOF' , '25030_wall');
    $query = "INSERT INTO plaatjes VALUES (0, '$naam', '$descriptie', '$target_location')";
    $result = mysqli_query($dbc, $query);

    mysqli_close($dbc);
}
header('Location: mainWall.php');

