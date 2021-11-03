<!DOCTYPE html>
<html>
<head>
    <title>Input completed</title>
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
        $name = $_POST['name'];
        $description = $_POST['description'];
        $videolink = $_POST['videolink'];

        $input = "INSERT INTO exercises(category,name,description,videolink) VALUES ('$category','$name','$description','$videolink')";

        $query = mysqli_query($db, $input) or die(mysqli_error($db));

        echo "Updated.";
    }
    else {
        echo "Wrong Password!";
    }
    
?>
</body>
</html>