<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Import Str

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'author', 'content', 'image_path', 'tags', 'is_active', 'published_at'
    ];

    // Otomatis membuat slug dari judul saat menyimpan
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($article) {
            $article->slug = Str::slug($article->title);
        });
        static::updating(function ($article) {
            $article->slug = Str::slug($article->title);
        });
    }

    // Agar route model binding menggunakan kolom 'slug' bukan 'id'
    public function getRouteKeyName()
    {
        return 'slug';
    }
}