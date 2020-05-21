<?php
declare(strict_types=1);

namespace App\Infrastructure\Commands\Movie;

use App\Domain\Model\Movie\Movie;

class GetMovieCommand extends AbstractMovieCommand
{
    public function execute(int $id): Movie
    {
        return $this->movieContract->findById($id);
    }
}
