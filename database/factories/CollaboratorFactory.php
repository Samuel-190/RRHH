<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collaborator>
 */
class CollaboratorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name'      => fake()->firstName(),
            'last_name'       => fake()->lastName(),
            'document_type'   => 'CC',
            'document_number' => fake()->unique()->numerify('#########'),
            'birth_date'      => fake()->date('Y-m-d', '2000-01-01'),
            'email'           => fake()->unique()->safeEmail(),
            'phone_number'    => fake()->numerify('##########'),
            'address'         => fake()->address(),
        ];
    }
}
