<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BorrowedBook>
 */
class BorrowedBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => Book::inRandomOrder()->first()->id,
            'student_id' => Student::inRandomOrder()->first()->id,
            'borrowed_at' => fake()->date(),
            'due_date' => fake()->date('Y-m-d', '+30 days'),
            'returned_at' => null,
        ];
    }
}
