<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'id' => 1,
                'student_id' => '111111',
                'fname' => 'Siwat',
                'lname' => 'Jomewatthana',
                'school' => 'SET',
                'FOS' => 'AAA',
                'tel' => '0871548602',
                'status_user' => '1',
                'line_id' => '@AAA',
                'facebook_name' => 'Siwat Jomewatthana',
                'email' => 'coolice_55@hotmail.com',
                'password' => Hash::make('77749000'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
        DB::table('users')->insert(
            [
                'id' => 2,
                'student_id' => '111111',
                'fname' => 'Premrutai',
                'lname' => 'Am',
                'school' => 'SERD',
                'FOS' => 'AAA',
                'tel' => '0871548602',
                'status_user' => '3',
                'line_id' => '@AAA',
                'facebook_name' => 'Siwat Jomewatthana',
                'email' => 's1104300051612@gmail.com',
                'password' => Hash::make('77749000'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );

        DB::table('eventcategory')->insert(
            [
                'category_id' => 1,
                'name' => 'event1',
            ]
        );
        DB::table('eventcategory')->insert(
            [
                'category_id' => 2,
                'name' => 'event2',
            ]
        );
    }
}
