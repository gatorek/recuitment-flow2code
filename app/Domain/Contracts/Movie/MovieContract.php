<?php

namespace App\Domain\Contracts\Movie;

use App\Domain\Model\Movie\Movie;
use Illuminate\Database\Eloquent\Collection;

interface MovieContract
{
    public function findById(int $id): ?Movie;

    public function list(): Collection;

    public function create(array $data): Movie;

    public function update(int $id, array $data): Movie;

    public function updatePoster(int $id, string $poster): Movie;

    public function delete(int $id): void;

    public function findByTitle(string $title): Collection;
}
