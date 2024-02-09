<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;
use App\Models\Client;
use App\Models\Loans;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Author::factory(6)->create();
        Client::factory(6)->create();
        Book::factory(500)->create();
        Loans::factory(1000)->create();
    }
}
