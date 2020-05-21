<?php
declare(strict_types=1);

namespace App\Infrastructure\Commands\Movie;

use App\Domain\Contracts\Movie\MovieContract;
use App\Infrastructure\Commands\AbstractCommand;

abstract class AbstractMovieCommand extends AbstractCommand
{
    /**
     * @var MovieContract
     */
    protected $movieContract;

    /**
     * AbstractMovieCommand constructor.
     * @param MovieContract $movieContract
     */
    public function __construct(MovieContract $movieContract)
    {
        $this->movieContract = $movieContract;
    }
}
