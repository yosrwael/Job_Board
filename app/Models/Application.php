<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;

class Application extends Model implements HasMedia
{
    use HasFactory;
    use Notifiable;
    use InteractsWithMedia;

    public const MEDIA_COLLECTION_RESUMES= 'resumes';

    protected $fillable=[
        'job_listing_id',
        'user_id',
        'resume',
        'status'
    ];

    public function job(){
        return $this->belongsTo(JobListing::class,'job_listing_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
