<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Link>
 */
class LinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     /**
     * Propriedade estática para armazenar o valor do contador de posição.
     *
     * @var int
     */
    protected static int $positionCounter = 0;

    public function definition(): array
    {
      self::$positionCounter++;
        return [
            'url' => fake()->unique()->url(),
            'title' => fake()->sentence(),
            'position' => self::$positionCounter,
        ];
    }

    /**
     * Reseta o contador de posição para 0.
     *
     * @return static
     */
    public function resetPosition(): static
    {
        self::$positionCounter = 0;
        return $this;
    }
}
