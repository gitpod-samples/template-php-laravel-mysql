<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\UsersDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (!App::environment('production')) {
            $this->call(CountrySeeder::class);
            $this->call(UserRoleSeeder::class);

            DB::transaction(function () {
                return tap(User::factory()->create([
                    'email' => 'admin@gmail.com',
                ]), function (User $user) {
                    return tap(
                        $user->assignRole(Role::findByName('super_admin')),
                        function (User $user) {
                            $this->createUserDetail($user->id);
                        }
                    ) ;
                });
            });
        }
    }
    public function createUserDetail(string $id)
    {
        UsersDetail::create([
            'user_id' => $id
        ]);
    }
}
