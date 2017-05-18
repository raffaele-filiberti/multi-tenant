<?php

namespace App\Jobs;

use App\Api\V1\GoogleUpload;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GoogleDriveFilesUpload implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $file;
    protected $extension;
    protected $path;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file, $path)
    {
        $this->file = $file;
        $this->extension = $this->file->getClientOriginalExtension();
        $this->path = $path;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $contents = ( $this->extension == 'jpg' || $this->extension == 'png' )? file_get_contents($this->file->getRealPath()) : utf8_encode(file_get_contents($this->file->getRealPath()));

        $google_drive = new GoogleUpload();
        $google_drive->upload_files(trim($this->file->getClientOriginalName()), $contents, $this->path);

    }
}
