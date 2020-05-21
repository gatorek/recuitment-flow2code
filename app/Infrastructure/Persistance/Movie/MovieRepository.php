<?php


namespace App\Infrastructure\Persistance\Movie;


use App\Domain\Contracts\Movie\MovieContract;
use App\Domain\Model\Movie\Movie;
use Illuminate\Database\Eloquent\Collection;

class MovieRepository implements MovieContract
{

    public function findById(int $id): ?Movie
    {
        return Movie::with('genres')->find($id);
    }

    public function list(): Collection
    {
        return Movie::with(['genres'])->get();
    }

    public function create(array $data): Movie
    {
        $movie = Movie::create($data);
        $movie->genres()->sync($data['genres']);

        return $this->findById($movie->id);
    }

    public function update(int $id, array $data): Movie
    {
        $movie = $this->findById($id);

        if (null !== $data  && null !== $movie) {
            $movie->title = $data['title'];
            $movie->description = $data['description'];
            $movie->country = $data['country'];

            $movie->genres()->sync($data['genres']);
        }

        $movie->save();

        return $this->findById($movie->id);
    }

    public function updatePoster(int $id, string $poster): Movie
    {
        $movie = $this->findById($id);

        if (null !== $poster  && null !== $movie) {
            $movie->poster = $poster;
        }

        $movie->save();

        return $movie;
    }

    public function delete(int $id): void
    {
        if ($movie = Movie::find($id)) {
            $movie->delete();
        }
    }

    public function findByTitle(string $title): Collection
    {
        return Movie::with(['genres'])->where('title', 'like', '%' . $title . '%')->get();
    }
}
