<?php

namespace App\Jobs;

use Aws\Laravel\AwsFacade as AWS;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class S3BucketCreator implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $bucket;

    /**
     * Create a new job instance.
     *
     * @param string $bucket
     */
    public function __construct(string $bucket)
    {
        $this->bucket = $bucket;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $s3 = AWS::createClient('s3');
        //TODO: bucket name field in agency table
        if(!$s3->doesBucketExist($this->bucket)) {
            $s3->createBucket([
                'ACL' => 'public-read',
                'Bucket' => $this->bucket
                ]);
            //store CORS rules
            $result = $s3->putBucketCors([
                'Bucket' => $this->bucket,
                'CORSRules' => [
                    [
                        'AllowedHeaders' => ['string', '*'],
                        'AllowedMethods' => ['string', '*'],
                        'AllowedOrigins' => ['string', '*'],
                        'ExposeHeaders' => [
                            ['string', 'ETag'],
                            ['string', 'x-amz-server-side-encryption']
                        ],
                    ],
                ],
            ]);
        }

    }
}
