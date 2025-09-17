<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use wapmorgan\Mp3Info\Mp3Info;

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

    public function definition(): array
    {
        $files = Storage::disk('public')->files('songs');
        $file = $this->faker->randomElement($files);

        $mp3 = new Mp3Info(Storage::disk('public')->path($file));

        return [
            'title' => $this->faker->sentence(3),
            'artist' => $this->faker->name,
            'file-path' => $file,
            'duration' => (int) $mp3->duration, // duration in seconds
        ];
    }
}
