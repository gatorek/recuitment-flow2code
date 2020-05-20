<?php

namespace App\Domain\Model\Movie;

use App\Domain\Model\Genre\Genre;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'poster',
        'description',
        'country',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
