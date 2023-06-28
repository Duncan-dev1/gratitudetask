<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if ( Category::count() == 0 ) 
        {
            $entries = [
                ['category_name' => 'Repair'],
                ['category_name' => 'Servicing'],
                ['category_name' => 'Ceramic Coating'],
            ];
        
            Category::insert($entries);
        }
    }
}
