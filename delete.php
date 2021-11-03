<!DOCTYPE html>
<html>
<head>
    <title>Deletion complete</title>
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
        $exercise_id = $_POST['exercise'];
        $input = "DELETE FROM exercises WHERE id=$exercise_id";
        $query = mysqli_query($db, $input) or die(mysqli_error($db));
        echo "Exercise deleted.";
    }
    else {
        echo "Wrong password!";
    }
    
?>
</body>
</html>