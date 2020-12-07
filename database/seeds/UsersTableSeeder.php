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
                'student_id' => '121032',
                'fname' => 'Phakpoom',
                'lname' => 'Ittirattanakomon',
                'school' => 'SET',
                'FOS' => 'CS',
                'tel' => '0834373083',
                'status_user' => '1',
                'line_id' => 'beer-is',
                'facebook_name' => 'Phakpoom Ittirattanakomon',
                'email' => 'st121032@ait.ac.th',
                'password' => Hash::make('0834373083'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
        DB::table('users')->insert(
            [
                'id' => 2,
                'student_id' => '121188',
                'fname' => 'Subash',
                'lname' => 'Supkota',
                'school' => 'SET',
                'FOS' => 'CS',
                'tel' => '0899999999',
                'status_user' => '3',
                'line_id' => 'subashs',
                'facebook_name' => 'Subash Supkota',
                'email' => 'st121188@ait.ac.th',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );

        DB::table('eventcategory')->insert(
            [
                'category_id' => 1,
                'name' => 'Academic',
            ]
        );
        DB::table('eventcategory')->insert(
            [
                'category_id' => 2,
                'name' => 'Sports',
            ]
        );
    }
}
