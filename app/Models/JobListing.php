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
    
    protected $guarded=['id'];

    public function applications(){
        return $this->hasMany(Application::class,'job_listing_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function employer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
