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
            $client->setClientId(env(GOOGLE_DRIVE_CLIENT_ID));
            $client->setClientSecret(env(GOOGLE_DRIVE_CLIENT_SECRET));
            $client->refreshToken(env(GOOGLE_DRIVE_REFRESH_TOKEN));
            $service = new \Google_Service_Drive($client);
            $adapter = new \Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter($service, GOOGLE_DRIVE_FOLDER_ID);
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