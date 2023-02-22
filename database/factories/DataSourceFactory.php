<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\DataSource;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DataSource>
 */
class DataSourceFactory extends Factory
{
    protected $model = DataSource::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'source' => $this->faker->word,
            'url' => $this->faker->url
        ];
    }
}
