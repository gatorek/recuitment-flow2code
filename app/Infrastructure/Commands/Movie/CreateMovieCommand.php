<?php
declare(strict_types=1);

namespace App\Infrastructure\Commands\Movie;

use App\Domain\Model\Movie\Movie;
use App\Interfaces\Http\Api\Requests\Movie\MovieRequest;

class CreateMovieCommand extends AbstractMovieCommand
{
    public function execute(MovieRequest $request): Movie
    {
        return $this->movieContract->create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'country' => $request->get('country'),
            'genres' =>  $request->get('genres'),
        ]);
    }
}
