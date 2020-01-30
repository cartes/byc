<?php

use Illuminate\Database\Seeder;

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

        factory(\App\Post::class, 150)->create();
    }
}
