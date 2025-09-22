<?php

namespace App\Actions;

use App\Models\JobListing;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreJobAction
{
    use AsAction;

    public function handle(array $data)
    {
        $data = collect($data);

        $job = JobListing::create(
            $data->except(['company_logo'])->toArray() + [
                'user_id' => Auth::id(),
                'status' => 'pending',
            ]
        );

        if (request()->hasFile('company_logo')) {
            $job->addMediaFromRequest('company_logo')
                ->toMediaCollection(JobListing::MEDIA_COLLECTION_IMAGES);
        }
        return $job;
    }
}
