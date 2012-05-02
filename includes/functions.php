<?php
  if($_POST) { return storeAddress($_POST); }
  
  function including($page) {
    include $_SERVER['DOCUMENT_ROOT'] . "/includes/_$page.php";
  }
  
  /*///////////////////////////////////////////////////////////////////////
  Part of the code from the book 
  Building Findable Websites: Web Standards, SEO, and Beyond
  by Aarron Walter (aarron@buildingfindablewebsites.com)
  http://buildingfindablewebsites.com
  
  Distrbuted under Creative Commons license
  http://creativecommons.org/licenses/by-sa/3.0/us/
  ///////////////////////////////////////////////////////////////////////*/

  function storeAddress($post) {
    if(!$post['email']){ return "No email address provided"; } 
    if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/i", $post['email'])) { return "Email address is invalid"; }
    require_once('MCAPI.class.php');
    
    // grab an API Key from http://admin.mailchimp.com/account/api/
    $api = new MCAPI('21a1e4a68d3032de2fead445db451cc9-us5');
        // grab your List's Unique Id by going to http://admin.mailchimp.com/lists/
        // Click the "settings" link for the list - the Unique Id is at the bottom of that page. 
    $list_id = "83c771efcc";
    if($api->listSubscribe($list_id, $post['email'], '') === true) {
      // It worked!        
      return 'Success! Check your email to confirm sign up.';
    } else {
      // An error ocurred, return error message        
      return 'Error: ' . $api->errorMessage;
    }
  }

?>