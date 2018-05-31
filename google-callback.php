<?php
    require_once "google-config.php";

    if(isset($_GET['code'])) {
        $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['access_token'] = $token;
    }

    $oAuth = new Google_Service_Oauth2($gClient);
    $userData = $oAuth->userinfo_v2_me->get();

    // echo "<pre>";
    // var_dump($userData);

    $_SESSION['first_name'] = $userData['given_name'];
    $_SESSION['last_name'] = $userData['family_name'];
    $_SESSION['gender'] = $userData['gender'];
    $_SESSION['email'] = $userData['email'];

    
    echo $_SESSION['gender'];
    echo "<br>";
    echo $_SESSION['first_name'];
    echo "<br>";
    echo $_SESSION['last_name'];
    echo "<br>";
    echo $_SESSION['email'];
?>