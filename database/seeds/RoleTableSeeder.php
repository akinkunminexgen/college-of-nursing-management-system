<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Admin', 'Lecturer', 'Student'];

        foreach ($roles as $key => $value) {
        	Role::create([
        		'name' => $value
        	]);
        }
    }
}
