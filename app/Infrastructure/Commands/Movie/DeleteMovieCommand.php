<?php
declare(strict_types=1);

namespace App\Infrastructure\Commands\Movie;

class DeleteMovieCommand extends AbstractMovieCommand
{
    public function execute(int $id): void
    {
        $this->movieContract->delete($id);
    }
}
