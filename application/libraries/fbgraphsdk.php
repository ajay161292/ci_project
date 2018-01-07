<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./vendor/autoload.php');
// require_once __DIR__.'./vendor/autoload.php';
// require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
// use facebook\graph-sdk;

class Fbgraphsdk {

	public function getfeeds(){

		// $fb = new Facebook\Facebook([
		// 		'app_id' => '2084216845148380', // Replace {app-id} with your app id
		// 		'app_secret' => '782baa6a6fe1e21a78c333bf117b4c0d',
		// 		'default_graph_version' => 'v2.2',
		// 		//'default_access_token' => '{access-token}', // optional
		// 	]);
		// // echo'<pre>';printr($fb);exit;
		// $permissions = ['user_posts'];// optional
		// $helper = $fb->getRedirectLoginHelper();
		
		// try {
		//   	$accessToken = $helper->getAccessToken();
		// } catch(Facebook\Exceptions\FacebookResponseException $e) {
		//   // When Graph returns an error
		//   	echo 'Graph returned an error: ' . $e->getMessage();
		//   	exit;
		// } catch(Facebook\Exceptions\FacebookSDKException $e) {
		//   // When validation fails or other local issues
		//   	echo 'Facebook SDK returned an error: ' . $e->getMessage();
		//   	exit;
		// }

		// if (!isset($accessToken)) {
		//   	if ($helper->getError()) {
		//     	header('HTTP/1.0 401 Unauthorized');
		// 	    echo "Error: " . $helper->getError() . "\n";
		// 	    echo "Error Code: " . $helper->getErrorCode() . "\n";
		// 	    echo "Error Reason: " . $helper->getErrorReason() . "\n";
		// 	    echo "Error Description: " . $helper->getErrorDescription() . "\n";
		//   } else {
		// 	    header('HTTP/1.0 400 Bad Request');
		// 	    echo 'Bad request';
		//   }
		//   // exit;
		// }

		// // Logged in
		// echo '<h3>Access Token</h3>';
		// var_dump($accessToken->getValue());

		// // The OAuth 2.0 client handler helps us manage access tokens
		// $oAuth2Client = $fb->getOAuth2Client();
		// // Get the access token metadata from /debug_token
		// $tokenMetadata = $oAuth2Client->debugToken($accessToken);
		// echo '<h3>Metadata</h3>';
		// var_dump($tokenMetadata);

		// // Validation (these will throw FacebookSDKException's when they fail)
		// $tokenMetadata->validateAppId('2084216845148380'); // Replace {app-id} with your app id
		// // If you know the user ID this access token belongs to, you can validate it here
		// //$tokenMetadata->validateUserId('123');
		// $tokenMetadata->validateExpiration();

		// if (! $accessToken->isLongLived()) {
		//   // Exchanges a short-lived access token for a long-lived one
		//   try {
		//     $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
		//   } catch (Facebook\Exceptions\FacebookSDKException $e) {
		//     echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
		//     exit;
		//   }
		//   echo '<h3>Long-lived</h3>';
		//   var_dump($accessToken->getValue());
		// }
		// $_SESSION['fb_access_token'] = (string) $accessToken;

		// // if(isset($accessToken)){
			$curl = curl_init();
			$accessToken = "EAAdnlYywoNwBALe9UoYdkqCQZC4axZBFEHlLWDXU2MEEj1TUVBBh6qGnQ5DySljwuG6Q18CIkayY5Hwx2UWnIuCZBmTxdURX21rAgGsKS6PzPNpQZBoZBiM7zBWN9xsJiu0BVHxkDCLPW6sWs6QQNdyztBGHehOmTPVfHjn5H95rY2STCfIxHBX3eZCoCg1SlGdYmZC6blazwZDZD";

			curl_setopt_array($curl, array(
			  	CURLOPT_URL => "https://graph.facebook.com/v2.11/me/feed?access_token={$accessToken}",
			  	CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array(
				    "cache-control: no-cache",
				    "content-type: application/json",
				    // "postman-token: 6e6e9165-d32d-285c-40a0-a66a49594de7"
				),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
				$result = json_decode($response,TRUE);
				echo '<pre>';print_r($result);exit;
				foreach ($result['data'] as $value){
					echo "<h2>".$value['message']."</h2><br>";
				}
			  // echo $response;
			}
		// }
	}

}