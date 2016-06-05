<?php
  include ("init.php"); 
include_once("LinkedIn/http.php");
include_once("LinkedIn/oauth_client.php");

//db class instance
  $client = new oauth_client_class;
    $client->debug = 1;
    $client->debug_http = 1;
    $client->server = 'LinkedIn2';
    $client->redirect_uri = 'http://'.$_SERVER['HTTP_HOST'].
        dirname(strtok($_SERVER['REQUEST_URI'],'?')).'/process.php';

    $client->client_id = '77s0xspi1xldpc'; $application_line = __LINE__;
    $client->client_secret = 'msabUUN8lRz7bFOy';

    /* API permission scopes
     * Separate scopes with a space, not with +
     */
    $client->scope = 'r_basicprofile r_emailaddress';

    if(strlen($client->client_id) == 0
    || strlen($client->client_secret) == 0)
        die('Please go to LinkedIn Apps page https://www.linkedin.com/secure/developer?newapp= , '.
            'create an application, and in the line '.$application_line.
            ' set the client_id to Consumer key and client_secret with Consumer secret. '.
            'The Callback URL must be '.$client->redirect_uri).' Make sure you enable the '.
            'necessary permissions to execute the API calls your application needs.';

    if(($success = $client->Initialize()))
    {
        if(($success = $client->Process()))
        {
            if(strlen($client->access_token))
            {
                $success = $client->CallAPI(
                    'https://api.linkedin.com/v1/people/~:(num-connections)', 
                    'GET', array(
                        'format'=>'json'
                    ), array('FailOnAccessError'=>true), $user);

                /*
                 * Use this if you just want to get the LinkedIn user email address
                 */
/*
                $success = $client->CallAPI(
                    'https://api.linkedin.com/v1/people/~/email-address', 
                    'GET', array(
                        'format'=>'json'
                    ), array('FailOnAccessError'=>true), $email);
*/
            }
        }
        $success = $client->Finalize($success);
    }
    if($client->exit)
        exit;
    if(strlen($client->authorization_error))
    {
        $client->error = $client->authorization_error;
        $success = false;
    }
    if($success)
    {
        $_SESSION['linkedin_followers'] = $user->numConnections;
      header("location:home.php");
    }

?> 
