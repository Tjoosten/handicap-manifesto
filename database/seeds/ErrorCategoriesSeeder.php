<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class ErrorCategoriesSeeder
 */
class ErrorCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['categorie' => 'Probleem bij het tekenen'],
            ['categorie' => 'Spellingsfout'],
            ['categorie' => 'Overige'],
            ['categorie' => 'Feedback']
        ];

        $table = DB::table('error_categories');
        $table->delete();
        $table->insert($data);
    }
}
