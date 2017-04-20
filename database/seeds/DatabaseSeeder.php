<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // Intialise the user
        DB::table('users')->insert([
            [
        	'name'		=>			'velu',
        	'email'		=>			'velu@gmaps.com',
        	'password'	=>			bcrypt('sp1234sp'),
        	'remember_token' => 	str_random(10),
        	'created_at'	=>		Carbon::now(),
        	'updated_at'	=>		Carbon::now(),
            ],

            [
            'name'      =>          'Greg',
            'email'     =>          'greg@gmaps.com',
            'password'  =>          bcrypt('sp1234sp'),
            'remember_token' =>     str_random(10),
            'created_at'    =>      Carbon::now(),
            'updated_at'    =>      Carbon::now(),
            ],

            [
            'name'      =>          'siva',
            'email'     =>          'siva@gmaps.com',
            'password'  =>          bcrypt('sp1234sp'),
            'remember_token' =>     str_random(10),
            'created_at'    =>      Carbon::now(),
            'updated_at'    =>      Carbon::now(),
            ],
        ]);

        // Initialise the roles table
        DB::table('roles')->insert([
        	[
        	'name'			=>		'admin',
        	'display_name'	=>		'Administrator',
        	'description'	=>		'This is the GZone administrator.',
        	'created_at'	=>		Carbon::now(),
        	'updated_at'	=>		Carbon::now(),
        	],

        	[
        	'name'			=>		'manager',
        	'display_name'	=>		'Manager',
        	'description'	=>		'This is the GZone manager. Has subset of the overall permissions of Adminstrator.',
        	'created_at'	=>		Carbon::now(),
        	'updated_at'	=>		Carbon::now(),
        	],

        	[
        	'name'			=>		'member',
        	'display_name'	=>		'Member',
        	'description'	=>		'This is the GZone member and can use the services as set by Administrator or Supervisor.',
        	'created_at'	=>		Carbon::now(),
        	'updated_at'	=>		Carbon::now(),
        	],
        ]);

        // Initialise the permissions table
        DB::table('permissions')->insert([
        	// Permissions for Project
        	[
        	'name'			=>		'create-project',
        	'display_name'	=>		'Can Create Project',
        	'description'	=>		'This user can create new projects.',
        	'created_at'	=>		Carbon::now(),
        	'updated_at'	=>		Carbon::now(),
        	],

        	[
        	'name'			=>		'read-project',
        	'display_name'	=>		'Can Read Project',
        	'description'	=>		'This user can read projects.',
        	'created_at'	=>		Carbon::now(),
        	'updated_at'	=>		Carbon::now(),
        	],

        	[
        	'name'			=>		'update-project',
        	'display_name'	=>		'Can Update Project',
        	'description'	=>		'This user can update projects.',
        	'created_at'	=>		Carbon::now(),
        	'updated_at'	=>		Carbon::now(),
        	],

        	[
        	'name'			=>		'delete-project',
        	'display_name'	=>		'Can Delete Project',
        	'description'	=>		'This user can delete projects.',
        	'created_at'	=>		Carbon::now(),
        	'updated_at'	=>		Carbon::now(),
        	],

        	//  Permissions for Files
        	[
        	'name'			=>		'create-file',
        	'display_name'	=>		'Can Create File',
        	'description'	=>		'This user can create new Files.',
        	'created_at'	=>		Carbon::now(),
        	'updated_at'	=>		Carbon::now(),
        	],

        	[
        	'name'			=>		'read-file',
        	'display_name'	=>		'Can Read File',
        	'description'	=>		'This user can read files.',
        	'created_at'	=>		Carbon::now(),
        	'updated_at'	=>		Carbon::now(),
        	],

        	[
        	'name'			=>		'update-file',
        	'display_name'	=>		'Can Update File',
        	'description'	=>		'This user can update files.',
        	'created_at'	=>		Carbon::now(),
        	'updated_at'	=>		Carbon::now(),
        	],

        	[
        	'name'			=>		'delete-file',
        	'display_name'	=>		'Can Delete File',
        	'description'	=>		'This user can delete files.',
        	'created_at'	=>		Carbon::now(),
        	'updated_at'	=>		Carbon::now(),
        	],        	
        ]);

        // Associate Admin role with All Permissions
        DB::table('permission_role')->insert([
            [
            'permission_id' => 1,
            'role_id'   => 1,            
            ],

            [
            'permission_id' => 2,
            'role_id'   => 1,            
            ],

            [
            'permission_id' => 3,
            'role_id'   => 1,            
            ],

            [
            'permission_id' => 4,
            'role_id'   => 1,            
            ],

            [
            'permission_id' => 5,
            'role_id'   => 1,            
            ],

            [
            'permission_id' => 6,
            'role_id'   => 1,            
            ],

            [
            'permission_id' => 7,
            'role_id'   => 1,            
            ],

            [
            'permission_id' => 8,
            'role_id'   => 1,            
            ],
        ]);

        // Associate Role to User
        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
            'user_type' => 'App\User'
        ]);
    }
}
