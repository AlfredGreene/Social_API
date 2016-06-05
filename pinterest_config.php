<?php 

require_once( 'DirkGroenen/Pinterest/Pinterest.php');
require_once( 'DirkGroenen/Pinterest/Auth/PinterestOAuth.php');
require_once( 'DirkGroenen/Pinterest/Utils/CurlBuilder.php');
require_once( 'DirkGroenen/Pinterest/Transport/Request.php');
require_once( 'DirkGroenen/Pinterest/Auth/PinterestOAuth.php');
require_once( 'DirkGroenen/Pinterest/Exceptions/InvalidEndpointException.php');
require_once( 'DirkGroenen/Pinterest/Exceptions/InvalidModelException.php');
require_once( 'DirkGroenen/Pinterest/Exceptions/PinterestException.php');
require_once( 'DirkGroenen/Pinterest/Endpoints/Endpoint.php');
require_once( 'DirkGroenen/Pinterest/Endpoints/Boards.php');
require_once( 'DirkGroenen/Pinterest/Endpoints/Following.php');
require_once( 'DirkGroenen/Pinterest/Endpoints/Pins.php');
require_once( 'DirkGroenen/Pinterest/Endpoints/Users.php');
require_once( 'DirkGroenen/Pinterest/Transport/Response.php');
require_once( 'DirkGroenen/Pinterest/Transport/Request.php');
require_once( 'DirkGroenen/Pinterest/Models/Model.php');
require_once( 'DirkGroenen/Pinterest/Models/Board.php');
require_once( 'DirkGroenen/Pinterest/Models/Collection.php');
require_once( 'DirkGroenen/Pinterest/Models/Interest.php');
require_once( 'DirkGroenen/Pinterest/Models/Pin.php');
require_once( 'DirkGroenen/Pinterest/Models/User.php');


use DirkGroenen\Pinterest\Pinterest;  

$pinterest = new Pinterest("4795198747329954203", "b16ff423fa2763a39a02028a38c7351c4e4ff534757b0d9382971a68e50e9a40");
$loginurl = $pinterest->auth->getLoginUrl("https://dev1.showmb.com/maged/home.php", array('read_public','read_relationships'));
//echo '<a href=' .  . '>Authorize Pinterest</a>';

//$pinterest->following->users(); 
//$ch = curl_init();
//curl_setopt ($ch, CURLOPT_URL, 'https://api.pinterest.com/v1/users/showmb/followers');
//curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 0);
//$json = curl_exec($ch);
//curl_close($ch);

    //print_r($json);



?>