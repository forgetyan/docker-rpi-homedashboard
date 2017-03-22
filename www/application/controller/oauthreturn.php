<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class OAuthReturn extends Controller
{
    public function index(){
        /*
        if(isset($_GET['code']))
        {
            $client = new Google_Client();
            /*$client->setApplicationName("Home Dashboard");
            $client->addScope(Google_Service_Drive::DRIVE);
            $client->addScope(Google_Service_Calendar::CALENDAR_READONLY);
            $client->addScope('https://www.googleapis.com/auth/books');* /

            var_dump($_GET['code']);
            $client->authenticate($_GET['code']);
            $access_token = $client->getAccessToken();
            var_dump($access_token);
            file_put_contents('../access_token', $access_token);
        }
        else{
            echo 'No code provided';
        }
           */
    }
}