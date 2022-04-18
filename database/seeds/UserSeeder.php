<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'HR Manager',
                'email' => 'email@gmail.com',
                'password' => '$2y$10$oljABjsWHoasW3o4cUHF5egolYEN0E0mRxZDrgpb2VSy0HTABLEL6',
                'remember_token' => 'rQJ5ANhtw4nfAr6QKsyYmmv5K30Jr69kgTxDPUQRwRUQJEklYdCnp7GCuWfz',
                'created_at' => NULL,
                'updated_at' => '2022-03-06 00:16:38',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'ADMIN',
                'email' => 'ADMIN@acsat.com',
                'password' => '$2y$10$kfqcAPf7D9PpNnyq/Y8keuEnx7fLPVOEvGgyv0WlrHRRcM9vcZP5O',
                'remember_token' => NULL,
                'created_at' => '2022-03-06 00:15:05',
                'updated_at' => '2022-03-06 00:15:05',
            ),
        ));
    }
}
