<!DOCTYPE html>
<html>
<head>
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
    <div class="container-fluid mt-3">
        <?php
            require "connection.php";
            $category = $_GET['category'];
            if (isset($category) == false) {
                $query = "SELECT * from exercises ORDER BY name";
            }
            else {
                $query = "SELECT * from exercises WHERE category='$category' ORDER BY name";
            }
           
            $erg = mysqli_query($db, $query);

            // set head line depending on the category
            echo "<h1>";
            if ($category == "groundstrokes") {
                echo "Forehand & backhand";
                echo '<script>document.title = "' . 'Forehand & backhand' . '"</script>';
            }
            elseif ($category == "serve_return") {
                echo "Serve & return";
                echo '<script>document.title = "' . 'Serve & return' . '"</script>';
            }
            elseif ($category == "volley") {
                echo "volley";
                echo '<script>document.title = "' . 'volley' . '"</script>';
            }
            elseif ($category == "reaction") {
                echo "Reaction";
                echo '<script>document.title = "' . 'Reaction' . '"</script>';
            }
            elseif ($category == "legs") {
                echo "Legs";
                echo '<script>document.title = "' . 'Legs' . '"</script>';
            }
            elseif ($category == "warmup") {
                echo "Warm-up";
                echo '<script>document.title = "' . 'Warm-up' . '"</script>';
            }
            elseif ($category == "beginning_end") {
                echo "Beginning & ending";
                echo '<script>document.title = "' . 'Beginning & ending' . '"</script>';
            }
            else {
                echo "All exercises";
                echo '<script>document.title = "' . 'Tennis exercises' . '"</script>';
            }
            echo "</h1>";                
            
            echo "<div class='table-responsive-lg'>";
            echo "<table class='table col-lg-10'>";
            while ($exercise = mysqli_fetch_assoc($erg)) {
                if ($exercise["videolink"] != "") {
                    echo "<tr><td><h2>" . $exercise['name'] . "</h2>";
                    echo nl2br($exercise['description']) . "</td>";
                    echo '<td><iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/' . substr($exercise['videolink'], 17) . '" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>';
                    echo "</tr>";
                }
                else {
                    echo "<tr><td><h2>" . $exercise['name'] . "</h2>";
                    echo nl2br($exercise['description']) . "</td>";
                    echo '<td></td>';
                    echo "</tr>";
                }
            }
            echo "</table></div>";
        ?>
    </div>
</body>
</html>