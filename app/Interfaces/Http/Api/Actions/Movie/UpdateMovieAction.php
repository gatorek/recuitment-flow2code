<?php


namespace App\Interfaces\Http\Api\Actions\Movie;


use App\Infrastructure\Commands\Movie\UpdateMovieCommand;
use App\Interfaces\Http\Api\Requests\Movie\MovieRequest;
use App\Interfaces\Http\BaseAction;

class UpdateMovieAction extends BaseAction
{
    /**
     * @var UpdateMovieCommand
     */
    private $command;

    public function __construct(UpdateMovieCommand $command)
    {
        $this->command = $command;
    }

    public function __invoke(int $id, MovieRequest $request)
    {
        return response()->json($this->command->execute($id, $request));
    }
}
