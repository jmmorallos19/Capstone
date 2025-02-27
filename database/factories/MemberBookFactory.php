<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MemberBook;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MemberBook>
 */
class MemberBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = MemberBook::class;

    public function definition(): array
    {
        return [
            'member_id' => \App\Models\Member::factory(),  // Assuming you have a Member factory
            'accession_no' => $this->faker->unique()->numerify('ACC-######'),
            'title' => $this->faker->sentence(),
            'author' => $this->faker->name(),
            'category' => $this->faker->word(),
            // Manually generate large numbers for ISBN and ISBN13
            'isbn' => $this->faker->unique()->numerify('#############'),  // ISBN length (10 digits or more)
            'isbn13' => $this->faker->unique()->numerify('###############'),  // ISBN-13 length (13 digits)
            'call_no' => $this->faker->word(),
            'edition' => $this->faker->word(),
            'publisher' => $this->faker->company(),
            'publication_year' => $this->faker->year(),
            'volume' => $this->faker->word(),
            'pages' => $this->faker->numberBetween(100, 1000),
            'subject' => $this->faker->word(),
            'bibliography' => $this->faker->paragraph(),
            'description' => $this->faker->paragraph(),
            'abstract' => $this->faker->paragraph(),
            'library_branch' => 'ICC Library',  // Default library branch
            'start_borrow_date' => $this->faker->date,  // Random start borrow date
            'end_borrow_date' => $this->faker->date,  // Random end borrow date
        ];
    }
}
