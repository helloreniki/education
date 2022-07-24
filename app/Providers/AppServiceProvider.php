<?php

namespace App\Providers;

use App\Models\Education;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // $permissions_all = Permission::all();
        // // dump($permissi ons_all);

        // foreach ($permissions_all as $p) {
        //     // dump($p->name);
        //     Gate::define($p->name, function(User $user, Permission $p) {
        //         return $user->permissions()->contains($p->name);
        //     });
        // }

        Gate::define('manage_educations', function (User $user) {
            return $user->permissions()->contains('manage_educations');
        });

        Gate::define('manage_users', function (User $user) {
            return $user->permissions()->contains('manage_users');
        });

        Gate::define('manage_roles', function (User $user) {
            return $user->permissions()->contains('manage_roles');
        });

        Gate::define('approve', function (User $user) {
            return $user->permissions()->contains('approve');
        });

        Gate::define('manage_departments', function (User $user) {
            return $user->permissions()->contains('manage_departments');
        });

        // see my educations, or if user has permission to manage users, he can see also see user's educations
        Gate::define('see_user_educations', function (User $currentUser, User $user) {
            // dd([$currentUser->id, $user->id]); //  auth()->user, actual user route,
            return $user->id === $currentUser->id || $currentUser->permissions()->contains('manage_users');
        });

        // upload only for myself, but only for educations that are on pivot table (applied)
        Gate::define('upload_certificates', function (User $currentUser, User $user, Education $education) {
            return $user->id === $currentUser->id && $user->id === $education->users()->contains($user->id);
        });

        // apply only yourself to any education (cant apply someone else)
        Gate::define('apply_to_education', function (User $currentUser, User $user) {
            return $user->id === $currentUser->id;
        });

    }
}
