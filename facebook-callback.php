<?php 
    require_once "facebook-config.php";

    try {
        $accessToken = $helper->getAccessToken();
      } catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit();
      } catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit();
      }
      
      if (! isset($accessToken)) {
        if ($helper->getError()) {
          header('HTTP/1.0 401 Unauthorized');
          echo "Error: " . $helper->getError() . "\n";
          echo "Error Code: " . $helper->getErrorCode() . "\n";
          echo "Error Reason: " . $helper->getErrorReason() . "\n";
          echo "Error Description: " . $helper->getErrorDescription() . "\n";
        } else {
          header('HTTP/1.0 400 Bad Request');
          echo 'Bad request';
        }
        exit();
      }
      
      // The OAuth 2.0 client handler helps us manage access tokens
      $oAuth2Client = $FB->getOAuth2Client();
      
      if (! $accessToken->isLongLived()) {
        // Exchanges a short-lived access token for a long-lived one
        try {
          $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
          echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
          exit();
        }
      }

        $response = $FB->get("/me?fields=id, first_name, last_name, email, picture.type(large)", $accessToken);
        $userData = $response->getGraphNode()->asArray();
        $_SESSION['userData'] = $userData;

        echo "First Name= ".$userData['first_name'] . " <br>";
        echo "Last Name= ".$userData['last_name'] . " <br>";
        $email = $userData['email'];

        //check user exist or not in db
        //fetch_user_query = "SELECT * FROM users WHERE email = '$email'";

        //if user data not in db 

            //create random password 

            //save user data with password

            //send email to user with new passsword

        //Redirect to previous page...





        
        // echo '<h3>User Data</h3>';
        // var_dump($_SESSION['userData']) ;
        $_SESSION['access_token'] = (string) $accessToken;
        //header('Location: index.php');
        exit();
?>