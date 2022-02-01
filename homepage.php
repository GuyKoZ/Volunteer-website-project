<?php require_once('includes/classes/init.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROI Plant Store</title>
    <link rel="icon" type="image/x-icon" href="pics/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&family=Ubuntu:ital,wght@1,500&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a id="ROI" class="navbar-brand" href="homepage.php"><i class="fas fa-seedling mr-3"></i>ROI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link pl-5 pr-5" href="homepage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-5 pr-5" href="includes/plants.php">Our Plants</a>
                    </li>
                    <!-- <li class="nav-item">
                <a class="nav-link pl-5 pr-5" href="buy.php">Buy Now</a>
            </li> -->
                    <li class="nav-item">
                        <a class="nav-link pl-5 pr-5" href="includes/articles.php">Articles</a>
                    </li>

                    <!-- <li class="nav-item">
                <a class="nav-link pl-5 pr-5" href="faq.html">FAQ</a>
            </li> -->

                    <?php
                    global $session;
                    if ($session->signed_in == false) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link pl-5 pr-5" href="includes/login.php">Log in / Sign up</a>
                        </li>
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link pl-5 pr-5" href="signup.php">Register</a>-->
<!--                        </li>-->
                        <?php
                    } else {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link pl-5 pr-5"
                               href="includes/login.php">Hello, <?php echo $session->firstname ?> </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link pl-5 pr-5" href="includes/logout.php">Logout </a>
                        </li>

                        <?php
                    }
                    ?>

                </ul>
        </div>

    </div>
</nav>

<main class="container">
    <section class="row">
        <video class="col-12 p-0" autoplay muted loop controls>
            <source src="pics/theplantstoretampa.mp4" type="video/mp4">
        </video>
    </section>

    <section class="row second">
        <div class="col-6 text">
            <h1 id="true-lover">For <br> the true <br><span id="lovers">plant lovers.</span></h1>
            <a class="btn btn-dark our-plants-link" href="includes/plants.html" role="button"><span class="disappear">Go to</span>
                Our Plants</a>
        </div>
        <img class="col-6 p-0 plant-lover" src="pics/plant-lover.jpg" alt="">
    </section>

    <section class="row">
        <div class="col-md pl-0 mt-5 mb-3">
            <div class="card h-100 bg-light text-dark">
                <div class="card-body text-center">
                    <div class="h1 mb-3">
                        <img src="pics/image1.png" class="image mb-3" alt="why-roi1">
                    </div>
                    <h3 class="card-title">
                        Unbeatable quality
                    </h3>
                    <p class="card-text">
                        source directly from top-rated growers,<br> so we can sell the finest quality plants at the
                        very best prices.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md mt-5 mb-3">
            <div class="card bg-light text-dark">
                <div class="card-body text-center">
                    <div class="h1 mb-3">
                        <img src="pics/image2.png" class="image mb-3" alt="why-roi2">
                    </div>
                    <h3 class="card-title">
                        Delivery to your door
                    </h3>
                    <p class="card-text">
                        We’ll bring your plants to your door, anywhere in Israel.<br> If you’re not 100% happy, tell
                        us within 30 days and we’ll sort it.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md pr-0 mt-5 mb-3">
            <div class="card h-100 bg-light text-dark">
                <div class="card-body text-center">
                    <div class="h1 mb-3">
                        <img src="pics/image3.png" class="image mb-3" alt="why-roi3">
                    </div>
                    <h3 class="card-title">
                        All the help you need
                    </h3>
                    <p class="card-text">
                        We’ll send you a free plant-parenting course<br> and our plant doctors are always on call.
                    </p>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="row">
        <div class="col-md pl-0 mt-3 mb-2">
            <div class="card border-white bg-white text-dark ">
                <div class="card-body text-center">
                    <div class="h1 mb-3">
                        <img src="pics/man.jpg" class="review mb-3" alt="why-roi1">
                    </div>
                    <h3 class="card-title review-title">
                        "This is the best online plant store!"
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md mt-3 mb-2">
            <div class="card border-white bg-white text-dark">
                <div class="card-body text-center">
                    <div class="h1 mb-3">
                        <img src="pics/woman.jpg" class="review mb-3" alt="why-roi2">
                    </div>
                    <h3 class="card-title review-title">
                        "The best service and team I have ever seen!"
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md pr-0 mt-3 mb-2">
            <div class="card border-white bg-white text-dark">
                <div class="card-body text-center">
                    <div class="h1 mb-3">
                        <img src="pics/man-2.PNG" class="review mb-3" alt="why-roi3">
                    </div>
                    <h3 class="card-title review-title">
                        "Great prices and plants I haven't seen anywhere else"
                    </h3>
                </div>
            </div>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/header_footer.js"></script>

</body>

</html>