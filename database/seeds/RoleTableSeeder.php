<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Role::class)->create();

        DB::table('roles')->insert([
            'slug' => 'admin',
            'name' => 'Administrator',
            'permissions' => json_encode([
                'product.create'     => true,
                'product.edit'       => true,
                'product.delete'     => true,
                'product.show'       => true,
                'product.purchase'   => true,
            ]),
        ]);
    }
}