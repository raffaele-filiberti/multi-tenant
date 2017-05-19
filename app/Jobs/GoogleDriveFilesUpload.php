<?php

namespace App\Jobs;

use App\Api\V1\GoogleUpload;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Storage;

class GoogleDriveFilesUpload implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $filename;
    protected $path;
    protected $extension;
    protected $drive_folder;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filename, $path, $extension, $drive_folder)
    {
        $this->filename = $filename;
        $this->path = $path;
        $this->extension = $extension;
        $this->drive_folder = $drive_folder;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $file = storage::disk('public')->get('text.txt');
//        $contents = ( $this->extension == 'jpg' || $this->extension == 'png' )? file_get_contents($this->path) : utf8_encode(file_get_contents($this->path));
//        $google_drive = new GoogleUpload();
//        $google_drive->upload_files(trim($this->filename), $contents, $this->path);
        Storage::disk('google')->put('test.txt', fopen($file, 'r+'));
    }
}
