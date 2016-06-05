<?php 
/* INCLUSION OF LIBRARY FILEs*/
	require_once( 'src/Facebook/FacebookSession.php');
	require_once( 'src/Facebook/FacebookRequest.php' );
	require_once( 'src/Facebook/FacebookResponse.php' );
	require_once( 'src/Facebook/FacebookSDKException.php' );
	require_once( 'src/Facebook/FacebookRequestException.php' );
	require_once( 'src/Facebook/FacebookRedirectLoginHelper.php');
	require_once( 'src/Facebook/FacebookAuthorizationException.php' );
	require_once( 'src/Facebook/GraphObject.php' );
	require_once( 'src/Facebook/GraphUser.php' );
	require_once( 'src/Facebook/GraphSessionInfo.php' );
	require_once( 'src/Facebook/Entities/AccessToken.php');
	require_once( 'src/Facebook/HttpClients/FacebookCurl.php' );
	require_once( 'src/Facebook/HttpClients/FacebookHttpable.php');
	require_once( 'src/Facebook/HttpClients/FacebookCurlHttpClient.php');

/* USE NAMESPACES */
	
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\FacebookResponse;
	use Facebook\FacebookSDKException;
	use Facebook\FacebookRequestException;
	use Facebook\FacebookAuthorizationException;
	use Facebook\GraphObject;
	use Facebook\GraphUser;
	use Facebook\GraphSessionInfo;
	use Facebook\FacebookHttpable;
	use Facebook\FacebookCurlHttpClient;
	use Facebook\FacebookCurl;

/*PROCESS*/
?>