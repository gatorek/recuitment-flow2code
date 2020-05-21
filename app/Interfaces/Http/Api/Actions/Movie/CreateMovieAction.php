<?php


namespace App\Interfaces\Http\Api\Actions\Movie;


use App\Infrastructure\Commands\Movie\CreateMovieCommand;
use App\Interfaces\Http\Api\Requests\Movie\MovieRequest;
use App\Interfaces\Http\BaseAction;

class CreateMovieAction extends BaseAction
{
    /**
     * @var CreateMovieCommand
     */
    private $command;

    public function __construct(CreateMovieCommand $command)
    {
        $this->command = $command;
    }

    public function __invoke(MovieRequest $request)
    {
        return response()->json($this->command->execute($request), 201);
    }
}
