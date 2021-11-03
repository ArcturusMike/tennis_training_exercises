<!DOCTYPE html>
<html>
<head>
    <title>Übungsbearbeitung</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-xl bg-success navbar-dark py-1">
        <a class="navbar-brand" href="index.php">Exercises</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav nav-fill w-100 blockquote">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?category=groundstrokes">Forehand & backhand</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?category=service_return">Service & return</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?category=volley">Volley</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?category=reaction">Reaction</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?category=legs">Legs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?category=warmup">Warm-up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?category=beginning_end">Beginning & End game</a>
                </li>
                <li class="nav-item border-left">
                    <a class="nav-link" href="input.html">Input</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="administration.php">Administration</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container float-left mt-3">
        <h1>Change</h1>
        <form action="change_final.php" method="POST" autocomplete="off">
        <div class="form-group">
            <label for="category">Category:</label>
            <select name="category" id="category" class="form-control" required>
                <option selected disabled> </option>
                <option value="groundstrokes">Forehand & Backhand</option>
                <option value="serve_return">Serve & Return</option>
                <option value="volley">Volley</option>
                <option value="reaction">Reaction</option>
                <option value="legs">Lges</option>
                <option value="warmup">Warm-up</option>
                <option value="beginning_end">Beginning & End game</option>
            </select>
        </div>
        <?php
            require "connection.php";
            $exercise_id = $_POST['exercise'];

            $change = "SELECT id,name,description,videolink FROM exercises WHERE id='$exercise_id'";
            $query_change = mysqli_query($db, $change) or die(mysqli_error($db));
            
            while ($exercise_details = mysqli_fetch_assoc($change)) {
                echo '<div class="form-group">
                <label for="id">ID:</label>
                <input type="number" name="id" id="id" class="form-control" readonly value="' . $exercise_details['id'] . '">
            </div>';
                echo '<div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required value="' . $exercise_details['name'] . '">
            </div>';
                echo '<div class="form-group">
                <label for="description">description:</label>
                <textarea name="description" id="description" class="form-control" rows="10" required>' . $exercise_details['description'] . '</textarea>
            </div>';
                echo '<div class="form-group">
                <label for="videolink">Videolink:</label>
                <input type="text" name="videolink" id="videolink" class="form-control" value="' . $exercise_details['videolink'] . '">
            </div>';
            }
        ?>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control bg-primary text-white" value="Input">
        </div>
    </form>
    </div>
</body>
</html>