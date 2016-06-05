<?php
 include ("init.php"); 
// receive OAuth code parameter
$code = $_GET['code'];
// check whether the user has granted access
if (isset($code)) {
    // receive OAuth token object
    $data = $instagram->getOAuthToken($code);
    $username = $data->user->username;
    
    // store user access token
    $instagram->setAccessToken($data);
    // now you have access to all authenticated user methods
   $follower = $instagram->getUserFollower(); 
   $i=0;
    foreach ($follower->data as $data) {
      $i++;
        }
       $_SESSION['instagram_followers'] = $i;
        header('Location:home.php ');
   
} else {
    // check whether an error occurred
    if (isset($_GET['error'])) {
        echo 'An error occurred: ' . $_GET['error_description'];
    }
}
?>
