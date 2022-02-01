<?php
require_once('classes/init.php');
global $session;

$organizations = Organization::fetch_organizations();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ROI | Articles</title>
    <link rel="icon" type="image/x-icon" href="../pics/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&family=Ubuntu:ital,wght@1,500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/articles.css">

</head>

<body>

    <?php include 'header.php'; ?>

    <main class="container">

        <div class="row">
            <div class=" col-md-12">
                <img src="../pics/Sorry.jpg" id="headerpic">
            </div>
        </div>

        <?php
        foreach ($organizations as $organization){
            $organization_name = str_replace(' ', '', $organization->name);
        ?>
        <article class="card mb-5 mt-5" id="light">
            <div class="row">
                <div class="col-md-4 title_img">
                    <img class="card-img-top" src="../pics/plantLight.png" alt=" ... ">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $organization->name ?></h5>
                        <p class="card-text"><?php echo $organization->mission_statement ?> </p>
                        <p class="card-text"><small class="text-muted"><?php echo $organization->city.", ".$organization->address.", ".$organization->phone ?></small></p>
                        <button class="btn btn-dark mt-5 col-6 mx-auto" type="button" data-toggle="collapse"
                            data-target="#<?php echo $organization_name.$organization->id;  ?>" aria-expanded="false" aria-controls="<?php echo $organization_name.$organization->id; ?>">Read
                            More
                        </button>
                    </div>
                </div>
            </div>
            <div class="collapse" id="<?php echo $organization_name.$organization->id; ?>">
                <div class="card card-body">
                    <p class="keep-format"><?php echo $organization->description ?>
                    </p>
                </div>
            </div>
        </article>
        <?php
        }
        ?>

        </article>

    </main>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/articles.js"></script>
    <script src="../js/header_footer.js"></script>

</body>

</html>