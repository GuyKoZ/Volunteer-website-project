<?php require_once('classes/init.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="icon" type="image/x-icon" href="../pics/favicon.ico">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a id="ROI" class="navbar-brand" href="../homepage.php"><i class="fas fa-seedling mr-3"></i>ROI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link pl-5 pr-5" href="../homepage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-5 pr-5" href="plants.php">Our Plants</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link pl-5 pr-5" href="buy.php">Buy Now</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link pl-5 pr-5" href="articles.php">Articles</a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link pl-5 pr-5" href="faq.html">FAQ</a>
                </li> -->
                
                <?php
                global $session;
                if ($session->signed_in==false){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link pl-5 pr-5" href="login.php">Log in / Sign up</a>
                    </li>
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link pl-5 pr-5" href="signup.php">Register</a>-->
<!--                    </li>-->
                <?php
                }
                    else{
                ?>
                <li class="nav-item">
                    <a class="nav-link pl-5 pr-5" href="login.php">Hello, <?php echo $session->firstname ?> </a>
                </li>

                        <li class="nav-item">
                            <a class="nav-link pl-5 pr-5" href="logout.php">Logout </a>
                        </li>

                <?php
                }
                ?>

            </ul>
        </div>

    </div>
</nav>
</body>

</html>