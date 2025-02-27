<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\BookCopy;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookCopy>
 */
class BookCopyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = BookCopy::class;

    public function definition()
    {
    // Get a random book (or adjust as needed)
    $book = Book::inRandomOrder()->first();  // Retrieve a random book

        return [
            'book_id' => $book->id,  // Assign the book_id
            'copy_no' => 'c1',  // Generate the copy number
            'accession_no' => $this->faker->unique()->numerify('ACC-######'),
            'title' => $this->faker->sentence(),
            'author' => $this->faker->name(),
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
            'status' => $this->faker->randomElement(['available', 'borrowed', 'returned']),
            'library_branch' => 'ICC Library',
            'barcode' => $this->faker->bothify('???-######'),
        ];
    }
}
