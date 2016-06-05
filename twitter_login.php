<?php 
session_start();
$consumerKey = 'FCc5HlL4rto8gNpk0rMlzHed9';
$consumerSecret = 'xL9KjXqmxwkvXKOfKiUny0jSjnVU4myUNumHspKGagUPtyeeMb';
$oAuthToken = '3430156198-8vhu13Vc2QKfQ0Erf7KyvEOWKTmXrVVe4p1T2RO';
$oAuthSecret = 'tWWV1TCQKCThe2vQA8Cx48miEkqJmkIpqe9rQwkxzWAqi';
$OAUTH_CALLBACK='http://dev1.showmb.com/maged/home.php';
 

# API OAuth
require_once('twitteroauth.php');

$twitteroauth = new TwitterOAuth($consumerKey, $consumerSecret);

//$user = $twitteroauth->get('https://api.twitter.com/1.1/users/show.json?screen_name=dev1showmb');
//var_dump ($user);
// The TwitterOAuth instance

$request_token = $twitteroauth->getRequestToken('http://dev1.showmb.com/home.php');
 
// Saving them into the session
$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
 
// If everything goes well..
if($twitteroauth->http_code==200){
    // Let's generate the URL and redirect
    $url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']);
    header('Location: '. $url);
} else {
    // It's a bad idea to kill the script, but we've got to know when there's an error.
    die('Something wrong happened.');
}
?>