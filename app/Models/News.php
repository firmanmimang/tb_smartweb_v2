<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'news';

    // protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = ['id'];

    protected $with = ['category', 'author'];

    protected $casts = [
        'publish_status' => 'boolean',
        'comment_status' => 'boolean',
        'is_highlight' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * filter searching, category, author purposes on post index
     */
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                 $query->where('title', 'like', '%' . $search . '%')
                            //  ->orWhere('body', 'like', '%' . $search . '%')
                            ;
            });
        });
 
        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category){
                $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments():HasMany
    {
        return $this->hasMany(Comment::class);
    }

    //ambil slug scr default
    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
