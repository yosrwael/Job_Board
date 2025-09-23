<?php

namespace App\Models;

use COM;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class JobListing extends Model implements HasMedia
{
    use HasFactory;
    use Notifiable;
    use InteractsWithMedia;

    public const MEDIA_COLLECTION_IMAGES = 'logos';

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'responsibilities',
        'skills',
        'qualifications',
        'salary',
        'benefits',
        'location',
        'work_type',
        'deadline',
        'status',
    ];

    protected $casts = [
        'deadline' => 'date',
    ];

    public function scopeDatePosted($query, $days)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }


    public function applications()
    {
        return $this->hasMany(Application::class, 'job_listing_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function employer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
