<?php
require_once 'C:/users/tcrob/vendor/autoload.php';
 
// init configuration
$clientID = '818279590151-3tart1orbp6tsua5j23t4eknhks4gm1i.apps.googleusercontent.com';
$clientSecret = 'lm-7uRNxPdU7JTdoYKY3ZTc1';
$redirectUri = 'http://24.151.198.218.xip.io/verify.php';
  
// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
 
// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
  
  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;
 
  // now you can use this profile info to create account in your website and make user logged in.
} else {
	header('Location:'.$client->createAuthUrl());
}
?>


</body>
</html>