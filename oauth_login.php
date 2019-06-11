<?php
require_once('Facebook/FacebookSession.php');
require_once('Facebook/FacebookRequest.php');
require_once('Facebook/FacebookResponse.php');
require_once('Facebook/FacebookSDKException.php');
require_once('Facebook/FacebookRequestException.php');
require_once('Facebook/FacebookRedirectLoginHelper.php');
require_once('Facebook/FacebookAuthorizationException.php');
require_once('Facebook/GraphObject.php');
require_once('Facebook/GraphUser.php');
require_once('Facebook/GraphSessionInfo.php');
require_once('Facebook/Entities/AccessToken.php');
require_once('Facebook/HttpClients/FacebookCurl.php');
require_once('Facebook/HttpClients/FacebookHttpable.php');
require_once('Facebook/HttpClients/FacebookCurlHttpClient.php');

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
class Oauth_Login extends CI_Controller {
function __construct()
		{
			parent::__construct();
		}
// get page access token
	function index(){
		// FacebookSession::enableAppSecretProof(true);
FacebookSession::setDefaultApplication('1802826076676207
','341026ed31f2698490742535df44c1ae');

$neverExpiringToken = 'EAAZAnqSfkYG8BAGeqVNOOS8m8uli8vnXZBOsRDMZBxHixS2gnVaW6dJL3HWdyJxVEuxr4LEHzSQi0tkANjzkZAKEIgiDqg2YCARtb0iLKhCZCLx7R9W080pbNHNVGu0S1uTnFT4lUgO0DJkJTfE5QZA6MCE4OtnNdByVqtaCCqIRN09rcLrI0AGgHeo8K2DFwZD';
$pageID = $this->session->userdata('oauth_uid');

// create a FacebookSession with the never-expiring page access token 
$session = new FacebookSession($neverExpiringToken);

try {
    $post_id = (new FacebookRequest(
        $session, 
        'POST', 
        '/' . $pageID . '/feed', 
        array(
                'access_token'  => $neverExpiringToken,
                'message'   => 'boy do I love the Graph API',
                'link'      => 'http://www.contentecontent.com/blog/',
                'picture'   => 'got it',
                'name'      => 'name here',
                'description'=> 'description here'
        )
    )
    )->execute()->getGraphObject()->asArray();
} catch (FacebookRequestException $e) {
    echo 'ERROR! ' . __LINE__ . $e->getMessage();   
} catch (Exception $e) {
    echo 'ERROR! ' . __LINE__ . $e->getMessage();
}
}

}
?>