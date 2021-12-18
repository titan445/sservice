<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> function () {
                return factory(App\Models\User::class)->create()->id;
            },
            'admin_id'=>function () {
                return factory(App\Models\User::class)->create()->id;
            },
            'description'=> $this->faker->sentence(4,true),
            'name'=> $this->faker->sentence(2,true),
            'is_closed'=> $this->faker->boolean()
        ];
    }
}
