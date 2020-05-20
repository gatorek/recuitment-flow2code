<?php

namespace App\Domain\Model\Genre;

use App\Domain\Model\Movie\Movie;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
