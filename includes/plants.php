<?php
require_once('classes/init.php');
global $session;

$volunteer_places = VolunteerPlace::fetch_places();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROI | Our Plants</title>
    <link rel="icon" type="image/x-icon" href="../pics/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/plants.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&family=Ubuntu:ital,wght@1,500&display=swap"
          rel="stylesheet">

</head>

<body>

<?php include 'header.php'; ?>

<main class="container">
    <!-- Header -->
    <div class="row">
        <div class="col-12 p-0">

            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../pics/Carousel1.jpeg" class="Carousel-pictures d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <!-- <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p> -->
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../pics/Carousel2.jpg" class="Carousel-pictures d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <!-- <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p> -->
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../pics/Carousel3.jpg" class="Carousel-pictures d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <!-- <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p> -->
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions"
                        data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions"
                        data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Header start shopping!   -->
    <div class="row">
        <div class="col-12 shopping_header">
            <h1 class="h1_plants mt-2 mb-3">Start Shopping!</h1>
            <h3 id="h2_plants">Tip: Hover on images to see more!</h3>
        </div>
    </div>

    <?php
    for ($i = 0;
         $i < count($volunteer_places);
         $i++) {
        if ($i % 3 == 0) {
            ?>
            <div class="row">
            <?php
        }
        ?>
        <div class="card image1 m-3 col-md p-0">
            <img id="scandes" class="img-fluid image_hover card-img-top" src="../pics/scandes_pot.jpg"
                 alt="Card image cap">
            <div class="card-body text-center">
                <h5 class="card-title price"><?php echo $volunteer_places[$i]->name; ?></h5>
                <p class="card-text"><?php echo $volunteer_places[$i]->description; ?>
                    <!-- <br><b>Light intensity: </b>Low to high. No direct sun! -->
                    <!-- <br><b>When to water: </b>When the soil is completely dry. -->
                </p>


                <a href="/includes/buy.php" class="buy-btn btn btn-dark">Join Now</a>
            </div>
        </div>

        <?php
        if ($i % 3 == 2 && $i!=0) {
            ?>
            </div>
            <?php
        }
    }
    ?>

</main>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- <script src="../js/header_footer.js"></script> -->
<script src="../js/plants.js"></script>
</body>

</html>