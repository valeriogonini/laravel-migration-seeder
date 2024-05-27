<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $companys = ['italo', 'fracciarossa', 'fracciabianca', 'intercity', 'frecciaargento'];

        for ($i = 0; $i < 100; $i++) {


            $new_train = new Train();
            $new_train->departure_station = $faker->city();
            $new_train->company = $faker->randomElement($companys);
            $new_train->arrival_station = $faker->city();
            $new_train->departure_time = $faker->dateTimeBetween('-1 week', '+1 week');
            $new_train->arrival_time = $faker->dateTimeInInterval('1 day', '+1 day');
            $new_train->train_code = $faker->randomNumber('1', '99999');
            $new_train->number_wagons = $faker->randomNumber('1', '20');
            $new_train->on_time = $faker->boolean();
            $new_train->cancelled = $faker->boolean();






            $new_train->save();
        }
    }
}
