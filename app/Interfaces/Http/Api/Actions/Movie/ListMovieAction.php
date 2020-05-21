<?php


namespace App\Interfaces\Http\Api\Actions\Movie;


use App\Infrastructure\Commands\Movie\ListMoviesCommand;
use App\Interfaces\Http\BaseAction;

class ListMovieAction extends BaseAction
{
    /**
     * @var ListMoviesCommand
     */
    private $command;

    public function __construct(ListMoviesCommand $command)
    {
        $this->command = $command;
    }

    public function __invoke()
    {
        return response()->json($this->command->execute());
    }
}
