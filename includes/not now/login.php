<?php
require_once('classes/init.php');
global $session;
$error = '';

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();
    $error = $user->find_user_by_name($email, $password);
    echo "<h1>'{$user->firstname}'</h1>";
    if (!$error) {
        $session->login($user);
        header('Location: ../homepage.php');
    } else {
        echo "<h1>error '{$error}' </h1>";
}
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROI | Buy</title>
    <link rel="icon" type="image/x-icon" href="/pics/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&family=Ubuntu:ital,wght@1,500&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Oswald:wght@200;300;500&family=Special+Elite&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="../css/buy.css">

</head>

<body>

<?php include 'header.php'; ?>

<main class="container">
    <form class="needs-validation" novalidate method="post">


        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="name@domain.com" name="email" required
                   pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}">
            <div class="invalid-feedback">
                Please insert valid email.
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <div class="invalid-feedback">
                Please insert valid email.
            </div>
        </div>

        <button name="login" id="btn-buy" class="btn btn-dark mt-4 mb-3" type="submit">Log in</button>
    </form>

</main>

<!-- <footer id="footer"></footer> -->
<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- <script src="../js/header_footer.js"></script> -->
<script src="../js/buy.js"></script>

</body>

</html>