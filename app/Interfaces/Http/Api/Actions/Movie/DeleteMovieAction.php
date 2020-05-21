<?php


namespace App\Interfaces\Http\Api\Actions\Movie;


use App\Infrastructure\Commands\Movie\DeleteMovieCommand;
use App\Interfaces\Http\BaseAction;

class DeleteMovieAction extends BaseAction
{
    /**
     * @var DeleteMovieCommand
     */
    private $command;

    public function __construct(DeleteMovieCommand $command)
    {
        $this->command = $command;
    }

    public function __invoke(int $id)
    {
        return response()->json($this->command->execute($id));
    }
}
