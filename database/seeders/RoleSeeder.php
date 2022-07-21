<?php

namespace Database\Seeders;

use App\Models\Auth\Acl\Role;
use App\Models\User;
use App\Models\UserLandlord;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       if(User::query()->count()){

            //Super Admin
            $roleSuper = Role::factory()->create([
                'name' => "Super Admin", 'slug' => "super-admin", 'description' => "Poderá fazer tudo no sistema", 'special' => "all-access"
            ]);
            //Admin geral
            $roleAdmin = Role::factory()->create([
                'name' => "Administrador Do Sistema", 'slug' => "administrador-sistema", 'description' => "Poderá fazer tudo menos as configurações de roles and permissions;", 'special' => null
            ]);

            $roleClient = Role::factory()->create([
                'name' => "Client", 'slug' => "client", 'description' => "Apenas acessar o sistema com as permissões pre adicionadas", 'special' => 'no-defined'
            ]);
            $users = User::query()->get();

            foreach($users as $user){
                $case = rand(1,8);
                switch($case):
                    case 1:
                        $user->roles()->sync($roleSuper->id->toString());
                        break;
                    case 2:
                        $user->roles()->sync($roleAdmin->id->toString());
                        break;
                    default:
                        $user->roles()->sync($roleClient->id->toString());
                        break;
                    endswitch;
            }

       }
       else{
            //Super Admin
            $roleSuper = Role::factory()->create([
                'name' => "Super Admin", 'slug' => "super-admin", 'description' => "Poderá fazer tudo no sistema", 'special' => "all-access"
            ]);

            \App\Models\User::factory(4)->create()->each(function($user) use($roleSuper){
                $user->roles()->sync($roleSuper->id->toString());
            });

            //Admin geral
            $roleAdmin = Role::factory()->create([
                'name' => "Administrador Do Sistema", 'slug' => "administrador-sistema", 'description' => "Poderá fazer tudo menos as configurações de roles and permissions;", 'special' => null
            ]);

            \App\Models\User::factory(15)->create()->each(function($user) use($roleAdmin){
                $user->roles()->sync($roleAdmin->id->toString());
            });

            $roleClient = Role::factory()->create([
                'name' => "Client", 'slug' => "client", 'description' => "Apenas acessar o sistema com as permissões pre adicionadas", 'special' => 'no-defined'
            ]);

            \App\Models\User::factory(4)->create()->each(function($user) use($roleClient){
                $user->roles()->sync($roleClient->id->toString());
            });
       }
        

    }
}
