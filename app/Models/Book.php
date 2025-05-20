<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = ['id', 'isbn', 'title', 'author_id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
