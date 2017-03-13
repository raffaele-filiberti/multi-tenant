<?php

use Illuminate\Database\Seeder;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agency = factory(\App\Agency::class, 1)->create();

        \HipsterJazzbo\Landlord\Facades\Landlord::AddTenant($agency);
        \App\User::bootBelongsToTenants();
        factory(App\User::class, 20)->create();

//      admin dell'agency è l'unico registrato
//      gli altri utenti dovranno poi essere
//      accettati selezionando la role
        $admin = \App\User::find(1);
        $admin->subscribed = true;
        $admin->roles()->attach(1);
        $admin->save();

//      cerco la role admin e gli aggiungo tutti i permessi
        $admin_role = Role::find(1);
        $admin_perms = \App\Permission::all();
        foreach ($admin_perms as $perm) {
            $admin_role->permissions()->attach($perm->id);
        } 
    }
}
