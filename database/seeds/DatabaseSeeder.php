<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Database\Eloquent\Model::unguard();

        $this->call(RegionSeeder::class);
        $this->call(CommuneSeeder::class);

        \Illuminate\Database\Eloquent\Model::reguard();

        factory(\App\Role::class, 1)->create(['name' => 'admin']);
        factory(\App\Role::class, 1)->create(['name' => 'person']);
        factory(\App\Role::class, 1)->create(['name' => 'business']);

        factory(\App\User::class, 1)->create([
            'name' => 'Cristian',
            'last_name' => 'Cartes',
            'slug' => 'cristian-cartes',
            'email' => 'cristiancartesa@gmail.com',
            'password' => bcrypt('12345'),
            'role_id' => \App\Role::ADMIN
        ])->each(function (\App\User $user) {
            factory(\App\Buyer::class, 1)->create(['user_id' => $user->id]);
            factory(\App\UserMeta::class, 1)->create(['user_id' => $user->id]);
        });

        factory(\App\User::class, 1)->create([
            'name' => 'Gabriela Paz',
            'last_name' => 'García',
            'slug' => 'gabriela-paz-garcia',
            'email' => 'gabyulita@gmail.com',
            'password' => bcrypt('123456'),
            'role_id' => \App\Role::PERSON
        ])->each(function (\App\User $user) {
            factory(\App\Buyer::class, 1)->create(['user_id' => $user->id]);
            factory(\App\UserMeta::class, 1)->create(['user_id' => $user->id]);
        });

        factory(\App\Category::class, 1)->create([
            'name' => 'Inmuebles',
            'slug' => Str::slug('Inmuebles')
        ]);
        factory(\App\Category::class, 1)->create([
            'name' => 'Vehículos',
            'slug' => Str::slug('Vehículos')
        ]);
        factory(\App\Category::class, 1)->create([
            'name' => 'Hogar',
            'slug' => Str::slug('Hogar')
        ]);
        factory(\App\Category::class, 1)->create([
            'name' => 'Moda, calzados',
            'slug' => Str::slug('Moda, calzados')
        ]);
        factory(\App\Category::class, 1)->create([
            'name' => 'Tiempo Libre',
            'slug' => Str::slug('Tiempo Libre')
        ]);
        factory(\App\Category::class, 1)->create([
            'name' => 'Computación y electrónica',
            'slug' => Str::slug('Computación y electrónica')
        ]);
        factory(\App\Category::class, 1)->create([
            'name' => 'Servicios',
            'slug' => Str::slug('Servicios')
        ]);
        factory(\App\Category::class, 1)->create([
            'name' => 'Otros',
            'slug' => Str::slug('Otros')
        ]);

        factory(\App\User::class, 50)->create()->each(
            function (\App\User $user) {
                factory(\App\Buyer::class, 1)->create(['user_id' => $user->id]);
                factory(\App\UserMeta::class, 1)->create(['user_id' => $user->id]);

            }
        );
        factory(\App\User::class, 10)->create()->each(
            function (\App\User $user) {
                factory(\App\Buyer::class, 1)->create(['user_id' => $user->id]);
                factory(\App\Seller::class, 1)->create(['user_id' => $user->id]);
                factory(\App\UserMeta::class, 1)->create(['user_id' => $user->id]);

            }
        );

        factory(\App\Category::class, 5)->create();

        factory(\App\Post::class, 10000)->create();
    }
}
