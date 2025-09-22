<?php

namespace App\Actions;

use App\Models\JobListing;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateJobAction
{
    use AsAction;

    public function handle(array $data, JobListing $job)
    {
        $data = collect($data);
        $job->update($data->except(['images'])->toArray() + [
            'user_id' => Auth::id(),
        ]);

        if ($data->has(JobListing::MEDIA_COLLECTION_IMAGES)) {
            $job->clearMediaCollection(JobListing::MEDIA_COLLECTION_IMAGES);

            collect($data->get('images'))->each(function ($image, $key) use ($job) {
                $job->addMediaFromRequest("images.$key")->toMediaCollection(JobListing::MEDIA_COLLECTION_IMAGES);
            });
        }

        return $job;
    }
}
