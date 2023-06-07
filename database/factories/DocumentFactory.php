<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $fileName = $this->faker->randomElement(['PDS', 'Diploma', 'PFT', 'Trainings', 'Special_Trainings', 'SALN', 'KSS', 'PER', 'Reassignments', 'Eligibility']); // Fixed file name
        $fileType = $this->faker->randomElement(['pdf', 'jpeg', 'png']); // Random file extension
        $fileNameWithExtension = $fileName . '.' . $fileType;

        $currentYear = date('Y');
        $issuedYear = $this->faker->numberBetween(2020, $currentYear - 1);

        return [
            'personnel_id' => rand(1, 20),
            'file_name' => $fileNameWithExtension,
            'document_type' => $this->faker->randomElement(['Personal Data Sheet', 'Diploma/TOR', 'Physical Fitness Test', 'Trainings', 'Specialized Trainings', 'SALN', 'KSS', 'PER', 'Reassignments', 'Eligibility']),
            'issued_date' => $issuedYear,
            'file_path' => $this->faker->text(5),
        ];
    }
}
