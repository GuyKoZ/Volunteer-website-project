<?php
require_once('classes/init.php');
global $session;
$error = '';

if (isset($_POST['user-signup'])) {
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $password = $_POST['password'];
    $user = new User;
    $user->init($email, $firstName, $lastName, $phone, $city, $password);
    $error = User::add_user($user);
    if (!$error) {
        $session->login($user);
        header('Location: ../homepage.php');
    }
} elseif (isset($_POST['login-organ'])) {

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

} elseif (isset($_POST['organ-signup'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['street'];
    $description = $_POST['description'];
    $mission_statement = $_POST['mission'];

    $organization = new Organization();
    $organization->init($id, $name, $phone, $city, $address, $description, $mission_statement);
    $error = Organization::add_organization($organization);

    if (!$error) {
        $session->login($organization);
        header('Location: ../homepage.php');
    } else {
        echo "<h1>error '{$error}' </h1>";
    }

} else {
    echo "error" . $error;
}

?>

<!DOCTYPE html>
<html lang="">

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
    <div class="box">
        <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#login" role="tab"
                   aria-controls="pills-home" aria-selected="true">Log in</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#signup" role="tab"
                   aria-controls="pills-profile" aria-selected="false">Sign Up</a>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="pills-home-tab">

                <div class="form-group text-center">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="login-organ">
                        <label class="custom-control-label" for="login-organ">Login as an organization</label>
                    </div>
                </div>

                <!--   User Login   -->

                <form class="needs-validation login-user" id="login-user" novalidate method="post">

                    <div class="form-group mb-3">
                        <label for="email-login-user">Email</label>
                        <input type="email" class="form-control" id="email-login-user" placeholder="name@domain.com"
                               name="email"
                               required
                               pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}">
                        <div class="invalid-feedback">
                            Please insert valid email.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="password-login-user">Password</label>
                        <input type="password" class="form-control" id="password-login-user" name="password"
                               required>
                        <div class="invalid-feedback">
                            Please insert valid email.
                        </div>
                    </div>

                    <button name="login-user" id="btn-buy" class="btn-submit btn btn-dark mt-4 mb-3" type="submit">
                        Log
                        in
                    </button>
                </form>

                <!--    Organization Login    -->
                <form class="needs-validation display-none" id="login-organization" novalidate method="post">

                    <div class="form-group mb-3">
                        <label for="id-login-organ">Your Organization ID</label>
                        <input type="number" class="form-control" id="id-login-organ" placeholder="123456789"
                               name="id"
                               max="1000000000000000" required>
                        <div class="invalid-feedback">
                            Please provide a valid ID with no more than 15 digits and no hyphen.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="password-login-organ">Password</label>
                        <input type="password" class="form-control" id="password-login-organ" name="password"
                               required>
                        <div class="invalid-feedback">
                            Please insert valid email.
                        </div>
                    </div>

                    <button name="login-organ" id="btn-buy" class="btn-submit btn btn-dark mt-4 mb-3" type="submit">
                        Log
                        in
                    </button>
                </form>
            </div>

            <!--    Sign UP    -->


            <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="pills-profile-tab">

                <div class="form-group text-center">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="signup-organ">
                        <label class="custom-control-label" for="signup-organ">Sign up as an organization (make sure
                            you
                            click this before you start typing)</label>
                    </div>
                </div>

                <!--    User Sign Up    -->

                <form class="needs-validation" id="signup-user" novalidate method="post">

                    <div class="form-group mb-3">
                        <label for="signup-email">Email</label>
                        <input type="email" class="form-control" id="signup-email" placeholder="name@domain.com"
                               name="email"
                               required
                               pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}">
                        <div class="invalid-feedback">
                            Please insert valid email.
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="John" required
                                   pattern="[A-Za-z]{1,10}" maxlength="10" name="firstName">
                            <div class="invalid-feedback">
                                Please enter up to 10 alphabetical letters without space.
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Smith" required
                                   pattern="[A-Za-z]{1,10}" maxlength="10" name="lastName">

                            <div class="invalid-feedback">
                                Please enter up to 10 alphabetical letters without space.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">

                            <label for="phone">Phone Number</label>
                            <input type="number" class="form-control" id="phone" placeholder="123456789"
                                   name="phone"
                                   min="99999999"
                                   max="1000000000000000" minlength="9" required>
                            <div class="invalid-feedback">
                                Please provide a valid phone with min of 9 digits and max of 15 digits (no hyphen).
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="street">Street Address</label>
                            <input type="text" class="form-control" id="street" required placeholder="Aza 23"
                                   name="street"
                                   pattern="[A-Za-z0-9\s]+" maxlength="50">
                            <div class="invalid-feedback">
                                No special characters are allowed. Only 50 characters.
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="city">City</label>
                            <select class="custom-select" id="city" required name="city">
                                <option selected disabled value="">Choose...</option>
                                <option>Tel Aviv</option>
                                <option>Petah Tikva</option>
                                <option>Holon</option>
                            </select>

                            <div class="invalid-feedback">
                                Please select a city.
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="number" class="form-control" id="zip" required placeholder="12345"
                                   name="zip"
                                   max="10000000000">
                            <div class="invalid-feedback">
                                Please provide a valid zip (no more then length of 10).
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="choose-password">Choose your password</label>
                        <input type="password" class="form-control" id="choose-password" name="password" required>
                        <div class="invalid-feedback">
                            Please insert valid email.
                        </div>
                    </div>

                    <button name="user-signup" id="btn-buy" class="btn-submit btn btn-dark mt-4 mb-3" type="submit">
                        Join
                    </button>
                </form>

                <!--    Organization Sign Up    -->

                <form class="needs-validation display-none" id="signup-organization" novalidate method="post">

                    <div class="form-group mb-3">
                        <label for="id-signup-organ">Your Organization ID</label>
                        <input type="number" class="form-control" id="id-signup-organ" placeholder="123456789"
                               name="id"
                               max="1000000000000000" required>
                        <div class="invalid-feedback">
                            Please provide a valid ID with no more than 15 digits and no hyphen.
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="organ-name">Name</label>
                            <input type="text" class="form-control" id="organ-name" required
                                   pattern="[A-Za-z]{1,10}" maxlength="10" name="name">
                            <div class="invalid-feedback">
                                Please enter up to 10 alphabetical letters without space.
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">

                            <label for="organ-phone">Phone Number</label>
                            <input type="number" class="form-control" id="organ-phone" placeholder="123456789"
                                   name="phone"
                                   min="99999999"
                                   max="1000000000000000" minlength="9" required>
                            <div class="invalid-feedback">
                                Please provide a valid phone with min of 9 digits and max of 15 digits (no hyphen).
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="organ-street">Street Address</label>
                            <input type="text" class="form-control" id="organ-street" required placeholder="Aza 23"
                                   name="street"
                                   pattern="[A-Za-z0-9\s]+" maxlength="50">
                            <div class="invalid-feedback">
                                No special characters are allowed. Only 50 characters.
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="organ-city">City</label>
                            <select class="custom-select" id="organ-city" required name="city">
                                <option selected disabled value="">Choose...</option>
                                <option>Tel Aviv</option>
                                <option>Petah Tikva</option>
                                <option>Holon</option>
                            </select>

                            <div class="invalid-feedback">
                                Please select a city.
                            </div>
                        </div>

                    </div>

                    <div class="form-group mb-3">
                        <label for="organ-choose-password">Choose your password</label>
                        <input type="password" class="form-control" id="organ-choose-password" name="password"
                               required>
                        <div class="invalid-feedback">
                            Please insert valid password.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="organ-mission">Your organization mission statement</label>
                        <textarea class="form-control" name="mission" id="organ-mission" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="organ-desc">More about you</label>
                        <textarea class="form-control" name="description" id="organ-desc" rows="3"></textarea>
                    </div>

                    <button name="organ-signup" id="btn-buy" class="btn-submit btn btn-dark mt-4 mb-3"
                            type="submit">
                        Join
                    </button>
                </form>

            </div>
        </div>
    </div>
</main>

<main class="container">

</main>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="../js/buy.js"></script>

</body>

</html>