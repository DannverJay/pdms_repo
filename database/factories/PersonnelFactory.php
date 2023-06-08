<?php

namespace Database\Factories;

use App\Models\Personnel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personnel>
 */
class PersonnelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{

    $firstUserId = User::first()->id ?? 1;

    static $order = null;

    if ($order === null) {
        $order = $firstUserId - 1;
    }

    return [
        'first_name' => $this->faker->firstName,
        'middle_name' => $this->faker->text(10),
        'last_name' => $this->faker->lastName,
        'birth_date' => $this->faker->date(),
        'birth_place' => $this->faker->address,
        'gender' => $this->faker->randomElement(['Male', 'Female']),
        'civil_status' => $this->faker->randomElement(['Single', 'Married', 'Divorced', 'Widowed']),
        'citizenship' => $this->faker->text(10),
        'blood_type' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
        'height' => rand(1, 50),
        'weight' => rand(1, 1000),
        'mobile_no' => $this->faker->phoneNumber,
        'tel_no' => $this->faker->phoneNumber,
        'home_street' => $this->faker->streetAddress,
        'home_city' => $this->faker->city,
        'home_province' => $this->faker->address,
        'home_zip' => rand(1000, 9000),
        'current_street' => $this->faker->streetAddress,
        'current_city' => $this->faker->city,
        'current_province' => $this->faker->address,
        'current_zip' => rand(1000, 9000),
        'ranks' => $this->faker->randomElement(['Patrolman', 'Patrolwoman', 'Police Corporal', 'Police Staff Sergeant', 'Police Master Sergeant', 'Police Senior Master Sergeant', 'Police Chief Master Sergeant', 'Police Executive Master Sergeant', 'Police Lieutenant','Police Captain', 'Police Lieutenant Colonel', 'Police Colonel', 'Police Brigadier General', 'Police Major General', 'Police Lieutenant General', 'Police General']),
        'unit' => 'Region 3 Police Office',
        'sub_unit' => 'Pampanga Provincial Police Office',
        'station' => 'Apalit Municipal Police Station',
        'designation' => $this->faker->text(10),
        'status' => $this->faker->randomElement(['Active', 'Inactive']),
        'user_id' => ++$order, // Assign the order as the user_id
    ];
}
}
