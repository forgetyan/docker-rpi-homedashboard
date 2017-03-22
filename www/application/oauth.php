<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$client = new Google_Client();
$client->setApplicationName("Home Dashboard");
$client->setAccessType("offline");
$client->setAuthConfig(__DIR__ . '/../application/client_secrets.json');

$client->addScope(Google_Service_Drive::DRIVE);
$client->addScope(Google_Service_Calendar::CALENDAR_READONLY);
$client->addScope('https://www.googleapis.com/auth/books');
$redirect_uri = 'http://localhost/oauthreturn';

$client->setRedirectUri($redirect_uri);

$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
// Si on est en processus de get token

if($uri_parts[0] == '/oauthreturn')
{
    if (! isset($_GET['code'])) {
        $auth_url = $client->createAuthUrl();
        header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    } else {
        $client->authenticate($_GET['code']);
        $_SESSION['access_token'] = $client->getAccessToken();
        var_dump($_SESSION['access_token']);
        file_put_contents('../access_token', serialize($_SESSION['access_token']));
        //$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        //header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    }
}

else
{
    if(!file_exists ('../access_token'))
    {
        $_SESSION['access_token'] = null;
    }
    // Si on doit aller chercher le token
    if(!(isset($_SESSION['access_token']) && $_SESSION['access_token']) && file_exists ('../access_token'))
    {
        $access_token = unserialize(file_get_contents('../access_token'));
        $_SESSION['access_token'] = $access_token;
    }
    if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
      $client->setAccessToken($_SESSION['access_token']);
    } else {
      $redirect_uri = 'http://localhost/oauthreturn';
      header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    }

}

/*
if(isset($refresh_token_accessed_from_my_database)) {
    //If session contains no valid Access token, get a new one
    if ($client->isAccessTokenExpired()) {
        $client->refreshToken($refresh_token_accessed_from_my_database);
    }
    //We have access token now, launch the service
    $service = new Google_Service_Calendar($client);
}
else {
    //User has never been authorized, so let's ask for the ok
    if (isset($_GET['code'])) {
        //Creates refresh and access tokens
        $credentials = $client->authenticate($_GET['code']);

        //Store refresh token for further use
        //I store mine in the DB, I've seen others store it in a file in a secure place on the server
        //$refresh_token = $credentials['refresh_token'];
        //refresh_token->persist_somewhere()

        //Store the access token in the session so we can get it after
        //the callback redirect
        $_SESSION['access_token'] = $client->getAccessToken();
        file_put_contents('../access_token', $_SESSION['access_token']);
        $redirect_uri = 'http://localhost/oauthreturn';
        header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    }

    if (!isset($_SESSION['access_token'])) {
        $auth_url = $client->createAuthUrl();
        header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    }

    if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
        $client->setAccessToken($_SESSION['access_token']);
        $service = new Google_Service_Calendar($client);
    }
}
 * 
 */
/*
if (!file_exists('../access_token') && !isset($_GET['code']))
{
    
    $redirect_uri = 'http://localhost/oauthreturn';

    $client->setRedirectUri($redirect_uri);

    $auth_url = $client->createAuthUrl();
    // Redirect to get access token
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
}
else if (isset($_GET['code'])){
    $credentials = $client->authenticate($_GET['code']);
    $refresh_token = $credentials['refresh_token'];
     $_SESSION['access_token'] = $client->getAccessToken();
     $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}
*/
if(isset($service)){
    $calendarList = $service->calendarList->listCalendarList();
while(true) {
    foreach ($calendarList->getItems() as $calendarListEntry) {
      echo $calendarListEntry->getSummary();
    }
    $pageToken = $calendarList->getNextPageToken();
    if ($pageToken) {
      $optParams = array('pageToken' => $pageToken);
      $calendarList = $service->calendarList->listCalendarList($optParams);
    } else {
      break;
    }
}
}
