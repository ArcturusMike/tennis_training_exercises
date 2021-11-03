<!DOCTYPE html>
<html>
<head>
    <title>Changes complete</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">
    <style>
        body {
            font-size: 15pt;
        }
    </style>
</head>
<body>
<?php
    require "connection.php";
   
    if ($_POST['password'] == "tennis") {
        $category = $_POST['category'];
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $videolink = $_POST['videolink'];

        $input = "UPDATE exercises SET category='$category', name='$name', description='$description', videolink='$videolink' WHERE id=$id;";

        $query = mysqli_query($db, $input) or die(mysqli_error($db));

        echo "Changed.";
    }
    else {
        echo "Wrong Password!";
    }
    
?>
</body>
</html>