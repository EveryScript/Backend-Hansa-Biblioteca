<?php

namespace Database\Factories;

use App\Models\Loans;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoansFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     * 
     * @var string
     */
    protected $model = Loans::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_id' => $this->faker->numberBetween(1, 500),
            'client_id' => $this->faker->numberBetween(1, 6),
            'date_loan' => $this->faker->dateTimeBetween('-3 years', '-1 week'),
            'days_loan' => $this->faker->numberBetween(1, 30),
            'status' => $this->faker->randomElement(['En Prestamo', 'Devuelto']),
        ];
    }
}
