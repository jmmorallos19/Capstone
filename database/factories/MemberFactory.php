<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Member;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    protected $model = Member::class;

    private static $counter = 1;

    public function definition(): array
    {
        
        $libraryCardNo = '2025-' . str_pad(self::$counter++, 4, '0', STR_PAD_LEFT);

        return [
            'library_card_no' => $libraryCardNo,  // Custom formatted library card number
            'name' => $this->faker->name(),
            'member_group' => $this->faker->word(),
            'year_and_course' => $this->faker->word(),
            'student_no' => $this->faker->unique()->randomNumber(8),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'total_books_allowed' => 3,
            'name_of_guardian' => $this->faker->name(),
            'guardian_address' => $this->faker->address(),
            'guardian_phone' => $this->faker->phoneNumber(),
            'image_url' => $this->faker->imageUrl(),
            'barcode' => $this->faker->bothify('??-#####'),
            'total_books_borrowed' => 0,
            'total_books_returned' => 0,
            'total_fines' => 0,
            'status' => 'active',
        ];
    }
}
