<?php

use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->factory(['id' => 1, 'name' => 'comedy']);
        $this->factory(['id' => 2, 'name' => 'thriller']);
    }

    private function factory(array $data)
    {
        return \App\Domain\Model\Genre\Genre::updateOrCreate(['id' => $data['id']], $data);
    }
}
