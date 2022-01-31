<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Aregsar\Converter\Models\Conversion;

class ConversionSeeder extends Seeder
{
    public function run()
    {
        Conversion::factory()
            ->create([
                "currency" => "EUR",
                "amount" => 2
            ]);

        // you can use the factory directly instaed of using it through the model Conversion::factory()
        // \Acme\Converter\Database\Factories\ConversionFactory::new()->create([
        //     "currency" => "EUR",
        //     "amount" => 2
        // ]);

        Conversion::create(["currency" => "GBP", "amount" => 3]);
    }
}
