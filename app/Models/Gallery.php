<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'division', 'event_type', 'is_active'];

    public function photos()
    {
        return $this->hasMany(GalleryPhoto::class);
    }
}