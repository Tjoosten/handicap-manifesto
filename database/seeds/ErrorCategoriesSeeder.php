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
            [
                'name'        => 'Probleem bij het tekenen',
                'description' => 'Probleem bij het tekenen',
            ],
            [
                'name'        => 'Spellingsfout',
                'description' => 'Spellingsfout',
            ],
            [
                'name'        => 'Overige',
                'decription'  => 'Overige',
            ],
            [
                'name'        => 'Feedback',
                'description' => 'Feedback'
            ]
        ];

        $table = DB::table('error_statuses');
        $table->delete();
        $table->insert($data);
    }
}
