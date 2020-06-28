<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the type seeds.
     * Type can be created with the faker
     * or by custom name
     * @return void
     */
    public function run()
    {
        $type = new Type;
        $type->name = 'Pizza';
        $type->save();
    }
}
