<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;

class RemoveSeriesThumbnailPath implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private readonly string $seriesThumbnailPath
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Storage::disk('public')->delete($this->seriesThumbnailPath);
    }
}

