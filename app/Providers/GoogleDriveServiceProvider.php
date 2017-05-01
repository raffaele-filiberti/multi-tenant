<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class GoogleDriveServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \Storage::extend('google', function($app, $config) {
            $client = new \Google_Client();
            $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
            $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
            $client->refreshToken(env('GOOGLE_DRIVE_REFRESH_TOKEN'));
//            $client->setAccessType('offline');
//            $client->setIncludeGrantedScopes(true);
//            $client->addScope(\Google_Service_Drive::DRIVE);
//            $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
//            $client->setRedirectUri($redirect_uri);
//
//            if (isset($_GET['code'])) {
//                $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
//                $client->setAccessToken($token);
//            }

            $service = new \Google_Service_Drive($client);

            $adapter = new \Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter($service, null);
            return new \League\Flysystem\Filesystem($adapter);
        });
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}