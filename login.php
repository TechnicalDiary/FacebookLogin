<?php
    require_once "facebook-config.php";
    require_once "google-config.php";
    $googleLoginUrl = $gClient->createAuthUrl();

    $redirectURL = "http://localhost:8080/demo/facebook-callback.php";
    $permissions = ['email', 'public_profile'];
    $faceBookLoginURL = $helper->getLoginUrl($redirectURL,$permissions);
    // echo $loginURL;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container" style="margin-top:20px;">
        <div class="row text-center">
            <input type="button"  onclick="window.location = '<?= $faceBookLoginURL?>'" class="btn btn-lg btn-primary" value="Login to facebook">
            <input type="button" onclick="window.location = '<?= $googleLoginUrl?>'" class="btn btn-lg btn-success" value="Login to Google">
        </div>
    </div>
</body>
</html>