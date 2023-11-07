<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'studentno' => random_int(0, 99999),
      'firstname' => fake()->firstName(),
      'lastname' => fake()->lastname(),
      'middlename' => fake()->lastname(),
      'sex' => 'M',
      'year' => '2nd',
      'course' => 'BSCS',
      'section_id' => random_int(1, 11),
    ];
  }
}
