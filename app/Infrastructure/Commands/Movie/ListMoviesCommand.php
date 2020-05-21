<?php
declare(strict_types=1);

namespace App\Infrastructure\Commands\Movie;

use Illuminate\Database\Eloquent\Collection;

class ListMoviesCommand extends AbstractMovieCommand
{
    public function execute(): Collection
    {
        return $this->movieContract->list();
    }
}
