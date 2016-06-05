   <?php  include ("init.php"); 
     $user_check=$_SESSION['user_id'];
  
   if(empty($_SESSION['user_id'])) 
   {
   header("Location: index.php");
    }else
    {
          // Redirecting To Home Page
    }
   ?>
   <?php
 if(isset($_GET['oauth_token']))
{
 
// TwitterOAuth instance, with two new parameters we got in twitter_login.php
$consumerKey = 'FCc5HlL4rto8gNpk0rMlzHed9';
$consumerSecret = 'xL9KjXqmxwkvXKOfKiUny0jSjnVU4myUNumHspKGagUPtyeeMb';


# API OAuth
require_once('twitteroauth.php');

$twitteroauth = new TwitterOAuth($consumerKey, $consumerSecret,$_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);

// Let's request the access token
$access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']);
// Save it in a session var
$_SESSION['access_token'] = $access_token;


// Let's get the user's info
 $params =array();
        $params['include_entities']='false';
        $content = $twitteroauth->get('account/verify_credentials',$params);
        $response = json_decode($content);
$_SESSION['twitter_followers'] = $response->followers_count;

      
     } 
     
     if(isset($_GET['access_token']))
{
   
     if(isset($_SESSION['error']) ) {
      $er = "authentication failed";
      unset($_SESSION['error']);
    }else {
$json=$pinterest->users->me(array(
    'fields' => 'username,first_name,last_name,image[small,large],counts'
));
$_SESSION['pinterest_followers'] = $json->counts['followers'];
}
}
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
			<style>
            input[type="text"], input[type="password"], textarea, textarea.form-control {

    border: 3px solid #C7B68D !important;
}html input[type=button], input[type=reset], input[type=submit] {
    -webkit-appearance: button;
    cursor: pointer;
    color: #FFFFFF;
    background-color: #DE615E;
}
            </style>
	
    </head>

    <body>
		<?php 
		$user_id = $_SESSION["user_id"];
		$user_data = $users->userData($user_id);
		$image = 'https://graph.facebook.com/'.$user_data['user_id'].'/picture?width=100';
		?>
        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12  text">
                     <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="http://lorempixel.com/100/100/people/9/">
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>
        <div class="useravatar">
            <img alt="" src="<?php echo $image ; ?>">
        </div>
        <div class="card-info"> <span class="card-title"><?php echo $user_data['user_name'] ; ?></span>

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
               
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
              
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
               
            </button>
        </div>
    </div>
	
        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
         <div class="table-title">
<h3 style="color:#EF1F1F;">Profile Details</h3>
</div>
<table class="table-fill">

<tbody class="table-hover">
<tr>
<td class="text-left">E-mail</td>
<td class="text-left"><?php echo $user_data['user_email'] ; ?></td>
</tr>
<tr>
<td class="text-left">Gender</td>
<td class="text-left"><?php echo $user_data['user_gender'] ; ?></td>
</tr>
<tr>
<td class="text-left">First Name</td>
<td class="text-left"><?php echo $user_data['user_fname'] ; ?></td>
</tr>
<tr>
<td class="text-left">Last Name</td>
<td class="text-left"><?php echo $user_data['user_lname'] ; ?></td>
</tr>
<tr>
<td class="text-left">Country</td>
<td class="text-left"><?php echo $user_data['user_country'] ; ?></td>
</tr>
<tr>
<td class="text-left">Age</td>
<td class="text-left"><?php echo $user_data['user_age'] ; ?></td>
</tr>
<tr>
<td class="text-left">Friends Count</td>
<td class="text-left"><?php echo $user_data['user_friendscount'] ; ?></td>
</tr>
<tr>
<td class="text-left">Language</td>

<td class="text-left"><?php echo $user_data['lang'] ; ?></td>
</tr>	
<tr>
<td class="text-left">Twitter Followers</td>
<?php if($user_data['twitter_followers'] != "" ){
       if(isset($_SESSION['twitter_followers'])){ 
     @$users->update_twitter($user_check ,@$_SESSION['twitter_followers'] ); 
     }
    ?>
   <td class="text-left"> Followers :<?php echo $user_data['twitter_followers'] ; ?> &nbsp; &nbsp; &nbsp; &nbsp;<a href="twitter_login.php"><img style="float: right;" width="179px" height="43px" src="assets/twitter.jpg" /></a></td>

<?php }else{
   if(isset($_SESSION['twitter_followers'])){ 
 @$users->update_twitter($user_check ,@$_SESSION['twitter_followers'] );
 } ?>
<td class="text-left"><a href="twitter_login.php"><img  src="assets/img/twitter.jpg" /></a></td>
<?php }?>
</tr>	
<tr>
<td class="text-left">Instgram Followers</td>
<?php if($user_data['instagram_followers'] != "" ){
    if(isset($_SESSION['instagram_followers'])){ 
     @$users->update_instagram($user_check ,@$_SESSION['instagram_followers'] ); 
     }
     $loginUrl = $instagram->getLoginUrl(); 
    ?>
     <td class="text-left"> Followers : <?php echo $user_data['instagram_followers'] ; ?>&nbsp; &nbsp; &nbsp; &nbsp;<a href="<?php echo $loginUrl ;?>"><img style="float: right;" width="179px" height="43px" src="assets/instgram.jpg" /></a></td>
    
<?php }else{ 
    if(isset($_SESSION['instagram_followers'])){ 
      @$users->update_instagram($user_check ,@$_SESSION['instagram_followers'] ); 
      }
 $loginUrl = $instagram->getLoginUrl(); ?>
<td class="text-left"><a href="<?php echo $loginUrl ;?>"><img src="assets/img/instgram.jpg" /></a></td>
<?php } ?>
</tr>	
<tr>
<td class="text-left">Linkedin Followers</td>
<?php if($user_data['linkedin_followers'] != "" ){
    if(isset($_SESSION['linkedin_followers'])){ 
     @$users->update_linkedin($user_check ,@$_SESSION['linkedin_followers'] ); 
     }?>
 <td class="text-left"> Connections :  <?php echo $user_data['linkedin_followers'] ; ?>&nbsp; &nbsp; &nbsp; &nbsp;<a href="process.php"><img style="float: right;" src="assets/linkedin.jpg" /></a></td>

<?php }else { ?>
<?php if(isset($_SESSION['linkedin_followers'])){
      @$users->update_linkedin($user_check ,@$_SESSION['linkedin_followers'] ); 
      }?>

<td class="text-left"><a href="process.php"><img src="assets/img/linkedin.jpg" /></a></td>
<?php } ?>
</tr>	
<tr>
<td class="text-left">Pinterest Followers</td>
<?php if($user_data['pinterest_followers'] != "" ){
    if(isset($_SESSION['pinterest_followers'])){ 
     @$users->update_pinterest($user_check ,@$_SESSION['pinterest_followers'] ); 
     }?>
 <td class="text-left"> Followers :  <?php echo $user_data['pinterest_followers'] ; ?><?php if(isset($er)){echo $er;} ?>&nbsp; &nbsp; &nbsp; &nbsp;<a href="<?php echo $loginurl ?>"><img style="float: right;" src="assets/UpdatePinterestButton.png" /></a></td>

<?php }else { ?>
<?php if(isset($_SESSION['pinterest_followers'])){
    
      $users->update_pinterest($user_check ,$_SESSION['pinterest_followers'] ); 
      }?>

<td class="text-left"><?php if(isset($er)){echo $er;} ?><a href="<?php echo $loginurl ?>"><img src="assets/PinterestButton.png" /></a>

</td>
<?php } ?>
</tr>

</tbody>
</table>
  
        </div>
        <div class="tab-pane fade in" id="tab2">
            <div class="table-title">
<h3 style="color:#EF1F1F;">Complete Personal Information </h3>
</div>
<form action="#" method="post">
<table class="table-fill">

<tbody class="table-hover">

<tr>
<td class="text-left">Gender</td>
<td class="text-left"><input type="text" name="gender" value="<?php echo $user_data['user_gender'] ; ?>"/></td>

</tr>
<tr>
<td class="text-left">First Name</td>
<td class="text-left"><input type="text" name="fname" value="<?php echo $user_data['user_fname'] ; ?>"/></td>

</tr>
<tr>
<td class="text-left">Last Name</td>
<td class="text-left"><input type="text" name="lname" value="<?php echo $user_data['user_lname'] ; ?>"/></td>

</tr>
<tr>
<td class="text-left">Country</td>
<td class="text-left"><input type="text" name="country" value="<?php echo $user_data['user_country'] ; ?>"/></td>

</tr>
<tr>
<td class="text-left">Age</td>
<td class="text-left"><input type="text" name="age" value="<?php echo $user_data['user_age'] ; ?>"/></td>

</tr>
<tr>
<td class="text-left">Language</td>

<td class="text-left"><input type="text" name="lang" value="<?php echo $user_data['lang'] ; ?>"/></td>

</tr>

</tbody>

</table>
  <input type="submit" name="edit" value="Edit Information"/>
  </form>
        </div>
        <div class="tab-pane fade in" id="tab3">
     <a href="logout.php" class="styled-button-1"  > Logout</a> 
        </div>
      </div>
    </div>
                        </div>
                    </div>
                    <div class="row">
<div class="col-lg-6 col-sm-6">
   
    
    </div>
                   </div>
                </div>
            </div>
            
        </div>  
        		    <?php 
    if (isset($_POST['edit'])) {


$gender=$_POST['gender'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$country=$_POST['country'];
$age=$_POST['age'];
$lang = $_POST['lang'] ; 

if (!$users->update_user($user_check ,$gender ,$fname   ,$lname   , $country  , $age , $lang )) {
header("location: home.php"); // Redirecting To Other Page
} 
}
?>
    
        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
		<script>
		$(document).ready(function() {
$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).removeClass("btn-default").addClass("btn-primary");   
});
});
		</script>

    </body>

</html>