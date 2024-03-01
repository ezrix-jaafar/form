<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Prospect;
use App\Models\SalesRep;

class ProspectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Prospect::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'brand_name' => $this->faker->word(),
            'business_type' => $this->faker->word(),
            'role' => $this->faker->word(),
            'last_30days_sales' => $this->faker->word(),
            'sales_rep_id' => SalesRep::factory(),
        ];
    }
}
