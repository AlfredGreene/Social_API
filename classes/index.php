<?php 
//db
    include ("init.php");
	echo "asdasd";
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

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Login Form Template</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1>Login to our site</h1>
                            <div class="description">
                            	<p>
	                            	
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login to our site</h3>
                            		<p>Please Sign in with Facebook to log on:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form"  class="login-form">
			                    	<div class="form-group">
			                         	<div class="social-login-buttons">
		<?php								
	try{
	//1.Stat Session

	 
	 //2.Use app id,secret and redirect url 
	$app_id = '616978541739061';
	$app_secret = '26718f327d2fd0f78cd7fbc5ea1bbbcc';
	$redirect_url='http://localhost/upwork/facebook/';
	
	//3.Initialize application, create helper object and get fb sess
	 FacebookSession::setDefaultApplication($app_id,$app_secret);
	 $helper = new FacebookRedirectLoginHelper($redirect_url);
	 $sess = $helper->getSessionFromRedirect();

	 //4. if fb sess exists echo name 
	 	if(isset($sess)){
	 		//store the token in the php session
			$accessToken =$sess->getAccessToken();
	 		$_SESSION['fb_token'] = $accessToken->extend();
			
			//create request object,execute and capture response
	 		$request_friends = (new FacebookRequest($sess,'GET','/me/friends'))->execute()->getGraphObject();
				// from response get graph object
				 $friends =  $request_friends->getProperty('summary');
			 $friends = $friends->asArray();//this will do all job for you..
             foreach($friends as $row){
            $user_friendscount =  ($row);
             }
	 		//create request object,execute and capture response
	 		$request = new FacebookRequest($sess,'GET','/me?fields=id,name,first_name,last_name,email,languages,gender,birthday,bio,hometown,education,quotes,cover,work,devices,age_range,about');
			// from response get graph object
			$response = $request->execute();
			$graph = $response->getGraphObject(GraphUser::classname());
			var_dump($graph);
			  $country =  $graph->getProperty('hometown');
			  if($country === null){
			$country = " ";
			  }else
			  {
				  	  	  	 $country = $country->asArray();//this will do all job for you..
        foreach($country as $row){
			$country = preg_replace('/[0-9]+/', '', $row);
		}
				  
			  }
		
		
		  
     
		
			$name = $graph->getName();
			$gender = $graph->getGender();
			$last_name = $graph->getLastName();
			$first_name = $graph->getFirstName();
			$birthday =date("Y") - date_format($graph->getBirthday(), 'Y');
			$id = $graph->getId();
			
			$email = $graph->getProperty('email');
			if($users->user_exists($id) == false){
			$user_id = $users->addUser($id ,$name,$email,$first_name, $last_name, $gender, $birthday, $country,$user_friendscount);
				$languages =  $graph->getProperty('languages');
				  if($languages === null){
			$languages = " ";
			  }else
			  {
			
			  	 $languages = $languages->asArray();//this will do all job for you..
			   foreach($languages as $r){
            $users->addLang($user_id , $r->name);
                }	
				  
			  }
			  
		
			$_SESSION["user_id"] = $user_id;
			header("Location: home.php");
			}else{
			$user_id = $users->login($id);
			$_SESSION["user_id"] = $user_id;
			header("Location: home.php");
			}

	 	}else{
			//else echo login
	 		echo '	<a class="btn btn-link-1 btn-link-1-facebook" href="'.$helper->getLoginUrl(array('email,user_about_me,user_birthday,user_friends,user_hometown,user_location,user_likes')).'" >
	                        		<i class="fa fa-facebook"></i>Sign in with Facebook
	                        	</a>';
	 	}
		
	}catch(FacebookRequestException $e){
		echo "error";
		
	}
	?>
	                        
                        	</div>
			                        </div>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
