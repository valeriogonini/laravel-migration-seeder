<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        DB::table('trains')->truncate();


        $companys = ['italo', 'fracciarossa', 'fracciabianca', 'intercity', 'frecciaargento'];

        for ($i = 0; $i < 100; $i++) {


            $new_train = new Train();
            $new_train->departure_station = $faker->city();
            $new_train->company = $faker->randomElement($companys);
            $new_train->arrival_station = $faker->city();
            $new_train->departure_time = $faker->dateTimeInInterval('-1 day', '+1 day');
            $new_train->arrival_time = $faker->dateTimeInInterval('+1 day', '+2 day');
            $new_train->train_code = $faker->bothify('??####');
            $new_train->numeber_wagons = $faker->randomNumber('1', '20');
            $new_train->on_time = $faker->boolean();
            $new_train->cancelled = $faker->boolean();






            $new_train->save();
        }
    }
}
