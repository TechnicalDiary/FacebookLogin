<?php 
    session_start();
    require_once "GoogleAPI/vendor/autoload.php";
    $gClient = new Google_Client();
    $gClient->setClientId("1021775946577-h02kph4h1vfbe7f4cb057htshmtu93ch.apps.googleusercontent.com");
    $gClient->setClientSecret("HqZ7HHk2zr738mRJ--wcMuTI");
    $gClient->setApplicationName("Google Login");
    $gClient->setRedirectUri("http://localhost:8080/facebooklogin/google-callback.php");
    $gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/plus.me");

?>