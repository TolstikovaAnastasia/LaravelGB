<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \DB::table('oder_forms')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'user' => \fake()->userName(),
                'phone' => \fake()->phoneNumber(),
                'email' => \fake()->email(),
                'criteria' => \fake()->text(100),
                'created_at' => \now(),
                'updated_at' => \now(),
            ];
        }

        return $data;
    }
}
