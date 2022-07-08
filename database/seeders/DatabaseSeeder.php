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

        $moderator = User::factory()->create([
            'name' => 'Moderator'
        ]);

        $simple_users = User::factory(10)->create();

        $roles = ['admin', 'moderator', 'user'];
        foreach ($roles as $role) {
            Role::factory()->create(['name' => $role]);
        }

        $admin_role = Role::find(1);

        $admin->roles()->attach(Role::find(1));
        $moderator->roles()->attach(Role::find(2));

        $permissions = ['can_create_user', 'can_delete_user', 'can_create_education'];
        foreach ($permissions as $permission) {
            Permission::factory()->create(['name' => $permission]);
        }

        $admin_role->permissions()->attach(Permission::select('id')->get());

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
