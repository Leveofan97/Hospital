<?php namespace App\Services;

use Google_Client;

class GoogleClient
{
    private $google_client;
    public function __construct()
    {
        $this->google_client = new Google_Client();
        $this->google_client->setClientId('422939786796-lkns1g1d75lt0j12dvt75a8asi66btbv.apps.googleusercontent.com');
        $this->google_client->setClientSecret('YcM61V8wrOJH1Hw63PJpxXYG');
        $this->google_client->setRedirectUri(base_url().'/auth/google_login');
        $this->google_client->addScope('email');
        $this->google_client->addScope('profile');
    }
    public function getGoogleClient()
    {
        return $this->google_client;
    }

}