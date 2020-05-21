<?php
declare(strict_types=1);

namespace App\Infrastructure\Commands\Movie;

use Illuminate\Database\Eloquent\Collection;

class FindMoviesByTitleCommand extends AbstractMovieCommand
{
    public function execute(string $title): Collection
    {
        return $this->movieContract->findByTitle($title);
    }
}
