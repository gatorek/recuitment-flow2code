<?php


namespace App\Interfaces\Http\Api\Actions\Movie;


use App\Infrastructure\Commands\Movie\GetMovieCommand;
use App\Interfaces\Http\Api\Requests\Movie\MovieRequest;
use App\Interfaces\Http\BaseAction;

class GetMovieAction extends BaseAction
{
    /**
     * @var GetMovieCommand
     */
    private $command;

    public function __construct(GetMovieCommand $command)
    {
        $this->command = $command;
    }

    public function __invoke(MovieRequest $request)
    {
        return response()->json($this->command->execute($request));
    }
}
