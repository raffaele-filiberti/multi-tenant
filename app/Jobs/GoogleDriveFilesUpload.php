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
    protected $content;
    protected $extension;
    protected $path;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file, $content, $path)
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

        $google_drive = new GoogleUpload();
        $google_drive->upload_files(trim($this->file->getClientOriginalName()), $this->content, $this->path);

    }
}
