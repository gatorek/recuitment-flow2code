<?php

use App\Domain\Model\Genre\Genre;
use App\Domain\Model\Movie\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder  extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $movie1 = $this->factory([
            'id' => 1,
            'title' => 'Community',
            'description' => 'Best sitcom ever',
            'country' => 'USA',
        ]);
        $movie1->genres()->attach(1);
        $movie2 = $this->factory([
            'id' => 2,
            'title' => 'Deathtrap',
            'description' => 'Not so good movie',
            'country' => 'USA',
        ]);
        $movie2->genres()->attach([1, 2]);
    }

    private function factory(array $data)
    {
        return Movie::updateOrCreate(['id' => $data['id']], $data);
    }

}
