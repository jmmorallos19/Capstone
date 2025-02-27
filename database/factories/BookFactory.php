<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     */

    protected $model = Book::class;
    
    private static $accession_no = 1;

     public function definition(): array
    {   
        $formatted_accession_no = str_pad(self::$accession_no++, 4, '0', STR_PAD_LEFT);

        return [
            'accession_no' => $formatted_accession_no,
            'title' => $this->faker->sentence(),
            'author' => $this->faker->name(),
            'isbn' => $this->faker->unique()->numberBetween(1000000000, 9999999999),
            'isbn13' => $this->faker->unique()->numberBetween(1000000000000, 9999999999999),
            'call_no' => $this->faker->word(),
            'edition' => $this->faker->word(),
            'publisher' => $this->faker->company(),
            'publication_year' => $this->faker->year(),
            'volume' => $this->faker->word(),
            'pages' => $this->faker->numberBetween(100, 1000),
            'subject' => $this->faker->word(),
            'bibliography' => $this->faker->text(),
            'description' => $this->faker->paragraph(),
            'abstract' => $this->faker->paragraph(),
            'library_branch' => $this->faker->word(),
            'barcode' => $this->faker->unique()->numerify('##########'),

        ];
    }
}
