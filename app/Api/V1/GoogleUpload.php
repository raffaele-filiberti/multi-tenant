<?php
namespace App\Api\V1;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;

class GoogleUpload
{
    protected $client;
    protected $folder_id;
    protected $service;
    protected $ClientId     = 'xxx';
    protected $ClientSecret = 'xxx';
    protected $refreshToken = 'xxx';

    public function __construct()
    {
        $this->client = new \Google_Client();
        $this->client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
        $this->client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
        $this->client->refreshToken(env('GOOGLE_DRIVE_REFRESH_TOKEN'));
        $this->folder_id = env('GOOGLE_DRIVE_FOLDER_ID');
        $this->service = new \Google_Service_Drive($this->client);
    }

    /**
     * create folder in google drive.
     *
     * @return [type] [description]
     */
    public function create_folder($folder_name, $parent_folder = null)
    {
        $parent_folder = ($parent_folder == null)? $this->folder_id : $parent_folder;


        $fileMetadata = new \Google_Service_Drive_DriveFile([
            'name'     => $folder_name,
            'mimeType' => 'application/vnd.google-apps.folder',
            'parents' => array($parent_folder)
        ]);
        $folder = $this->service->files->create($fileMetadata, ['fields' => 'id']);
        return $folder->id;
    }

    protected function remove_duplicated($file)
    {
        $response = $this->service->files->listFiles([
            'q' => "'$this->folder_id' in parents and name contains '$file' and trashed=false",
        ]);
        foreach ($response->files as $found) {
            return $this->service->files->delete($found->id);
        }
    }

    /**
     * this is the only method u need to call from ur controller.
     *
     * @param [type] $new_name [description]
     *
     * @return [type] [description]
     */
    public function upload_files($file, $read, $folder_id = null)
    {
        if ($folder_id == null)
            $adapter    = new GoogleDriveAdapter($this->service, $this->folder_id);
        else
            $adapter    = new GoogleDriveAdapter($this->service, $folder_id);

        $filesystem = new Filesystem($adapter);
        $filesystem->write($file, $read);
    }

    /**
     * in case u want to get the total file count
     * inside a specific folder.
     *
     * @return [type] [description]
     */
    public function files_count()
    {
        $response = $this->service->files->listFiles([
            'q' => "'$this->folder_id' in parents and trashed=false",
        ]);
        return count($response->files);
    }

    public function delete_files($file_id)
    {
        $this->service->files->delete($file_id);
    }
}