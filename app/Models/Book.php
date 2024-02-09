<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'author_id',
        'lot',
        'description'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function loans()
    {
        return $this->hasMany(Loans::class);
    }
}
