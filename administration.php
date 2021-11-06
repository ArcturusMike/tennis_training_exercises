<!DOCTYPE html>
<html>
<head>
    <title>Tennisübungen-Verwaltung</title>
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
        <h1>Exercise administration</h1>
        <div class="row">
            <div class="col-lg-6">
                <h2>Change</h2>
                <form action="change.php" method="POST" target="_blank" autocomplete="off">
                    <div class="form-group">
                        <label for="exercise">Exercise:</label>
                        <select name="exercise" id="exercise" class="form-control" required">
                            <option selected disabled> </option>
                            <?php
                                require "connection.php";
                                $query = "SELECT id,name from exercises ORDER BY name";
                                $erg = mysqli_query($db, $query);
                                while ($exercise = mysqli_fetch_assoc($erg)) {
                                    echo '<option value="' . $exercise["id"] . '">' . $exercise["name"] . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control bg-primary text-white mt-3" value="Input">
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <h2>Deletion</h2>
                <form action="delete.php" method="POST" target="_blank" autocomplete="off">
                    <div class="form-group">
                        <label for="exercise2">Exercise:</label>
                        <select name="exercise" id="exercise2" class="form-control" required>
                            <option selected disabled> </option>
                            <?php
                                require "connection.php";
                                $query = "SELECT id,name from exercises ORDER BY name";
                                $erg = mysqli_query($db, $query);
                                while ($exercise = mysqli_fetch_assoc($erg)) {
                                    echo '<option value="' . $exercise["id"] . '">' . $exercise["name"] . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password2">Password:</label>
                        <input type="password" name="password" id="password2" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control bg-primary text-white mt-3" value="Input">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
