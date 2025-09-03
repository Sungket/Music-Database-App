<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    use wapmorgan\Mp3Info\Mp3Info;

    public function definition(): array
    {
        $files = Storage::disk('public')->files('songs');
        $file = $this->faker->randomElement($files);

        $mp3 = new Mp3Info(Storage::disk('public')->path($file));

        return [
            'title' => $this->faker->sentence(3),
            'artist' => $this->faker->name,
            'file-path' => 'songs/' . $this->faker->slug . '.mp3',
            'duration' => $this->faker->numberBetween(60, 600), //1 - 10 minutes
        ];
    }
}
