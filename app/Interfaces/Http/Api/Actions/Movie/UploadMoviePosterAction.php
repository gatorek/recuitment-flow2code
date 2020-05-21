<?php


namespace App\Interfaces\Http\Api\Actions\Movie;


use App\Infrastructure\Commands\Movie\UploadMoviePosterCommand;
use App\Interfaces\Http\BaseAction;
use Illuminate\Http\Request;

class UploadMoviePosterAction extends BaseAction
{
    /**
     * @var UploadMoviePosterCommand
     */
    private $command;

    public function __construct(UploadMoviePosterCommand $command)
    {
        $this->command = $command;
    }

    public function __invoke(int $id, Request $request)
    {
        $request->validate(['file' => 'required|image']);
        $movie = $this->command->execute($id, $request->file('file'));

        return response()->json($movie);
    }
}
