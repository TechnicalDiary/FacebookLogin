<?php
    // session_start();

    require_once "Facebook/autoload.php";
    
    $FB =new  \Facebook\Facebook([
        'app_id' => '173041196719915',
        'app_secret' => '81ef504f48a578b7760bc5a95f15cd19',
        'default_graph_version' => 'v2.2'
    ]);

    $helper = $FB->getRedirectLoginHelper();
    if(isset($_GET['state'])){
        $helper->getPersistentDataHandler()->set('state',$_GET['state']);
    }
?>