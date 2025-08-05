<?php
// File: app/Models/Article.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'author', 'content', 'image_path', 'tags', 'is_active', 'published_at'
    ];
}