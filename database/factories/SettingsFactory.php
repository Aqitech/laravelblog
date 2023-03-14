<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Settings>
 */
class SettingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'site_name' => "Laravel's Blog",
            'contact_email' => 'contact@blog.com',
            'contact_number' => '0900-78601',
            'address' => 'Karachi, Pakistan'
        ];
    }
}
