<?php


namespace App\Interfaces\Http\Api\Actions\Movie;


use App\Infrastructure\Commands\Movie\FindMoviesByTitleCommand;

class FindMoviesByTitleAction extends \App\Interfaces\Http\BaseAction
{
    /**
     * @var FindMoviesByTitleCommand
     */
    private $command;

    public function __construct(FindMoviesByTitleCommand $command)
    {
        $this->command = $command;
    }

    public function __invoke(string $title)
    {
        return response()->json($this->command->execute($title));
    }

}
