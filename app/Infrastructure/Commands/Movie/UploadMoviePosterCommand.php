<?php


namespace App\Infrastructure\Commands\Movie;


use App\Domain\Model\Movie\Movie;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UploadMoviePosterCommand extends AbstractMovieCommand
{
    public function execute(int $id, $file): Movie
    {
        $data['original_name'] = $file->getClientOriginalName();
        $data['mime_type'] = $file->getMimeType();
        $data['extension'] = $file->getClientOriginalExtension();
        $fileName = md5($data['original_name'] . time());
        $data['filename'] = $fileName . '.' . $data['extension'];
        $img = Image::make($file->getRealPath())
            ->resize(config('image.width'), config('image.height'))
            ->encode($data['extension']);
        Storage::disk('public')->put($data['filename'], (string) $img);
        $this->movieContract->updatePoster($id, $data['filename']);

        return $this->movieContract->findById($id);
    }

}
