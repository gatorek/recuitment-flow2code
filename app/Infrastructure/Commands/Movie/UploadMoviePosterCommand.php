<?php


namespace App\Infrastructure\Commands\Movie;


use App\Domain\Model\Movie\Movie;
use Illuminate\Support\Facades\Storage;

class UploadMoviePosterCommand extends AbstractMovieCommand
{
    public function execute(int $id, $file): Movie
    {
        $data['original_name'] = $file->getClientOriginalName();
        $data['mime_type'] = $file->getMimeType();
        $data['extension'] = $file->getClientOriginalExtension();
        $fileName = md5($data['original_name'] . time());
        $data['filename'] = $fileName . '.' . $data['extension'];
        Storage::disk('public')->put($data['filename'], (string) file_get_contents($file->getRealPath()));
        $this->movieContract->updatePoster($id, $data['filename']);

        return $this->movieContract->findById($id);
    }

}
