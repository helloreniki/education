<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Education;
use App\Models\Organiser;
use App\Models\Department;
use App\Models\Permission;
use App\Models\Profession;
use App\Models\WorkPosition;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $work_positions = ['farmacevt receptar', 'farmacevtski tehnik', 'tajnik', 'direktor', 'vodja lekarne', 'lekarniski streznik', 'racunovodja', 'analitik', 'vodja galenskega laboratorija', 'farmacevt specialist'];
        foreach ($work_positions as $work_position ) {
            WorkPosition::factory()->create(['name' => $work_position]);
        }

        $departments = ['Uprava', 'Lekarna Sentjernej', 'Lekarna Skocjan', 'Lekarna Novo mesto', 'Lekarna Brsljin', 'Lekarna Trebnje', 'Lekarna Metlika'];
        foreach ($departments as $department) {
            Department::factory()->create(['name' => $department]);
        }

        $professions = ['mag. farmacije', 'farmacevtski tehnik', 'ekonomist', 'dipl. ekonomist'];
        foreach ($professions as $profession) {
            Profession::factory()->create(['name' => $profession]);
        }

        $admin = \App\Models\User::factory()->create([
            'name' => 'Renata',
            'email' => 'renata@email.com',
        ]);

        $direktor = User::factory()->create([
            'name' => 'Direktor'
        ]);

        $tajnica = User::factory()->create([
            'name' => 'Tajnica'
        ]);

        $simple_users = User::factory(30)->create();

        $roles = ['admin', 'editor', 'user'];
        foreach ($roles as $role) {
            Role::factory()->create(['name' => $role]);
        }

        // attach roles to users: admin, direktor, tajnica
        $admin->roles()->attach(1);
        $direktor->roles()->attach(1);
        $tajnica->roles()->attach(2);

        foreach ($simple_users as $user) {
            $user->roles()->attach(3);
        }

        $permissions = ['manage_roles', 'approve', 'manage_users', 'manage_educations', 'manage_departments', 'see_own_educations'];
        foreach ($permissions as $permission) {
            Permission::factory()->create(['name' => $permission]);
        }

        // attach all Permission::all too admin_role
        $admin_role = Role::find(1);
        $admin_role->permissions()->attach(Permission::select('id')->get());

        $editor_role = Role::find(2);
        $editor_role->permissions()->attach([3,4,5]);

        $user_role = Role::find(3);
        $user_role->permissions()->attach(6);


        $organisers = ['lekarniska zbornica', 'sfd', 'zdravniska zbornica', 'farmapro', 'doctrina', 'interno'];
        foreach ($organisers as $organiser) {
            Organiser::factory()->create(['name' => $organiser]);
        }

        $users = User::all();
        foreach ($users as $user) {
            $user->educations()->attach(Education::factory(rand(2,6))->create());
        }

    }
}
