<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article;
use Illuminate\Support\Str;

class FixArticleSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:articleslugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate and fix slugs for all articles where slug is missing or not unique';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $articles = Article::all();
        $slugs = [];
        $updated = 0;
        foreach ($articles as $article) {
            $baseSlug = Str::slug($article->title);
            $slug = $baseSlug;
            $i = 1;
            // Ensure uniqueness
            while (in_array($slug, $slugs) || Article::where('slug', $slug)->where('id', '!=', $article->id)->exists()) {
                $slug = $baseSlug . '-' . $i;
                $i++;
            }
            if (!$article->slug || $article->slug !== $slug) {
                $article->slug = $slug;
                $article->save();
                $updated++;
            }
            $slugs[] = $slug;
        }
        $this->info("Slugs updated for $updated articles.");
    }
}
