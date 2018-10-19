<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('drinks')->insert([
            [
                'drink' => 'Monster Ultra Sunrise',
                'description' => 'A refreshing orange beverage that has 75mg of caffeine per serving. Every can has two servings.',
                'caffeine_per_serving' => 75,
                'number_of_servings' => 2,
            ],
            [
                'drink' => 'Black Coffee',
                'description' => 'The classic, the average 8oz. serving of black coffee has 95mg of caffeine.',
                'caffeine_per_serving' => 95,
                'number_of_servings' => 1,
            ],
            [
                'drink' => 'Americano',
                'description' => 'Sometimes you need to water it down a bit... and in comes the americano with an average of 77mg. of caffeine per serving.',
                'caffeine_per_serving' => 77,
                'number_of_servings' => 1,
            ],
            [
                'drink' => 'Sugar free NOS',
                'description' => 'Another orange delight without the sugar. It has 130 mg. per serving and each can has two servings.',
                'caffeine_per_serving' => 130,
                'number_of_servings' => 2,
            ],
            [
                'drink' => '5 Hour Energy',
                'description' => 'And amazing shot of get up and go! Each 2 fl. oz. container has 200mg of caffeine to get you going.',
                'caffeine_per_serving' => 200,
                'number_of_servings' => 1,
            ]
        ]);
    }
}
