<?php
// Setup class



require 'Instagram.php';
use MetzWeb\Instagram\Instagram;
// initialize class
  $instagram = new Instagram(array(
    'apiKey'      => 'ecd4c197cb6f44c894b104d3be77a05d',
    'apiSecret'   => 'f49dfd84e479490d8a4be2818b39af74',
    'apiCallback' => 'http://dev1.showmb.com/maged/success.php' // must point to success.php
  ));
?>