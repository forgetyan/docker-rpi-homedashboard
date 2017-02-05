<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Calendar extends Controller
{
    public function index($dashboardId)
    {
        $dashboardItem = $this->model->getDashboardItem($dashboardId);
        $model = new DashboardBaseViewModel();
        $model->dashboardId = $dashboardId;
        
        /*if (!$oauth_credentials = getOAuthCredentialsFile()) {
            echo missingOAuth2CredentialsWarning();
            return;
        }
        
        /************************************************
        * The redirect URI is to the current page, e.g:
        * http://localhost:8080/simple-file-upload.php
        ************************************************ /
        $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
        
        $client = new Google_Client();
        $client->setAuthConfig($oauth_credentials);
        $client->setRedirectUri($redirect_uri);
        $client->addScope("https://www.googleapis.com/auth/drive");
        $service = new Google_Service_Drive($client);
        // add "?logout" to the URL to remove a token from the session
        if (isset($_REQUEST['logout'])) {
          unset($_SESSION['upload_token']);
        }

        /************************************************
        * If we have a code back from the OAuth 2.0 flow,
        * we need to exchange that with the
        * Google_Client::fetchAccessTokenWithAuthCode()
        * function. We store the resultant access token
        * bundle in the session, and redirect to ourself.
        ************************************************ /
        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token);
         // store in the session also
         $_SESSION['upload_token'] = $token;
         // redirect back to the example
         header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
       }
       // set the access token as part of the client
       if (!empty($_SESSION['upload_token'])) {
         $client->setAccessToken($_SESSION['upload_token']);
         if ($client->isAccessTokenExpired()) {
           unset($_SESSION['upload_token']);
         }
       } else {
         $authUrl = $client->createAuthUrl();
       }*/

        //putenv('GOOGLE_APPLICATION_CREDENTIALS=' + __DIR__ . '/../oauth-credentials.json');
        
        $client = new Google_Client();
        //$client->useApplicationDefaultCredentials();
        //$client->setApplicationName("Home Dashboard");
        //$client->setDeveloperKey("AIzaSyBy3p9XYO3D7eKJnFqV7hn-jBnfNCnuIUo");
        $client->setAuthConfig(__DIR__ . '/../oauth-credentials.json');
        $client->addScope(Google_Service_Drive::DRIVE);
        //$client->addScope(Google_Service_Drive::CALENDAR);
        $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
        $client->setRedirectUri($redirect_uri);
        
        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token);
        }
        
        //$client->addScope(Google_Service_Drive::DRIVE);
        /*$service = new Google_Service_Books($client);
        $optParams = array('filter' => 'free-ebooks');
        $results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);
*/
        /*foreach ($results as $item) {
          echo $item['volumeInfo']['title'], "<br /> \n";
        }*/

        require APP . 'view/calendar/index.php';
    }
}