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
        //create bucket
        $s3->createBucket(array('Bucket' => $this->bucket));
        //wait until the bucket is created
        $s3->waitUntil('BucketExists', array('Bucket' => $this->bucket));
        //store CORS rules
        $result = $s3->putBucketCors(array(
            'Bucket' => $this->bucket,
            'CORSRules' => array(
                [
                    'AllowedHeaders' => ['string', '*'],
                    'AllowedMethods' => ['string', '*'],
                    'AllowedOrigins' => ['string', '*'],
                    'ExposeHeaders' => [
                        ['string', 'ETag'],
                        ['string', 'x-amz-server-side-encryption']
                    ],
                ],
            ),
        ));
    }
}
