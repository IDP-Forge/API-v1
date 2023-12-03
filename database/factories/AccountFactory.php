<?php

namespace Database\Factories;

use App\Models\AccountStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $username = $this->faker->userName;

        return [
            'internal' => 0,
            'status_id' => 1,
            'policy_id' => null,
            'username' => $username,
            'password' => password_hash($this->faker->password, PASSWORD_ARGON2ID),
            'username_readable' => $username,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->lastName,
            'additional' => json_encode([]),
            'history' => json_encode([]),
            'attempts' => json_encode([]),
            'messages' => json_encode([]),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
