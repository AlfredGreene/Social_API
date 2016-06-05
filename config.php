<?php
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

$config =array(
		"base_url" => "http://dev1.showmb.com/hybridauth/index.php", 
		"providers" => array ( 

			"Google" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "227177501041-5mqvl5q5mudvgbs6ar69i5574h133i9g.apps.googleusercontent.com", "secret" => "6GmhGp0njdM7ot5xTqO30zed" ), 
			),

			"Facebook" => array ( 
			 "display" => "popup",
				"enabled" => true,
				"keys"    => array ( "id" => "440092482808900", "secret" => "bf46d2324b761c598442c8effcd96351" ), 
			      
                           
                            ),

			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "5eSaGam40IcQfscMZODbjqGub", "secret" => "ECE2H6efn0C0d5bUpPVb2YrjdOMew7tmrVFk8iF8LRo5RKYEJd" ) 
			),
			"LinkedIn" => array (
            "enabled" => true,
            "keys"    => array ( "key" => "77hdnop824usp3", "secret" => "6jQlG26FHwjAI66u"),
            "scope" => 'r_basicprofile, r_emailaddress',
        )

		),
		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => false,
		"debug_file" => "",
      
	);