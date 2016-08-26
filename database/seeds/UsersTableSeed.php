<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class UsersTableSeed
 *
 * Don't run the database seeder in production environments.
 */
class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['name']     = 'Jhon Doe';
        $data['email']    = 'Example@domain.tld';
        $data['password'] = bcrypt('roottoor');

        // Truncate and insert.
        $table = DB::table('users');
        $table->delete();
        $table->insert($data);
    }
}
