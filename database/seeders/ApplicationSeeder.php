<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Application::factory()->count(10)->create()->each(function ($application) {

            $application->addMedia(
                UploadedFile::fake()->create('resume.pdf', 100) // حجم 100 KB
            )->toMediaCollection(Application::MEDIA_COLLECTION_RESUMES);
        });
    }
}
