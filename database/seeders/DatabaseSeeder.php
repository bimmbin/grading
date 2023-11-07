<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // \App\Models\User::factory(10)->create();

    // Subject::factory(5)->create();
    // Section::factory(5)->create();

    User::factory(200)
      ->has(
        Profile::factory()->count(1),
        'profile'
      )
      ->create();
  }
}
