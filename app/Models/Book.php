<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'title', 'author', 'issue_year', 'stock', 'description'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['category'] ?? false) {
            $query->where('category_id',  request('category'));
        }

        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')->orWhere('author', 'like', '%' . request('search') . '%');
        }
    }

    // Relation To User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
