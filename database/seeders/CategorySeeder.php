<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as fake;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fk = fake::create();
        for($i=1;$i<11;$i++) {
            Category::create([
                'categoryname' => $fk->unique()->firstName,
                'order' => $fk->unique()->numberBetween(1,11)
            ]);
        }
    }
}
